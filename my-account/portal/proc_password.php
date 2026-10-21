<?php
session_start();

include('connect.php');
require_once('fns.php');
require_once('PHPMailer/PHPMailerAutoload.php'); // Load PHPMailer

$que = "SELECT * FROM registration WHERE username = '" . $_SESSION['account_user'] . "'";
$res = mysqli_query($conn, $que);
$rec = mysqli_fetch_array($res);

$current_password = addslashes($_POST['current_password']);
$password = addslashes($_POST['new_password']);
$confirm = addslashes($_POST['confirm_password']);

if (!$current_password || !$password || !$confirm) {
    $error = 'All information on this page is compulsory';
    include('update_password.php');
    exit;
}

if ($rec['password'] != $current_password) {
    $error = 'The current password you entered is invalid';
    include('update_password.php');
    exit;
}

if ($password != $confirm) {
    $error = 'Your new password and confirmation password are not the same';
    include('update_password.php');
    exit;
}

$query = "UPDATE registration SET password ='" . $password . "' WHERE username='" . $_SESSION['account_user'] . "'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Send confirmation email
    $email = $rec['email'];
    $fullname = $rec['fullname'];
    $username = $rec['username'];

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'mail.Altium Capitals.org';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'notifications@Altium Capitals.org';
    $mail->Password = 'Altium Capitals@1972$$';
    $mail->From = 'notifications@Altium Capitals.org';
    $mail->FromName = 'Sovereign Nexar Capital';
    $mail->isHTML(true);
    $mail->addAddress($email);

    $mail->Subject = 'Password Change Confirmation';
    $mail->Body = "
        <p>Dear {$fullname},</p>
        <p>This is a confirmation that your password for your account <strong>{$username}</strong> has been successfully updated.</p>
        <p>If you did not perform this change, please contact our support team immediately.</p>
        <p>Best regards,<br> Sovereign Nexar Capital</p>
    ";

    if(!$mail->send()) {
        error_log("Password confirmation email could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }

    $success = 'Password has been updated and a confirmation email has been sent.';
    include('update_password.php');
    exit;
} else {
    $error = 'Failed to update password. Please try again.';
    include('update_password.php');
    exit;
}
?>
