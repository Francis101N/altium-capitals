<?php
include('connect.php');
require_once('fns.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registration Complete | Mapleaf Capital.</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Official Bootstrap CSS (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-9">
        <div class="card o-hidden border-0 shadow-lg my-4 mx-auto">
          <div class="row g-0">

            <!-- Image Section -->
            <div class="col-lg-5 d-none d-lg-block">
              <img src="img/account-created-photo.jpg" alt="Account Created" class="img-fluid h-100 w-100 object-fit-cover rounded-start">
            </div>

            <!-- Text Section -->
            <div class="col-lg-7 pt-5 pb-5">
              <div class="p-4 p-md-5">

                <!-- Logo -->
                <div class="d-flex justify-content-center mb-4">
                  <a href="#" class="app-brand-link">
                    <img src="./img/mapleaf-logo.png" alt="" width="130px">
                  </a>
                </div><br>

                <!-- Heading -->
                <h2 class="text-success mb-4 text-center text-lg-start">
                  Application Successful
                  <img src="../assets/img/check.gif" alt="Verified" style="width: 40px;" class="ms-2">
                </h2><br>

                <!-- Message -->
                <div class="text-center text-lg-start">
                  <p>
                    Thank you for creating an account with us <strong><?php echo base64_decode($_GET['n']); ?></strong>, We’re excited to have you on board! Your account has been successfully set up.
                  </p><br>
                  <p>
                    A confirmation email containing your login credentials has been sent to your registered email address.
                  </p><br>
                  <a href="index.php" class="btn btn-primary btn-md rounded-pill mt-3">Log In to Your Account</a>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>