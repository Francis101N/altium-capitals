<?php
ob_start();
session_start();

include('connect.php');

// 1. Session Guard Check
if (!isset($_SESSION['account_user']) || empty($_SESSION['account_user'])) {
  header("Location: ../../account/index?error=session_expired");
  exit;
}

$username = $_SESSION['account_user'];

// 2. Fetch User Account Details securely via PDO / Prepared Statements
try {
  if (isset($pdo)) {
    $stmt = $pdo->prepare("SELECT * FROM registration WHERE username = :username LIMIT 1");
    $stmt->execute(['username' => $username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  } else {
    // Fallback for mysqli prepared query
    $stmt = mysqli_prepare($conn, "SELECT * FROM registration WHERE username = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res);
  }
} catch (Exception $e) {
  error_log("Deposit fetch error: " . $e->getMessage());
  $row = [];
}

// 3. Collect Form Post Inputs
$package = trim($_POST['package'] ?? '');
$payment_method = trim($_POST['payment_method'] ?? '');
$amount = floatval($_POST['amount'] ?? 0);

// 4. Define Active 3-Tier Profit Rates
$profitRates = [
  'Starter Plan' => 0.02,  // 2.0% Daily
  'Growth Plan'  => 0.035, // 3.5% Daily
  'Premium Plan' => 0.05   // 5.0% Daily
];

// 5. Calculate Expected Daily Profit
$rate = $profitRates[$package] ?? 0.00;
$profit = $amount * $rate;

// Format numeric values for display rendering
$profit_display = number_format($profit, 2);
$amount_display = number_format($amount, 2);

// 6. Complete Crypto Wallet Destination Addresses Mapping
$walletAddresses = [
  'Bitcoin'    => 'bc1qrzdnsecuv6j5yxapf2d879rt05hd52zltghc8n',
  'Ethereum'   => '0xd201F741769d742b52bCAc919b700DF6e692a380',
  'USDT'       => 'TQGoQYn54VzUgB8RumRMuLnyAisS31yoqW',       // TRC20
  'USDC_ERC20' => '0x7Cbfb53dD3fa08ac98c92cca034e0Cc0Ea7703BD',
  'USDT_ERC20' => '0x7Cbfb53dD3fa08ac98c92cca034e0Cc0Ea7703BD', // ERC20
  'Tron'       => 'TQGoQYn54VzUgB8RumRMuLnyAisS31yoqW'        // TRX
];

// Retrieve matching address or default to 'N/A'
$walletAddress = $walletAddresses[$payment_method] ?? 'N/A';

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

  <title>Confirm Deposit | Altium Capitals.</title>
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
            <a href="http://localhost/Altium Capitals/" class="menu-link">
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

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y py-4">

            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
              <div>
                <h4 class="fw-extrabold mb-1 text-dark">Deposit Confirmation</h4>
                <p class="text-muted small mb-0">Verify your transaction specifications and send payment to the designated vault wallet.</p>
              </div>
              <a href="deposit" class="btn btn-outline-secondary btn-sm fw-bold px-3 py-2 rounded-3">
                <i class="bx bx-arrow-back me-1"></i> Return
              </a>
            </div>

            <!-- Main Confirmation Card -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden border max-w-4xl mx-auto" style="background: #ffffff; border-color: #e2e8f0 !important;">

              <!-- Card Header -->
              <div class="card-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <div class="w-8 h-8 rounded-2 bg-primary text-white d-flex align-items-center justify-content-center me-2">
                    <i class="bx bx-receipt fs-5"></i>
                  </div>
                  <h5 class="mb-0 fw-bold text-white">Review Investment Details</h5>
                </div>
                <span class="badge bg-warning text-dark font-mono fw-bold">Awaiting Payment</span>
              </div>

              <div class="card-body p-4 p-md-5">

                <!-- Summary Instruction Alert -->
                <div class="alert alert-primary-subtle border border-primary-subtle rounded-3 p-3 mb-4 d-flex align-items-center" role="alert">
                  <i class="bx bx-info-circle fs-4 me-3 text-primary"></i>
                  <div class="small text-dark">
                    <strong>Important:</strong> Please transfer the exact amount specified below to the assigned wallet address. Your active deposit will be credited automatically upon block network confirmation.
                  </div>
                </div>

                <div class="row g-4 align-items-center">

                  <!-- QR Code & Address Side Box -->
                  <div class="col-lg-4 text-center border-end-lg pe-lg-4">
                    <div class="p-3 bg-light rounded-4 border d-inline-block shadow-sm mb-3">
                      <!-- Dynamic QR Code API -->
                      <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=<?php echo urlencode($walletAddress); ?>" alt="Payment QR Code" class="img-fluid rounded-2" style="width: 160px; height: 160px;">
                    </div>
                    <span class="d-block text-uppercase text-muted fw-bold mb-1" style="font-size: 0.72rem;">Scan QR for Instant Transfer</span>
                    <span class="badge bg-dark-subtle text-dark fw-bold font-mono px-3 py-1.5 rounded-pill"><?php echo htmlspecialchars($payment_method); ?></span>
                  </div>

                  <!-- Deposit Details Summary Table -->
                  <div class="col-lg-8">
                    <div class="table-responsive rounded-3 border">
                      <table class="table table-hover align-middle mb-0">
                        <tbody>
                          <tr>
                            <th class="bg-light text-secondary uppercase font-mono small py-3" style="width: 40%;">Investment Plan</th>
                            <td class="fw-bold text-dark py-3">
                              <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-1.5 rounded-pill">
                                <?php echo htmlspecialchars($package); ?>
                              </span>
                            </td>
                          </tr>
                          <tr>
                            <th class="bg-light text-secondary uppercase font-mono small py-3">Expected Daily Return</th>
                            <td class="text-success fw-extrabold py-3">$<?php echo $profit_display; ?></td>
                          </tr>
                          <tr>
                            <th class="bg-light text-secondary uppercase font-mono small py-3">Principal Return</th>
                            <td class="fw-bold text-dark py-3"><i class="bx bx-check-circle text-success me-1"></i> Yes (100% Guaranteed)</td>
                          </tr>
                          <tr>
                            <th class="bg-light text-secondary uppercase font-mono small py-3">Principal Lock Period</th>
                            <td class="fw-bold text-muted py-3">Plan Matures at Term End</td>
                          </tr>
                          <tr>
                            <th class="bg-light text-secondary uppercase font-mono small py-3">Deposit Amount</th>
                            <td class="fw-extrabold text-dark fs-5 py-3">$<?php echo $amount_display; ?></td>
                          </tr>
                          <tr>
                            <th class="bg-light text-secondary uppercase font-mono small py-3">Payment Method</th>
                            <td class="fw-bold text-dark py-3"><?php echo htmlspecialchars($payment_method); ?></td>
                          </tr>
                          <tr>
                            <th class="bg-light text-secondary uppercase font-mono small py-3">Target Wallet Address</th>
                            <td class="py-3">
                              <div class="d-flex align-items-center justify-content-between bg-light p-2 rounded-3 border">
                                <code class="text-dark fw-bold text-break font-mono me-2" id="walletAddress" style="font-size: 0.85rem;">
                                  <?php echo htmlspecialchars($walletAddress); ?>
                                </code>
                                <button type="button" class="btn btn-sm btn-primary fw-bold px-3 flex-shrink-0" id="copyAddressBtn" onclick="copyWalletAddress('<?php echo htmlspecialchars($walletAddress); ?>')">
                                  <i class="bx bx-copy me-1"></i> <span id="btnCopyText">Copy</span>
                                </button>
                              </div>
                              <div class="mt-2 text-danger small fw-bold">
                                <i class="bx bx-error-circle me-1"></i> Send funds to this address before clicking "Confirm Transfer".
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>

                <!-- Copy Success Alert Toast -->
                <div id="copyAlert" class="alert alert-success text-center py-2.5 mt-4 rounded-3 shadow-sm border border-success-subtle" style="display: none; font-size: 0.9rem;">
                  <i class="bx bx-check-circle me-1"></i> Wallet destination address copied to clipboard!
                </div>

                <!-- Action Form -->
                <form action="proc_deposit" method="POST" class="mt-5 border-top pt-4" onsubmit="return confirm('Have you completed the cryptocurrency transfer to the wallet address shown above?');">
                  <input type="hidden" name="package" value="<?php echo htmlspecialchars($package); ?>">
                  <input type="hidden" name="payment_method" value="<?php echo htmlspecialchars($payment_method); ?>">
                  <input type="hidden" name="amount" value="<?php echo htmlspecialchars($amount); ?>">

                  <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                    <button type="submit" class="btn btn-primary px-5 py-3 fw-extrabold rounded-3 shadow-sm hover-shadow" style="background-color: #3b82f6; border: none;">
                      <i class="bx bx-check-circle me-1 fs-5"></i> Confirm Transfer Paid
                    </button>
                    <a href="deposit" class="btn btn-light border px-4 py-3 fw-bold text-secondary rounded-3">
                      <i class="bx bx-x-circle me-1"></i> Cancel Transaction
                    </a>
                  </div>
                </form>

              </div>
            </div>

          </div>
        </div>

        <!-- Copy JavaScript Logic -->
        <script>
          function copyWalletAddress(addressText) {
            navigator.clipboard.writeText(addressText).then(() => {
              const alertBox = document.getElementById('copyAlert');
              const btnText = document.getElementById('btnCopyText');
              const copyBtn = document.getElementById('copyAddressBtn');

              btnText.innerText = "Copied!";
              copyBtn.classList.remove('btn-primary');
              copyBtn.classList.add('btn-success');
              alertBox.style.display = 'block';

              setTimeout(() => {
                btnText.innerText = "Copy";
                copyBtn.classList.remove('btn-success');
                copyBtn.classList.add('btn-primary');
                alertBox.style.display = 'none';
              }, 3000);
            }).catch(err => {
              console.error('Failed to copy text: ', err);
            });
          }
        </script>





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

          function copyWalletAddress(address) {
            navigator.clipboard.writeText(address).then(() => {
              const alertBox = document.getElementById('copyAlert');
              alertBox.style.display = 'block';
              // Hide alert after 2 seconds
              setTimeout(() => {
                alertBox.style.display = 'none';
              }, 2000);
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