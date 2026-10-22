<?php
include('connect.php');
require_once('fns.php');
ini_set('display_errors', 0); // Disable error display
error_reporting(0);           // Turn off all error reporting
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="./img/trust-icon.png" type="image/png">

    <title>Register | Altium Capitals.</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url(img/walll.jpg) !important;
            background-color: #202B43 !important;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">

                            <div class="text-left">
                                <h1 class="h4 text-gray-900 mb-4 text-center"><img width="200px" class="logo-light"
                                        src="../assets/img/edited.png" alt="logo">
                                </h1>
                            </div><br>

                            <div class="text-left">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account with us at Altium Capitals..</h1>
                                Complete the form below to get started <br><br><span style="color:red;">All fields are
                                    compulsory *</span><br><br>
                            </div>
                            <?php if ($error) { ?>
                                <div class="alert alert-danger"><?php echo $error; ?> </div>
                            <?php } ?>
                            <form class="user p-4" method="post" action="process-application.php"
                                enctype="multipart/form-data">
                                <h4 class="text-center mb-4 text-primary fw-bold">Open an Account</h4>

                                <!-- Name Fields -->
                                <div class="row mb-3">
                                    <input type="hidden" name="ref"
                                        value="<?php echo isset($_GET['ref']) ? htmlspecialchars($_GET['ref']) : ''; ?>">
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <input type="text" name="lname" class="form-control" placeholder="Surname"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <input type="text" name="fname" class="form-control" placeholder="First Name"
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="mname" class="form-control" placeholder="Middle Name"
                                            required>
                                    </div>
                                </div>

                                <!-- Age -->
                                <div class="mb-3">
                                    <input type="text" name="sex" class="form-control" placeholder="Sex" required>
                                </div>
                                <div class="mb-3">
                                    <input type="date" name="dob" class="form-control" placeholder="Dob" required>
                                </div>

                                <!-- Address -->
                                <div class="mb-3">
                                    <input type="text" name="address" class="form-control"
                                        placeholder="Full Home Address, City, State & Country" required>
                                </div>

                                <!-- Contact Info -->
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Email Address" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number"
                                            required>
                                    </div>
                                </div>

                                <!-- Account Info -->
                                <div class="mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="Username"
                                        required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" name="confirm" class="form-control"
                                            placeholder="Confirm Password" required>
                                    </div>
                                </div>

                                <!-- Passport Upload -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Upload Passport Photograph</label>
                                    <input type="file" name="userfile" class="form-control" accept="image/*" required>
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="form-check mb-4">
                                    <input type="checkbox" class="form-check-input" id="termsCheck" name="iAgree"
                                        required>
                                    <label class="form-check-label" for="termsCheck">
                                        I agree to the <a href="#" class="text-primary text-decoration-none">Terms and
                                            Conditions</a>
                                    </label>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                                    Open Account
                                </button>

                                <div class="text-center mt-3">
                                    <a href="index.php" class="text-secondary text-decoration-none">Go back</a>
                                </div>
                            </form>

                            <hr>

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