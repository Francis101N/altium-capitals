<?php
session_start();
require_once('connect.php');
require_once('PHPMailer/PHPMailerAutoload.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Collect form data
  $lname = trim($_POST['lname']);
  $fname = trim($_POST['fname']);
  $mname = trim($_POST['mname']);
  $sex = trim($_POST['sex']);
  $dob = trim($_POST['dob']);
  $address = trim($_POST['address']);
  $email = trim($_POST['email']);
  $phone = trim($_POST['phone']);
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $confirm = trim($_POST['confirm']);

  $referral = isset($_POST['ref']) && !empty($_POST['ref']) ? trim($_POST['ref']) : null;
  $ref_bonus = !empty($referral) ? '7' : null;

  // Validate password match
  if ($password !== $confirm) {
    $error = 'Passwords do not match!';
    include('register.php');
    exit;
  }

  // Validate Terms and Conditions
  if (!isset($_POST['iAgree'])) {
    $error = 'You must agree to the Terms and Conditions!';
    include('register.php');
    exit;
  }

  // ✅ Check if username already exists
  $check_username = "SELECT * FROM registration WHERE username = ? LIMIT 1";
  $stmt_check = $conn->prepare($check_username);
  $stmt_check->bind_param("s", $username);
  $stmt_check->execute();
  $result = $stmt_check->get_result();

  if ($result->num_rows > 0) {
    $error = 'Username already taken, try another to continue.';
    include('register.php');
    exit;
  }
  $stmt_check->close();

  // ✅ Handle file upload
  $target_dir = "uploads/";
  if (!is_dir($target_dir))
    mkdir($target_dir, 0777, true);

  $file_name = time() . "_" . basename($_FILES["userfile"]["name"]);
  $target_file = $target_dir . $file_name;

  $check = getimagesize($_FILES["userfile"]["tmp_name"]);
  if ($check === false) {
    $error = 'File is not an image!';
    include('register.php');
    exit;
  }

  if (!move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
    $error = 'Error uploading passport.';
    include('register.php');
    exit;
  }

  $passport_path = $target_file;

  // ✅ Generate account ID: first 3 letters of surname - random number - year of birth
  $year = date('Y', strtotime($dob));
  $account_id = strtoupper(substr($lname, 0, 3)) . '-' . rand(1000, 9999) . '-' . $year;

  // ✅ Save to database (with referral)

  $sql = "INSERT INTO registration (account_id, surname, firstname, middlename, sex, dob, address, email, phone, username, password, passport, ref, total_referral_bonus)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);

  if (!$stmt) {
    die("Prepare failed: " . $conn->error);
  }

  $stmt->bind_param(
    "ssssssssssssss",
    $account_id,
    $lname,
    $fname,
    $mname,
    $sex,
    $dob,
    $address,
    $email,
    $phone,
    $username,
    $password,
    $passport_path,
    $referral,
    $ref_bonus
  );

  if ($stmt->execute()) {

    // ✅ If referral exists, give ₦7 immediate bonus to the referrer
    if (!empty($referral)) {
      $bonus_update = "UPDATE registration SET total_referral_bonus = 7 WHERE username = ?";
      $stmt_bonus = $conn->prepare($bonus_update);
      $stmt_bonus->bind_param("s", $referral);
      $stmt_bonus->execute();
      $stmt_bonus->close();
    }

    // ✅ Send Email to User
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'mail.sovereignnexarcapital.org';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'notification@sovereignnexarcapital.org';
    $mail->Password = 'sovereignnexarCAPITAL1972$$$';
    $mail->From = 'notification@sovereignnexarcapital.org';
    $mail->FromName = 'Sovereign Nexar Capital';
    $mail->isHTML(true);
    $mail->addAddress($email);
    $mail->Subject = "Welcome to Sovereign Nexar Capital!";
    $mail->Body = "
            <h2 style='color:#2e95c4;'>Account Created Successfully!</h2>
            <p>Dear $fname,</p>
            <p>Your account has been successfully created on <strong>Sovereign Nexar Capital</strong>.</p>
            <p><strong>Account ID:</strong> $account_id<br>
            <strong>Username:</strong> $username<br>
            <strong>Password:</strong> $password</p>
            " . ($referral ? "<p>Referred by: <strong>$referral</strong></p>" : "") . "
            <p>We’re happy to have you on board!</p>
            <p style='color:#2e95c4;'>Sovereign Nexar Capital</p>
        ";
    $mail->send();

    // ✅ Notify Admin
    $admin = new PHPMailer();
    $admin->isSMTP();
    $admin->Host = 'mail.sovereignnexarcapital.org';
    $admin->SMTPAuth = true;
    $admin->Port = 465;
    $admin->SMTPSecure = 'ssl';
    $admin->Username = 'notification@sovereignnexarcapital.org';
    $admin->Password = 'sovereignnexarCAPITAL1972$$$';
    $admin->From = 'notification@sovereignnexarcapital.org';
    $admin->FromName = 'Sovereign Nexar Capital';
    $admin->isHTML(true);
    $admin->addAddress('sovereignnexarcapitalorganizat@gmail.com');
    $admin->Subject = "New Account Registration";
    $admin->Body = "
            <h3>Hello Admin,</h3>
            <p>A new user has just completed their account registration.</p>
            <p><strong>Account ID:</strong> $account_id</p>
            <p><strong>Full Name:</strong> $lname $fname $mname</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Referral:</strong> " . ($referral ? $referral : 'None') . "</p>
            <p style='margin-top:15px;'>Please log in to the admin panel to review and manage this account.</p>
            <p style='color:#2e95c4; font-weight:bold;'>Sovereign Nexar Capital Notification System</p>
        ";
    $admin->send();

    header("Location: redirecting-register.php");
    exit;
  } else {
    echo "<script>alert('Error saving your data.'); window.history.back();</script>";
  }

  $stmt->close();
  $conn->close();
}
?>