<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ini_set('display_errors', 1);

date_default_timezone_set('America/New_York');


$mysqlUserName      = "altuimholdings";
$mysqlPassword      = "altuimHOLDINGS123456$";
$mysqlHostName      = "localhost";
$DbName             = "altuimholdings";
$backup_name        = "mybackup.sql";
$tables             = "registration";

@$conn = mysqli_connect($mysqlHostName, $mysqlUserName, $mysqlPassword, $DbName);
// @ $conn = mysqli_connect('localhost','nitapri1_gbnk','certification231','nitapri1_gbnk');

if (!$conn) {

    echo 'Could not connect to host';

    exit;
}



$tab_account = 'registration';

$tab_transfer = 'transfer';

$tab_transact = 'transact';

$tab_login = 'login';

$tab_error = 'error';

$organisation = 'sovereignnexarcapital Savings';

$org = 'sovereignnexarcapital';

$contact_email = 'Sovereignnexarcapitalsupportte@gmail.com';

$sender_email = 'atesting@example.com';

$notification_email = 'testing@example.com';

$official_website = 'www.example.com';


$imgpath = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/';


$contact_phone = '+1(650) 620-0568';

$contact_name = 'Alexander Maclerren';
