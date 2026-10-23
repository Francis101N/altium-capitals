<?php
session_start();
require('connect.php');

if (!isset($_SESSION['admin_user'])) {
    // Redirect to login page if not logged in
    header("Location: index");
    exit;
}

// 1. Registered Accounts
$totalUsersQuery = "SELECT COUNT(*) AS total FROM registration";
$result = $conn->query($totalUsersQuery);
$totalUsers = ($result->num_rows > 0) ? $result->fetch_assoc()['total'] : 0;

// 2. Total Deposits
$totalDepositsQuery = "SELECT SUM(amount) AS total FROM transactions WHERE type='Deposit'";
$result = $conn->query($totalDepositsQuery);
$totalDeposits = ($result->num_rows > 0) ? $result->fetch_assoc()['total'] : 0;

// 3. Total Withdrawals
$totalWithdrawalsQuery = "SELECT SUM(amount) AS total FROM transactions WHERE type='Withdraw'";
$result = $conn->query($totalWithdrawalsQuery);
$totalWithdrawals = ($result->num_rows > 0) ? $result->fetch_assoc()['total'] : 0;

// 4. Unique Visitors
$query = "SELECT COUNT(*) AS totalVisitors FROM visitors";
$visitors_result = $conn->query($query);

if ($visitors_result && $row = $visitors_result->fetch_assoc()) {
    $totalVisitors = $row['totalVisitors'];
} else {
    $totalVisitors = 0;
}


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
    <title>Dashboard</title>
    <span></span>
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
                        <a class="logo" href="index">
                            <img src="images/altium-logo.png" alt="CoolAdmin" width="180px" height="15px" />
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
                            <a class="js-arrow" href="dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="visitors">
                                <i class="fas fa-chart-bar"></i>Unique Visitors</a>
                        </li>
                        <li>
                            <a href="account_holders">
                                <i class="fas fa-table"></i>Account Holders</a>
                        </li>
                        <li>
                            <a href="deposits">
                                <i class="fas fa-arrow-down text-success me-2"></i>Deposits
                            </a>
                        </li>
                        <li>
                            <a href="withdrawals">
                                <i class="fas fa-arrow-up text-danger me-2"></i>Withdrawals
                            </a>
                        </li>
                        <li>
                            <a href="transactions">
                                <i class="fas fa-exchange-alt text-primary me-2"></i>Transactions
                            </a>
                        </li>
                        <li>
                            <a href="update_account">
                                <i class="far fa-check-square"></i>Update Account</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-download"></i>Backups</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="export" target="_blank">Back up accounts</a>
                                </li>
                            </ul>
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
                    <img src="images/altium-logo.png" alt="CoolAdmin" width="180px" height="10px" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub active">
                            <a href="dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="visitors">
                                <i class="fas fa-chart-bar"></i>Unique Visitors</a>
                        </li>
                        <li>
                            <a href="account_holders">
                                <i class="fas fa-table"></i>Account Holders</a>
                        </li>
                        <li>
                            <a href="deposits">
                                <i class="fas fa-arrow-down text-success me-2"></i>Deposits
                            </a>
                        </li>
                        <li>
                            <a href="withdrawals">
                                <i class="fas fa-arrow-up text-danger me-2"></i>Withdrawals
                            </a>
                        </li>
                        <li>
                            <a href="transactions">
                                <i class="fas fa-exchange-alt text-primary me-2"></i>Transactions
                            </a>
                        </li>
                        <li>
                            <a href="update_account">
                                <i class="far fa-check-square"></i>Update Account</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fa fa-download"></i>Backups</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="export" target="_blank">Back up accounts</a>
                                </li>
                            </ul>
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
                                <button class="au-btn--submit bg-primary" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">

                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin
                                                <?php echo $_SESSION['admin_user']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <span class="email"><?php echo $_SESSION['admin_email']; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="account-profile">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="changeAdmin_pass">
                                                        <i class="zmdi zmdi-settings"></i>Change admin password</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout">
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">ADMIN OVERVIEW</h2>
                                </div><br>
                                <marquee behavior="" direction="" class="text-primary">🚀 Welcome to your Admin Dashboard! Manage everything easily and efficiently. 🛠️</marquee><br><br>
                            </div>
                        </div>
                        <!-- Admin Overview Metrics Grid (Bootstrap 5 + SVG Icons) -->
                        <div class="row g-3 my-2">

                            <!-- 1. Registered Accounts -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card border-0 shadow-sm rounded-4 h-100 bg-white" style="border: 1px solid #e2e8f0 !important;">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 48px; height: 48px;">
                                                <!-- Users SVG Icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="9" cy="7" r="4"></circle>
                                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                </svg>
                                            </div>
                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle font-mono fw-bold rounded-pill px-3 py-1.5" style="font-size: 0.72rem;">
                                                User Ledger
                                            </span>
                                        </div>
                                        <span class="text-uppercase text-secondary fw-bold small d-block mb-1" style="font-size: 0.72rem; letter-spacing: 0.5px;">Registered Accounts</span>
                                        <h3 class="fw-extrabold text-dark mb-1 font-mono">
                                            <?php echo number_format($totalUsers ?? 0); ?>
                                        </h3>
                                        <small class="text-primary fw-semibold d-inline-flex align-items-center">
                                            <!-- Check Circle SVG Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                            Active Platform Investors
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. Total Deposits -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card border-0 shadow-sm rounded-4 h-100 bg-white" style="border: 1px solid #e2e8f0 !important;">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="bg-success text-white rounded-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 48px; height: 48px;">
                                                <!-- Trending Up SVG Icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                                    <polyline points="17 6 23 6 23 12"></polyline>
                                                </svg>
                                            </div>
                                            <span class="badge bg-success-subtle text-success border border-success-subtle font-mono fw-bold rounded-pill px-3 py-1.5" style="font-size: 0.72rem;">
                                                Gross Inflow
                                            </span>
                                        </div>
                                        <span class="text-uppercase text-secondary fw-bold small d-block mb-1" style="font-size: 0.72rem; letter-spacing: 0.5px;">Total Deposits</span>
                                        <h3 class="fw-extrabold text-dark mb-1 font-mono">
                                            <?php echo '$' . number_format($totalDeposits ?? 0, 2); ?>
                                        </h3>
                                        <small class="text-success fw-semibold d-inline-flex align-items-center">
                                            <!-- Shield Check SVG Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                                <path d="m9 12 2 2 4-4"></path>
                                            </svg>
                                            Capital Cleared
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. Total Withdrawals -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card border-0 shadow-sm rounded-4 h-100 bg-white" style="border: 1px solid #e2e8f0 !important;">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="bg-danger text-white rounded-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 48px; height: 48px;">
                                                <!-- Trending Down SVG Icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                                    <polyline points="17 18 23 18 23 12"></polyline>
                                                </svg>
                                            </div>
                                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle font-mono fw-bold rounded-pill px-3 py-1.5" style="font-size: 0.72rem;">
                                                Paid Out
                                            </span>
                                        </div>
                                        <span class="text-uppercase text-secondary fw-bold small d-block mb-1" style="font-size: 0.72rem; letter-spacing: 0.5px;">Total Withdrawals</span>
                                        <h3 class="fw-extrabold text-dark mb-1 font-mono">
                                            <?php echo '$' . number_format($totalWithdrawals ?? 0, 2); ?>
                                        </h3>
                                        <small class="text-muted fw-semibold d-inline-flex align-items-center">
                                            <!-- Clock / History SVG Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg>
                                            Settled Payouts
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- 4. Unique Visitors -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card border-0 shadow-sm rounded-4 h-100 bg-white" style="border: 1px solid #e2e8f0 !important;">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="bg-warning text-dark rounded-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 48px; height: 48px;">
                                                <!-- Globe SVG Icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                                </svg>
                                            </div>
                                            <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle font-mono fw-bold rounded-pill px-3 py-1.5" style="font-size: 0.72rem;">
                                                Traffic Log
                                            </span>
                                        </div>
                                        <span class="text-uppercase text-secondary fw-bold small d-block mb-1" style="font-size: 0.72rem; letter-spacing: 0.5px;">Unique Visitors</span>
                                        <h3 class="fw-extrabold text-dark mb-1 font-mono">
                                            <?php echo number_format($totalVisitors ?? 0); ?>
                                        </h3>
                                        <small class="text-warning-emphasis fw-semibold d-inline-flex align-items-center">
                                            <!-- Eye SVG Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                            Global Portal Visits
                                        </small>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br><br><br><br><br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    Copyright © 2025 Altium Capitals., All rights reserved.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

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