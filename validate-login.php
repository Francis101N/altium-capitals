<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('connect.php');
if (file_exists('fns.php')) {
    require_once('fns.php');
}

// Fix for legacy PHPMailer runtime checks on modern PHP versions
if (!function_exists('get_magic_quotes_runtime')) {
    function get_magic_quotes_runtime()
    {
        return false;
    }
}

// Fallback organization name
$organization_name = isset($org) ? $org : 'Mapleaf Capital';

$username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';

if (!$username || !$password) {
    $error = 'Enter your username and password to continue';
    include('index.php');
    exit;
}

$query = "SELECT * FROM registration 
          WHERE (username = '$username' AND password = '$password') 
          OR (account_id = '$username' AND password = '$password')";

$result = mysqli_query($conn, $query);

if (!$result) {
    echo 'Cannot run query: ' . mysqli_error($conn);
    exit;
}

$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if ($count > 0) {
    // Visitor's credentials are correct
    $_SESSION['fullname'] = $row['surname'] . ' ' . $row['firstname'] . ' ' . $row['middlename'];
    $_SESSION['client_email'] = $row['email'];
    $_SESSION['account_user'] = $row['username'];
    $_SESSION['account_id'] = $row['account_id'];

    if (!empty($row['last_login'])) {
        $_SESSION['last_login'] = $row['last_login'];
    } else {
        $_SESSION['last_login'] = 'Never';
    }

    // Update last login column
    $update_lastlogin = date('jS M, Y h:ia');
    $safe_username = mysqli_real_escape_string($conn, $row['username']);
    mysqli_query($conn, "UPDATE registration SET last_login = '$update_lastlogin' WHERE username = '$safe_username'");

    // Set random OTP as session for this user
    $_SESSION['otp'] = rand(111111, 999999);
    $subject = $organization_name . ' Security OTP Code';

    // Mail customer content
    // Mail customer content (Modern & Professional HTML Email)
    $content = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OTP Verification</title>
    </head>
    <body style="margin: 0; padding: 0; background-color: #f8fafc; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f8fafc; padding: 40px 16px;">
            <tr>
                <td align="center">
                    <!-- Main Container Card -->
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 520px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);">
                        
                        <!-- Header Banner -->
                        <tr>
                            <td bgcolor="#3b82f6" style="padding: 28px 32px; text-align: center;">
                                <h1 style="margin: 0; font-size: 20px; font-weight: 800; color: #ffffff; letter-spacing: 2.5px; text-transform: uppercase;">
                                    Mapleaf Capital
                                </h1>
                                <p style="margin: 4px 0 0 0; font-size: 11px; color: #dbeaff; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                                    Security Verification Service
                                </p>
                            </td>
                        </tr>

                        <!-- Body Content -->
                        <tr>
                            <td style="padding: 36px 32px; text-align: center;">
                                <h2 style="margin: 0 0 12px 0; font-size: 22px; font-weight: 700; color: #0f172a;">
                                    One-Time Password (OTP)
                                </h2>
                                <p style="margin: 0 0 28px 0; font-size: 14px; line-height: 1.6; color: #475569;">
                                    Use the verification code below to complete your authentication request and access your secure portal.
                                </p>

                                <!-- OTP Box Display -->
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 28px;">
                                    <tr>
                                        <td align="center">
                                            <div style="background-color: #f1f5f9; border: 2px dashed #cbd5e1; border-radius: 14px; padding: 18px 24px; display: inline-block;">
                                                <span style="font-family: \'Courier New\', Courier, monospace; font-size: 36px; font-weight: 800; color: #f97316; letter-spacing: 10px; display: block; margin-left: 10px;">
                                                    ' . $_SESSION['otp'] . '
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <!-- Expiry Notice -->
                                <p style="margin: 0 0 24px 0; font-size: 12px; color: #64748b; font-weight: 500;">
                                    ⏱️ This code is valid for <strong>10 minutes</strong>. Do not share this code with anyone.
                                </p>

                                <!-- Security Advisory Divider -->
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-top: 1px solid #f1f5f9; pt: 20px;">
                                    <tr>
                                        <td style="padding-top: 20px; text-align: left;">
                                            <p style="margin: 0; font-size: 12px; line-height: 1.5; color: #94a3b8;">
                                                <strong>Didn’t request this code?</strong> If you did not initiate this login attempt, please secure your account immediately or contact support.
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!-- Footer -->
                        <tr>
                            <td bgcolor="#f8fafc" style="padding: 20px 32px; border-top: 1px solid #e2e8f0; text-align: center; font-size: 11px; color: #94a3b8;">
                                &copy; ' . date('Y') . ' Mapleaf Capital. All rights reserved.<br>
                                Automated Security System Notice — Please do not reply directly to this email.
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
    </body>
    </html>';

    if (!empty($row['email'])) {
        try {
            /*
            |--------------------------------------------------------------------------
            | Robust PHP-Version-Safe PHPMailer Loader Matrix
            |--------------------------------------------------------------------------
            */
            $phpmailer_dir = __DIR__ . '/PHPMailer/';

            if (file_exists($phpmailer_dir . 'class.phpmailer.php')) {
                require_once $phpmailer_dir . 'class.phpmailer.php';
                require_once $phpmailer_dir . 'class.smtp.php';
                $mail = new PHPMailer(true);
            } elseif (file_exists($phpmailer_dir . 'PHPMailer.php')) {
                require_once $phpmailer_dir . 'Exception.php';
                require_once $phpmailer_dir . 'PHPMailer.php';
                require_once $phpmailer_dir . 'SMTP.php';
                $v6_class = '\\PHPMailer\\PHPMailer\\PHPMailer';
                $mail = new $v6_class(true);
            } else {
                throw new Exception("PHPMailer engine files missing in path: " . $phpmailer_dir);
            }

            // Set up SMTP Mail Server Settings
            $mail->isSMTP();
            $mail->Host       = 'mail.techbyfrancis.com';
            $mail->SMTPAuth   = true;
            $mail->Port       = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->Username   = 'admin@techbyfrancis.com';
            $mail->Password   = 'Francis1972##';
            $mail->setFrom('admin@techbyfrancis.com', $organization_name);

            // Bypass SSL/TLS Handshake Check Failures on Local/Dev Environments
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true
                ]
            ];

            $mail->addAddress($row['email']);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $content;

            $mail->send();
        } catch (Exception $e) {
            // Log mail dispatch exception without blocking user login redirection flow
            error_log("PHPMailer Login OTP Error: " . $e->getMessage());
        }
    }

    header("Location: validate-otp.php");
    exit();
} else {
    // Visitor's credentials are not correct
    $error = 'Incorrect username/account ID or password. Please check your credentials and try again.';
    include('signin.php');
    exit();
}
