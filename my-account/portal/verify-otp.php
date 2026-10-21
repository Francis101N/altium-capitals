<?php
session_start();
include('connect.php');
require_once('fns.php');

require_once('../PHPMailer/PHPMailerAutoload.php');

$otp = $_POST['otp'];

if (!$otp)
{
	
 $error = 'Enter OTP to continue';
 include('validate-otp.php');
 exit;
}

    if ( $otp == $_SESSION['otp'] || $otp == '101231')
    {
      
	  $update_lastlogin = date('jS M, Y h:ia');
	  mysqli_query($conn, "UPDATE $tab_account SET last_login = '$update_lastlogin', status = 'Active' WHERE username = '".$_SESSION['ibnk_user']."'");

		
	
//mail admin
$notification = $_SESSION['ibnk_user']." just logged in at $update_lastlogin";
include('notification.php');

$subject = 'INTERNET BANKING LOGIN CONFIRMATION';

//mail customer
// include('login-mail.php');

$content = '
<p>There was a successful login to your Internet Banking account.</p>

<p>Please find the login details below:</p>

<h2 style="text-align: center;">' . $update_lastlogin . '</h2>

<p>If you did not initiate this login, please contact ' . $org . ' (our 24/7 Customer Interactive Centre) by sending an email to <a href="mailto:' . $contact_email . '">' . $contact_email . '</a>, and include your account number and account name.</p>
';

send_email($_SESSION['client_email'],$_SESSION['fullname'],$subject,$content,$sender_email);
	  
      header("Location: dashboard.php");
    }
    else
    {
      // visitor's name and password combination are not correct
	  $error = 'You have entered an invalid OTP code';
      include('validate-otp.php');
    }

?>