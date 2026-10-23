<?php
session_start();
require('connect.php');

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!$username || !$password) {
  $error = "Inputs cannot be empty";
  include('index.php');
  exit;
}
$query = "select * from admin where
              email = '$username' and
              pass = '$password'";

$result = mysqli_query($conn, $query);
if (!$result) {
  $error = "Cannot run query.";
  include('index.php');
  exit;
}

$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if ($count > 0) {
  $_SESSION['admin_user'] = $row['user'];
  $_SESSION['admin_email'] = $row['email'];
  header("Location: dashboard");
} else {
  // visitor's name and password combination are not correct
  $error = "Wrong Credentials";
  include('index.php');
  exit;
}

?>