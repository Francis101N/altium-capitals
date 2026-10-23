<?php
session_start();
include('connect.php');
require '../PHPMailer/PHPMailerAutoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize form inputs
    $username    = trim($_POST['username'] ?? '');
    $method      = trim($_POST['method'] ?? '');
    $amount      = floatval($_POST['amount'] ?? 0);
    $reference   = trim($_POST['reference'] ?? '');
    $description = trim($_POST['description'] ?? '');

    // Validate essential inputs
    if (empty($username) || empty($method) || $amount <= 0 || empty($reference)) {
        echo "<script>alert('Please fill in all required fields with valid details.'); window.history.back();</script>";
        exit;
    }

    // Step 1: Fetch user's balance
    $query_balance = "SELECT account_balance FROM registration WHERE username = ?";
    $stmt = $conn->prepare($query_balance);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $balance = floatval($user['account_balance']);

        // Step 2: Ensure sufficient balance
        if ($amount > $balance) {
            echo "<script>alert('Insufficient balance. Please enter an amount within your available balance (\$" . number_format($balance, 2) . ").'); window.history.back();</script>";
            exit;
        }

        // Step 3: Generate a secure unique token
        $token = bin2hex(random_bytes(16)); // 32-character secure token

        // Step 4: Insert withdrawal request
        $status = "Pending";
        $insert = "INSERT INTO withdrawal (username, wallet_type, amount, reference, description, status, token, created_at)
                   VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt_insert = $conn->prepare($insert);
        $stmt_insert->bind_param("ssdssss", $username, $method, $amount, $reference, $description, $status, $token);

        if ($stmt_insert->execute()) {
            // Step 5: Send executive HTML admin email notification
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host       = 'mail.techbyfrancis.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'admin@techbyfrancis.com';
            $mail->Password   = 'Francis1972##';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->setFrom('admin@techbyfrancis.com', 'Altium Capitals');
            $mail->addAddress('francisnwankwo1972@gmail.com', 'Admin');
            $mail->isHTML(true);
            $mail->Subject = "New Withdrawal Request [#{$reference}] - Altium Capitals";

            $formattedAmount = number_format($amount, 2);
            $currentTimestamp = date('Y-m-d H:i:s');
            $formattedNotes = !empty($description) ? nl2br(htmlspecialchars($description, ENT_QUOTES, 'UTF-8')) : '<em>No additional details provided</em>';

            $mail->Body = "
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>New Withdrawal Request</title>
            </head>
            <body style='margin: 0; padding: 0; background-color: #f8fafc; font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='background-color: #f8fafc; padding: 30px 15px;'>
                    <tr>
                        <td align='center'>
                            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);'>
                                
                                <!-- BRAND HEADER -->
                                <tr>
                                    <td style='background-color: #1e293b; padding: 28px 32px;'>
                                        <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                            <tr>
                                                <td>
                                                    <h2 style='color: #ffffff; margin: 0; font-size: 20px; font-weight: 800; letter-spacing: 0.5px;'>ALTIUM CAPITALS</h2>
                                                    <p style='color: #94a3b8; margin: 4px 0 0 0; font-size: 12px; font-weight: 500;'>Administrative Security & Telemetry Portal</p>
                                                </td>
                                                <td align='right'>
                                                    <span style='background-color: rgba(245, 158, 11, 0.15); color: #f59e0b; border: 1px solid rgba(245, 158, 11, 0.3); padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; text-transform: uppercase;'>Pending Review</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <!-- CONTENT BODY -->
                                <tr>
                                    <td style='padding: 32px;'>
                                        <h3 style='color: #0f172a; font-size: 18px; font-weight: 700; margin-top: 0; margin-bottom: 8px;'>New Withdrawal Request</h3>
                                        <p style='color: #64748b; font-size: 14px; margin-top: 0; margin-bottom: 24px; line-height: 1.5;'>A new payout request has been initiated by an investor. Review the transaction summary below:</p>

                                        <!-- TRANSACTION DETAILS TABLE -->
                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='background-color: #f8fafc; border-radius: 8px; border: 1px solid #cbd5e1; margin-bottom: 24px;'>
                                            <tr>
                                                <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 13px; color: #64748b; font-weight: 600;'>Investor Username</td>
                                                <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0f172a; font-weight: 700; font-family: monospace;'>{$username}</td>
                                            </tr>
                                            <tr>
                                                <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 13px; color: #64748b; font-weight: 600;'>Requested Amount</td>
                                                <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 16px; color: #dc2626; font-weight: 800; font-family: monospace;'>\${$formattedAmount}</td>
                                            </tr>
                                            <tr>
                                                <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 13px; color: #64748b; font-weight: 600;'>Payout Method</td>
                                                <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0f172a; font-weight: 700;'>{$method}</td>
                                            </tr>
                                            <tr>
                                                <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 13px; color: #64748b; font-weight: 600;'>Transaction Reference</td>
                                                <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0f172a; font-weight: 700; font-family: monospace;'>{$reference}</td>
                                            </tr>
                                            <tr>
                                                <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 13px; color: #64748b; font-weight: 600;'>Timestamp</td>
                                                <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 13px; color: #475569; font-family: monospace;'>{$currentTimestamp}</td>
                                            </tr>
                                            <tr>
                                                <td style='padding: 14px 18px; font-size: 13px; color: #64748b; font-weight: 600; vertical-align: top;'>Notes / Address</td>
                                                <td style='padding: 14px 18px; font-size: 13px; color: #334155; line-height: 1.5;'>{$formattedNotes}</td>
                                            </tr>
                                        </table>

                                        <!-- ACTION BUTTON -->
                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='margin-top: 28px; margin-bottom: 12px;'>
                                            <tr>
                                                <td align='center'>
                                                    <a href='https://altiumcapitals.com/cooladmin' target='_blank' style='background-color: #2563eb; color: #ffffff; display: inline-block; padding: 14px 28px; font-size: 14px; font-weight: 700; text-decoration: none; border-radius: 8px; box-shadow: 0 2px 4px rgba(37, 99, 235, 0.2);'>Review in Admin Console &rarr;</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <!-- FOOTER -->
                                <tr>
                                    <td style='background-color: #f1f5f9; padding: 20px 32px; text-align: center; border-top: 1px solid #e2e8f0;'>
                                        <p style='color: #94a3b8; font-size: 11px; margin: 0; line-height: 1.4;'>&copy; " . date('Y') . " Altium Capitals Ltd. Automated System Alert.<br>No reply is required for this transactional email.</p>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </body>
            </html>
            ";

            if ($mail->send()) {
                echo "<script>alert('Withdrawal request submitted successfully ✅. Await admin approval.'); window.location.href='withdraw';</script>";
            } else {
                echo "<script>alert('Withdrawal saved successfully, but email notification failed.'); window.location.href='withdrawals_history.php';</script>";
            }
        } else {
            echo "<script>alert('Error submitting withdrawal. Please try again.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('User not found. Please log in again.'); window.location.href='../login.php';</script>";
    }
}
