<?php
include('connect.php');
require_once('fns.php');
require_once('PHPMailer/PHPMailerAutoload.php');

// Retrieve and assign form input
$lastname     = $_POST['surname'];
$middlename   = $_POST['middlename'];
$firstname    = $_POST['firstname'];
$address      = $_POST['address'];
$city         = $_POST['city'];
$state        = $_POST['state'];
$country      = $_POST['country'];
$sex          = $_POST['sex'];
$dateofbirth  = $_POST['dob'];
$email        = $_POST['email'];
$telephone    = $_POST['number'];
$occupation   = $_POST['occupation'];
$placeofwork  = $_POST['placeofwork'];
$ssn          = $_POST['ssn'];
$accounttype  = $_POST['acctype'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$confirm      = $_POST['repeat_password'];
$question     = $_POST['security_question'];
$answer       = $_POST['security_answer'];

if ($password !== $confirm) {
    $error = 'Password and confirmation do not match.';
    include('register.php');
    exit;
}

include('gene-acc-num.php');
$amount = '0.00';

// Handle user passport upload
$userfile       = $_FILES['userfile']['tmp_name'];
$userfile_name  = $_FILES['userfile']['name'];
$userfile_size  = $_FILES['userfile']['size'];
$userfile_type  = $_FILES['userfile']['type'];
$userfile_error = $_FILES['userfile']['error'];

if (!$userfile) {
    $error = 'Please upload a passport photograph.';
    include('register.php');
    exit;
}

// Validate file extension
$ext = strtolower(pathinfo($userfile_name, PATHINFO_EXTENSION));
if (check_ext($ext) == 'invalid') {
    $error = 'Invalid photo format. Only image files are allowed.';
    include('register.php');
    exit;
}

// Prepare upload path
$filename = $accountnumber . '.' . $ext;
$upfile = 'uploads/' . $filename;

// Move uploaded file to destination
if (is_uploaded_file($userfile)) {
    move_uploaded_file($userfile, $upfile);
}

// Prepare insert query
$query = "INSERT INTO $tab_account (
    accountnumber,
    firstname,
    middlename,
    lastname,
    address,
    city,
    state,
    country,
    sex,
    dateofbirth,
    email,
    telephone,
    occupation,
    placeofwork,
    ssn,
    image,
    accounttype,
    date_created,
    status,
    username,
    password,
    question,
    answer,
    amount
) VALUES (
    '$accountnumber',
    '$firstname',
    '$middlename',
    '$lastname',
    '$address',
    '$city',
    '$state',
    '$country',
    '$sex',
    '$dateofbirth',
    '$email',
    '$telephone',
    '$occupation',
    '$placeofwork',
    '$ssn',
    '$filename',
    '$accounttype',
    '".date('d-m-Y')."',
    'Pending',
    '$username',
    '$password',
    '$question',
    '$answer',
    '$amount'
)";

$result = mysqli_query($conn, $query);

if ($result) {
    // Send confirmation email
    $subject = $organisation . ' Account Confirmation';
    $content = '<h4>Thank you for banking with us.</h4>
                Your account number will be communicated within 24 hours.<br><br>
                <strong>Login Credentials</strong><br>
                Username: ' . $username . '<br>
                Password: ' . $password . '<br><br>
                Thank you,<br>' . $organisation . '<br>' . $contact_email;

    send_email($email, $firstname, $subject, $content, $sender_email);

    header("Location: complete.php?n=" . base64_encode($firstname));
    exit;
} else {
    $error = 'An account already exists with the provided username or email.';
    include('register.php');
    exit;
}
?>
