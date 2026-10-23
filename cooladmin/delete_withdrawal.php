<?php
session_start();
include('connect.php');

if (!isset($_SESSION['admin_user'])) {
    header("Location: index.php");
    exit;
}

// Get the token from URL
$token = $_GET['token'] ?? '';

if (empty($token)) {
    header("Location: withdrawals.php?error=" . urlencode("Invalid Withdraw Token."));
    exit;
}

// Prepare delete query
$stmt = $conn->prepare("DELETE FROM withdrawal WHERE token = ?");
if ($stmt) {
    $stmt->bind_param("s", $token);

    if ($stmt->execute()) {
        $stmt->close();
        echo "<script>
       alert('Withdrawal record deleted successfully!');
       window.location.href = 'withdrawals.php';
         </script>";
        exit;
    } else {
        $stmt->close();
        echo "<script>
       alert('Failed to delete withdrawal record.');
       window.location.href = 'withdrawals.php';
         </script>";
        exit;
    }
} else {
    header("Location: withdrawals.php?error=" . urlencode("Database error: " . $conn->error));
    exit;
}
?>