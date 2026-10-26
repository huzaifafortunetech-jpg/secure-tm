"""Offline handler checks. Mail, uploads and gateway transports are test doubles."""
from pathlib import Path
import argparse
import json
import os
import subprocess
import tempfile

ROOT = Path(__file__).resolve().parents[1]

MAILER = r'''<?php
namespace PHPMailer\PHPMailer;
class Exception extends \Exception {}
class PHPMailer {
    private array $values = ['ErrorInfo' => 'Simulated mail failure'];
    public function __construct(private bool $exceptions = false) {}
    public function __set(string $key, mixed $value): void { $this->values[$key] = $value; }
    public function __get(string $key): mixed { return $this->values[$key] ?? null; }
    public function __call(string $name, array $arguments): bool {
        if ($name === 'addAttachment') $this->values['attachment'] = $arguments[0];
        return true;
    }
    public function send(): bool {
        file_put_contents(getenv('TEST_CAPTURE'), json_encode(['body' => $this->values['Body'] ?? '', 'attachment' => $this->values['attachment'] ?? null]));
        if (getenv('TEST_RESULT') === 'fail' && $this->exceptions) throw new Exception('Simulated mail failure');
        return getenv('TEST_RESULT') !== 'fail';
    }
}
'''
RUNNER = r'''<?php
// The fixtures cannot contact an SMTP server or payment API.
define('SITE_ROOT', getenv('TEST_FIXTURE'));
function mail(string $to, string $subject, string $message, string $headers = ''): bool {
    file_put_contents(getenv('TEST_CAPTURE'), json_encode(['body' => $message]));
    return getenv('TEST_RESULT') !== 'fail';
}
function move_uploaded_file(string $from, string $to): bool { return copy($from, $to); }
foreach (['CURLOPT_URL','CURLOPT_RETURNTRANSFER','CURLOPT_ENCODING','CURLOPT_MAXREDIRS','CURLOPT_TIMEOUT','CURLOPT_HTTP_VERSION','CURL_HTTP_VERSION_1_1','CURLOPT_CUSTOMREQUEST','CURLOPT_POSTFIELDS','CURLOPT_HTTPHEADER'] as $index => $name) define($name, $index + 1);
function curl_init(): stdClass { return new stdClass(); }
function curl_setopt_array(stdClass $handle, array $options): bool { return true; }
function curl_error(stdClass $handle): string { return ''; }
function curl_exec(stdClass $handle): string {
    return getenv('TEST_RESULT') === 'fail'
        ? '<response><transactionResponse><responseCode>3</responseCode><errors><error><errorText>Declined</errorText></error></errors></transactionResponse></response>'
        : '<response><transactionResponse><responseCode>1</responseCode><avsResultCode>Y</avsResultCode><transId>TEST</transId></transactionResponse></response>';
}
$_SERVER = array_replace($_SERVER, ['REQUEST_METHOD' => 'POST', 'HTTP_HOST' => 'localhost', 'PHP_SELF' => '/secure-tm/brief.php']);
$_POST = json_decode(getenv('TEST_FIELDS'), true, 512, JSON_THROW_ON_ERROR);
$_REQUEST = $_POST;
$_FILES = [];
if (getenv('TEST_UPLOAD') === 'yes') {
    $upload = SITE_ROOT . '/test-upload.txt';
    file_put_contents($upload, 'fixture');
    $_FILES['attachment'] = ['name' => 'test-upload.txt', 'tmp_name' => $upload, 'error' => UPLOAD_ERR_OK];
}
$paymentPackage = ['amount' => '49.00', 'description' => 'Complete Package'];
if (str_ends_with(getenv('TEST_HANDLER'), '/handlers/payment.php') || str_ends_with(str_replace('\\', '/', getenv('TEST_HANDLER')), '/handlers/payment.php')) {
    $input = $_POST['paydata'];
    $_POST = [];
    require getenv('TEST_HANDLER');
    echo json_encode(chargeCreditCard($input));
    exit;
}
require getenv('TEST_HANDLER');
'''


