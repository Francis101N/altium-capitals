<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<script language="JavaScript" type="text/JavaScript">
<!--
function openOB() {
  oldpopup=window.open("member-login.htm?pagename=GlbLogonNewDesignPB&amp;usertype=pbuser","","scrollbars=1, menubar=0,location=0,toolbar=0,personalbar=0,status=1,width=800,height=547,resizable=yes");
}

function openNW() {
  oldpopup=window.open("create-account.php?pagename=GlbLogonNewDesignPB&amp;usertype=pbuser","","scrollbars=1, menubar=0,location=0,toolbar=0,personalbar=0,status=1,width=800,height=547,resizable=yes");
}
-->
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
function openOB() {
  oldpopup=window.open("member-login.htm?pagename=GlbLogonNewDesignPB&amp;usertype=pbuser","","scrollbars=1, menubar=0,location=0,toolbar=0,personalbar=0,status=1,width=800,height=547,resizable=yes");
}

function openNW() {
  oldpopup=window.open("create-account.php?pagename=GlbLogonNewDesignPB&amp;usertype=pbuser","","scrollbars=1, menubar=0,location=0,toolbar=0,personalbar=0,status=1,width=800,height=547,resizable=yes");
}
-->
</script>
<title>Inter Regional Bank</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body text="#000000">
<div align="center">
  <?php
require_once('../fns.php');

require_once('PHPMailer/PHPMailerAutoload.php');

  // create short variable names
  $accountnumber=$_POST['accountnumber'];
  $date_time=addslashes($_POST['date_time']);
  $amount=$_POST['amount'];
  $action=$_POST['action'];
  $currency=$_POST['currency'];
  $reference=addslashes($_POST['reference']);
  $transaction=addslashes($_POST['transaction']);
  $show_transfer = $_POST['show_transfer'];

  if (!$accountnumber || !$amount)
  {
     echo 'You have not entered the required account details.  Please <a href="update.htm">go back</a> and try again.<br>';
     exit;
  }
	
	$amount = str_replace(',','',$amount);
	$amount = str_replace(' ','',$amount);
	
	
	//Get current balance so you can update record accordingly
	include ('../connect.php');
  require_once('../fns.php');
	
	//
		$query = "select * from $tab_transact where accountnumber='".$accountnumber."' order by id desc";
  		$result = mysqli_query($conn,$query);
  		$row = mysqli_fetch_array($result);	
		$balance = $row['balance'];
	
	
	
	if($action == 'DEBIT')
	{
		$debit = $amount;
		$balance = $balance - $debit;
		$credit = 0;
		$subject = $org.' Transaction Alert [Debit: '.number_format($amount).' '.$currency.']';
    
	update_notification("Your account was debited with $".number_format($amount),$accountnumber);
    
	}
	if($action == 'CREDIT')
	{
		$debit = 0;
		$credit = $amount;
		$balance = $balance + $credit;
		$subject = $org.' Transaction Alert [Credit: '.number_format($amount).' '.$currency.']';
    
	update_notification("Your account was credit with $".number_format($amount),$accountnumber);
	}

	
	
 $query = "insert into $tab_transact set date_time='".$date_time."', reference = '".$reference."', description = '".$transaction."', debit = '".$debit."', credit = '".$credit."', balance = '".$balance."', currency = '".$currency."', accountnumber='".$accountnumber."'";
  $result = mysqli_query($conn,$query);
	//Update transfer module if you want it to show or not
	mysqli_query($conn,"update $tab_account set status = '$show_transfer' where accountnumber = '$accountnumber'");
	
	
	$query_a = "select * from $tab_account where accountnumber='".$accountnumber."'";
  	$result_a = mysqli_query($conn,$query_a);
  	$row_a = mysqli_fetch_array($result_a);
		
		//Send Email Notification to Customer
		
		$toaddress = $row_a['email'];
  $mailcontent = '<div>
  <b><u>'.$org.' Electronic Notification Service</u></b><br><br>
  We wish to inform you that a '.$action.' transaction occurred on your account with us.<br><br>
   
  The details of this transaction are shown below:<br><br>
  <b><u>Transaction Notification</u></b><br><br>
  Account Number	:	******'.substr($row_a['accountnumber'],5).'<br>
  Transaction Location	:	ONLINE<br>
  Description	:	'.$transaction.'<br>
  Amount	:	'.number_format($amount,2).'<br>
  Value Date	:	'.$date_time.'<br>
  Time of Transaction	:	'.date('h:i').'<br><br>
  
  The balances on this account as at  '.date('h:i').'  are as follows;<br><br>
  Current Balance	: '.number_format($balance,2).' '.$currency.'<br>
  Available Balance	: '.number_format($balance,2).' '.$currency.'<br><br><br>
   
  Thank you for choosing '.$org.'<br>'.$official_website.'<br>
  
  <div style="width: 100%; height: 5px; background-color: blue; margin-top: 40px;"> &nbsp; </div>
				
</div>';


send_email($toaddress,$row_a['firstname'].' '.$row_a['lastname'],$subject,$mailcontent,$sender_email);

	
  // include('update_sms.php'); 
  echo '<font size="-1" face="Verdana, Arial, Helvetica, sans-serif">';
  include ('header.php');
  echo 'Account has been updated.';
 
?>
</div>
</body>
</html>
