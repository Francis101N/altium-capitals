<?php
ob_start();
session_start();

include('connect.php');

if (!isset($_SESSION['account_user']) || empty($_SESSION['account_user'])) {
  header("Location: ../../account/index?error=session_expired");
  exit;
}

$que = "select * from registration where username = '" . $_SESSION['account_user'] . "'";
$res = mysqli_query($conn, $que);
$row = mysqli_fetch_array($res);

$que2 = "SELECT SUM(amount) AS total_deposit 
         FROM transactions 
         WHERE username = '" . $_SESSION['account_user'] . "' AND type = 'Deposit'";
$res2 = mysqli_query($conn, $que2);

if ($res2) {
  $row2 = mysqli_fetch_array($res2);
  $total_deposit = $row2['total_deposit'] ?? 0; // default to 0 if null
} else {
  $total_deposit = 0;
}

$que3 = "SELECT SUM(amount) AS total_withdraw 
         FROM transactions 
         WHERE username = '" . $_SESSION['account_user'] . "' AND type = 'Withdraw'";
$res3 = mysqli_query($conn, $que3);
$row3 = mysqli_fetch_array($res3);
$total_withdraw = $row3['total_withdraw'] ?? 0;


$username = $_SESSION['account_user'];

// Query to count all pending withdrawals for this user
$query_ = "SELECT COUNT(*) AS pending_count FROM withdrawal WHERE username = '$username' AND status = 'Pending'";
$result_ = mysqli_query($conn, $query_);

$pending_count = 0;
if ($result_) {
  $row_ = mysqli_fetch_assoc($result_);
  $pending_count = $row_['pending_count'];
}


