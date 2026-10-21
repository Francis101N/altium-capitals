
<?php
error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');

require_once __DIR__ . '/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'mail.techbyfrancis.com';
$mail->SMTPAuth = true;
$mail->Username = 'admin@techbyfrancis.com';
$mail->Password = 'Francis1972##';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPDebug = 2;

// Write SMTP diagnostics to a local log, not the browser.
$mail->Debugoutput = function ($message, $level) {
    error_log("SMTP DEBUG [$level]: $message");
};

$mail->setFrom('admin@techbyfrancis.com', 'Altium Capitals');
$mail->addAddress('francisnwankwo1972@gmail.com', 'Test Recipient');
$mail->Subject = 'SMTP diagnostic test';
$mail->Body = 'Testing SMTP delivery from the MAMP PHP environment.';

try {
    if (!$mail->send()) {
        error_log('SMTP SEND FAILED: ' . $mail->ErrorInfo);
        exit('SMTP sending failed. Check the PHP error log.');
    }

    echo 'SMTP test completed successfully.';
} catch (Throwable $e) {
    error_log('SMTP EXCEPTION: ' . $e->getMessage());
    http_response_code(500);
    echo 'SMTP test failed. Check the PHP and Apache error logs.';
}
