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

  <title>Deposits | Sovereign Nexar Capital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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
<style>
  body {
    background-color: #f8f9fa;
    font-family: 'Poppins', sans-serif;
  }

  .plan-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #fff;
  }

  .plan-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(30, 144, 255, 0.2);
  }

  .plan-icon {
    font-size: 3rem;
    color: #2e95c4;
    margin-bottom: 15px;
  }

  .plan-title {
    color: #2e95c4;
    font-weight: 700;
    font-size: 1.3rem;
  }

  .plan-duration {
    color: #6c757d;
    font-size: 1rem;
    margin-bottom: 10px;
  }

  .plan-rate {
    font-size: 1rem;
    border-radius: 8px;
  }

  .deposit-form {
    background-color: #ffffff;
    border-top: 4px solid #2e95c4;
  }
</style>

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

          <li class="menu-item active">
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
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container py-5">

            <!-- Header Bar -->
            <div class="text-center mb-5">
              <div class="py-2 px-4 rounded-3 d-inline-block shadow-sm" style="background-color: #3b82f6;">
                <h3 class="m-0 fw-extrabold text-white tracking-wide text-uppercase" style="font-size: 1.25rem;">
                  MAKE A DEPOSIT
                </h3>
              </div>
              <h5 class="mt-3 fw-bold text-dark">Our Investment Plans</h5>
              <p class="text-muted small max-w-lg mx-auto">
                Select an investment plan below and complete the form to initiate your deposit.
              </p>
            </div>

            <!-- Investment Plans Grid (Matching your recent Starter, Growth & Premium Plans) -->
            <div class="row g-4 justify-content-center mb-5">

              <!-- STARTER PLAN -->
              <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden text-center transition-all hover-shadow" style="background: #ffffff; border: 1px solid #e2e8f0;">
                  <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-light text-secondary border uppercase font-mono px-2 py-1">Tier 01</span>
                        <span class="badge bg-primary-subtle text-primary fw-bold">Starter</span>
                      </div>

                      <i class="bi bi-rocket-takeoff fs-1 text-primary mb-2 d-block"></i>
                      <h4 class="fw-extrabold text-dark mb-1">STARTER PLAN</h4>
                      <p class="text-muted small fw-semibold mb-3">2% daily for 6 days</p>

                      <div class="p-3 bg-light rounded-3 mb-3 border">
                        <span class="d-block text-uppercase text-muted fw-bold" style="font-size: 0.7rem;">Investment Range</span>
                        <span class="fw-bold text-primary fs-5">$200 — $19,999</span>
                      </div>

                      <ul class="list-unstyled text-start small text-secondary space-y-2 mb-4">
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i>Daily Earnings</li>
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i>Ref Bonus: 10%</li>
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i>Instant Withdrawal</li>
                        <li><i class="bi bi-check-circle-fill text-primary me-2"></i>24/7 Dedicated Support</li>
                      </ul>
                    </div>

                    <div>
                      <span class="badge bg-warning text-dark fw-bold px-3 py-2 w-100 rounded-pill fs-6 shadow-sm">
                        2.0% Daily Return
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- GROWTH PLAN (Featured) -->
              <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-2 shadow-lg rounded-4 overflow-hidden text-center relative" style="border-color: #3b82f6; background: #ffffff;">

                  <div class="bg-primary text-white text-uppercase font-extrabold py-1 text-center shadow-sm" style="font-size: 0.7rem; letter-spacing: 1px;">
                    Most Popular Plan
                  </div>

                  <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-primary text-white uppercase font-mono px-2 py-1">Tier 02</span>
                        <span class="badge bg-warning text-dark fw-bold">Growth</span>
                      </div>

                      <i class="bi bi-graph-up-arrow fs-1 text-primary mb-2 d-block"></i>
                      <h4 class="fw-extrabold text-dark mb-1">GROWTH PLAN</h4>
                      <p class="text-muted small fw-semibold mb-3">3.5% daily for 12 days</p>

                      <div class="p-3 bg-primary-subtle rounded-3 mb-3 border border-primary-subtle">
                        <span class="d-block text-uppercase text-primary fw-bold" style="font-size: 0.7rem;">Investment Range</span>
                        <span class="fw-bold text-dark fs-5">$20,000 — $100,000</span>
                      </div>

                      <ul class="list-unstyled text-start small text-secondary space-y-2 mb-4">
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i>Daily Earnings</li>
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i>Ref Bonus: 10%</li>
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i>Instant Withdrawal</li>
                        <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Priority VIP Support</li>
                      </ul>
                    </div>

                    <div>
                      <span class="badge bg-warning text-dark fw-bold px-3 py-2 w-100 rounded-pill fs-6 shadow-sm">
                        3.5% Daily Return
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- PREMIUM PLAN -->
              <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden text-center transition-all hover-shadow" style="background: #ffffff; border: 1px solid #e2e8f0;">
                  <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-light text-secondary border uppercase font-mono px-2 py-1">Tier 03</span>
                        <span class="badge bg-dark text-white fw-bold">Institutional</span>
                      </div>

                      <i class="bi bi-gem fs-1 text-primary mb-2 d-block"></i>
                      <h4 class="fw-extrabold text-dark mb-1">PREMIUM PLAN</h4>
                      <p class="text-muted small fw-semibold mb-3">5% daily for 20 days</p>

                      <div class="p-3 bg-light rounded-3 mb-3 border">
                        <span class="d-block text-uppercase text-muted fw-bold" style="font-size: 0.7rem;">Investment Range</span>
                        <span class="fw-bold text-primary fs-5">$100,000 — Unlimited</span>
                      </div>

                      <ul class="list-unstyled text-start small text-secondary space-y-2 mb-4">
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i>Daily Earnings</li>
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i>Ref Bonus: 10%</li>
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-primary me-2"></i>Instant Withdrawal</li>
                        <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Dedicated Portfolio Manager</li>
                      </ul>
                    </div>

                    <div>
                      <span class="badge bg-warning text-dark fw-bold px-3 py-2 w-100 rounded-pill fs-6 shadow-sm">
                        5.0% Daily Return
                      </span>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- Deposit Form -->
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white border" style="max-width: 800px; margin: 0 auto;">

              <div class="text-center mb-4">
                <h4 class="fw-bold text-dark mb-1">Make Your Deposit</h4>
                <p class="text-muted small">Enter your deposit configuration below to generate payment address details.</p>
              </div>

              <form action="confirm_deposit" method="POST">

                <!-- Account Balance -->
                <div class="mb-3">
                  <label for="accountBalance" class="form-label fw-bold text-secondary small uppercase tracking-wider">Account Balance</label>
                  <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-wallet2"></i></span>
                    <input type="text" class="form-control bg-light border-start-0 fw-bold text-dark" id="accountBalance" name="accountBalance" value="<?php echo '$' . number_format($row['account_balance'] ?? 0, 2); ?>" readonly>
                  </div>
                </div>

                <!-- Select Package -->
                <div class="mb-3">
                  <label for="package" class="form-label fw-bold text-secondary small uppercase tracking-wider">Select Investment Package</label>
                  <select class="form-select py-2.5 fw-semibold text-dark" id="package" name="package" required>
                    <option value="" disabled selected>-- Choose Investment Plan --</option>
                    <option value="Starter Plan">Starter Plan ($200 — $19,999 | 2% Daily)</option>
                    <option value="Growth Plan">Growth Plan ($20,000 — $100,000 | 3.5% Daily)</option>
                    <option value="Premium Plan">Premium Plan ($100,000 — Unlimited | 5% Daily)</option>
                  </select>
                </div>

                <!-- Select Payment Method -->
                <div class="mb-3">
                  <label for="paymentMethod" class="form-label fw-bold text-secondary small uppercase tracking-wider">Select Payment Method</label>
                  <select class="form-select py-2.5 fw-semibold text-dark" id="paymentMethod" name="payment_method" required>
                    <option value="" disabled selected>-- Choose Payment Method --</option>
                    <option value="Bitcoin">Bitcoin (BTC)</option>
                    <option value="Ethereum">Ethereum (ETH)</option>
                    <option value="USDT">USDT (Tether TRC20)</option>
                    <option value="USDC_ERC20">USDC (ERC20)</option>
                    <option value="USDT_ERC20">USDT (ERC20)</option>
                    <option value="Tron">Tron (TRX)</option>
                  </select>
                </div>

                <!-- Enter Amount -->
                <div class="mb-4">
                  <label for="amount" class="form-label fw-bold text-secondary small uppercase tracking-wider">Enter Amount ($)</label>
                  <div class="input-group">
                    <span class="input-group-text bg-white fw-bold">$</span>
                    <input type="number" class="form-control py-2.5 fw-semibold" id="amount" name="amount" placeholder="0.00" min="200" step="any" required>
                  </div>
                </div>

                <!-- Submit CTA Button -->
                <div class="text-center">
                  <button type="submit" class="btn btn-warning w-100 py-3 fw-extrabold text-dark rounded-3 shadow-sm hover-shadow" style="background-color: #ffc107; border: none;">
                    Proceed to Deposit <i class="bi bi-arrow-right ms-1"></i>
                  </button>
                </div>

              </form>
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