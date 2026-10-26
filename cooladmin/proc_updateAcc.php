<?php
session_start();
include('connect.php');
require '../PHPMailer/PHPMailerAutoload.php';

$success = "";
$error = "";

// Validate required POST fields
if (empty($_POST['accountid']) || empty($_POST['amount']) || empty($_POST['action']) || empty($_POST['currency'])) {
  $error = "Please fill all required fields.";
  include('update_account.php');
  exit;
}

// Collect and sanitize inputs
$accountid  = trim($_POST['accountid']);
$date_time  = trim($_POST['date/time'] ?? '');
$from       = trim($_POST['from'] ?? 'System Administration');
$amount     = floatval($_POST['amount']);
$action     = trim($_POST['action']); // "Deposit" or "Withdraw"
$currency   = trim($_POST['currency']);
$reference  = trim($_POST['reference'] ?? ('000' . rand(100, 999)));
$desc       = trim($_POST['transaction'] ?? '');
$module     = trim($_POST['transfermodule'] ?? '');

// Ensure amount is valid
if ($amount <= 0) {
  $error = "Transaction amount must be greater than zero.";
  include('update_account.php');
  exit;
}

// Fetch user record safely using Prepared Statements
$userSQL = "SELECT account_id, username, email, firstname, account_balance FROM registration WHERE account_id = ? LIMIT 1";
$stmt = $conn->prepare($userSQL);
$stmt->bind_param("s", $accountid);
$stmt->execute();
$userResult = $stmt->get_result();

if (!$userResult || $userResult->num_rows === 0) {
  $error = "Target Account ID not found in database.";
  include('update_account.php');
  exit;
}

$user = $userResult->fetch_assoc();
$email = $user['email'];
$oldBalance = floatval($user['account_balance']);
$newBalance = $oldBalance;

// Handle Deposit Logic
if ($action === "Deposit") {
  $newBalance = $oldBalance + $amount;
}
// Handle Withdrawal Logic
elseif ($action === "Withdraw") {
  if ($amount > $oldBalance) {
    $error = "Insufficient funds. Current balance: $" . number_format($oldBalance, 2);
    include('update_account.php');
    exit;
  }
  $newBalance = $oldBalance - $amount; // Fixed syntax error
} else {
  $error = "Invalid transaction action type.";
  include('update_account.php');
  exit;
}

// 1. Update Account Balance
$updateSQL = "UPDATE registration SET account_balance = ? WHERE account_id = ?";
$stmt_update = $conn->prepare($updateSQL);
$stmt_update->bind_param("ds", $newBalance, $accountid);

