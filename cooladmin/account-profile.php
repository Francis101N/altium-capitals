<?php
session_start();
include 'connect.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_user'])) {
    header("Location: index");
    exit();
}

$admin_user = $_SESSION['admin_user'];

// Fetch admin details
$query = "SELECT * FROM admin WHERE user = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $admin_user);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();
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
    <title>Admin Profile</title>

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
<style>
    body {
        background-color: #f8f9fc;
        font-family: 'Poppins', sans-serif;
    }

    .profile-card {
        max-width: 600px;
        margin: 10px auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: 0.3s ease;
    }

    .profile-header {
        background: linear-gradient(135deg, #007bff, #00b4d8);
        color: white;
        text-align: center;
        padding: 40px 20px;
    }

    .profile-header img {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        border: 4px solid #fff;
        object-fit: cover;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    .profile-body {
        padding: 30px;
    }

    .info-item {
        margin-bottom: 18px;
    }

    .info-item label {
        font-weight: 600;
        color: #555;
    }

    .info-item p {
        font-size: 15px;
        color: #333;
        margin: 0;
    }

    .btn-edit {
        background: #007bff;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        color: white;
        font-weight: 500;
    }

    .btn-edit:hover {
        background: black;
    }
</style>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
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
                        <li class="has-sub">
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

            <br><br><br><br>

            <!-- MAIN CONTENT -->
            <div class="main-content py-4">
                <div class="container-fluid px-3 px-md-4">

                    <div class="row">
                        <div class="col-lg-8 col-xl-6 mx-auto">

                            <!-- EXECUTIVE PROFILE CARD CONTAINER -->
                            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4" style="border: 1px solid #e2e8f0 !important;">

                                <!-- Profile Header Cover -->
                                <div class="card-header bg-dark text-white text-center pt-5 pb-4 px-4 position-relative" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
                                    <div class="position-relative d-inline-block mb-3">
                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                    </div>
                                    <h4 class="fw-extrabold text-white mb-1"><?php echo htmlspecialchars($admin['user'] ?? 'System Administrator'); ?></h4>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle font-mono fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.72rem;">
                                        Executive Control Administrator
                                    </span>
                                </div>

                                <!-- Profile Details Body -->
                                <div class="card-body p-4">

                                    <!-- 1. Email Address -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-bold text-dark small">Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary border-end-0" style="width: 46px; justify-content: center;">
                                                <!-- Envelope SVG Icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                    <polyline points="22,6 12,13 2,6"></polyline>
                                                </svg>
                                            </span>
                                            <input type="text" name="email" id="email" class="form-control font-mono bg-light text-muted fw-semibold" style="height: 48px;" value="<?php echo htmlspecialchars($admin['email'] ?? ''); ?>" readonly>
                                        </div>
                                    </div>

                                    <!-- 2. Security Credentials / Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label fw-bold text-dark small">Access Credential Hash</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary border-end-0" style="width: 46px; justify-content: center;">
                                                <!-- Key SVG Icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                                </svg>
                                            </span>
                                            <input type="password" name="password" id="password" class="form-control font-mono bg-light text-muted fw-semibold" style="height: 48px;" value="<?php echo htmlspecialchars($admin['pass'] ?? ''); ?>" readonly>
                                        </div>
                                    </div>

                                    <!-- 3. Date Created -->
                                    <div class="mb-4">
                                        <label for="date" class="form-label fw-bold text-dark small">Account Creation Timestamp</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary border-end-0" style="width: 46px; justify-content: center;">
                                                <!-- Calendar SVG Icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                                </svg>
                                            </span>
                                            <input type="text" name="date" id="date" class="form-control font-mono bg-light text-muted fw-semibold" style="height: 48px;" value="<?php echo htmlspecialchars($admin['date_created'] ?? ''); ?>" readonly>
                                        </div>
                                    </div>

                                    <!-- Edit Profile Trigger -->
                                    <!-- <div class="pt-2 border-top text-center">
                                        <a href="edit-admin-profile" class="btn btn-primary px-4 py-2.5 fw-bold shadow-sm d-inline-flex align-items-center justify-content-center w-100" style="height: 48px;">
                                         
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                            Edit Admin Credentials
                                        </a>
                                    </div> -->

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Footer Copyright -->
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <p class="text-muted small mb-0">&copy; <?php echo date('Y'); ?> <strong>Altium Capital Holdings.</strong> All Rights Reserved.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
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