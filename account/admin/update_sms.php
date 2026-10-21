<?php

$sms_message= 'A transaction has been recorded on your account. Your new account balance is: '.number_format($amount);
$msg = str_replace(' ','+',$sms_message);


$query2 = "select * from account where accountnumber='$accountnumber'";
$result2 = mysqli_query($conn,$query2);
$row2 = mysqli_fetch_array($result2);

$tel= str_replace('+','',$row2['telephone']);

// $url = "https://api.ebulksms.com:8080/sendsms?username=lu@aledoy.com&apikey=5189be77bcbe43b1b19eae779686274b986593ac&sender=SocieteGE&messagetext=$msg&flash=0&recipients=$tel";
// $f = @fopen($url, "r");
// $answer = fgets($f, 255);

?>