def run(php: str) -> dict:
    fields = {key: 'Example' for key in ['namef', 'namel', 'mark', 'dba', 'bname', 'bnature', 'maddress', 'city', 'state', 'country', 'zip', 'phone', 'webaddress', 'typeselect', 'detail', 'description', 'loption', 'ifyes', 'ifno']}
    fields.update({'email': 'test@example.invalid', 'name': 'Example', 'comment': 'Example', 'message': 'Example', 'customer_full_name': 'Example', 'customer_email': 'test@example.invalid', 'customer_phone': '123456789', 'loption': 'yes'})
    mapping = json.loads((ROOT / 'docs/entry-points.json').read_text(encoding='utf-8'))
    handlers = sorted({value for value in mapping.values() if value.startswith('includes/handlers/')})
    count = 0
    with tempfile.TemporaryDirectory(prefix='secure-tm-handlers-') as directory:
        fixture = Path(directory)
        dependency = fixture / 'libraries/php-mailer/src'
        dependency.mkdir(parents=True)
        (dependency / 'PHPMailer.php').write_text(MAILER, encoding='utf-8')
        for name in ['SMTP.php', 'Exception.php']:
            (dependency / name).write_text('<?php\n', encoding='utf-8')
        (fixture / '.env').write_text('SMTP_HOST=localhost\nSMTP_USERNAME=test@example.invalid\nSMTP_PASSWORD=fixture\nSMTP_ENCRYPTION=tls\nSMTP_PORT=587\n', encoding='utf-8')
        runner = fixture / 'runner.php'
        runner.write_text(RUNNER, encoding='utf-8')
        for handler in handlers:
            for result in ['success', 'fail']:
                if handler.endswith('/contact-form.php') or handler.endswith('/landing-enquiry.php'):
                    if result == 'fail':
                        continue  # Existing handlers do not branch on mail()'s return value.
                payload = fields.copy()
                if handler == 'includes/handlers/payment.php':
                    payload = {'payNow': '1', 'paydata': {'amount': '49.00', 'cc_no': '4111111111111111', 'expiry': '2030-12', 'cvv': '123', 'name': 'Test', 'address': 'Test', 'city': 'Test', 'state': 'Test', 'zip': '00000', 'country': 'US'}}
                capture = fixture / 'capture.json'
                if capture.exists():
                    capture.unlink()
                env = os.environ | {'TEST_FIXTURE': directory, 'TEST_CAPTURE': str(capture), 'TEST_RESULT': result, 'TEST_FIELDS': json.dumps(payload), 'TEST_HANDLER': str(ROOT / handler), 'TEST_UPLOAD': 'yes' if 'brief' in handler else 'no'}
                process = subprocess.run([php, '-n', '-d', 'disable_functions=mail,move_uploaded_file', '-d', 'error_reporting=32767', str(runner)], env=env, capture_output=True, text=True)
                assert process.returncode == 0, (handler, process.stderr, process.stdout)
                assert not process.stderr, (handler, process.stderr)
                if handler == 'includes/handlers/payment.php':
                    response = json.loads(process.stdout)
                    assert response['result'] == ('error' if result == 'fail' else 'success')
                elif handler.endswith('trademark-brief.php') or handler.endswith('/package-brief.php') or handler.endswith('popup-enquiry.php'):
                    assert capture.exists(), 'No mail attempt: ' + handler
                    if result == 'success' and '/payment-form/' not in handler:
                        assert 'success' in process.stdout
                    if result == 'success' and handler.endswith(('trademark-brief.php', '/handlers/package-brief.php')):
                        mail = json.loads(capture.read_text())
                        assert Path(mail['attachment']).is_file()
                        assert 'http://localhost/secure-tm/uploads/' in mail['body']
                        assert directory not in mail['body'], 'Filesystem path leaked into the uploaded-logo URL.'
                else:
                    assert capture.exists(), handler
                    assert 'Successfully' in process.stdout if result == 'success' else 'Failed' in process.stdout
                count += 1
    # Load the real bundled dependency on the target PHP version, without sending anything.
    code = 'require ' + json.dumps(str(ROOT / 'libraries/php-mailer/src/Exception.php').replace('\\', '/')) + '; require ' + json.dumps(str(ROOT / 'libraries/php-mailer/src/PHPMailer.php').replace('\\', '/')) + '; new PHPMailer\\PHPMailer\\PHPMailer(true);'
    smoke = subprocess.run([php, '-n', '-d', 'error_reporting=32767', '-r', code], capture_output=True)
    assert smoke.returncode == 0 and not smoke.stderr and not smoke.stdout, 'Bundled PHPMailer compatibility check failed.'
    return {'offline_handler_scenarios': count, 'real_mail_or_charges': 0, 'php_mailer_load': 'passed'}


if __name__ == '__main__':
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument('--php', default=os.environ.get('PHP_BINARY', 'php'))
    args = parser.parse_args()
    print(json.dumps(run(args.php), indent=2))
