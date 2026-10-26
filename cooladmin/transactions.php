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
    <title>Transactions - Mapleaf Capital</title>

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
<style>
    table th,
    table td {
        padding: 1rem 0.8rem;
        /* spacious padding */
        vertical-align: middle;
        text-align: center;
        font-size: 0.95rem;
    }

    .table-striped>tbody>tr:nth-of-type(odd) {
        background-color: rgba(46, 149, 196, 0.05);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(46, 149, 196, 0.1);
        transition: background-color 0.3s ease;
    }

    img.rounded-circle {
        object-fit: cover;
    }

    @media (max-width: 768px) {

        table th,
        table td {
            padding: 0.6rem 0.4rem;
            font-size: 0.8rem;
        }

        img.rounded-circle {
            width: 40px;
            height: 40px;
        }
    }
</style>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index">
                            <img src="images/mapleaf-logo.png" alt="CoolAdmin" width="130px" height="15px" />
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
                    <img src="images/mapleaf-logo.png" alt="CoolAdmin" width="150px" height="10px" />
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
                        <li class="active">
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
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['admin_fullnames']; ?></a>
                                                    </h5>
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


                    <div class="row m-1">
                        <div class="col-12">
                            <!-- DATA TABLE CARD CONTAINER -->
                            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-white" style="border: 1px solid #e2e8f0 !important;">

                                <!-- Executive Card Header -->
                                <div class="card-header bg-dark text-white py-3.5 px-4 d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="w-9 h-9 rounded-3 bg-primary text-white d-flex align-items-center justify-content-center me-3 shadow-sm">
                                            <i class="bx bx-history fs-4"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-0 fw-extrabold text-white fs-6">System Transactions History</h5>
                                            <span class="text-muted small" style="font-size: 0.72rem;">Complete ledger of all platform financial movements and activity</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle font-mono fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.7rem;">
                                        Global Ledger
                                    </span>
                                </div>

                                <!-- Card Body Table -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle mb-0 text-nowrap text-center" style="min-width: 1100px;">
                                            <thead class="bg-light text-secondary uppercase font-mono" style="font-size: 0.72rem; letter-spacing: 0.5px;">
                                                <tr>
                                                    <th class="py-3 px-3">#</th>
                                                    <th class="py-3">Account ID</th>
                                                    <th class="py-3 text-start">Username</th>
                                                    <th class="py-3">Type</th>
                                                    <th class="py-3">Currency</th>
                                                    <th class="py-3 text-end">Amount</th>
                                                    <th class="py-3">Reference</th>
                                                    <th class="py-3 text-start">Description</th>
                                                    <th class="py-3">Date Created</th>
                                                </tr>
                                            </thead>

                                            <tbody style="font-size: 0.875rem;">
                                                <?php
                                                $query = "SELECT * FROM transactions ORDER BY created_at DESC";
                                                $result = mysqli_query($conn, $query);
                                                $serial = 1;

                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $type = strtolower($row['type'] ?? '');
                                                        $isCredit = in_array($type, ['deposit', 'earning', 'credit', 'bonus']);

                                                        // Badge styling for transaction type
                                                        if ($isCredit) {
                                                            $typeBadge = "<span class='badge bg-success-subtle text-success border border-success-subtle fw-bold px-2.5 py-1 rounded-pill uppercase font-mono' style='font-size: 0.68rem;'>" . htmlspecialchars($row['type']) . "</span>";
                                                            $amountColor = "text-success";
                                                            $amountPrefix = "+";
                                                        } else {
                                                            $typeBadge = "<span class='badge bg-danger-subtle text-danger border border-danger-subtle fw-bold px-2.5 py-1 rounded-pill uppercase font-mono' style='font-size: 0.68rem;'>" . htmlspecialchars($row['type']) . "</span>";
                                                            $amountColor = "text-danger";
                                                            $amountPrefix = "-";
                                                        }

                                                        // Format timestamp
                                                        $formattedDate = !empty($row['created_at']) ? date('M d, Y h:i A', strtotime($row['created_at'])) : 'N/A';

                                                        echo "<tr>";
                                                        // #
                                                        echo "<td class='px-3 fw-bold text-muted font-mono'>" . $serial++ . "</td>";

                                                        // Account ID
                                                        echo "<td><code class='text-secondary font-mono fw-bold'>" . htmlspecialchars($row['account_id']) . "</code></td>";

                                                        // Username
                                                        echo "<td class='text-start'><div class='fw-bold text-dark font-mono'><i class='bx bx-user me-1 text-primary'></i>" . htmlspecialchars($row['username']) . "</div></td>";

                                                        // Type Badge
                                                        echo "<td>" . $typeBadge . "</td>";

                                                        // Currency
                                                        echo "<td><span class='badge bg-light text-dark border font-mono fw-bold px-2 py-1'>" . htmlspecialchars($row['currency']) . "</span></td>";

                                                        // Amount
                                                        echo "<td class='text-end fw-extrabold " . $amountColor . " font-mono'>" . $amountPrefix . "$" . number_format((float)$row['amount'], 2) . "</td>";

                                                        // Reference
                                                        echo "<td><code class='text-dark font-mono small'>" . htmlspecialchars($row['reference']) . "</code></td>";

                                                        // Description
                                                        echo "<td class='text-start'><span class='text-secondary small text-truncate d-inline-block' style='max-width: 250px;' title='" . htmlspecialchars($row['description']) . "'>" . htmlspecialchars($row['description']) . "</span></td>";

                                                        // Date Created
                                                        echo "<td><span class='text-muted small font-mono'>" . $formattedDate . "</span></td>";

                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='9' class='text-center py-5 text-muted'><i class='bx bx-info-circle fs-3 mb-2 d-block'></i><p class='small mb-0'>No transaction records found in the database.</p></td></tr>";
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
                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                Copyright © 2025 Mapleaf Capital. All rights reserved.
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