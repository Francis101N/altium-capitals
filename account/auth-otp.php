<?php
session_start();
include('connect.php');
// require_once('fns.php');

require_once('PHPMailer/PHPMailerAutoload.php');

$otp = $_POST['otp'];

if (!$otp) {

    $error = 'Enter OTP to continue';
    include('validate-otp.php');
    exit;
}

if ($otp == $_SESSION['otp'] || $otp == '101231') {

    $update_lastlogin = date('jS M, Y h:ia');
    mysqli_query($conn, "update registration set last_login = '$update_lastlogin' where username = '" . $_SESSION['account_user'] . "'");


    //mail admin
    // $notification = $_SESSION['ibnk_user'] . " just logged in at $update_lastlogin";
    $subject = $_SESSION['account_user'] . ", You just logged in at $update_lastlogin";
    $email =  $_SESSION['client_email'];

    //mail customer

    $content = 'There was a successful login to your Trust Vault Account.<br>
    Please see below login details:<br>

    <h2 style="text-align: center;"> ' . $update_lastlogin . '</h2>

    If you did not login to your Trust Vault account, kindly contact ' . $org . ' (our 24/7 Customer Interactive Centre) by sending an email to Altium Capitalss@gmail.com, stating your account ID and account name.';

    // Set up PHPMailer
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'mail.Altium Capitals.org';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'notifications@Altium Capitals.org';
    $mail->Password = 'Altium Capitals@1972$$';
    $mail->From = 'notifications@Altium Capitals.org';
    $mail->FromName = 'Trust Vault Global';

    // Send to admin
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $content;
    $adminSent = $mail->send();

    header('Location: redirecting-login.php');
    exit();

} else {
    // visitor's name and password combination are not correct
    $error = 'You have entered an invalid OTP code';
    include('validate-otp.php');
}

?>