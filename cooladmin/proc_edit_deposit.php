<?php
session_start();
include('connect.php');
require_once('PHPMailer/PHPMailerAutoload.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $username = trim($_POST['username']); // string, not int
    $package = trim($_POST['package']);
    $payment_method = trim($_POST['payment_method']);
    $amount = floatval($_POST['amount']);
    $profit = floatval($_POST['profit']);
    $wallet_address = trim($_POST['wallet_address']);
    $status = trim($_POST['status']);

    // Fetch user email from registration table using username
    $email_stmt = $conn->prepare("SELECT email FROM registration WHERE username = ? LIMIT 1");
    $email_stmt->bind_param("s", $username);
    $email_stmt->execute();
    $email_result = $email_stmt->get_result();
    if ($email_result->num_rows === 0) {
        header("Location: edit_deposit.php?id=$id&error=" . urlencode("User email not found."));
        exit;
    }
    $user = $email_result->fetch_assoc();
    $email = $user['email'];
    $email_stmt->close();

    // Update deposit record
    $stmt = $conn->prepare("UPDATE deposit 
        SET package=?, payment_method=?, amount=?, profit=?, wallet_address=?, status=? 
        WHERE id=?");

    if ($stmt) {
        $stmt->bind_param("ssddssi", $package, $payment_method, $amount, $profit, $wallet_address, $status, $id);

        if ($stmt->execute()) {
            // Send email notification
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'mail.techbyfrancis.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'admin@techbyfrancis.com';
            $mail->Password = 'Francis1972##';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('admin@techbyfrancis.com', 'Mapleaf Capital');
            $mail->addAddress($email, $username);
            $mail->isHTML(true);

            // Subject & Body based on deposit status
            if ($status === 'Approved') {
                $mail->Subject = "Deposit Approved & Active - Mapleaf Capital Capital Holdings";
                $mail->Body = "
                <div style='font-family: \"Plus Jakarta Sans\", Arial, sans-serif; max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden;'>
                    <div style='background-color: #0f172a; padding: 24px; text-align: center;'>
                        <h2 style='color: #ffffff; margin: 0; font-size: 20px; font-weight: 700;'>Mapleaf Capital Capital Holdings</h2>
                        <span style='color: #3b82f6; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;'>Investment Confirmation</span>
                    </div>
                    <div style='padding: 32px; color: #334155; line-height: 1.6;'>
                        <h3 style='color: #0f172a; margin-top: 0;'>Dear " . htmlspecialchars($username) . ",</h3>
                        <p style='font-size: 15px;'>We are pleased to inform you that your deposit request has been successfully verified and approved into your portfolio.</p>
                        
                        <div style='background-color: #f8fafc; border-left: 4px solid #10b981; padding: 16px; margin: 20px 0; border-radius: 6px;'>
                            <table style='width: 100%; font-size: 14px;'>
                                <tr>
                                    <td style='padding: 4px 0; color: #64748b;'><strong>Package:</strong></td>
                                    <td style='padding: 4px 0; text-align: right; font-weight: 600; color: #0f172a;'>" . htmlspecialchars($package) . "</td>
                                </tr>
                                <tr>
                                    <td style='padding: 4px 0; color: #64748b;'><strong>Deposit Amount:</strong></td>
                                    <td style='padding: 4px 0; text-align: right; font-weight: 600; color: #0f172a;'>$" . number_format($amount, 2) . "</td>
                                </tr>
                                <tr>
                                    <td style='padding: 4px 0; color: #64748b;'><strong>Expected Daily Return:</strong></td>
                                    <td style='padding: 4px 0; text-align: right; font-weight: 700; color: #10b981;'>$" . number_format($profit, 2) . "</td>
                                </tr>
                                <tr>
                                    <td style='padding: 4px 0; color: #64748b;'><strong>Status:</strong></td>
                                    <td style='padding: 4px 0; text-align: right; font-weight: 700; color: #10b981;'>APPROVED & ACTIVE</td>
                                </tr>
                            </table>
                        </div>
                        
                        <p style='font-size: 14px;'>Your investment yield cycle is now active. You can track real-time daily returns directly on your executive dashboard.</p>
                        <p style='font-size: 14px; margin-bottom: 0;'>Thank you for choosing Mapleaf Capital Capital Holdings.</p>
                    </div>
                    <div style='background-color: #f1f5f9; padding: 16px; text-align: center; border-top: 1px solid #e2e8f0; font-size: 12px; color: #64748b;'>
                        Regards,<br>
                        <strong style='color: #0f172a;'>Mapleaf Capital Capital Holdings Executive Desk</strong>
                    </div>
                </div>
            ";
            } elseif ($status === 'Rejected') {
                $mail->Subject = "Deposit Status Update - Mapleaf Capital Capital Holdings";
                $mail->Body = "
                <div style='font-family: \"Plus Jakarta Sans\", Arial, sans-serif; max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden;'>
                    <div style='background-color: #0f172a; padding: 24px; text-align: center;'>
                        <h2 style='color: #ffffff; margin: 0; font-size: 20px; font-weight: 700;'>Mapleaf Capital Capital Holdings</h2>
                        <span style='color: #ef4444; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;'>Transaction Notice</span>
                    </div>
                    <div style='padding: 32px; color: #334155; line-height: 1.6;'>
                        <h3 style='color: #0f172a; margin-top: 0;'>Dear " . htmlspecialchars($username) . ",</h3>
                        <p style='font-size: 15px;'>We regret to inform you that your recent deposit request of <strong>$" . number_format($amount, 2) . "</strong> for the <strong>" . htmlspecialchars($package) . "</strong> could not be completed and has been <span style='color: #ef4444; font-weight: 700;'>rejected</span>.</p>
                        
                        <div style='background-color: #fef2f2; border-left: 4px solid #ef4444; padding: 16px; margin: 20px 0; border-radius: 6px;'>
                            <p style='margin: 0; font-size: 14px; color: #991b1b;'>
                                <strong>Reason:</strong> Transfer transaction could not be confirmed on the blockchain network or contained incomplete details.
                            </p>
                        </div>
                        
                        <p style='font-size: 14px;'>If you believe this is an error or need further assistance, please contact our support team at <a href='mailto:support@Mapleaf Capitalcapitalholdings.com' style='color: #3b82f6;'>support@Mapleaf Capitalcapitalholdings.com</a>.</p>
                    </div>
                    <div style='background-color: #f1f5f9; padding: 16px; text-align: center; border-top: 1px solid #e2e8f0; font-size: 12px; color: #64748b;'>
                        Regards,<br>
                        <strong style='color: #0f172a;'>Mapleaf Capital Capital Holdings Support Team</strong>
                    </div>
                </div>
            ";
            }

            $mail->send(); // You may also check for errors here if needed

            header("Location: edit_deposit.php?id=$id&success=1");
            exit;
        } else {
            header("Location: edit_deposit.php?id=$id&error=" . urlencode($stmt->error));
            exit;
        }

        $stmt->close();
    } else {
        header("Location: edit_deposit.php?id=$id&error=" . urlencode($conn->error));
        exit;
    }
}
