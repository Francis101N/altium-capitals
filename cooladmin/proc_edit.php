<?php
include('connect.php');

// Collect form input data
$account_number = $_POST['account_number'];
$firstname      = $_POST['firstname'];
$middlename     = $_POST['middlename'];
$lastname       = $_POST['lastname'];
$address        = $_POST['address'];
$city           = $_POST['city'];
$state          = $_POST['state'];
$country        = $_POST['country'];
$sex            = $_POST['sex'];
$dob            = $_POST['dob'];
$email          = $_POST['email'];
$telephone      = $_POST['telephone'];
$occupation     = $_POST['occupation'];
$placeofwork    = $_POST['placeofwork'];
$ssn            = $_POST['ssn'];
$nextofkin      = $_POST['nextofkin'];
$accounttype    = $_POST['accounttype'];
$status         = $_POST['status'];
$date_created   = $_POST['datecreated'];
$last_trans     = $_POST['last_trans'];
$last_login     = $_POST['last_login'];
$username       = $_POST['username'];
$password       = $_POST['password'];

// Process passport image upload
if (isset($_FILES['passport']) && $_FILES['passport']['error'] === UPLOAD_ERR_OK) {
    $passport_tmp  = $_FILES['passport']['tmp_name'];
    $passport_name = $_FILES['passport']['name'];
    $passport_type = $_FILES['passport']['type'];
    $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];

    if (!in_array($passport_type, $allowed_types)) {
        die('Invalid file type. Only JPG and PNG allowed.');
    }

    // Get extension
    $ext = strtolower(pathinfo($passport_name, PATHINFO_EXTENSION));
    $filename = $account_number . '.' . $ext;
    $upload_path = 'uploads/' . $filename;

    // Upload file
    if (!move_uploaded_file($passport_tmp, $upload_path)) {
        die('Failed to upload passport image.');
    }
} else {
    $filename = ''; // Keep empty if no new file uploaded
}

// Build update query
$sql = "UPDATE account SET
    firstname     = '$firstname',
    middlename    = '$middlename',
    lastname      = '$lastname',
    address       = '$address',
    city          = '$city',
    state         = '$state',
    country       = '$country',
    sex           = '$sex',
    dateofbirth   = '$dob',
    email         = '$email',
    telephone     = '$telephone',
    occupation    = '$occupation',
    placeofwork   = '$placeofwork',
    ssn           = '$ssn',
    nextofkin     = '$nextofkin',
    image     = '$filename',
    accounttype   = '$accounttype',
    status        = '$status',
    date_created  = '$date_created',
    last_trans    = '$last_trans',
    last_login    = '$last_login',
    username      = '$username',
    password      = '$password'
    where accountnumber = '$account_number'";

// Execute query
if (mysqli_query($conn, $sql)) {
    $success = "Account updated successfully.";
} else {
    $error = "Error updating account: " . mysqli_error($conn);
}

include('edit.php');
mysqli_close($conn);
?>
