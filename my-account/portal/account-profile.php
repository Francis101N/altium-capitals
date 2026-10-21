<?php
ob_start();
session_start();

error_reporting(0);
ini_set('display_errors', 0);

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

  <title>Account Profile | Sovereign Nexar Capital</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="./img/" />

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

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
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
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Information /</span> My Profile</h4>

            <div class="row">
              <div class="col-md-12">
                <ul class="nav nav-pills d-flex flex-row mb-3">
                  <li class="nav-item">
                    <a class="nav-link bg-primary active" href="javascript:void(0);">
                      <i class="bx bx-user me-1"></i> Account
                    </a>
                  </li>
                </ul>

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 border" style="background: #ffffff; border-color: #e2e8f0 !important;">

                  <!-- Card Header -->
                  <div class="card-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="w-8 h-8 rounded-2 bg-primary text-white d-flex align-items-center justify-content-center me-2">
                        <i class="bx bx-user-circle fs-5"></i>
                      </div>
                      <h5 class="mb-0 fw-bold text-white">Profile Details & Wallet Settings</h5>
                    </div>
                    <span class="badge bg-secondary font-mono">Account Profile</span>
                  </div>

                  <div class="card-body p-4">

                    <!-- Profile Photo & Account Meta Header -->
                    <div class="d-flex flex-column flex-sm-row align-items-center gap-4 pb-4 mb-4 border-bottom">
                      <div class="position-relative">
                        <img src="../../<?php echo htmlspecialchars($row['passport'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Photo" class="rounded-circle img-thumbnail shadow-sm" style="width: 100px; height: 100px; object-fit: cover;" />
                      </div>

                      <div class="flex-grow-1 text-center text-sm-start">
                        <h4 class="fw-extrabold text-dark mb-1">
                          <?php echo htmlspecialchars(($row['firstname'] ?? '') . ' ' . ($row['surname'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
                        </h4>
                        <div class="row g-2 mt-1">
                          <div class="col-12 col-sm-auto">
                            <span class="badge bg-light text-dark border px-3 py-1.5 font-mono">
                              <strong class="text-secondary">Account ID:</strong> <?php echo htmlspecialchars($row['account_id'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                          </div>
                          <div class="col-12 col-sm-auto">
                            <span class="badge bg-light text-dark border px-3 py-1.5 font-mono">
                              <strong class="text-secondary">Opened:</strong> <?php echo htmlspecialchars($row['date_created'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Alert Notifications -->
                    <?php if (isset($success) && $success): ?>
                      <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                        <i class="bx bx-check-circle me-1"></i> <?php echo htmlspecialchars($success, ENT_QUOTES, 'UTF-8'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>

                    <?php if (isset($error) && $error): ?>
                      <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                        <i class="bx bx-error-circle me-1"></i> <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>

                    <!-- Form Settings -->
                    <form id="formAccountSettings" method="POST" action="update_profile" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to update your profile details?')">

                      <div class="row g-3">
                        <!-- Username -->
                        <div class="col-md-6">
                          <label for="username" class="form-label fw-bold text-secondary small uppercase tracking-wider">Username</label>
                          <input class="form-control fw-semibold" type="text" name="username" id="username" value="<?php echo htmlspecialchars($row['username'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required />
                        </div>

                        <!-- Surname -->
                        <div class="col-md-6">
                          <label for="surName" class="form-label fw-bold text-secondary small uppercase tracking-wider">Surname</label>
                          <input class="form-control fw-semibold" type="text" name="lastName" id="surName" value="<?php echo htmlspecialchars($row['surname'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required />
                        </div>

                        <!-- First Name -->
                        <div class="col-md-6">
                          <label for="firstName" class="form-label fw-bold text-secondary small uppercase tracking-wider">First Name</label>
                          <input class="form-control fw-semibold" type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($row['firstname'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required />
                        </div>

                        <!-- Middle Name -->
                        <div class="col-md-6">
                          <label for="middleName" class="form-label fw-bold text-secondary small uppercase tracking-wider">Middle Name</label>
                          <input class="form-control fw-semibold" type="text" id="middleName" name="middleName" value="<?php echo htmlspecialchars($row['middlename'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" />
                        </div>

                        <!-- Sex -->
                        <div class="col-md-6">
                          <label for="sex" class="form-label fw-bold text-secondary small uppercase tracking-wider">Sex</label>
                          <input class="form-control bg-light fw-semibold" type="text" id="sex" name="sex" value="<?php echo htmlspecialchars($row['sex'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" readonly />
                        </div>

                        <!-- DOB -->
                        <div class="col-md-6">
                          <label for="dob" class="form-label fw-bold text-secondary small uppercase tracking-wider">Date of Birth</label>
                          <input class="form-control bg-light fw-semibold" type="text" id="dob" name="dob" value="<?php echo htmlspecialchars($row['dob'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" readonly />
                        </div>

                        <!-- Address -->
                        <div class="col-md-6">
                          <label for="address" class="form-label fw-bold text-secondary small uppercase tracking-wider">Address</label>
                          <input type="text" class="form-control fw-semibold" id="address" name="address" value="<?php echo htmlspecialchars($row['address'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" />
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                          <label for="email" class="form-label fw-bold text-secondary small uppercase tracking-wider">Email Address</label>
                          <input class="form-control fw-semibold" type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required />
                        </div>

                        <!-- Phone Number -->
                        <div class="col-md-6">
                          <label class="form-label fw-bold text-secondary small uppercase tracking-wider" for="phoneNumber">Phone Number</label>
                          <input type="text" id="phoneNumber" name="phoneNumber" class="form-control fw-semibold" value="<?php echo htmlspecialchars($row['phone'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" />
                        </div>

                        <!-- Crypto Wallet Section Divider -->
                        <div class="col-12 mt-4">
                          <h6 class="fw-bold text-dark border-bottom pb-2 mb-0">
                            <i class="bx bx-wallet me-1 text-primary"></i> Payout Crypto Wallet Addresses
                          </h6>
                        </div>

                        <!-- Bitcoin Address -->
                        <div class="col-md-6">
                          <label for="btc-address" class="form-label fw-bold text-secondary small uppercase tracking-wider">Bitcoin (BTC) Address</label>
                          <input type="text" class="form-control font-mono fw-semibold" id="btc-address" name="btc-address" value="<?php echo htmlspecialchars($row['bitcoin_address'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter BTC destination address" />
                        </div>

                        <!-- USDT Address -->
                        <div class="col-md-6">
                          <label for="usdt_address" class="form-label fw-bold text-secondary small uppercase tracking-wider">USDT Address (TRC20/ERC20)</label>
                          <input type="text" class="form-control font-mono fw-semibold" id="usdt_address" name="usdt_address" value="<?php echo htmlspecialchars($row['usdt_address'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter USDT destination address" />
                        </div>

                        <!-- ETH Address -->
                        <div class="col-md-6">
                          <label for="eth_address" class="form-label fw-bold text-secondary small uppercase tracking-wider">Ethereum (ETH) Address</label>
                          <input type="text" class="form-control font-mono fw-semibold" id="eth_address" name="eth_address" value="<?php echo htmlspecialchars(trim($row['eth_address'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter ETH destination address" />
                        </div>

                        <!-- USDC Address -->
                        <div class="col-md-6">
                          <label for="usdc_address" class="form-label fw-bold text-secondary small uppercase tracking-wider">USDC (ERC20) Address</label>
                          <input type="text" class="form-control font-mono fw-semibold" id="usdc_address" name="usdc_address" value="<?php echo htmlspecialchars(trim($row['usdcErc20_address'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter USDC destination address" />
                        </div>

                      </div>

                      <!-- Submit & Reset Buttons -->
                      <div class="mt-4 pt-3 border-top d-flex gap-2">
                        <button type="submit" class="btn btn-primary fw-bold px-4 py-2.5 shadow-sm" style="background-color: #3b82f6; border: none;">
                          <i class="bx bx-check-circle me-1"></i> Update Profile
                        </button>
                        <button type="reset" class="btn btn-light border fw-bold px-4 py-2.5">
                          <i class="bx bx-reset me-1"></i> Reset
                        </button>
                      </div>

                    </form>
                  </div>
                </div>



              </div>
            </div>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <!-- Footer -->
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

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../assets/js/pages-account-settings-account.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>