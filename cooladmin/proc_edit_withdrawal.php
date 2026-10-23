<?php
session_start();
include('connect.php');
require_once('../PHPMailer/PHPMailerAutoload.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve and sanitize form inputs
    $token = trim($_POST['token']);
    $username = trim($_POST['username']);
    $wallet_type = trim($_POST['wallet_type']);
    $amount = floatval($_POST['amount']);
    $reference = trim($_POST['reference']);
    $description = trim($_POST['description']);
    $status = trim($_POST['status']);

    // Fetch user email from registration table using username
    $email_stmt = $conn->prepare("SELECT email FROM registration WHERE username = ? LIMIT 1");
    $email_stmt->bind_param("s", $username);
    $email_stmt->execute();
    $email_result = $email_stmt->get_result();
    if ($email_result->num_rows === 0) {
        $error = "User email not found.";
        include('edit_withdrawal.php');
        exit;
    }
    $user = $email_result->fetch_assoc();
    $email = $user['email'];
    $email_stmt->close();

    // Update Withdrawal record
    $stmt = $conn->prepare("UPDATE withdrawal 
    SET status=? 
    WHERE token=?");
    ;

    if ($stmt) {
        $stmt->bind_param("ss", $status, $token); // both are strings

        if ($stmt->execute()) {
            // Send email notification
            $mail = new PHPMailer();
              $mail->isSMTP();
  $mail->Host = 'mail.sovereignnexarcapital.org';
  $mail->SMTPAuth = true;
  $mail->Username = 'notification@sovereignnexarcapital.org';
  $mail->Password = 'sovereignnexarCAPITAL1972$$$';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom('notification@sovereignnexarcapital.org', 'Altium Capitals.');
            $mail->addAddress($email, $username);
            $mail->isHTML(true);

            // Subject & Body based on status
            if ($status === 'Approved') {
                $mail->Subject = "Withdrawal Approved - Trust Vault Global";
                $mail->Body = "
                <div style='font-family: Arial, sans-serif;'>
                    <h3>Dear $username,</h3>
                    <p>Your Withdrawal of <strong>\$$amount</strong> has been <span style='color:green;'>approved</span>.</p>
                    <p>Thank you for trusting Trust Vault Global.</p>
                    <p style='color:#2e95c4;'>Regards,<br>Trust Vault Global Team</p>
                </div>
            ";
            } elseif ($status === 'Rejected') {
                $mail->Subject = "Withdrawal Rejected - Trust Vault Global";
                $mail->Body = "
                <div style='font-family: Arial, sans-serif;'>
                    <h3>Dear $username,</h3>
                    <p>We regret to inform you that your Withdrawal of <strong>\$$amount</strong> has been <span style='color:red;'>rejected</span>.</p>
                    <p>Please contact our support for further assistance.</p>
                    <p style='color:#2e95c4;'>Regards,<br>Trust Vault Global Team</p>
                </div>
            ";
            }

            if ($stmt->execute()) {
                $mail->send();
                // Redirect back to edit page with token in GET
                header("Location: edit_withdrawal.php?token=" . urlencode($token) . "&success=1");
                exit;
            }

        } else {
            header("Location: edit_withdrawal.php?token=" . urlencode($token) . "&error=1");
            exit;
        }

        $stmt->close();
    } else {
        header("Location: edit_withdrawal.php?token=" . urlencode($token) . "&error=1");
        exit;
    }
}
?>