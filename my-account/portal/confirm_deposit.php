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


// Collect inputs
$package = $_POST['package'] ?? '';
$payment_method = $_POST['payment_method'] ?? '';
$amount = floatval($_POST['amount'] ?? 0);

// Define profit rates per plan
$profitRates = [
    'BASIC PLAN' => 0.10,
    'STANDARD PLAN' => 0.15,
    'SILVER PLAN' => 0.30,
    'GOLD PLAN' => 0.45
];

// Calculate profit
$profit = isset($profitRates[$package]) ? $amount * $profitRates[$package] : 0.00;

// Format for display
$profit_display = number_format($profit, 2);
$amount_display = number_format($amount, 2);

// Define wallet addresses for each payment method
$walletAddresses = [
    'Bitcoin' => 'bc1qrzdnsecuv6j5yxapf2d879rt05hd52zltghc8n',
    'Ethereum' => '0xd201F741769d742b52bCAc919b700DF6e692a380',
    'USDT' => 'TQGoQYn54VzUgB8RumRMuLnyAisS31yoqW',
    'USDC_ERC20' => '0x7Cbfb53dD3fa08ac98c92cca034e0Cc0Ea7703BD'
];

// Get wallet address based on selected method
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
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Confirm Deposit | Sovereign Nexar Capital</title>
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
      rel="stylesheet"
    />

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
                <img src="./img/logo (3).png" alt="" width="120px">
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
                class="menu-link"
              >
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
            id="layout-navbar"
          >
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
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../../account/<?php echo ($row['passport']); ?>" alt class="rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../../account/<?php echo ($row['passport']); ?>" alt class="rounded-circle" />
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
  <div class="container-xxl flex-grow-1 container-p-y">

    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="fw-bold mb-0 text-primary">Deposit Confirmation</h4>
      <a href="deposit" class="btn btn-outline-secondary btn-sm">
        <i class="bx bx-arrow-back me-1"></i> Back
      </a>
    </div>

    <!-- Confirmation Card -->
    <div class="card shadow-sm border-0">
      <div class="card-header text-white">
        <h5 class="mb-0 fw-semibold">Review Your Deposit Details</h5>
      </div>
      <div class="card-body p-4">

        <!-- Summary Banner -->
        <div class="alert alert-info mb-4 text-center rounded-3">
          <strong>Note:</strong> Please review the details carefully before confirming your deposit.
        </div>

        <!-- Deposit Summary Table -->
    <div class="table-responsive"> 
  <table class="table table-bordered align-middle mb-4">
    <tbody>
      <tr>
        <th class="bg-light" style="width: 40%">Investment Plan</th>
        <td><?php echo htmlspecialchars($package); ?></td>
      </tr>
      <tr>
        <th class="bg-light">Expected Profit</th>
        <td class="text-success fw-semibold">$<?php echo $profit_display; ?></td>
      </tr>
      <tr>
        <th class="bg-light">Principal Return</th>
        <td>Yes</td>
      </tr>
      <tr>
        <th class="bg-light">Principal Withdraw</th>
        <td>Not Available</td>
      </tr>
      <tr>
        <th class="bg-light">Deposit Amount</th>
        <td class="fw-semibold text-dark">$<?php echo $amount_display; ?></td>
      </tr>
      <tr>
        <th class="bg-light">Payment Method</th>
        <td><?php echo htmlspecialchars($payment_method); ?></td>
      </tr>
      <tr>
        <th class="bg-light">Wallet Address</th>
        <td>
          <div class="d-flex align-items-center justify-content-between">
            <span class="text-dark fw-semibold" id="walletAddress">
              <?php echo htmlspecialchars($walletAddress); ?>
            </span>
            <button type="button" class="btn btn-sm btn-outline-primary ms-2"
              onclick="copyWalletAddress('<?php echo htmlspecialchars($walletAddress); ?>')">
              Copy
            </button>
          </div>
          <small class="text-danger">Copy the address and make payment into it, before clicking on the confirm deposit button</small>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<!-- Copy success alert -->
<div id="copyAlert" class="alert alert-success text-center py-2 mt-3" 
     style="display:none; font-size:14px;">
  ✅ Wallet address copied successfully!
</div>

        <!-- Action Buttons -->
        <form action="proc_deposit" method="POST" 
      onsubmit="return confirm('Are you sure you have made the transfer and want to proceed?');">
  <input type="hidden" name="package" value="<?php echo htmlspecialchars($package); ?>">
  <input type="hidden" name="payment_method" value="<?php echo htmlspecialchars($payment_method); ?>">
  <input type="hidden" name="amount" value="<?php echo htmlspecialchars($amount); ?>">

  <div class="text-center mt-3">
    <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold me-2">
      <i class="bx bx-check-circle me-1"></i> Confirm Deposit
    </button>
    <a href="deposit" class="btn btn-outline-secondary px-4 py-2">
      <i class="bx bx-x-circle me-1"></i> Cancel
    </a>
  </div>
</form>


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
                                    label: function (context) {
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