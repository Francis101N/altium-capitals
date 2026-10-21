<?php

declare(strict_types=1);

session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

const REGISTRATION_DEBUG = true;

function registrationFail(string $message, ?Throwable $exception = null): never
{
    if ($exception !== null) {
        error_log('[Altium registration] ' . get_class($exception) . ': ' . $exception->getMessage());
    } else {
        error_log('[Altium registration] ' . $message);
    }

    http_response_code(400);

    $detail = REGISTRATION_DEBUG && $exception !== null
        ? '<pre style="white-space:pre-wrap;overflow-wrap:anywhere;background:#fff1f2;padding:12px;border-radius:8px;">'
        . htmlspecialchars($exception->getMessage(), ENT_QUOTES, 'UTF-8') . '</pre>'
        : '';

    echo '<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Registration issue</title></head>';
    echo '<body style="font-family:Arial,sans-serif;background:#f8fafc;padding:24px;color:#0f172a;"><main style="max-width:720px;margin:40px auto;background:#fff;padding:24px;border:1px solid #e2e8f0;border-radius:14px;">';
    echo '<h2 style="color:#b91c1c;margin-top:0;">Registration could not be completed</h2><p>'
        . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</p>' . $detail;
    echo '<p><a href="signup.php" style="display:inline-block;background:#f97316;color:#fff;padding:12px 18px;border-radius:8px;text-decoration:none;">Return to signup</a></p>';
    echo '<p style="font-size:12px;color:#64748b;">Technical details have been written to the PHP error log.</p></main></body></html>';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: signup.php');
    exit;
}

$absoluteUploadPath = null;
$conn = null;

