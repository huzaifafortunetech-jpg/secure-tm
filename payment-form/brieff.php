<?php
use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function sendmail($formData, $file) {
        $name = "Secure-tm";  // Name of your website or sender
        $to = "info@secure-tm.com";  // Receiver's email
        $subject = "New Trademark Form Submission";  // Email subject
        $from = "info@secure-tm.com";  // Sender's email
        $password = "Fortune123@@";  // Your email password

        // Email body with submitted form data
        $body = "<strong>New Form Submission:</strong><br>";
        $body .= "First Name: " . $formData['namef'] . "<br>";
        $body .= "Last Name: " . $formData['namel'] . "<br>";
        $body .= "Owner of Mark: " . $formData['mark'] . "<br>";
        $body .= "DBA: " . $formData['dba'] . "<br>";
        $body .= "Business Name: " . $formData['bname'] . "<br>";
        $body .= "Business Nature: " . $formData['bnature'] . "<br>";
        $body .= "Mailing Address: " . $formData['maddress'] . "<br>";
        $body .= "City: " . $formData['city'] . "<br>";
        $body .= "State: " . $formData['state'] . "<br>";
        $body .= "Country: " . $formData['country'] . "<br>";
        $body .= "Zip Code: " . $formData['zip'] . "<br>";
        $body .= "Phone Number: " . $formData['phone'] . "<br>";
        $body .= "Website Address: " . $formData['webaddress'] . "<br>";
        $body .= "Email: " . $formData['email'] . "<br>";
        $body .= "Trademark Type: " . $formData['typeselect'] . "<br>";
        $body .= "Mark Details: " . $formData['detail'] . "<br>";
        $body .= "Business Description: " . $formData['description'] . "<br>";
        $body .= "Logo Usage: " . $formData['loption'] . "<br>";
        if ($formData['loption'] === 'yes') {
            $body .= "Places to use mark: " . $formData['ifyes'] . "<br>";
        } else {
            $body .= "Expected Date of Use: " . $formData['ifno'] . "<br>";
        }

        // PHPMailer Settings
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.hostinger.com";
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";

        // Email Setup
        $mail->setFrom($from, $name);
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Attach file if uploaded
        if (isset($file['attachment']) && $file['attachment']['error'] == UPLOAD_ERR_OK) {
            $mail->addAttachment($file['attachment']['tmp_name'], $file['attachment']['name']);
        }

        // Send Email
        if ($mail->send()) {
            // Display thank you message before closing the tab
           header("Location: https://secure-tm.com/thankyou.php");
            exit();
        } else {
            echo "Email sending failed: " . $mail->ErrorInfo;
        }
    }

    // Send mail with form data and file attachment
    sendmail($_POST, $_FILES);
}
?>