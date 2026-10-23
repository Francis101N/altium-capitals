<?php
session_start();
require('connect.php');

if (!isset($_SESSION['admin_user'])) {
    // Redirect to login page if not logged in
    header("Location: index");
    exit;
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
    <title>visitors | Altium Capitals</title>

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
        </header> <!-- END HEADER MOBILE-->

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
                        <li class="active">
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
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">


                    <div class="row">
                        <div class="row m-1">
                            <div class="col-12">
                                <!-- DATA TABLE CARD CONTAINER -->
                                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-white" style="border: 1px solid #e2e8f0 !important;">

                                    <!-- Executive Card Header -->
                                    <div class="card-header bg-dark text-white py-3.5 px-4 d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-3 bg-warning text-dark d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 40px; height: 40px;">
                                                <!-- Globe SVG Icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h5 class="mb-0 fw-extrabold text-white fs-6">Unique Visitors Overview</h5>
                                                <span class="text-muted small" style="font-size: 0.72rem;">Real-time network traffic telemetry and geographical logs</span>
                                            </div>
                                        </div>
                                        <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle font-mono fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.7rem;">
                                            Traffic Log
                                        </span>
                                    </div>

                                    <!-- Card Body Table -->
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle mb-0 text-nowrap text-center" style="min-width: 900px;">
                                                <thead class="bg-light text-secondary uppercase font-mono" style="font-size: 0.72rem; letter-spacing: 0.5px;">
                                                    <tr>
                                                        <th class="py-3 px-3">#</th>
                                                        <th class="py-3 text-start">IP Address</th>
                                                        <th class="py-3">Operating System</th>
                                                        <th class="py-3">Country</th>
                                                        <th class="py-3">Browser</th>
                                                        <th class="py-3">Date Visited</th>
                                                    </tr>
                                                </thead>

                                                <tbody style="font-size: 0.875rem;">
                                                    <?php
                                                    $query = "SELECT * FROM visitors ORDER BY date_created DESC";
                                                    $result = mysqli_query($conn, $query);
                                                    $serial = 1;

                                                    if ($result && mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $dateVal = $row['created_at'] ?? $row['date_created'] ?? 'N/A';
                                                            $formattedDate = ($dateVal !== 'N/A') ? date('M d, Y h:i A', strtotime($dateVal)) : 'N/A';

                                                            echo "<tr>";
                                                            // Row Serial Number
                                                            echo "<td class='px-3 fw-bold text-muted font-mono'>" . $serial++ . "</td>";

                                                            // IP Address
                                                            echo "<td class='text-start'>
                                            <div class='d-inline-flex align-items-center fw-bold text-dark font-mono'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='me-2 text-primary'><rect x='2' y='2' width='20' height='8' rx='2' ry='2'></rect><rect x='2' y='14' width='20' height='8' rx='2' ry='2'></rect><line x1='6' y1='6' x2='6.01' y2='6'></line><line x1='6' y1='18' x2='6.01' y2='18'></line></svg>
                                                " . htmlspecialchars($row['ip_address']) . "
                                            </div>
                                          </td>";

                                                            // Operating System
                                                            echo "<td>
                                            <span class='badge bg-light text-dark border font-mono fw-bold px-2.5 py-1.5'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='me-1 text-secondary'><rect x='2' y='3' width='20' height='14' rx='2' ry='2'></rect><line x1='8' y1='21' x2='16' y2='21'></line><line x1='12' y1='17' x2='12' y2='21'></line></svg>
                                                " . htmlspecialchars($row['operating_system']) . "
                                            </span>
                                          </td>";

                                                            // Country
                                                            echo "<td>
                                            <span class='badge bg-primary-subtle text-primary border border-primary-subtle font-mono fw-bold px-3 py-1.5 rounded-pill'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='me-1'><path d='M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z'></path><circle cx='12' cy='10' r='3'></circle></svg>
                                                " . htmlspecialchars($row['country']) . "
                                            </span>
                                          </td>";

                                                            // Browser
                                                            echo "<td>
                                            <span class='fw-semibold text-dark font-mono small d-inline-flex align-items-center'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='me-1 text-warning-emphasis'><circle cx='12' cy='12' r='10'></circle><circle cx='12' cy='12' r='4'></circle><line x1='21.17' y1='8' x2='12' y2='8'></line><line x1='3.95' y1='6.06' x2='8.54' y2='14'></line><line x1='10.88' y1='21.94' x2='15.46' y2='14'></line></svg>
                                                " . htmlspecialchars($row['browser']) . "
                                            </span>
                                          </td>";

                                                            // Date Visited
                                                            echo "<td><span class='text-muted small font-mono'>" . $formattedDate . "</span></td>";

                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='6' class='text-center py-5 text-muted'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='mb-2 d-block mx-auto text-secondary'><circle cx='12' cy='12' r='10'></circle><line x1='12' y1='8' x2='12' y2='12'></line><line x1='12' y1='16' x2='12.01' y2='16'></line></svg><p class='small mb-0'>No unique visitor logs found in the database.</p></td></tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <!-- END DATA TABLE CARD -->
                            </div>
                        </div>
                    </div>

                    <style>
                        .table th,
                        .table td {
                            padding: 18px 12px !important;
                            vertical-align: middle !important;
                        }

                        .table tbody tr:hover {
                            background-color: rgba(30, 144, 255, 0.08);
                            transition: 0.3s ease;
                        }

                        .btn-danger:hover {
                            background-color: #c82333 !important;
                            box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
                            transition: 0.3s ease;
                        }

                        .title-5 {
                            font-weight: 600;
                            letter-spacing: 0.5px;
                        }
                    </style>
                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2025 Altium Capitals., All rights reserved.</p>
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