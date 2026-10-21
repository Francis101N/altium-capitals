<?php 

require_once('fns.php');
require_once('../PHPMailer/PHPMailerAutoload.php');

  $toaddress = $notification_email;
  $subject = 'My Online Bank Notification';
  
  $mailcontent = $notification;



$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
// More headers
$headers .= "From: $sender_email" . "\r\n";

send_email($toaddress, 'Admin', $subject, $mailcontent, contact_email()); 

?>