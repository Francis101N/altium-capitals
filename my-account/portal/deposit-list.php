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

$username = $_SESSION['account_user'];

// Fetch approved Basic Plan deposits for this user
$stmt = $conn->prepare("SELECT amount, profit FROM deposit WHERE username = ? AND package = 'BASIC PLAN' AND status = 'Approved' ORDER BY created_at DESC");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Fetch approved Standard Plan deposits for this user
$stmt = $conn->prepare("SELECT amount, profit FROM deposit WHERE username = ? AND package = 'STANDARD PLAN' AND status = 'Approved' ORDER BY created_at DESC");
$stmt->bind_param("s", $username);
$stmt->execute();
$result2 = $stmt->get_result();

// Fetch approved Gold Plan deposits for this user
$stmt = $conn->prepare("SELECT amount, profit FROM deposit WHERE username = ? AND package = 'GOLD PLAN' AND status = 'Approved' ORDER BY created_at DESC");
$stmt->bind_param("s", $username);
$stmt->execute();
$result3 = $stmt->get_result();

// Fetch approved Silver Plan deposits for this user
$stmt = $conn->prepare("SELECT amount, profit FROM deposit WHERE username = ? AND package = 'SILVER PLAN' AND status = 'Approved' ORDER BY created_at DESC");
$stmt->bind_param("s", $username);
$stmt->execute();
$result4 = $stmt->get_result();

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

