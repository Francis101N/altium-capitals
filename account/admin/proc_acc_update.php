<?php
include ('../connect.php');
require_once('../fns.php');

require_once('PHPMailer/PHPMailerAutoload.php');
  // create short variable names
  $accountnumber=stripslashes($_POST['accountnumber']);
  $new_accountnumber=stripslashes($_POST['new_accountnumber']);
  $firstname=stripslashes($_POST['firstname']);
  $lastname=stripslashes($_POST['lastname']);
  $address=stripslashes($_POST['address']);
  $city=stripslashes($_POST['city']);
  $state=stripslashes($_POST['state']);
  $country=stripslashes($_POST['country']);
  $sex=stripslashes($_POST['sex']);
  $dateofbirth=stripslashes($_POST['dateofbirth']);
  $email=stripslashes($_POST['email']);
  $telephone=stripslashes($_POST['telephone']);
  $occupation=stripslashes($_POST['occupation']);
  $placeofwork=stripslashes($_POST['placeofwork']);
  $ssn=stripslashes($_POST['ssn']);
  $nextofkin=stripslashes($_POST['nextofkin']);
  $accounttype=stripslashes($_POST['accounttype']);
  $username=stripslashes($_POST['username']);
  $password=stripslashes($_POST['password']);
  $question=stripslashes($_POST['question']);
  $answer=stripslashes($_POST['answer']);
  
 $query = "update $tab_account set
 accountnumber = '$new_accountnumber',
 firstname = '$firstname',
 lastname = '$lastname',
 address = '$address',
 city = '$city',
 state = '$state',
 sex = '$sex',
 dateofbirth = '$dateofbirth',
 email = '$email',
 telephone = '$telephone',
 occupation = '$occupation',
 placeofwork = '$placeofwork',
 ssn = '$ssn',
 nextofkin = '$nextofkin',
 accounttype = '$accounttype',
 username = '$username',
 password = '$password',
 question = '$question',
 answer = '$answer' where accountnumber = '$accountnumber'
";
    $result = mysqli_query($conn,$query);
	if($result)
	{
			//To Client
  $toaddress = $email;
  $subject = $organisation.' Account Update';
  $mailcontent = '<html><head>
<script language="JavaScript" type="text/JavaScript">
<!--
function openOB() {
  oldpopup=window.open("member-login.htm?pagename=GlbLogonNewDesignPB&amp;usertype=pbuser","","scrollbars=1, menubar=0,location=0,toolbar=0,personalbar=0,status=1,width=800,height=547,resizable=yes");
}

function openNW() {
  oldpopup=window.open("createaccount.php?pagename=GlbLogonNewDesignPB&amp;usertype=pbuser","","scrollbars=1, menubar=0,location=0,toolbar=0,personalbar=0,status=1,width=800,height=547,resizable=yes");
}
-->
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
function openOB() {
  oldpopup=window.open("member-login.htm?pagename=GlbLogonNewDesignPB&amp;usertype=pbuser","","scrollbars=1, menubar=0,location=0,toolbar=0,personalbar=0,status=1,width=800,height=547,resizable=yes");
}

function openNW() {
  oldpopup=window.open("createaccount.php?pagename=GlbLogonNewDesignPB&amp;usertype=pbuser","","scrollbars=1, menubar=0,location=0,toolbar=0,personalbar=0,status=1,width=800,height=547,resizable=yes");
}
-->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<P>
Dear '.strtoupper($firstname).',<h4>YOUR ACCOUNT IS UPDATED AND ACTIVE.</h4>

<p>This is to confirm that your account is now ACTIVE<br /><br />

Your account number is: '.$accountnumber.'</p>
Your account username is: '.$username.'</p>
Your account password is: ***THIS IS ONLY KNOWN BY YOU***<br /><br />

<p>If you do not hear from us within 48 hours, please contact the undersigned<br /><br />
  '.$organisation.'<br />
  '.$contact_email.'</p>
</body>
</html>';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
// More headers
$headers .= "From: $sender_email" . "\r\n";

  

$mail=new PHPMailer();
$mail->IsSMTP();    
 $mail->Port = 465;
$mail->SMTPAuth = true;                
//sendgrid
$mail->Username= 'alert@jamesprivateaccess.net';
$mail->Password = 'gwogwo@123!';  //yahoo app password for noreply email 
$mail->Host='mail.jamesprivateaccess.net';
$mail->SMTPSecure = 'ssl'; 
$mail->From = $sender_email;
$mail->FromName = org();
$mail->AddAddress($to);


//  $mail->MsgHTML($body);
$mail->CharSet = 'UTF-8';
$mail->IsHTML(true);
$mail->Body    = $mailcontent;
$mail->Subject = $subject;
$mail->IsHTML(true);
$mail->Send();
	
		include('control-panel.php');	
	}
	 
?>