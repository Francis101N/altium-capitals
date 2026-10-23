<?php
// Include DB connection
include('connect.php');

// Query the account table
$sql = "SELECT * FROM registration";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Set headers for CSV download
$filename = "accounts.csv";
header('Content-Type: text/csv; charset=utf-8');
header("Content-Disposition: attachment; filename=$filename");

// Open output stream
$output = fopen('php://output', 'w');

// Output column headers
$fields = mysqli_fetch_fields($result);
$headers = [];
foreach ($fields as $field) {
    $headers[] = $field->name;
}
fputcsv($output, $headers);

// Output rows
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

fclose($output);
exit;
?>
