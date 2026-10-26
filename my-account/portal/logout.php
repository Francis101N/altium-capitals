<?php
session_start();
unset($_SESSION['account_user']);
session_destroy();
header("location: ../../signin");
exit();
