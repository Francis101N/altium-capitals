<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);

require_once('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ✅ Check if user session exists
    if (!isset($_SESSION['account_user']) || empty($_SESSION['account_user'])) {
        header("Location: ../../account/index.php?error=session_expired");
        exit;
    }

    $current_username = $_SESSION['account_user'];

    // ✅ Collect and sanitize form inputs
    $new_username  = trim($_POST['username']);
    $surname       = trim($_POST['lastName']);
    $firstname     = trim($_POST['firstName']);
    $middlename    = trim($_POST['middleName']);
    $address       = trim($_POST['address']);
    $email         = trim($_POST['email']);
    $phone         = trim($_POST['phoneNumber']);
    $btc_address   = trim($_POST['btc-address']);
    $usdt_address  = trim($_POST['usdt_address']);
    $eth_address   = trim($_POST['eth_address']);
    $usdc_address  = trim($_POST['usdc_address']); // ✅ NEW

    // ✅ Check if new username already exists (excluding current user)
    if ($new_username !== $current_username) {
        $check_sql = "SELECT username FROM registration WHERE username = ? LIMIT 1";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $new_username);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            $error = "Username already taken. Please choose another one.";
            include("account-profile.php");
            exit();
        }
        $check_stmt->close();
    }

    // ✅ Prepare SQL for updating profile (without photo)
    $sql = "UPDATE registration 
            SET username=?, surname=?, firstname=?, middlename=?, address=?, email=?, phone=?, bitcoin_address=?, usdt_address=?, eth_address=?, usdcErc20_address=? 
            WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssss",
        $new_username,
        $surname,
        $firstname,
        $middlename,
        $address,
        $email,
        $phone,
        $btc_address,
        $usdt_address,
        $eth_address,
        $usdc_address,     // ✅ NEW
        $current_username
    );

    // ✅ Execute update
    if ($stmt->execute()) {
        // Update session username immediately
        if ($new_username !== $current_username) {
            $_SESSION['account_user'] = $new_username;
        }

        $success = "Profile updated successfully!";

        // Fetch updated data for display
        $fetch_sql = "SELECT * FROM registration WHERE username = ?";
        $fetch_stmt = $conn->prepare($fetch_sql);
        $fetch_stmt->bind_param("s", $new_username);
        $fetch_stmt->execute();
        $updated_user = $fetch_stmt->get_result()->fetch_assoc();

        include("account-profile.php");
        exit();
    } else {
        $error = "Error updating profile: " . $conn->error;
        include("account-profile.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