try {
    // Read and validate the signup form.
    $lname    = trim((string)($_POST['lname'] ?? ''));
    $fname    = trim((string)($_POST['fname'] ?? ''));
    $mname    = trim((string)($_POST['mname'] ?? ''));
    $sex      = trim((string)($_POST['sex'] ?? ''));
    $dob      = trim((string)($_POST['dob'] ?? ''));
    $address  = trim((string)($_POST['address'] ?? ''));
    $email    = trim((string)($_POST['email'] ?? ''));
    $phone    = trim((string)($_POST['phone'] ?? ''));
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    $confirm  = (string)($_POST['confirm'] ?? '');
    $referral = trim((string)($_POST['ref'] ?? ''));
    $referral = $referral !== '' ? $referral : null;

    if (
        $lname === '' || $fname === '' || $mname === '' || $sex === '' ||
        $dob === '' || $address === '' || $email === '' || $phone === '' ||
        $username === '' || $password === '' || $confirm === ''
    ) {
        registrationFail('Please complete every required field.');
    }

    if (!in_array($sex, ['Male', 'Female', 'Other'], true)) {
        registrationFail('Please select a valid sex option.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        registrationFail('Please enter a valid email address.');
    }

    $date = DateTime::createFromFormat('!Y-m-d', $dob);
    if (!$date || $date->format('Y-m-d') !== $dob) {
        registrationFail('Please enter a valid date of birth.');
    }

    if (!isset($_POST['iAgree'])) {
        registrationFail('You must agree to the Terms and Conditions.');
    }

    if ($password !== $confirm) {
        registrationFail('The passwords do not match.');
    }

    if (strlen($password) < 8) {
        registrationFail('Please use a password with at least 8 characters.');
    }

    require_once __DIR__ . '/connect.php';

    if (!isset($conn) || !($conn instanceof mysqli)) {
        throw new RuntimeException('connect.php must create a mysqli connection variable named $conn.');
    }

    $conn->set_charset('utf8mb4');

    // Check duplicate username.
    $check = $conn->prepare('SELECT username FROM registration WHERE username = ? LIMIT 1');
    $check->bind_param('s', $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $check->close();
        registrationFail('That username is already taken. Please choose another.');
    }
    $check->close();

    // Validate passport upload.
    if (!isset($_FILES['userfile'])) {
        registrationFail('The passport photograph was not received. Please choose the file again.');
    }

    $upload = $_FILES['userfile'];

    if ($upload['error'] !== UPLOAD_ERR_OK) {
        $uploadErrors = [
            UPLOAD_ERR_INI_SIZE   => 'The uploaded image exceeds the server upload_max_filesize limit.',
            UPLOAD_ERR_FORM_SIZE  => 'The uploaded image is too large.',
            UPLOAD_ERR_PARTIAL    => 'The image was only partially uploaded. Please try again.',
            UPLOAD_ERR_NO_FILE    => 'Please select a passport photograph.',
            UPLOAD_ERR_NO_TMP_DIR => 'The server has no temporary upload directory configured.',
            UPLOAD_ERR_CANT_WRITE => 'The server could not write the uploaded image to disk.',
            UPLOAD_ERR_EXTENSION  => 'A PHP extension stopped the image upload.'
        ];

        registrationFail($uploadErrors[$upload['error']] ?? 'Unknown image upload error.');
    }

    if (!is_uploaded_file($upload['tmp_name'])) {
        registrationFail('PHP could not verify the uploaded image. Please try again.');
    }

    if ((int)$upload['size'] > 5 * 1024 * 1024) {
        registrationFail('The passport photograph must be 5 MB or smaller.');
    }

    if (@getimagesize($upload['tmp_name']) === false) {
        registrationFail('The selected file is not a valid image.');
    }

    $allowedMimeTypes = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/webp' => 'webp'
    ];

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($upload['tmp_name']);

    if (!isset($allowedMimeTypes[$mime])) {
        registrationFail('Please upload a JPG, PNG, or WebP passport photograph.');
    }

    $uploadDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads';

    if (!is_dir($uploadDir)) {
        registrationFail('The uploads folder was not found beside process-application.php.');
    }

    if (!is_writable($uploadDir)) {
        registrationFail('The uploads folder exists, but PHP does not have permission to write to it.');
    }

    $fileName = bin2hex(random_bytes(16)) . '.' . $allowedMimeTypes[$mime];
    $absoluteUploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
    $passportPath = 'uploads/' . $fileName;

    if (!move_uploaded_file($upload['tmp_name'], $absoluteUploadPath)) {
        registrationFail('PHP received the image but could not move it into the uploads folder.');
    }

    // Generate account ID and hash password.
    $surnameClean = preg_replace('/[^a-zA-Z]/', '', $lname) ?: 'ACC';
    $surnamePrefix = strtoupper(substr($surnameClean, 0, 3));
    $birthYear = $date->format('Y');
    $accountId = $surnamePrefix . '-' . random_int(1000, 9999) . '-' . $birthYear;
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $refBonus = $referral !== null ? '7' : null;
    $organization_name = 'Altium Capitals';

    // Save registration. No wallet address is invented or inserted.
    try {
        $sql = 'INSERT INTO registration
            (account_id, surname, firstname, middlename, sex, dob, address, email, phone, username, password, passport, ref, total_referral_bonus)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            'ssssssssssssss',
            $accountId,
            $lname,
            $fname,
            $mname,
            $sex,
            $dob,
            $address,
            $email,
            $phone,
            $username,
            $passwordHash,
            $passportPath,
            $referral,
            $refBonus
        );
        $stmt->execute();
        $stmt->close();
    } catch (Throwable $e) {
        if ($absoluteUploadPath !== null && is_file($absoluteUploadPath)) {
            @unlink($absoluteUploadPath);
        }
        throw $e;
    }

    // Preserve the original referral update behavior.
    if ($referral !== null) {
        try {
            $bonus = $conn->prepare('UPDATE registration SET total_referral_bonus = 7 WHERE username = ?');
            $bonus->bind_param('s', $referral);
            $bonus->execute();
            $bonus->close();
        } catch (Throwable $refError) {
            error_log('[Altium referral update] ' . $refError->getMessage());
        }
    }

    /*
     * Email delivery runs after the account has been saved.
     * SMTP failures are logged and do not prevent the success redirect.
     */
    try {
        $phpmailerDir = __DIR__ . '/PHPMailer/';
        $phpmailerClass = null;

        if (
            is_file($phpmailerDir . 'class.phpmailer.php') &&
            is_file($phpmailerDir . 'class.smtp.php')
        ) {
            require_once $phpmailerDir . 'class.phpmailer.php';
            require_once $phpmailerDir . 'class.smtp.php';
            $phpmailerClass = 'PHPMailer';
        } elseif (
            is_file($phpmailerDir . 'PHPMailer.php') &&
            is_file($phpmailerDir . 'SMTP.php') &&
            is_file($phpmailerDir . 'Exception.php')
        ) {
            require_once $phpmailerDir . 'Exception.php';
            require_once $phpmailerDir . 'PHPMailer.php';
            require_once $phpmailerDir . 'SMTP.php';
            $phpmailerClass = '\\PHPMailer\\PHPMailer\\PHPMailer';
        } else {
            throw new RuntimeException('PHPMailer files were not found in ' . $phpmailerDir);
        }

        $configPath = __DIR__ . '/mail-config.php';

        if (!is_file($configPath)) {
            throw new RuntimeException('mail-config.php is missing.');
        }

        $mailConfig = require $configPath;

        if (!is_array($mailConfig)) {
            throw new RuntimeException('mail-config.php must return an array.');
        }

        foreach (['host', 'username', 'password', 'port', 'encryption'] as $key) {
            if (!isset($mailConfig[$key]) || $mailConfig[$key] === '') {
                throw new RuntimeException('Missing SMTP configuration value: ' . $key);
            }
        }

        $sendEmail = static function (
            string $recipient,
            string $recipientName,
            string $subject,
            string $htmlBody
        ) use ($phpmailerClass, $mailConfig, $organization_name): bool {
            try {
                $mail = new $phpmailerClass(true);
                $mail->isSMTP();
                $mail->Host = (string)$mailConfig['host'];
                $mail->SMTPAuth = true;
                $mail->Username = (string)$mailConfig['username'];
                $mail->Password = (string)$mailConfig['password'];
                $mail->Port = (int)$mailConfig['port'];

                $encryption = strtolower((string)$mailConfig['encryption']);

                if ($encryption === 'ssl' || $encryption === 'smtps') {
                    $mail->SMTPSecure = 'ssl';
                } elseif ($encryption === 'tls' || $encryption === 'starttls') {
                    $mail->SMTPSecure = 'tls';
                } else {
                    throw new RuntimeException('SMTP encryption must be ssl or tls.');
                }

                // Keep certificate validation enabled.
                $mail->CharSet = 'UTF-8';
                $mail->setFrom((string)$mailConfig['username'], $organization_name);
                $mail->addAddress($recipient, $recipientName);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $htmlBody;
                $mail->AltBody = trim(
                    html_entity_decode(
                        strip_tags(
                            str_replace(
                                ['</p>', '</div>', '<br>', '<br/>', '<br />'],
                                "\n",
                                $htmlBody
                            )
                        ),
                        ENT_QUOTES,
                        'UTF-8'
                    )
                );

                // SMTP diagnostics go to the PHP error log, not the browser.
                $mail->SMTPDebug = 2;
                $mail->Debugoutput = static function (string $message, int $level): void {
                    error_log('[Altium SMTP level ' . $level . '] ' . trim($message));
                };

                $mail->send();
                error_log('[Altium registration] Email accepted for ' . $recipient);
                return true;
            } catch (Throwable $mailError) {
                error_log(
                    '[Altium registration mail failure] ' .
                        get_class($mailError) . ': ' . $mailError->getMessage()
                );
                return false;
            }
        };

        // Welcome email.
        $safeFirstName = htmlspecialchars($fname, ENT_QUOTES, 'UTF-8');
        $safeAccountId = htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8');
        $safeUsername = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        $safeOrganization = htmlspecialchars($organization_name, ENT_QUOTES, 'UTF-8');
        $safeReferral = htmlspecialchars((string)($referral ?? ''), ENT_QUOTES, 'UTF-8');

        $referralHtml = $referral !== null
            ? '<p><strong>Referred by:</strong> ' . $safeReferral . '</p>'
            : '';

        $websiteUrl = 'http' . (
            (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 's' : ''
        ) . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost');

        $loginUrl = $websiteUrl . '/signin.php';

        $safeLoginUrl = htmlspecialchars($loginUrl, ENT_QUOTES, 'UTF-8');
        $safePassword = htmlspecialchars($password ?? '', ENT_QUOTES, 'UTF-8');

        $welcomeBody = '
        <!doctype html><html lang="en"><head><meta charset="UTF-8"></head>
        <body style="margin:0;padding:24px;background:#f8fafc;font-family:Arial,sans-serif;">
          <div style="max-width:540px;margin:auto;background:#fff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;">
            <div style="padding:24px;text-align:center;background:#3b82f6;color:#fff;">
              <h2>' . $safeOrganization . '</h2>
            </div>
            <div style="padding:28px;color:#334155;">
              <h3>Account Created Successfully!</h3>
              <p>Dear <strong>' . $safeFirstName . '</strong>,</p>
              <p>Welcome to ' . $safeOrganization . '. Your registration has been completed.</p>

              <p><strong>Login Page:</strong><br>
                <a href="' . $safeLoginUrl . '" style="color:#2563eb;word-break:break-all;">'
            . $safeLoginUrl . '</a>
              </p>

              <p><strong>Account ID:</strong> ' . $safeAccountId . '</p>
              <p><strong>Username:</strong> ' . $safeUsername . '</p>
              <p><strong>Password:</strong> ' . $safePassword . '</p>

              ' . $referralHtml . '

              <p>Please keep your login credentials secure and do not share them with anyone.</p>

              <p style="text-align:center;margin:28px 0;">
                <a href="' . $safeLoginUrl . '" style="display:inline-block;background:#3b82f6;color:#fff;padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:bold;">Login to Your Account</a>
              </p>
            </div>
            <div style="padding:16px;text-align:center;background:#f8fafc;color:#64748b;font-size:12px;">
              &copy; ' . date('Y') . ' ' . $safeOrganization . '. All rights reserved.
            </div>
          </div>
        </body></html>';

        $sendEmail(
            $email,
            $fname,
            'Welcome to ' . $organization_name,
            $welcomeBody
        );

        // Admin notification.
        $adminEmail = 'francisnwankwo1972@gmail.com';
        $safeFullName = htmlspecialchars($lname . ' ' . $fname . ' ' . $mname, ENT_QUOTES, 'UTF-8');
        $safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $safePhone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
        $adminReferral = $referral !== null ? $safeReferral : 'None';

        $adminBody = '
        <!doctype html><html lang="en"><head><meta charset="UTF-8"></head>
        <body style="margin:0;padding:24px;background:#f8fafc;font-family:Arial,sans-serif;">
          <div style="max-width:600px;margin:auto;background:#fff;padding:28px;border:1px solid #e2e8f0;border-radius:14px;color:#334155;">
            <h1>Hello Administrator , </h1>
            <h2>New Account Registration</h2>
            <p><strong>Account ID:</strong> ' . $safeAccountId . '</p>
            <p><strong>Full name:</strong> ' . $safeFullName . '</p>
            <p><strong>Email:</strong> ' . $safeEmail . '</p>
            <p><strong>Phone:</strong> ' . $safePhone . '</p>
            <p><strong>Referral:</strong> ' . $adminReferral . '</p>
          </div>
        </body></html>';

        $sendEmail(
            $adminEmail,
            'Administrator',
            'New Account Registration - ' . $safeFullName,
            $adminBody
        );
    } catch (Throwable $mailSetupError) {
        error_log(
            '[Altium registration mail setup] ' .
                get_class($mailSetupError) . ': ' . $mailSetupError->getMessage()
        );
    }

    $conn->close();
    header('Location: redirecting-register.php');
    exit;
} catch (Throwable $e) {
    if ($absoluteUploadPath !== null && is_file($absoluteUploadPath)) {
        @unlink($absoluteUploadPath);
    }

    registrationFail(
        'A server-side error stopped registration. Read the technical details below and share them if you need help.',
        $e
    );
}
