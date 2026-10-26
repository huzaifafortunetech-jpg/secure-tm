<?php
// Safely get form data
$name = isset($_REQUEST['customer_full_name']) ? trim($_REQUEST['customer_full_name']) : '';
$email = isset($_REQUEST['customer_email']) ? trim($_REQUEST['customer_email']) : '';
$phone = isset($_REQUEST['customer_phone']) ? trim($_REQUEST['customer_phone']) : '';
$comment = isset($_REQUEST['comment']) ? trim(($_REQUEST['comment'] ?? '')) : '';

// Compose email
$to = "info@secure-tm.com";
$subject = "Landing Page Request";
$body = "From: $name <$email>\n"
      . "Phone: $phone\n"
      . "Email: $email\n"
      . "Message: $comment\n";

// Optional: You can set headers for better email delivery
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send email and handle response
if (mail($to, $subject, $body, $headers)) {
    echo "<script type='text/javascript'>
        alert('Your Message Sent Successfully');
        window.location.assign('https://secure-tm.com/client-form.php');
    </script>";
} else {
    echo "<script type='text/javascript'>
        alert('Failed to send message. Please try again later.');
        window.history.back();
    </script>";
}
?>
