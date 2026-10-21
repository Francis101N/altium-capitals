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
$package = $_POST['package'] ?? '';
$payment_method = strtoupper($_POST['payment_method'] ?? '');
$amount = floatval($_POST['amount'] ?? 0);
$username = $_SESSION['account_user'];

// Define wallet addresses
$wallets = [
    'BITCOIN' => 'bc1qrzdnsecuv6j5yxapf2d879rt05hd52zltghc8n',
    'ETHEREUM' => '0xd201F741769d742b52bCAc919b700DF6e692a380',
    'USDT' => 'TQGoQYn54VzUgB8RumRMuLnyAisS31yoqW',
    'USDC_ERC20' => '0x7Cbfb53dD3fa08ac98c92cca034e0Cc0Ea7703BD'
];

// Choose wallet based on payment method
$wallet_address = $wallets[$payment_method] ?? '';

// Define profit rates
$profitRates = [
    'BASIC PLAN' => 0.10,
    'STANDARD PLAN' => 0.15,
    'SILVER PLAN' => 0.30,
    'GOLD PLAN' => 0.45
];

// Calculate profit
$profit = isset($profitRates[$package]) ? $amount * $profitRates[$package] : 0.00;

// Insert into database
$stmt = $conn->prepare("INSERT INTO deposit (username, package, payment_method, amount, profit, wallet_address, status, created_at)
                        VALUES (?, ?, ?, ?, ?, ?, 'Pending', NOW())");

if ($stmt) {
    $stmt->bind_param("sssdds", $username, $package, $payment_method, $amount, $profit, $wallet_address);
    $stmt->execute();

    // ===================== ADMIN EMAIL NOTIFICATION =====================
    $admin = new PHPMailer();
    $admin->isSMTP();
    $admin->Host = 'mail.sovereignnexarcapital.org';
    $admin->SMTPAuth = true;
    $admin->Port = 465;
    $admin->SMTPSecure = 'ssl';
    $admin->Username = 'notification@sovereignnexarcapital.org';
    $admin->Password = 'sovereignnexarCAPITAL1972$$$';
    $admin->From = 'notification@sovereignnexarcapital.org';
    $admin->FromName = 'Sovereign Nexar Capital';
    $admin->isHTML(true);
    $admin->addAddress('sovereignnexarcapitalorganizat@gmail.com');
    $admin->Subject = "New Deposit Made";

    $admin->Body = "
        <h2>Hello Admin, </h2>
        <h3>New Deposit Alert</h3>
        <p><strong>Username:</strong> {$username}</p>
        <p><strong>Package:</strong> {$package}</p>
        <p><strong>Payment Method:</strong> {$payment_method}</p>
        <p><strong>Amount:</strong> \${$amount}</p>
        <p><strong>Wallet Address:</strong> {$wallet_address}</p>
        <p><strong>Status:</strong> Pending</p>
        <p>Log in your control panel to approve transaction.</p>
        <hr>
        <small>This is an automated message from Sovereign Nexar Capital system.</small>
    ";
    $admin->send();

    // ===================== SUCCESS PAGE =====================
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Deposit Confirmation | Sovereign Nexar Capital</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <meta http-equiv="refresh" content="6;url=deposit-list.php">
      <style>
        body {
          background: linear-gradient(135deg, #f8f9fa, #e3f2fd);
          height: 100vh;
          display: flex;
          align-items: center;
          justify-content: center;
        }
        .success-box {
          background: white;
          border-radius: 12px;
          padding: 40px;
          box-shadow: 0 5px 15px rgba(0,0,0,0.1);
          max-width: 500px;
          text-align: center;
        }
        .success-icon {
          font-size: 60px;
          color: #28a745;
        }
      </style>
    </head>
    <body>
      <div class="success-box">
        <div class="success-icon">✅</div>
        <h4 class="fw-bold text-success mt-3">Deposit Saved Successfully!</h4>
        <p>Your deposit will become <strong>active once the administrator approves it.</strong></p>
        <p class="text-muted small">You will be redirected to your deposit list in a few seconds...</p>
        <a href="deposit-list.php" class="btn btn-success mt-3 px-4 fw-semibold">Go Now</a>
      </div>
    </body>
    </html>';
} else {
    echo '
    <div class="container py-5">
      <div class="alert alert-danger text-center shadow-sm">
        <h5 class="fw-bold text-danger mb-2">❌ Error!</h5>
        <p>Something went wrong while saving your deposit. Please try again later.</p>
      </div>
    </div>';
}
?>