<?php
ob_start();
session_start();
include('connect.php');
require_once('PHPMailer/PHPMailerAutoload.php');

// Ensure user session is active
if (!isset($_SESSION['account_user']) || empty($_SESSION['account_user'])) {
  header("Location: ../../account/index.php?error=session_expired");
  exit;
}

// Collect form inputs
$package = trim($_POST['package'] ?? '');
$payment_method = strtoupper(trim($_POST['payment_method'] ?? ''));
$amount = floatval($_POST['amount'] ?? 0);
$username = $_SESSION['account_user'];

// Define complete wallet addresses mapping
$wallets = [
  'BITCOIN'    => 'bc1qrzdnsecuv6j5yxapf2d879rt05hd52zltghc8n',
  'ETHEREUM'   => '0xd201F741769d742b52bCAc919b700DF6e692a380',
  'USDT'       => 'TQGoQYn54VzUgB8RumRMuLnyAisS31yoqW',       // TRC20
  'USDC_ERC20' => '0x7Cbfb53dD3fa08ac98c92cca034e0Cc0Ea7703BD', // ERC20
  'USDT_ERC20' => '0x7Cbfb53dD3fa08ac98c92cca034e0Cc0Ea7703BD', // ERC20
  'TRON'       => 'TQGoQYn54VzUgB8RumRMuLnyAisS31yoqW'        // TRX
];

// Choose wallet based on payment method
$wallet_address = $wallets[$payment_method] ?? 'N/A';

// Define updated 3-tier profit rates
$profitRates = [
  'Starter Plan' => 0.02,  // 2.0% Daily
  'Growth Plan'  => 0.035, // 3.5% Daily
  'Premium Plan' => 0.05   // 5.0% Daily
];

// Fixed profit calculation syntax error
$rate = $profitRates[$package] ?? 0.00;
$profit = $amount * $rate;

// Insert deposit into database securely
$stmt = $conn->prepare("INSERT INTO deposit (username, package, payment_method, amount, profit, wallet_address, status, created_at)
                        VALUES (?, ?, ?, ?, ?, ?, 'Pending', NOW())");

if ($stmt) {
  $stmt->bind_param("sssdds", $username, $package, $payment_method, $amount, $profit, $wallet_address);
  $stmt->execute();

  // ===================== ADMIN EMAIL NOTIFICATION =====================
  $admin = new PHPMailer();
  $admin->isSMTP();
  $admin->Host = 'mail.techbyfrancis.com';
  $admin->SMTPAuth = true;
  $admin->Port = 465; // Or 587 depending on cPanel TLS/SSL
  $admin->SMTPSecure = 'ssl';
  $admin->Username = 'admin@techbyfrancis.com';
  $admin->Password = 'Francis1972##'; // Replace with active cPanel mail password
  $admin->From = 'admin@techbyfrancis.com';
  $admin->FromName = 'Altium Capitals';
  $admin->isHTML(true);
  $admin->addAddress('francisnwankwo1972@gmail.com', 'Altium Capitals Admin');
  $admin->Subject = "New Investment Deposit Request - " . $username;

  $admin->Body = "
        <div style='font-family: Arial, sans-serif; padding: 20px; background: #f8fafc; color: #333;'>
          <h2 style='color: #1e293b;'>Altium Capitals - Admin Alert</h2>
          <h3 style='color: #3b82f6;'>New Deposit Submitted</h3>
          <p><strong>Username:</strong> {$username}</p>
          <p><strong>Investment Package:</strong> {$package}</p>
          <p><strong>Payment Method:</strong> {$payment_method}</p>
          <p><strong>Amount:</strong> \${$amount}</p>
          <p><strong>Expected Daily Return:</strong> \${$profit}</p>
          <p><strong>Target Wallet:</strong> {$wallet_address}</p>
          <p><strong>Status:</strong> Pending Approval</p>
          <hr style='border: none; border-top: 1px solid #e2e8f0; margin: 20px 0;'>
          <p style='font-size: 12px; color: #64748b;'>Log in to your executive dashboard control panel to review and approve this transaction.</p>
        </div>
    ";
  @$admin->send(); // Suppress mail errors if SMTP auth requires adjustment on live server

  // ===================== SUCCESS REDIRECT PAGE =====================
  echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Deposit Confirmation | Altium Capitals</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
      <meta http-equiv="refresh" content="5;url=deposit-list.php">
      <style>
        body {
          background: linear-gradient(135deg, #f8fafc, #e2e8f0);
          height: 100vh;
          display: flex;
          align-items: center;
          justify-content: center;
        }
        .success-box {
          background: white;
          border-radius: 16px;
          padding: 40px;
          box-shadow: 0 10px 25px rgba(0,0,0,0.08);
          max-width: 480px;
          text-align: center;
          border: 1px solid #e2e8f0;
        }
      </style>
    </head>
    <body>
      <div class="success-box">
        <div class="w-16 h-16 rounded-circle bg-success-subtle text-success mx-auto mb-3 d-flex align-items-center justify-content-center" style="font-size: 2.5rem;">
          <i class="bx bx-check-circle"></i>
        </div>
        <h4 class="fw-extrabold text-dark mt-2">Deposit Saved Successfully!</h4>
        <p class="text-muted small">Your investment package will become active once network block confirmation and administrator signoff are completed.</p>
        <div class="p-3 bg-light rounded-3 my-3 text-start font-mono small">
          <div><strong>Plan:</strong> ' . htmlspecialchars($package) . '</div>
          <div><strong>Amount:</strong> $' . number_format($amount, 2) . '</div>
          <div><strong>Method:</strong> ' . htmlspecialchars($payment_method) . '</div>
        </div>
        <p class="text-muted small mb-3">Redirecting to your deposit list...</p>
        <a href="deposit-list.php" class="btn btn-primary w-100 fw-bold py-2.5 rounded-3 shadow-sm" style="background-color: #3b82f6; border: none;">
          View Deposit History Now
        </a>
      </div>
    </body>
    </html>';
} else {
  echo '
    <div class="container py-5">
      <div class="alert alert-danger text-center shadow-sm rounded-4 p-4 max-w-lg mx-auto">
        <h5 class="fw-bold text-danger mb-2"><i class="bx bx-error-circle me-1"></i> Database Error!</h5>
        <p class="text-muted small mb-3">Something went wrong while recording your deposit request. Please try again later.</p>
        <a href="deposit" class="btn btn-secondary btn-sm fw-bold px-4">Return to Deposit Form</a>
      </div>
    </div>';
}