</html>

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Deposit List | Sovereign Nexar Capital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="./img/trust-icon.png" />

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
<style>
  body {
    background-color: #f8f9fa;
    font-family: 'Poppins', sans-serif;
  }

  .section-header {
    background-color: #2e95c4;
    color: #fff;
    padding: 10px 20px;
    border-radius: 8px 8px 0 0;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .section-header i {
    font-size: 1.5rem;
  }

  .plan-card {
    border: 1px solid #dee2e6;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    margin-bottom: 30px;
  }

  table th {
    background-color: #2e95c4;
    color: white;
  }

  .no-deposit {
    background-color: #f8f9fa;
    text-align: center;
    padding: 15px;
    color: #6c757d;
    font-style: italic;
  }

  .total {
    font-weight: bold;
    font-size: 1.2rem;
    margin-bottom: 20px;
    color: #2e95c4;
    text-align: right;
  }
</style>

<body>


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
            <li class="menu-item ">
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
            <li class="menu-item active">
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
                      <img src="../../<?php echo htmlspecialchars($row['passport'], ENT_QUOTES, 'UTF-8'); ?>" alt class="rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../../<?php echo htmlspecialchars($row['passport'], ENT_QUOTES, 'UTF-8'); ?>" alt class="rounded-circle" />
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
          <div class="container py-5">

            <!-- Header Title & Total Balance Summary Box -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 pb-3 border-bottom">
              <div>
                <h2 class="fw-bold text-dark mb-1">Your Active Deposits</h2>
                <p class="text-muted small mb-0">Overview of your active portfolio allocations across investment tiers.</p>
              </div>
              <div class="mt-3 mt-md-0 px-4 py-2 bg-primary-subtle border border-primary-subtle rounded-3 text-center">
                <span class="d-block text-uppercase text-primary font-mono fw-bold" style="font-size: 0.75rem;">Total Active Deposits</span>
                <span class="fs-4 fw-extrabold text-primary">$<?php echo number_format($total_deposit ?? 0.00, 2); ?></span>
              </div>
            </div>

            <!-- 1. STARTER PLAN -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 border" style="background: #ffffff; border-color: #e2e8f0 !important;">
              <div class="card-header bg-light py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
                <div class="d-flex align-items-center space-x-2">
                  <div class="w-8 h-8 rounded-2 bg-primary-subtle text-primary d-flex align-items-center justify-content-center me-2">
                    <i class="bx bx-rocket fs-5"></i>
                  </div>
                  <h5 class="mb-0 fw-bold text-dark">Starter Plan</h5>
                </div>
                <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1.5 rounded-pill">2.0% Daily</span>
              </div>

              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-hover align-middle mb-0 text-center">
                    <thead class="bg-light text-muted uppercase font-mono" style="font-size: 0.75rem;">
                      <tr>
                        <th class="py-3">Plan Package</th>
                        <th class="py-3">Amount Deposited ($)</th>
                        <th class="py-3">Expected Profit ($)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($result) && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                          <tr>
                            <td><span class="badge bg-primary fw-bold px-3 py-1.5 rounded-pill">Starter Plan</span></td>
                            <td class="fw-bold text-dark">$<?php echo number_format($row['amount'], 2); ?></td>
                            <td class="fw-bold text-success">$<?php echo number_format($row['profit'], 2); ?></td>
                          </tr>
                        <?php endwhile; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="3" class="py-4 text-muted">
                            <i class="bx bx-info-circle me-1"></i> No active deposits under the Starter Plan.
                          </td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- 2. GROWTH PLAN (FEATURED TIER) -->
            <div class="card border-2 shadow-sm rounded-4 overflow-hidden mb-4" style="border-color: #3b82f6 !important; background: #ffffff;">
              <div class="card-header bg-primary text-white py-3 px-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <div class="w-8 h-8 rounded-2 bg-white text-primary d-flex align-items-center justify-content-center me-2">
                    <i class="bx bx-trending-up fs-5"></i>
                  </div>
                  <h5 class="mb-0 fw-bold text-white">Growth Plan</h5>
                </div>
                <span class="badge bg-warning text-dark fw-bold px-3 py-1.5 rounded-pill">3.5% Daily</span>
              </div>

              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-hover align-middle mb-0 text-center">
                    <thead class="bg-light text-muted uppercase font-mono" style="font-size: 0.75rem;">
                      <tr>
                        <th class="py-3">Plan Package</th>
                        <th class="py-3">Amount Deposited ($)</th>
                        <th class="py-3">Expected Profit ($)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($result2) && $result2->num_rows > 0): ?>
                        <?php while ($row2 = $result2->fetch_assoc()): ?>
                          <tr>
                            <td><span class="badge bg-primary fw-bold px-3 py-1.5 rounded-pill">Growth Plan</span></td>
                            <td class="fw-bold text-dark">$<?php echo number_format($row2['amount'], 2); ?></td>
                            <td class="fw-bold text-success">$<?php echo number_format($row2['profit'], 2); ?></td>
                          </tr>
                        <?php endwhile; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="3" class="py-4 text-muted">
                            <i class="bx bx-info-circle me-1"></i> No active deposits under the Growth Plan.
                          </td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- 3. PREMIUM PLAN -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 border" style="background: #ffffff; border-color: #e2e8f0 !important;">
              <div class="card-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <div class="w-8 h-8 rounded-2 bg-secondary text-white d-flex align-items-center justify-content-center me-2">
                    <i class="bx bx-diamond fs-5"></i>
                  </div>
                  <h5 class="mb-0 fw-bold text-white">Premium Plan</h5>
                </div>
                <span class="badge bg-warning text-dark fw-bold px-3 py-1.5 rounded-pill">5.0% Daily</span>
              </div>

              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-hover align-middle mb-0 text-center">
                    <thead class="bg-light text-muted uppercase font-mono" style="font-size: 0.75rem;">
                      <tr>
                        <th class="py-3">Plan Package</th>
                        <th class="py-3">Amount Deposited ($)</th>
                        <th class="py-3">Expected Profit ($)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($result3) && $result3->num_rows > 0): ?>
                        <?php while ($row3 = $result3->fetch_assoc()): ?>
                          <tr>
                            <td><span class="badge bg-dark fw-bold px-3 py-1.5 rounded-pill">Premium Plan</span></td>
                            <td class="fw-bold text-dark">$<?php echo number_format($row3['amount'], 2); ?></td>
                            <td class="fw-bold text-success">$<?php echo number_format($row3['profit'], 2); ?></td>
                          </tr>
                        <?php endwhile; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="3" class="py-4 text-muted">
                            <i class="bx bx-info-circle me-1"></i> No active deposits under the Premium Plan.
                          </td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
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
                , <strong>Altium Capitals.</strong>
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