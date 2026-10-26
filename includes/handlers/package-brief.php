<?php
// Sabse pehle buffering start karein taaki koi bhi accidental output (spaces/warnings) block ho jaye
ob_start();

// Live environment ke liye errors hide rakhein taaki "success" message clean rahe
error_reporting(0);
ini_set('display_errors', 0);

// ===== LOAD .ENV FUNCTION =====
function loadEnv(string $path): void
{
    if (!file_exists($path)) return;
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0 || !strpos($line, '=')) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
        putenv(trim($name) . "=" . trim($value));
    }
}

loadEnv(SITE_ROOT . '/.env');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Ensure karein ke path bilkul sahi hain
require SITE_ROOT . '/libraries/php-mailer/src/PHPMailer.php';
require SITE_ROOT . '/libraries/php-mailer/src/SMTP.php';
require SITE_ROOT . '/libraries/php-mailer/src/Exception.php';

if (($_SERVER["REQUEST_METHOD"] ?? "GET") == "POST") {

    // Sanitize Inputs
    $namef       = htmlspecialchars($_POST['namef'] ?? '');
    $namel       = htmlspecialchars($_POST['namel'] ?? '');
    $mark        = htmlspecialchars($_POST['mark'] ?? '');
    $dba         = htmlspecialchars($_POST['dba'] ?? '');
    $bname       = htmlspecialchars($_POST['bname'] ?? '');
    $bnature     = htmlspecialchars($_POST['bnature'] ?? '');
    $maddress    = htmlspecialchars($_POST['maddress'] ?? '');
    $city        = htmlspecialchars($_POST['city'] ?? '');
    $state       = htmlspecialchars($_POST['state'] ?? '');
    $country     = htmlspecialchars($_POST['country'] ?? '');
    $zip         = htmlspecialchars($_POST['zip'] ?? '');
    $phone       = htmlspecialchars($_POST['phone'] ?? '');
    $webaddress  = htmlspecialchars($_POST['webaddress'] ?? '');
    $email       = htmlspecialchars($_POST['email'] ?? '');
    $typeselect  = htmlspecialchars($_POST['typeselect'] ?? '');
    $detail      = htmlspecialchars($_POST['detail'] ?? '');
    $description = htmlspecialchars($_POST['description'] ?? '');
    $loption     = htmlspecialchars($_POST['loption'] ?? '');
    $ifyes       = htmlspecialchars($_POST['ifyes'] ?? '');
    $ifno        = htmlspecialchars($_POST['ifno'] ?? '');

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['SMTP_USERNAME'];
        $mail->Password   = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = $_ENV['SMTP_ENCRYPTION']; // 'tls' or 'ssl'
        $mail->Port       = $_ENV['SMTP_PORT'];

        $mail->setFrom($_ENV['SMTP_USERNAME'], 'Package Brief System');
        $mail->addAddress($_ENV['SMTP_USERNAME']); 
        $mail->addReplyTo($email, "$namef $namel");

        // File Upload Handling
        $upload_dir = SITE_ROOT . '/uploads/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

        $file_info = "No file uploaded.";
        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
            $file_name = time() . '_' . basename($_FILES['attachment']['name']);
            $target_file = $upload_dir . $file_name;

            if (move_uploaded_file($_FILES['attachment']['tmp_name'], $target_file)) {
                $mail->addAttachment($target_file);
                $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
                $file_url = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/uploads/" . basename($target_file);
                $file_info = "<a href='$file_url'>View Logo File</a>";
            }
        }

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = "New Trademark Brief Submission: $namef $namel";
        $mail->Body = "
            <div style='font-family: Arial, sans-serif; max-width: 600px; border: 1px solid #eee; padding: 20px;'>
                <h2 style='background: #f8f8f8; padding: 10px;'>Client & Business Information</h2>
                <p><b>Full Name:</b> $namef $namel</p>
                <p><b>Email:</b> $email</p>
                <p><b>Phone:</b> $phone</p>
                <p><b>Website:</b> $webaddress</p>
                <p><b>Business Name:</b> $bname</p>
                <p><b>Business Nature:</b> $bnature</p>
                
                <h2 style='background: #f8f8f8; padding: 10px;'>Trademark Details</h2>
                <p><b>Owner of Mark:</b> $mark</p>
                <p><b>DBA:</b> $dba</p>
                <p><b>Trademark Type:</b> $typeselect</p>
                <p><b>Details of Mark:</b> $detail</p>
                <p><b>Business Description:</b> $description</p>
                
                <h2 style='background: #f8f8f8; padding: 10px;'>Address Details</h2>
                <p><b>Mailing Address:</b> $maddress</p>
                <p><b>City:</b> $city</p>
                <p><b>State:</b> $state</p>
                <p><b>Zip/Postal Code:</b> $zip</p>
                <p><b>Country:</b> $country</p>
                
                <h2 style='background: #f8f8f8; padding: 10px;'>Usage Information</h2>
                <p><b>Currently using logo?</b> $loption</p>
                <p><b>If Yes (Places of use):</b> $ifyes</p>
                <p><b>If No (Future plans):</b> $ifno</p>
                <p><b>Uploaded Logo Link:</b> $file_info</p>
            </div>
        ";

        $mail->send();

        // CLEAR BUFFER: Ye sabse important step hai. 
        // Ye ensure karta hai ke agar koi extra HTML load ho raha tha, wo delete ho jaye.
        ob_clean(); 
        echo "success";
        exit;

    } catch (Exception $e) {
        ob_clean();
        echo "Mailer Error: " . $mail->ErrorInfo;
        exit;
    }
} else {
    ob_clean();
    echo "Method not allowed. Use POST.";
    exit;
}
?>