<?php
include('connect.php');

// Secret key and initialization vector (IV)
// Keep these secret and do NOT expose them publicly
define('ENCRYPTION_KEY', 'trustvaultcyber1972$'); // 32 chars for AES-256
define('ENCRYPTION_IV', '9089876347893264'); // 16 bytes for AES-256-CBC

function encrypt_id($id) {
    $cipher = "AES-256-CBC";
    $encrypted = openssl_encrypt($id, $cipher, ENCRYPTION_KEY, 0, ENCRYPTION_IV);
    return base64_encode($encrypted); // encode to store in URL or DB
}

function decrypt_id($encrypted_id) {
    $cipher = "AES-256-CBC";
    $decrypted = openssl_decrypt(base64_decode($encrypted_id), $cipher, ENCRYPTION_KEY, 0, ENCRYPTION_IV);
    return $decrypted;
}


$id = decrypt_id($_GET['id']); 

// Prepare the SQL delete statement
$sql = "DELETE FROM deposit WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); 
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Deposit Record deleted successfully.'); window.location.href='deposits.php';</script>";
} else {
   echo "<script>alert('No record found or deletion failed.'); window.location.href='visitors.php';</script>";
}

// Close statement and connection
$stmt->close();
$conn->close();

?>