if ($stmt_update->execute()) {

  // 2. Insert Transaction History Record
  $insertSQL = "INSERT INTO transactions (account_id, username, type, currency, amount, reference, description, created_at)
                  VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
  $stmt_insert = $conn->prepare($insertSQL);
  $stmt_insert->bind_param("ssssdss", $accountid, $user['username'], $action, $currency, $amount, $reference, $desc);
  $stmt_insert->execute();

  // 3. Dispatch Branded Executive Email Notification
  $mail = new PHPMailer();
  try {
    $mail->isSMTP();
    $mail->Host       = 'mail.techbyfrancis.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'admin@techbyfrancis.com';
    $mail->Password   = 'Francis1972##';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('admin@techbyfrancis.com', 'Mapleaf Capital');
    $mail->addAddress($email, $user['firstname']);

    $mail->isHTML(true);
    $mail->Subject = "Transaction Alert: " . ucfirst($action) . " of $" . number_format($amount, 2) . " - Mapleaf Capital";

    // Direct Web URL Header Logo (Avoids local file path errors)
    $logoHeader = "<img src='https://Mapleaf Capitalcapitals.com/images/edited.png' alt='Mapleaf Capital Logo' style='width: 130px; display: block; margin: 0 auto;'>";

    $formattedAmount     = number_format($amount, 2);
    $formattedNewBalance = number_format($newBalance, 2);
    $actionBadgeColor    = ($action === 'Deposit') ? '#16a34a' : '#dc2626';
    $actionBadgeBg       = ($action === 'Deposit') ? 'rgba(22, 163, 74, 0.15)' : 'rgba(220, 38, 38, 0.15)';

    $mail->Body = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Transaction Notification</title>
        </head>
        <body style='margin: 0; padding: 0; background-color: #f8fafc; font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif;'>
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='background-color: #f8fafc; padding: 30px 15px;'>
                <tr>
                    <td align='center'>
                        <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);'>
                            
                            <!-- BRAND HEADER -->
                            <tr>
                                <td style='background-color: #1e293b; padding: 28px 32px; text-align: center;'>
                                    {$logoHeader}
                                    <p style='color: #94a3b8; margin: 8px 0 0 0; font-size: 12px; font-weight: 500;'>Official Transaction Advice</p>
                                </td>
                            </tr>

                            <!-- CONTENT BODY -->
                            <tr>
                                <td style='padding: 32px;'>
                                    <h3 style='color: #0f172a; font-size: 18px; font-weight: 700; margin-top: 0; margin-bottom: 8px;'>Hello {$user['firstname']},</h3>
                                    <p style='color: #64748b; font-size: 14px; margin-top: 0; margin-bottom: 24px; line-height: 1.5;'>This is a transactional update regarding your account portfolio balance. The details are as follows:</p>

                                    <!-- TRANSACTION SUMMARY CARD -->
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='background-color: #f8fafc; border-radius: 8px; border: 1px solid #cbd5e1; margin-bottom: 24px;'>
                                        <tr>
                                            <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 13px; color: #64748b; font-weight: 600;'>Transaction Type</td>
                                            <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0;'>
                                                <span style='background-color: {$actionBadgeBg}; color: {$actionBadgeColor}; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: 700; text-transform: uppercase;'>{$action}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 13px; color: #64748b; font-weight: 600;'>Amount</td>
                                            <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 16px; color: {$actionBadgeColor}; font-weight: 800; font-family: monospace;'>\${$formattedAmount}</td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 13px; color: #64748b; font-weight: 600;'>Asset / Currency</td>
                                            <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 14px; color: #0f172a; font-weight: 700;'>{$currency}</td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 13px; color: #64748b; font-weight: 600;'>Origin / Source</td>
                                            <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 13px; color: #334155;'>{$from}</td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 13px; color: #64748b; font-weight: 600;'>Updated Available Balance</td>
                                            <td style='padding: 14px 18px; border-bottom: 1px solid #e2e8f0; font-size: 16px; color: #0f172a; font-weight: 800; font-family: monospace;'>\${$formattedNewBalance}</td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 14px 18px; font-size: 13px; color: #64748b; font-weight: 600; vertical-align: top;'>Reference / Notes</td>
                                            <td style='padding: 14px 18px; font-size: 13px; color: #475569; line-height: 1.5;'>" . (!empty($desc) ? htmlspecialchars($desc, ENT_QUOTES, 'UTF-8') : '<em>Standard account adjustment</em>') . "</td>
                                        </tr>
                                    </table>

                                    <p style='color: #64748b; font-size: 13px; margin: 0; line-height: 1.5;'>Thank you for choosing <strong>Mapleaf Capital</strong>.</p>
                                </td>
                            </tr>

                            <!-- FOOTER -->
                            <tr>
                                <td style='background-color: #f1f5f9; padding: 20px 32px; text-align: center; border-top: 1px solid #e2e8f0;'>
                                    <p style='color: #94a3b8; font-size: 11px; margin: 0; line-height: 1.4;'>&copy; " . date('Y') . " Mapleaf Capital Ltd. All Rights Reserved.<br>Automated System Advice.</p>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        ";

    $mail->send();
  } catch (Exception $e) {
    // Mail delivery failure silent fallback
  }

  $success = "Account updated successfully. New Balance: $" . number_format($newBalance, 2);
} else {
  $error = "Database update failed. Please try again.";
}

include('update_account.php');
exit;
