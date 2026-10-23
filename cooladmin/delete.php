<?php
include('connect.php');

$id = $_GET['id']; 

// Prepare the SQL delete statement
$sql = "DELETE FROM account WHERE accountnumber = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); 
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Record deleted successfully.'); window.location.href='account_holders.php';</script>";
} else {
   echo "<script>alert('No record found or deletion failed.'); window.location.href='account_holders.php';</script>";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
