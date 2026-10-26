<?php
$name= ($_REQUEST['name'] ?? '');
$email= ($_REQUEST['email'] ?? '');
$phone= ($_REQUEST['phone'] ?? '');
$comment= ($_REQUEST['comment'] ?? '');
if(empty($name) || empty($email) || empty($phone) || empty($comment)){
    echo "please fill the all Fields";
}
else{
    mail("info@secure-tm.com", "Secure TM" , "From:$name<$email>\n $phone\n $comment\n $email\n");
    echo "<script type='text/javascript'>alert('Your Message Sent Successfully');
     window.location.assign('https://secure-tm.com/thankyou.php');
    </script>";
}
?>