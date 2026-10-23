<?php
session_start();
require('connect.php');
require_once ('fns.php');

if (!isset($_SESSION['admin_user'])) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit;
}
$id = $_GET['id'];

$query = "SELECT * FROM account WHERE accountnumber = '$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Edit Account Holders</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/logo.png" alt="CoolAdmin" width="200px" height="30px" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Bank Charts</a>
                        </li>
                        <li>
                            <a href="account_holders.php">
                                <i class="fas fa-table"></i>Account Holders</a>
                        </li>
                        <li>
                            <a href="create_account.php">
                                <i class="fa fa-pencil-square-o"></i>Create Account</a>
                        </li>
                        <li>
                            <a href="update_account.php">
                                <i class="far fa-check-square"></i>Update Account</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-download"></i>Backups</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#">Back up account</a>
                                </li>
                                <li>
                                    <a href="#">Back up transaction</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Bank Charts</a>
                        </li>
                        <li>
                            <a href="account_holders.php">
                                <i class="fas fa-table"></i>Account Holders</a>
                        </li>
                        <li>
                            <a href="create_account.php">
                                <i class="fa fa-pencil-square-o"></i>Create Account</a>
                        </li>
                        <li>
                            <a href="update_account.php">
                                <i class="far fa-check-square"></i>Update Account</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fa fa-download"></i>Backups</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="#">Back up account</a>
                                </li>
                                <li>
                                    <a href="#">Back up transaction</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search"
                                    placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit bg-danger" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin
                                                <?php echo $_SESSION['admin_user'];?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['admin_fullnames'];?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $_SESSION['admin_email'];?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="changeAdmin_pass.php">
                                                        <i class="zmdi zmdi-settings"></i>Change admin password</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <form action="proc_edit.php" method="post" enctype="multipart/form-data">
                            <?php if (isset($success) && $success): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                ✅ <strong>Success!</strong> Account created successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php elseif (isset($error) && $error): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                ❌ <strong>Error!</strong> Something went wrong. Please try again.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php endif; ?>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header"><strong>EDIT</strong> <small>INFORMATION</small>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h6 class="text-center title-5"><strong
                                                        class="text-danger">Warning:</strong> Review all changes
                                                    carefully when editing account holder details to avoid errors or
                                                    security issues....</h6>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="account_number" class="control-label mb-1">Account
                                                    number</label>
                                                <input id="account_number" name="account_number" type="text"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['accountnumber'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="firstname" class="control-label mb-1">Firstname</label>
                                                <input id="firstname" name="firstname" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['firstname'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="middlename" class="control-label mb-1">Middlename</label>
                                                <input id="middlename" name="middlename" type="text"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['middlename'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="lastname" class="control-label mb-1">Lastname</label>
                                                <input id="lastname" name="lastname" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['lastname'];?>" required>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input"
                                                        class="form-control-label">Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="address" id="textarea-input" rows="4"
                                                        class="form-control"
                                                        required><?php echo htmlspecialchars($row['address']); ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="city" class="control-label mb-1">City</label>
                                                <input id="city" name="city" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['city'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="state" class="control-label mb-1">State</label>
                                                <input id="state" name="state" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['state'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="country" class="control-label mb-1">Country</label>
                                                <input id="country" name="country" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['country'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="sex" class="control-label mb-1">Sex</label>
                                                <select id="sex" name="sex" class="form-control" aria-required="true"
                                                    aria-invalid="false" required>
                                                    <option value="<?php echo  $row['sex'] ;?>">
                                                        <?php echo  $row['sex'] ;?></option>
                                                    <option value="">Select sex</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female </option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="dob" class="control-label mb-1">Date of Birth</label>
                                                <input id="dob" name="dob" type="date" class="form-control"
                                                    value="<?php echo date('Y-m-d', strtotime($row['dateofbirth'])); ?>"
                                                    required>
                                            </div>

                                            <div class="form-group">
                                                <label for="email" class="control-label mb-1">Email</label>
                                                <input id="email" name="email" type="email" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['email'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="telephone" class="control-label mb-1">Telephone</label>
                                                <input id="telephone" name="telephone" type="tel" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['telephone'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="occupation" class="control-label mb-1">Occupation</label>
                                                <input id="occupation" name="occupation" type="text"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['occupation'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="placeofwork" class="control-label mb-1">Place Of
                                                    Work</label>
                                                <input id="placeofwork" name="placeofwork" type="text"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['placeofwork'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="ssn" class="control-label mb-1">SSN</label>
                                                <input id="ssn" name="ssn" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['ssn'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nextofkin" class="control-label mb-1">Next Of Kin</label>
                                                <input id="nextofkin" name="nextofkin" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['nextofkin'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="passport" class="control-label mb-1">Passport</label>
                                                
                                                <div class="mb-2">
                                                    <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>"
                                                        alt="Current Passport" width="120">
                                                </div>
                                               
                                                <input id="passport" name="passport" type="file" class="form-control"
                                                    required>
                                            </div>

                                            <div class="form-group">
                                                <label for="accounttype" class="control-label mb-1">Account Type</label>
                                                <input id="accounttype" name="accounttype" type="text"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['accounttype'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="control-label mb-1">Status</label>
                                                <input id="status" name="status" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['status'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="datecreated" class="control-label mb-1">Date Created</label>
                                                <input id="datecreated" name="datecreated" type="text"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['date_created'];?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="last_trans" class="control-label mb-1">Last
                                                    Transaction</label>
                                                <input id="last_trans" name="last_trans" type="text"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['last_trans'];?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="last_login" class="control-label mb-1">Last Login</label>
                                                <input id="last_login" name="last_login" type="text"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['last_login'];?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="control-label mb-1">Username</label>
                                                <input id="username" name="username" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['username'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="control-label mb-1">Password</label>
                                                <input id="password" name="password" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="<?php echo $row['password'];?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </form>
                    </div>
                </div>
            </div><br><br><br>
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                            href="https://colorlib.com">Colorlib</a>.</p>
                </div>

                <!-- Jquery JS-->
                <script src="vendor/jquery-3.2.1.min.js"></script>
                <!-- Bootstrap JS-->
                <script src="vendor/bootstrap-4.1/popper.min.js"></script>
                <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
                <!-- Vendor JS       -->
                <script src="vendor/slick/slick.min.js">
                </script>
                <script src="vendor/wow/wow.min.js"></script>
                <script src="vendor/animsition/animsition.min.js"></script>
                <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
                </script>
                <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
                <script src="vendor/counter-up/jquery.counterup.min.js">
                </script>
                <script src="vendor/circle-progress/circle-progress.min.js"></script>
                <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
                <script src="vendor/chartjs/Chart.bundle.min.js"></script>
                <script src="vendor/select2/select2.min.js">
                </script>

                <!-- Main JS-->
                <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->