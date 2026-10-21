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
  // create short variable names
  $accountnumber=$_POST['accountnumber'];
  $message=$_POST['message'];

  if (!$accountnumber || !$message)
  {
     echo 'You have not entered the required account details.  Please <a href="update.htm">go back</a> and try again.<br>';
     exit;
  }

 include ('../connect.php');
  $query = "update $tab_account set status='".$message."' where accountnumber='".$accountnumber."'";
  $result = mysqli_query($conn,$query);
  echo '<font size="-1" face="Verdana, Arial, Helvetica, sans-serif">';
  include ('header.php');
  echo 'Account Status has been updated.';
 
?>
</div>
</body>
</html>
