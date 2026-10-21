<?php
session_start();
include('connect.php');
require_once('fns.php');
require_once('../PHPMailer/PHPMailerAutoload.php');

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$acctype = $_POST['acctype'] ?? '';

if (empty($username) || empty($password)) {
    $error = 'Enter your username and password to continue';
    include('index.php');
    exit;
}

// Prepare the query
$stmt = $conn->prepare("SELECT * FROM $tab_account WHERE (username = ? OR accountnumber = ?) AND password = ? LIMIT 1");
$stmt->bind_param("sss", $username, $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if ($row['status'] === 'Deactivated') {
        $error = 'Your account is deactivated. Please contact customer support for assistance.';
        include('index.php');
        exit;
    }

    // Set session variables
    $_SESSION['fullname'] = $fullname = $row['firstname'] . ' ' . $row['lastname'];
    $_SESSION['client_email'] = $client_email = $row['email'];
    $_SESSION['ibnk_user'] = $row['username'];
    $_SESSION['last_login'] = $row['last_login'] ?: 'Never';

    // Update last login
    $update_lastlogin = date('jS M, Y h:ia');
    $update_stmt = $conn->prepare("UPDATE $tab_account SET last_login = ? WHERE username = ?");
    $update_stmt->bind_param("ss", $update_lastlogin, $row['username']);
    $update_stmt->execute();

    // Generate OTP
    $_SESSION['otp'] = rand(111111, 999999);
    $subject = $org . ' OTP Code';
    $content = 'Use the OTP code below to access your account:<br><h2 style="text-align: center;">' . $_SESSION['otp'] . '</h2>';

    // Send OTP email
    send_email($client_email, $fullname, $subject, $content, $sender_email);

    header("Location: validate-otp.php");
    exit;

} else {
    $error = 'You have entered an invalid credential';
    include('index.php');
    exit;
}
?>
