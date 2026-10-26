<?php
// Debugging ON (Live karne se pehle 0 kar dena)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ===== LOAD .ENV =====
function loadEnv(string $path): void
{
    if (!file_exists($path)) return;
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0 || !strpos($line, '=')) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}
loadEnv(SITE_ROOT . '/.env');

// ===== PHPMailer Setup =====
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require SITE_ROOT . '/libraries/php-mailer/src/PHPMailer.php';
require SITE_ROOT . '/libraries/php-mailer/src/SMTP.php';
require SITE_ROOT . '/libraries/php-mailer/src/Exception.php';

if (($_SERVER["REQUEST_METHOD"] ?? "GET") == "POST") {

    // ===== 1. Collect All Inputs =====
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
        // ===== 2. SMTP Settings =====
        $mail->isSMTP();
        $mail->Host       = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['SMTP_USERNAME'];
        $mail->Password   = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = $_ENV['SMTP_ENCRYPTION'];
        $mail->Port       = $_ENV['SMTP_PORT'];

        $mail->setFrom($_ENV['SMTP_USERNAME'], 'Trademark Application');
        $mail->addAddress($_ENV['SMTP_USERNAME']); // Form yahan receive hoga
        $mail->addReplyTo($email, "$namef $namel");

        // ===== 3. File Upload & Save Logic =====
        $file_link_text = "No attachment provided.";
        $upload_dir = SITE_ROOT . '/uploads/';
        
        // Agar directory nahi hai to banao
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
            $file_extension = pathinfo($_FILES['attachment']['name'], PATHINFO_EXTENSION);
            $new_filename = "logo_" . time() . "_" . uniqid() . "." . $file_extension;
            $target_file = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['attachment']['tmp_name'], $target_file)) {
                // Email mein attach karein
                $mail->addAttachment($target_file);
                // Email body ke liye link banayein
                $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
                $full_url = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/uploads/" . basename($target_file);
                $file_link_text = "<a href='$full_url'>View Uploaded Logo</a>";
            }
        }

        // ===== 4. Email Body (HTML) =====
        $mail->isHTML(true);
        $mail->Subject = "New Trademark Brief: $namef $namel";
        
        $mail->Body = "
            <div style='font-family: Arial, sans-serif; border: 1px solid #ddd; padding: 20px;'>
                <h2 style='color: #333;'>Trademark Application Details</h2>
                <table style='width: 100%; border-collapse: collapse;'>
                    <tr><td><b>Client Name:</b></td><td>$namef $namel</td></tr>
                    <tr><td><b>Email:</b></td><td>$email</td></tr>
                    <tr><td><b>Phone:</b></td><td>$phone</td></tr>
                    <tr><td><b>Business Name:</b></td><td>$bname</td></tr>
                    <tr><td><b>Owner of Mark:</b></td><td>$mark</td></tr>
                    <tr><td><b>DBA:</b></td><td>$dba</td></tr>
                    <tr><td><b>Mailing Address:</b></td><td>$maddress, $city, $state, $zip, $country</td></tr>
                    <tr><td><b>Website:</b></td><td>$webaddress</td></tr>
                    <hr>
                    <tr><td><b>Trademark Type:</b></td><td>$typeselect</td></tr>
                    <tr><td><b>Mark Details:</b></td><td>$detail</td></tr>
                    <tr><td><b>Description:</b></td><td>$description</td></tr>
                    <hr>
                    <tr><td><b>Using Logo?</b></td><td>$loption</td></tr>
                    <tr><td><b>If Yes (Places):</b></td><td>$ifyes</td></tr>
                    <tr><td><b>If No (Future):</b></td><td>$ifno</td></tr>
                    <tr><td><b>Logo Attachment:</b></td><td>$file_link_text</td></tr>
                </table>
            </div>";

        $mail->send();
        echo "success";

    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    exit;
}
?>