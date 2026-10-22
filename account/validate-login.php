<?php
session_start();
include('connect.php');
require_once('fns.php');

require_once('PHPMailer/PHPMailerAutoload.php');

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!$username || !$password) {
    $error = 'Enter your username and password to continue';
    include('index.php');
    exit;
}

$query = "SELECT * FROM registration 
          WHERE (username = '$username' AND password = '$password') 
          OR (account_id = '$username' AND password = '$password')";


$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if (!$result) {
    echo 'Cannot run query.';
    exit;
}
if ($count > 0) {
    // visitor's name and password combination are correct
    $_SESSION['fullname'] = $fullname = $row['surname'] . ' ' . $row['firstname'] . ' ' . $row['middlename'];
    $_SESSION['client_email'] = $client_email = $row['email']; 


    $_SESSION['account_user'] = $row['username'];
    $_SESSION['account_id'] = $row['account_id'];

    if ($row['last_login']) {
        $_SESSION['last_login'] = $row['last_login'];
    } else {
        $_SESSION['last_login'] = 'Never';
    }

    //update last login column
    $update_lastlogin = date('jS M, Y h:ia');
    mysqli_query($conn, "update registration set last_login = '$update_lastlogin' where username = '$username'");




    // set random OTP as session for this user
    $_SESSION['otp'] = rand(111111, 999999);
    $subject = 'Altium Capitals. Otp';

    //mail customer

    $content = 'Use the OTP code sent to your registered email to access your account:<br>
		
		<h2 style="text-align: center;"> ' . $_SESSION['otp'] . '</h2>';

    // Set up PHPMailer
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'mail.sovereignnexarcapital.org';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'notification@sovereignnexarcapital.org';
    $mail->Password = 'sovereignnexarCAPITAL1972$$$';
    $mail->From = 'notification@sovereignnexarcapital.org';
    $mail->FromName = 'Altium Capitals.';

    $mail->addAddress($row['email']);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $content;
    $adminSent = $mail->send();

    header("Location: validate-otp");
} else {
    // visitor's name and password combination are not correct
    $error = 'You have entered an invalid credential';
    include('index.php');
}

?>