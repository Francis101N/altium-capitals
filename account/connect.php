<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ini_set('display_errors', 1);

date_default_timezone_set('America/New_York');


    $mysqlUserName      = "soverei3_sovereignnexarcapital";
    $mysqlPassword      = "sovereignnexarCAPITAL1972$";
    $mysqlHostName      = "localhost";
    $DbName             = "soverei3_sovereignnexarcapital";
    $backup_name        = "mybackup.sql";
    $tables             = "login";


@ $conn = mysqli_connect($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName);
// @ $conn = mysqli_connect('localhost','nitapri1_gbnk','certification231','nitapri1_gbnk');

if (!$conn)

{

echo 'Could not connect to host';

exit;

}



$tab_account = 'account';

$tab_transfer = 'transfer';

$tab_transact = 'transact';

$tab_login = 'login';

$tab_error = 'error';

$organisation = 'Altium Capitals Investments.';

$org = 'Altium Capitals';

$contact_email = 'testing@example.com';

$sender_email = 'atesting@example.com';

$notification_email = 'testing@example.com';

$official_website = 'www.example.com';


$imgpath = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']).'/';


// $contact_phone = 'xxx-xxx-0000';


?>