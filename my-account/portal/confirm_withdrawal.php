<?php
session_start();
include('connect.php');
require '../PHPMailer/PHPMailerAutoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize form inputs
    $username = trim($_POST['username']); // represents username
    $method = trim($_POST['method']);
    $amount = floatval($_POST['amount']);
    $reference = trim($_POST['reference']);
    $description = trim($_POST['description']);

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
            echo "<script>alert('Insufficient balance. Please try a smaller amount.'); window.history.back();</script>";
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
            // Step 5: Send admin email notification
            $mail = new PHPMailer();
             $mail->isSMTP();
  $mail->Host = 'mail.sovereignnexarcapital.org';
  $mail->SMTPAuth = true;
  $mail->Username = 'notification@sovereignnexarcapital.org';
  $mail->Password = 'sovereignnexarCAPITAL1972$$$';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom('notification@sovereignnexarcapital.org', 'Sovereign Nexar Capital');
            $mail->addAddress('sovereignnexarcapitalorganizat@gmail.com', 'Admin');
            $mail->isHTML(true);
            $mail->Subject = 'New Withdrawal Request From - ' . $username;
            $mail->Body = "
                <h3>New Withdrawal Request</h3>
                <p><strong>Username:</strong> {$username}</p>
                <p><strong>Method:</strong> {$method}</p>
                <p><strong>Amount:</strong> \${$amount}</p>
                <p><strong>Reference:</strong> {$reference}</p>
                <p><strong>Status:</strong> Pending</p>
                <p><strong>Description:</strong><br>{$description}</p>
                <p><strong>Time:</strong> " . date('Y-m-d H:i:s') . "</p>
                <p style='color:#2e95c4;'>Please log in to the admin panel to review this withdrawal request.</p>
            ";

            if ($mail->send()) {
                echo "<script>alert('Withdrawal request submitted successfully ✅ . Await admin approval.'); window.location.href='withdraw';</script>";
            } else {
                echo "<script>alert('Withdrawal saved but email notification failed.'); window.location.href='withdrawals_history.php';</script>";
            }
        } else {
            echo "<script>alert('Error submitting withdrawal. Please try again.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('User not found. Please log in again.'); window.location.href='../login.php';</script>";
    }
}
?>