?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard | Sovereign Nexar Capital</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="./img/edited.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <script src="../assets/js/config.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img src="./img/altium-logo-blue.jpeg" alt="" width="180px">
            </span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item mt-2">
            <a href="https://sovereignnexarcapital.org/" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Homepage">Home Page</div>
            </a>
          </li>
          <li class="menu-item active ">
            <a href="index" class="menu-link">
              <i class="menu-icon tf-icons bx bx-grid-alt"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">ACCOUNT</span>
          </li>

          <li class="menu-item">
            <a href="deposit" class="menu-link">
              <i class="menu-icon tf-icons bx bx-wallet"></i>
              <div data-i18n="#">Deposit</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="deposit-list" class="menu-link">
              <i class="menu-icon tf-icons bx bx-list-check"></i>
              <div data-i18n="#">Deposit List</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="withdraw" class="menu-link">
              <i class="menu-icon tf-icons bx bx-export"></i>
              <div data-i18n="#">Withdraw</div>
            </a>
          </li>

          <!-- HISTORIES -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">HISTORIES</span></li>

          <li class="menu-item">
            <a href="transactions_history" class="menu-link">
              <i class="menu-icon tf-icons bx bx-list-check"></i>
              <div data-i18n="Basic">Transactions History</div>
            </a>
          </li>

          <!-- information -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">INFORMATION</span></li>

          <li class="menu-item">
            <a href="referrals" class="menu-link">
              <i class="menu-icon tf-icons bx bx-id-card"></i>
              <div data-i18n="Basic">Referrals</div>
            </a>
          </li>

          <!-- Misc -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
          <li class="menu-item">
            <a
              href="customer-care"
              target="#"
              class="menu-link">
              <i class="menu-icon tf-icons bx bx-support"></i>
              <div data-i18n="Support">Customer Care</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input
                  type="text"
                  class="form-control border-0 shadow-none"
                  placeholder="Search..."
                  aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../../<?php echo htmlspecialchars($row['passport'], ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Photo" class="rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../../<?php echo htmlspecialchars($row['passport'], ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Photo" class="rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block"><?php echo $_SESSION['fullname']; ?></span>
                          <small class="text-muted"><?php echo $_SESSION['account_user']; ?></small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="account-profile">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="update_password">
                      <i class="menu-icon tf-icons bx bx-lock"></i>
                      <span class="align-middle">Change Password</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="logout">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <h3>DASHBOARD</h3>
            <div class="card border-0 shadow-lg text-white mb-4" style="background-color: #0e9aa7; border-radius: 16px; overflow: hidden;">
              <div class="card-body p-4 sm:p-5">

                <!-- Welcome Heading -->
                <h3 class="fw-bold mb-3" style="color: #d1fae5; font-size: 1.50rem;">
                  <marquee behavior="" direction="" class="text-primary">Welcome To Altium Capitals, <?php echo $_SESSION['account_user']; ?> 👋</marquee>
                </h3>
                <big class="text-primary fw-bold">ACCOUNT ID :</big> <span><b> <?php echo $row['account_id'] ?></span></b><br><br>

                <!-- Subtext Intro -->
                <p class="fs-6 mb-4 text-white-50" style="color: #f1f5f9 !important;">
                  Get familiar with altiumholdingcapital.com, here are some ways to get started.
                </p>

                <!-- Bullet List -->
                <ul class="list-unstyled mb-4 space-y-2" style="line-height: 1.8;">
                  <li class="d-flex align-items-start mb-2">
                    <span class="me-2 text-warning fw-bold">•</span>
                    <span>Choose the package you want to invest from deposit page</span>
                  </li>
                  <li class="d-flex align-items-start mb-2">
                    <span class="me-2 text-warning fw-bold">•</span>
                    <span>Select the e-currency you are suitable with.</span>
                  </li>
                  <li class="d-flex align-items-start">
                    <span class="me-2 text-warning fw-bold">•</span>
                    <span>Your earnings will be started according to the intervals of packages.</span>
                  </li>
                </ul>

                <!-- Action Button -->
                <div>
                  <a href="deposit.php" class="btn btn-warning fw-bold px-4 py-2.5 rounded-pill text-dark shadow-sm hover-shadow" style="background-color: #ffc107; border: none;">
                    Deposit
                  </a>
                </div>

              </div>
            </div>

            <div class="row">

              <div class="col-lg-6 col-md-4 order-1">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-2">
                          <div class="avatar flex-shrink-0">
                            <img
                              src="../assets/img/icons/unicons/wallet.png"
                              alt="account balance"
                              class="rounded"
                              style="width: 40px; height: 40px; object-fit: contain;" />
                          </div>
                        </div>

                        <span class="text-uppercase fw-semibold small">Account Balance</span>
                        <h3 class="card-title mb-1" style="max-width: 100%;">
                          <?php echo '$' . number_format($row['account_balance'], 2); ?>
                        </h3>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-2">
                          <div class="avatar flex-shrink-0">
                            <i class="menu-icon tf-icons bx bx-down-arrow-circle text-success fs-3 p-1"
                              style="background-color: #e8fadf; border-radius: 5px;"></i>
                          </div>
                        </div>
                        <span class="text-uppercase fw-semibold small">Total Deposit</span>
                        <h3 class="card-title mb-1" style="max-width: 100%;">
                          <?php echo '$' . number_format($total_deposit, 2); ?>
                        </h3>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- Total Revenue -->

              <!--/ Total Revenue -->
              <div class="col-12 col-md-8 col-lg-6 order-3 order-md-2">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-2">
                          <div class="avatar flex-shrink-0">
                            <i class="menu-icon tf-icons bx bx-up-arrow-circle text-primary fs-3 p-1"
                              style="background-color: #ffe7e3; border-radius: 5px;"></i>
                          </div>
                        </div>
                        <span class="text-uppercase fw-semibold small">Total Withdrawal</span>
                        <h3 class="card-title mb-2" style="word-break: break-word; overflow-wrap: break-word;">
                          <?php echo '$' . number_format($total_withdraw, 2); ?>
                        </h3>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-2">
                          <div class="avatar flex-shrink-0">
                            <i class="menu-icon tf-icons bx bx-bell text-warning fs-3 p-1" style="background-color: #fff2d6; border-radius: 5px;"></i>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1 text-uppercase">PENDING WITHDRAWALS</span>
                        <h3 class="text-warning fw-bold mb-0"><?php echo $pending_count; ?></h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- Order Statistics -->
              <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">

              </div>

              <section class="exchange-table-wrap pb-75">
                <div class="container">
                  <div class="row gx-5">
                    <div class="col-lg-6">
                      <div class="section-title style1 text-center mb-25">
                        <h3 class="mt-4">Live Currency Rates</h3>
                      </div>
                      <div>
                        <script defer src="https://www.livecoinwatch.com/static/lcw-widget.js"></script>
                        <div class="livecoinwatch-widget-3" lcw-base="USD" lcw-d-head="true" lcw-d-name="true"
                          lcw-d-code="true" lcw-d-icon="true" lcw-color-tx="#ffffff" lcw-color-bg="#1f2434"
                          lcw-border-w="1"></div>
                        <div>
                        </div>
                      </div>

                    </div>
                    <div class="col-lg-6">
                      <div class="section-title style1 text-center mb-25">
                        <h3 class="mt-4">Crypto Currency Converter</h3>
                      </div>
                      <!-- START CODE Attention! Do not modify this code; -->
                      <script>
                        var fm = "BTC";
                        var to = "USD";
                        var tz = "timezone";
                        var sz = "1x1";
                        var lg = "en";
                        var st = "primary";
                        var lr = "0";
                        var rd = "0";
                      </script>
                      <script src="//currencyrate.today/converter"></script>
                      <div style="text-align:right"><a href="https://currencyrate.today">CurrencyRate</a></div><!-- Attention! Do not modify this code; END CODE -->
                    </div>
                  </div>

                </div>
            </div>



            </section>

          </div>
        </div>
        <!-- / Content -->
        <br>
        <div class=" container col-md-12 col-lg-12">
          <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="card-title m-0 me-2 text-primary">TRANSACTIONS <img src="../assets/img/bell red.gif" alt="bell-img" width="50px"> <small style="color:red;">(Top 5 most recent)</small> </h5>
            </div>
            <div class="card-body">
              <ul class="p-0 m-0">
                <li class="d-flex flex-column">
                  <?php
                  $query_t = "SELECT * FROM transactions WHERE account_id = '" . $row['account_id'] . "' ORDER BY id DESC LIMIT 5";
                  $result_t = mysqli_query($conn, $query_t);

                  if (mysqli_num_rows($result_t) > 0) {
                    while ($row_t = mysqli_fetch_assoc($result_t)) {

                      // Badge style
                      $is_deposit = strtolower($row_t['type']) === 'deposit';
                      $type_badge = $is_deposit
                        ? "<span class='badge bg-success'>Deposit</span>"
                        : "<span class='badge' style='background-color:red;' >Withdraw</span>";

                      // Add + or - to amount
                      $amount_prefix = $is_deposit ? '+' : '-';

                      echo "
      <div class='col-12 col-lg-12 col-md-12 mb-2 border-bottom pb-2'>
        <div class='d-flex justify-content-between align-items-center'>
          <div>
            <h6 class='mb-1 text-dark'>$type_badge - " . htmlspecialchars($row_t['currency']) . "</h6>
            <p class='mb-0 small' style='color: #000;'>" . htmlspecialchars($row_t['description']) . "</p>
          </div>
          <div class='text-end'>
            <h6 class='mb-1 fw-semibold' style='color:" . ($is_deposit ? '#16a34a' : '#dc2626') . ";'>
              $amount_prefix" . number_format($row_t['amount'], 2) . "
            </h6>
            <p class='mb-0 text-muted small'>" . date('M d, Y h:i A', strtotime($row_t['created_at'])) . "</p>
          </div>
        </div>
      </div>";
                    }
                  } else {
                    echo "<p class='text-muted small'>No recent transactions available.</p>";
                  }
                  ?>

                </li>


              </ul>
            </div>
          </div>
        </div>


        <!-- Footer -->
        <br><br>
        <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl py-2 d-flex justify-content-center text-center">
            <div>
              &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              , <strong>Sovereign Nexar Capital Investment.</strong>
            </div>
          </div><br>
        </footer>

        <!-- / Footer -->

        <script>
          const ctx = document.getElementById('incomeExpenseChart').getContext('2d');
          const incomeExpenseChart = new Chart(ctx, {
            type: 'pie',
            data: {
              labels: ['Income', 'Expenses'],
              datasets: [{
                label: 'Amount in USD',
                data: [750, 500], // You can dynamically set these values
                backgroundColor: ['#28a745', '#dc3545'],
                borderColor: ['#fff', '#fff'],
                borderWidth: 2
              }]
            },
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: 'bottom'
                },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      const label = context.label || '';
                      const value = context.parsed || 0;
                      return `${label}: $${value.toLocaleString()}`;
                    }
                  }
                }
              }
            }
          });
        </script>

        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>