<?php
$name= ($_REQUEST['name'] ?? '');
$email= ($_REQUEST['email'] ?? '');
$phone= ($_REQUEST['phone'] ?? '');
$message= ($_REQUEST['message'] ?? '');
if(empty($name) || empty($email) || empty($phone) || empty($message)){
    echo "please fill the all Fields";
}
else{
    mail("info@secure-tm.com", "Secure TM" , "From:$name<$email>\n $phone\n $message\n $email\n");
    echo "<script type='text/javascript'>alert('Your Form Sent Successfully');
     window.location.assign('https://secure-tm.com/thankyou.php');
    </script>";
}
?>