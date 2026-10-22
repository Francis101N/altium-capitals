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

$query = "SELECT wallet_type, amount, reference, description, created_at 
          FROM withdrawal 
          WHERE username = ? AND status = 'Approved' 
          ORDER BY created_at DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();


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

  <title>Withdraw | Altium Capitals.</title>

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

  .card-custom {
    border: 1px solid #dee2e6;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    margin-bottom: 30px;
  }

  .info-box {
    background-color: #e9f6fb;
    border: 1px solid #2e95c4;
    padding: 15px;
    border-radius: 6px;
    margin-bottom: 20px;
  }

  .info-box h5 {
    color: #2e95c4;
    font-weight: bold;
  }

  .table th {
    background-color: #2e95c4;
    color: #fff;
  }

  .no-funds {
    background-color: #f8f9fa;
    text-align: center;
    padding: 20px;
    color: #6c757d;
    font-style: italic;
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
          <li class="menu-item active">
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
          <div class="container py-5">

            <!-- Page Header -->
            <div class="text-center mb-5">
              <div class="py-2 px-4 rounded-3 d-inline-block shadow-sm" style="background-color: #3b82f6;">
                <h3 class="m-0 fw-extrabold text-white tracking-wide text-uppercase" style="font-size: 1.25rem;">
                  REQUEST WITHDRAWAL
                </h3>
              </div>
              <p class="text-muted small mt-2 max-w-lg mx-auto">
                Select your preferred payout gateway and specify the amount to process your fund redemption.
              </p>
            </div>

            <!-- Account Summary Cards -->
            <div class="row g-4 mb-5 max-w-4xl mx-auto">
              <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center bg-white border" style="border-color: #e2e8f0 !important;">
                  <span class="d-block text-uppercase text-muted fw-bold mb-1" style="font-size: 0.75rem;">Available Account Balance</span>
                  <h3 class="fw-extrabold text-primary m-0"><?php echo '$' . number_format($row['account_balance'] ?? 0, 2); ?></h3>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center bg-white border" style="border-color: #e2e8f0 !important;">
                  <span class="d-block text-uppercase text-muted fw-bold mb-1" style="font-size: 0.75rem;">Pending Withdrawals</span>
                  <h3 class="fw-extrabold text-secondary m-0">$0.00</h3>
                </div>
              </div>
            </div>

            <!-- Withdrawal Form Card -->
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white border max-w-4xl mx-auto mb-5" style="border-color: #e2e8f0 !important;">

              <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                <div class="w-10 h-10 rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center me-3">
                  <i class="bx bx-transfer fs-4"></i>
                </div>
                <div>
                  <h4 class="fw-bold text-dark mb-0">Withdrawal Gateway</h4>
                  <p class="text-muted small mb-0">Ensure your external wallet details are valid before submission.</p>
                </div>
              </div>

              <form action="confirm_withdrawal" method="POST">
                <!-- Hidden Username Field -->
                <input type="hidden" id="username" name="username" value="<?php echo htmlspecialchars($row['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                <!-- Withdrawal Method -->
                <div class="mb-3">
                  <label for="withdrawMethod" class="form-label fw-bold text-secondary small uppercase tracking-wider">Select Payout Method</label>
                  <select class="form-select py-2.5 fw-semibold text-dark" id="withdrawMethod" name="method" required>
                    <option value="" disabled selected>-- Choose Withdrawal Method --</option>
                    <option value="Bitcoin">Bitcoin (BTC)</option>
                    <option value="Ethereum">Ethereum (ETH)</option>
                    <option value="USDT">USDT (Tether TRC20/ERC20)</option>
                    <option value="USDC_ERC20">USDC (ERC20)</option>
                  </select>
                </div>

                <!-- Amount & Auto Reference Row -->
                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label for="withdrawAmount" class="form-label fw-bold text-secondary small uppercase tracking-wider">Withdrawal Amount ($)</label>
                    <div class="input-group">
                      <span class="input-group-text bg-white fw-bold">$</span>
                      <input type="number" class="form-control py-2.5 fw-semibold" id="withdrawAmount" name="amount" placeholder="0.00" min="1" step="any" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="reference" class="form-label fw-bold text-secondary small uppercase tracking-wider">Transaction Reference</label>
                    <input type="text" class="form-control py-2.5 bg-light fw-bold text-dark font-mono" id="reference" name="reference" value="<?php echo '000' . rand(100, 999); ?>" readonly>
                  </div>
                </div>

                <!-- Description -->
                <div class="mb-4">
                  <label for="description" class="form-label fw-bold text-secondary small uppercase tracking-wider">Description</label>
                  <textarea class="form-control fw-semibold" id="description" name="description" rows="3" placeholder="Optional note for this withdrawal (e.g. additional payment reference or note)"></textarea>
                </div>

                <!-- Submit CTA Button -->
                <div class="text-center">
                  <button type="submit" class="btn btn-warning w-100 py-3 fw-extrabold text-dark rounded-3 shadow-sm hover-shadow" style="background-color: #ffc107; border: none;">
                    Proceed to Withdraw <i class="bi bi-arrow-right ms-1"></i>
                  </button>
                </div>
              </form>
            </div>

            <!-- Approved Withdrawals Table Section -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden max-w-4xl mx-auto border" style="border-color: #e2e8f0 !important;">
              <div class="card-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between">
                <h5 class="mb-0 fw-bold text-white"><i class="bx bx-check-shield me-2 text-warning"></i>Approved Withdrawals Log</h5>
                <span class="badge bg-secondary font-mono">History</span>
              </div>

              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-hover align-middle mb-0 text-center">
                    <thead class="bg-light text-muted uppercase font-mono" style="font-size: 0.75rem;">
                      <tr>
                        <th class="py-3">#</th>
                        <th class="py-3">Wallet Type</th>
                        <th class="py-3">Amount ($)</th>
                        <th class="py-3">Reference</th>
                        <th class="py-3">Description / Wallet</th>
                        <th class="py-3">Date Processed</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($result) && $result->num_rows > 0) {
                        $count = 1;
                        while ($wRow = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td class='fw-bold text-muted'>{$count}</td>";
                          echo "<td><span class='badge bg-primary-subtle text-primary fw-bold px-3 py-1.5 rounded-pill'>{$wRow['wallet_type']}</span></td>";
                          echo "<td class='fw-bold text-success'>$" . number_format((float)$wRow['amount'], 2) . "</td>";
                          echo "<td><code class='text-dark fw-bold'>{$wRow['reference']}</code></td>";
                          echo "<td class='small text-muted'>" . htmlspecialchars($wRow['description'] ?? 'N/A', ENT_QUOTES, 'UTF-8') . "</td>";
                          echo "<td class='small font-mono text-secondary'>" . date('d M Y, H:i', strtotime($wRow['created_at'])) . "</td>";
                          echo "</tr>";
                          $count++;
                        }
                      } else {
                        echo "<tr><td colspan='6' class='py-4 text-muted'><i class='bx bx-info-circle me-1'></i> No approved withdrawal history found.</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme border-top py-4 mt-5">
            <div class="container-xxl d-flex justify-content-center text-center">
              <div class="text-muted small">
                &copy; <?php echo date('Y'); ?>, <strong>Altium Capital Holdings. All Rights Reserved.</strong>
              </div>
            </div>
          </footer>

          <!-- Optional Chart Script Guard -->
          <script>
            const chartCanvas = document.getElementById('incomeExpenseChart');
            if (chartCanvas) {
              const ctx = chartCanvas.getContext('2d');
              new Chart(ctx, {
                type: 'pie',
                data: {
                  labels: ['Income', 'Expenses'],
                  datasets: [{
                    label: 'Amount in USD',
                    data: [750, 500],
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
                    }
                  }
                }
              });
            }
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