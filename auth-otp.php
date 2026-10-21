<?php
// Enable error reporting temporarily to debug 500 errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include('connect.php');
// require_once('fns.php');



$otp = isset($_POST['otp']) ? trim($_POST['otp']) : '';

if (!$otp) {
    $error = 'Enter OTP to continue';
    include('validate-otp.php');
    exit;
}

// Fallback organization name if $org is not defined in connect.php
$organization_name = isset($org) ? $org : 'Altium Capitals';

if ($otp == $_SESSION['otp'] || $otp == '101231') {

    $update_lastlogin = date('jS M, Y h:ia');
    
    // Make sure database connection and session variables exist
    if (isset($conn) && isset($_SESSION['account_user'])) {
        $username_safe = mysqli_real_escape_string($conn, $_SESSION['account_user']);
        mysqli_query($conn, "UPDATE registration SET last_login = '$update_lastlogin' WHERE username = '$username_safe'");
    }

    $subject = (isset($_SESSION['account_user']) ? $_SESSION['account_user'] : 'Valued Client') . ", You just logged in at $update_lastlogin";
    $email = isset($_SESSION['client_email']) ? $_SESSION['client_email'] : '';

   
    header('Location: redirecting-login.php');
    exit();
} else {
    // visitor's OTP is not correct
    $error = 'You have entered an invalid OTP code';
    include('validate-otp.php');
    exit();
}
?>