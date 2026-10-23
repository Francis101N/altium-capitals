<?php
ini_set('display_errors',0);

include ('connect.php');
  // create short variable names
  $firstname=$_POST['firstname'];
  $middlename=$_POST['middlename'];
  $lastname=$_POST['lastname'];
  $address=$_POST['address'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $country=$_POST['country'];
  $sex=$_POST['sex'];
  $dateofbirth=$_POST['dob'];
  $email=$_POST['email'];
  $telephone=$_POST['telephone'];
  $occupation=$_POST['occupation'];
  $placeofwork=$_POST['placeofwork'];
  $ssn=$_POST['ssn'];
  $nextofkin=$_POST['nextofkin'];
  // $date_created =$_POST['datecreated'];
  $date_created = date('Y-m-d H:i:s');
  $account_type=$_POST['account_type'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  // $question=$_POST['question'];
  // $answer=$_POST['answer'];
  $confirm=$_POST['confirm_password'];
  

  if (!$lastname || !$firstname || !$address || !$city || !$username || !$password)
  {
  $msg = 'error';
  include ('create_account.php');
  exit;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = 'error';
    include ('create_account.php');
    exit;
}
  
    if ($password != $confirm)
  {
  	$msg = 'error2';
	include ('create_account.php');
    exit;
  }

  
include ('gene-acc-num.php');
$amount = '0.00';


//upload User Passport
$passport = $_FILES['passport']['tmp_name'];    

  // $userfile_name is original file name
  $passport_name = $_FILES['passport']['name'];

  // $userfile_size is size in bytes
  $passport_size = $_FILES['passport']['size'];

  // $userfile_type is mime type e.g. image/gif
  $passport_type = $_FILES['passport']['type'];

  // $userfile_error is any error encountered
  $passport_error = $_FILES['passport']['error'];
// userfile_error was introduced at PHP 4.2.0
// use this code with newer versions

 $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
if (!in_array($passport_type, $allowed_types)) {
  die('Invalid file type. Only JPEG and PNG allowed.');
}

  $extentions = explode('.',$passport_name);

$ext = strtolower(pathinfo($passport_name, PATHINFO_EXTENSION));
$filename = $accountnumber.'.'.$ext;

 $upfile = 'uploads/'.$filename;

// is_uploaded_file and move_uploaded_file added at version 4.0.3
	if (is_uploaded_file($passport)) {
    move_uploaded_file($passport, $upfile);
} else {
    die('File upload failed.');
}


  $query = "insert into $tab_account values ('".$accountnumber."', '".$firstname."','".$middlename."', '".$lastname."', '".$address."', '".$city."', '".$state."', '".$country."', '".$sex."', '".$dateofbirth."', '".$email."', '".$telephone."', '".$occupation."', '".$placeofwork."', '".$ssn."', '".$nextofkin."', '".$filename."', '".$account_type."', 'Active', '".$date_created."', '".date('d-m-Y')."', '', '', '', '', '', '', '".$username."', '".$password."', '".$question."', '".$answer."', '".$amount."')"; 
  $result = mysqli_query($conn,$query);
	if($result)
	{   
		//generate pincode
		
		$pass = substr($accountnumber, -6);
		$query = "insert into $tab_login values ('".$username."', '".$pass."')"; 
    	$result = mysqli_query($conn,$query);
		
		//send sms
		include('sms.php');
		
		
	//To Client
  $toaddress = $email;
  $subject = $organisation.' Account Confirmation';
  $mailcontent = '
  <h4>Dear</h4> '.strtoupper($firstname).',<h4>THANK YOU FOR BANKING WITH US.</h4>
  
  Your account number is: '.$accountnumber.'</p>
  <p>Username: '.$username.'<br />
    password: '.$password.'<br /><br />
  <p>Thank you for banking with us<br />
    '.$organisation.'<br />
    '.$contact_email.'<br />
    '.$official_website.'</p>
  
    <div style="width: 100%; height: 5px; background-color: blue; margin-top: 40px;"> &nbsp; </div>
                  <br><img src="http://'.$_SERVER['HTTP_HOST'].'/social.jpg">
  
              </div>
          
          </div>
          
  </body>
  ';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
// More headers
$headers .= "From: $sender_email" . "\r\n";

mail($toaddress, $subject, $mailcontent, $headers); 

 $msg="success";
 include('create_account.php');
 exit;
 }
 else
 {
 $error = 'error3';
 include('create_account.php');
 exit;
 }
	 
?>