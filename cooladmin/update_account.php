<?php
session_start();
require('connect.php');
require_once('fns.php');
ini_set('display_errors', 0);

if (!isset($_SESSION['admin_user'])) {
    // Redirect to login page if not logged in
    header("Location: index.php");
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
    <title>Account Update</title>

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
                        <li class="active">
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
                            <div class="col-lg-6">
                                <div class="card">
                                    <!-- <div class="card-header">UPDATE AN ACCOUNT</div> -->
                                    <?php
                                    if (!empty($success)) {
                                        echo '<div class="alert alert-success m-2" role="alert">'
                                            . htmlspecialchars($success) .
                                            '</div>';
                                    }

                                    if (!empty($error)) {
                                        echo '<div class="alert alert-danger m-2" role="alert">'
                                            . htmlspecialchars($error) .
                                            '</div>';
                                    }
                                    ?>
                                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-white" style="border: 1px solid #e2e8f0 !important;">

                                        <!-- Executive Card Header -->
                                        <div class="card-header bg-dark text-white py-3.5 px-4 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="w-9 h-9 rounded-3 bg-success text-white d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 38px; height: 38px;">
                                                    <!-- Edit SVG Icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h5 class="mb-0 fw-extrabold text-white fs-6">Manual Account Update & Settlement</h5>
                                                    <span class="text-muted small" style="font-size: 0.72rem;">Manually inject deposits, withdrawals, or account adjustments</span>
                                                </div>
                                            </div>
                                            <span class="badge bg-success-subtle text-success border border-success-subtle font-mono fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.7rem;">
                                                Admin Terminal
                                            </span>
                                        </div>

                                        <!-- Card Body Form -->
                                        <div class="card-body p-4">
                                            <?php
                                            // Generate a 6-digit reference number starting with 000
                                            $referenceNumber = '000' . str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
                                            ?>
                                            <form action="proc_updateAcc" method="post" novalidate="novalidate">

                                                <!-- Account ID Selection -->
                                                <div class="mb-3">
                                                    <label for="accountid" class="form-label fw-bold text-dark small">Select Account ID <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light text-secondary">
                                                            <!-- ID Card SVG Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                                                <path d="M7 15h0"></path>
                                                                <path d="M2 9.5h20"></path>
                                                            </svg>
                                                        </span>
                                                        <select id="accountid" name="accountid" class="form-select fw-semibold" required>
                                                            <option value="">-- Choose Investor Account --</option>
                                                            <?php
                                                            $query = "SELECT account_id, username, firstname, surname FROM registration ORDER BY date_created DESC";
                                                            $result = mysqli_query($conn, $query);

                                                            if ($result && mysqli_num_rows($result) > 0) {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $accid = htmlspecialchars($row['account_id']);
                                                                    $uname = htmlspecialchars($row['username']);
                                                                    $fullname = htmlspecialchars($row['firstname'] . ' ' . $row['surname']);
                                                                    echo "<option value='$accid'>[$accid] - $uname ($fullname)</option>";
                                                                }
                                                            } else {
                                                                echo "<option value=''>No accounts found</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Date / Time -->
                                                <div class="mb-3">
                                                    <label for="datetime" class="form-label fw-bold text-dark small">Transaction Date / Time</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light text-secondary">
                                                            <!-- Calendar SVG Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                                            </svg>
                                                        </span>
                                                        <input id="datetime" name="date/time" type="text" class="form-control font-mono" value="<?php echo date('Y-m-d h:i A'); ?>" placeholder="YYYY-MM-DD HH:MM AM/PM" required>
                                                    </div>
                                                </div>

                                                <!-- From / Sender -->
                                                <div class="mb-3">
                                                    <label for="from" class="form-label fw-bold text-dark small">From / Sender Designation</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light text-secondary">
                                                            <!-- User SVG Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="12" cy="7" r="4"></circle>
                                                            </svg>
                                                        </span>
                                                        <input id="from" name="from" type="text" class="form-control" placeholder="E.g. System Escrow / Admin Vault" autocomplete="off" required>
                                                    </div>
                                                </div>

                                                <!-- Amount -->
                                                <div class="mb-3">
                                                    <label for="amount" class="form-label fw-bold text-dark small">Amount (USD)</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light text-success fw-bold">$</span>
                                                        <input id="amount" name="amount" type="number" step="0.01" class="form-control font-mono fw-bold" placeholder="E.g. 5000 (no commas)" required>
                                                    </div>
                                                </div>

                                                <!-- Action Type -->
                                                <div class="mb-3">
                                                    <label for="action" class="form-label fw-bold text-dark small">Transaction Action</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light text-secondary">
                                                            <!-- Transfer / Repeat SVG Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <polyline points="17 1 21 5 17 9"></polyline>
                                                                <path d="M3 11V9a4 4 0 0 1 4-4h14"></path>
                                                                <polyline points="7 23 3 19 7 15"></polyline>
                                                                <path d="M21 13v2a4 4 0 0 1-4 4H3"></path>
                                                            </svg>
                                                        </span>
                                                        <select id="action" name="action" class="form-select fw-semibold" required>
                                                            <option value="Deposit">Deposit (Credit Account)</option>
                                                            <option value="Withdraw">Withdraw (Debit Account)</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Currency -->
                                                <div class="mb-3">
                                                    <label for="currency" class="form-label fw-bold text-dark small">Settlement Currency</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light text-secondary">
                                                            <!-- Coins SVG Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <circle cx="8" cy="8" r="6"></circle>
                                                                <path d="M18 8a6 6 0 0 1-6 6"></path>
                                                                <path d="M22 12a6 6 0 0 1-6 6"></path>
                                                            </svg>
                                                        </span>
                                                        <select id="currency" name="currency" class="form-select fw-semibold" required>
                                                            <option value="">-- Select Currency Asset --</option>
                                                            <option value="Bitcoin">Bitcoin (BTC)</option>
                                                            <option value="Ethereum">Ethereum (ETH)</option>
                                                            <option value="USDT">USDT (Tether TRC20)</option>
                                                            <option value="USDC_ERC20">USDC (ERC20)</option>
                                                            <option value="USDT_ERC20">USDT (ERC20)</option>
                                                            <option value="Tron">Tron (TRX)</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Reference Number -->
                                                <div class="mb-3">
                                                    <label for="reference" class="form-label fw-bold text-dark small">Reference Number</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light text-secondary">
                                                            <!-- Hash / Barcode SVG Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <line x1="4" y1="9" x2="20" y2="9"></line>
                                                                <line x1="4" y1="15" x2="20" y2="15"></line>
                                                                <line x1="10" y1="3" x2="8" y2="21"></line>
                                                                <line x1="16" y1="3" x2="14" y2="21"></line>
                                                            </svg>
                                                        </span>
                                                        <input id="reference" name="reference" type="text" class="form-control font-mono bg-light text-dark fw-bold" value="<?php echo $referenceNumber; ?>" readonly>
                                                    </div>
                                                </div>

                                                <!-- Description -->
                                                <div class="mb-3">
                                                    <label for="textarea-input" class="form-label fw-bold text-dark small">Description / Narration</label>
                                                    <textarea name="transaction" id="textarea-input" rows="3" class="form-control" placeholder="Provide transaction details or settlement remarks..." required></textarea>
                                                </div>

                                                <!-- Show Transfer Module -->
                                                <div class="mb-4">
                                                    <label for="transfermodule" class="form-label fw-bold text-dark small">Show Transfer Module Notification</label>
                                                    <select id="transfermodule" name="transfermodule" class="form-select fw-semibold" required>
                                                        <option value="YES">YES</option>
                                                        <option value="NO">NO</option>
                                                    </select>
                                                </div>

                                                <!-- Buttons -->
                                                <div class="d-flex gap-2 pt-2 border-top">
                                                    <button type="submit" class="btn btn-success px-4 py-2.5 fw-bold shadow-sm d-inline-flex align-items-center">
                                                        <!-- Check Circle SVG Icon -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                        </svg>
                                                        Update This Account
                                                    </button>
                                                    <button type="reset" class="btn btn-outline-secondary px-3 py-2.5 fw-semibold d-inline-flex align-items-center">
                                                        <!-- Refresh SVG Icon -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                                                            <polyline points="23 4 23 10 17 10"></polyline>
                                                            <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                                                        </svg>
                                                        Reset Form
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br><br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    Copyright © 2025 Altium Capitals All rights reserved.
                                </div>
                            </div>
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