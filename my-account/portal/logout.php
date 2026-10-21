<?php
session_start();
unset( $_SESSION['account_user']);
session_destroy();
header("location: ../../account/index.php");
exit();
?>