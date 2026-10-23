<?php 
session_start();
require_once('connect.php');

$password = $_POST['password'];
$confirm = $_POST['confirm_password'];

if( !$password || $password != $confirm)
{
$section ='pass-error';
include ('changeAdmin_pass.php');
exit;
}

$query = "UPDATE admin SET pass = '$confirm' WHERE user = '{$_SESSION['admin_user']}'";
$result = mysqli_query($conn,$query);

 if ($result)
 {
 $section = 'pass-change';
 }
 else
 {
 $section = 'pass-error';
 }
 include ('changeAdmin_pass.php');
?>