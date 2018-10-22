<?php
$to = "weboutnow2014@gmail.com";
$subject = "Test Email";
$message = "This is my mail";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: <weboutnow2014@gmail.com>' . "\r\n";
$headers .= 'Cc: weboutnow2014@gmail.com' . "\r\n";
echo "Testing below details to send mail";
echo $to;
echo $subject;
echo $message;
echo $headers;
echo "now mailing : ...";
mail($to,$subject,$message,$headers);
?>