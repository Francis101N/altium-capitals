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

</html>

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Customer Care | Mapleaf Capital.</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="./img/trust-icon.png" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

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
  <!-- Load Font Awesome (must be in <head> or before </body>) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-KN+W/6o0C0J9mPIu8nZgA8ajEV0g+UcfmD9u9qJTTmYy4lY0muQX9vSleR4Zy1zLznjNQ3j+eB+Z9e1A7JQHgA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
    }

    .card {
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    }

    .profile-img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #e9ecef;
    }

    .message-button {
      background-color: #128C7E;
      /* WhatsApp green */
      color: #fff;
      font-weight: 600;
      border: none;
      text-decoration: none;
      padding: 12px 25px;
      transition: all 0.3s ease;
    }

    .message-button:hover {
      background-color: #0d6e63;
      /* darker green on hover */
      color: #fff;
      box-shadow: 0 4px 10px rgba(18, 140, 126, 0.4);
      transform: translateY(-2px);
    }
  </style>
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
              <img src="./img/mapleaf-logo.png" alt="" width="130px">
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
            <a href="https://mapleafcapital.com/" class="menu-link">
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
          <li class="menu-item active">
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
                    <a class="dropdown-item"
                      href="logout"
                      onclick="return confirm('Are you sure you want to log out of your account?');">
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


        <br>

        <!-- Breadcrumb Header -->
        <div class="py-3 px-4 mb-4 bg-light border-bottom d-flex align-items-center justify-content-between">
          <h5 class="fw-bold mb-0 text-dark">
            <span class="text-muted fw-normal">Customer Service /</span> Help Desk
          </h5>
          <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1.5 rounded-pill fw-bold">
            <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i> Representatives Online
          </span>
        </div>

        <div class="container py-4">
          <!-- Section Title -->
          <div class="text-center mb-5">
            <div class="py-2 px-4 rounded-3 d-inline-block shadow-sm" style="background-color: #3b82f6;">
              <h3 class="m-0 fw-extrabold text-white tracking-wide text-uppercase" style="font-size: 1.25rem;">
                SUPPORT REPRESENTATIVE
              </h3>
            </div>
            <p class="text-muted small mt-2 max-w-lg mx-auto">
              We are dedicated to providing 24/7 client assistance. Reach out to your assigned portfolio representative below.
            </p>
          </div>

          <!-- Representative Card -->
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
              <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 text-center bg-white border" style="border-color: #e2e8f0 !important;">

                <!-- Profile Avatar -->
                <div class="position-relative d-inline-block mx-auto mb-3">
                  <img src="../../assets/img/avatars/1.png" alt="Customer Support" class="rounded-circle img-thumbnail shadow-sm" style="width: 110px; height: 110px; object-fit: cover;">
                  <span class="position-absolute bottom-0 end-0 p-2 bg-success border border-white rounded-circle">
                    <span class="visually-hidden">Online Status</span>
                  </span>
                </div>

                <!-- Name & Role -->
                <h4 class="fw-extrabold text-dark mb-1"><?php echo htmlspecialchars($contact_name ?? 'Mapleaf Capital Support Agent', ENT_QUOTES, 'UTF-8'); ?></h4>
                <p class="text-muted small fw-semibold uppercase tracking-wider mb-4">Dedicated Account Specialist</p>

                <!-- Contact Information List -->
                <div class="p-3 bg-light rounded-3 mb-4 border text-start space-y-2">
                  <div class="d-flex align-items-center justify-content-between py-1 border-bottom">
                    <span class="text-muted small fw-bold"><i class="bi bi-telephone text-primary me-2"></i>Phone Support:</span>
                    <a href="tel:+13213959088" class="text-decoration-none fw-bold text-dark small">+1 (321) 395‑9088</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-between py-1 border-bottom">
                    <span class="text-muted small fw-bold"><i class="bi bi-envelope text-primary me-2"></i>Email Address:</span>
                    <a href="mailto:<?php echo htmlspecialchars($contact_email ?? 'support@mapleafcapitals.com', ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none fw-bold text-dark small">
                      <?php echo htmlspecialchars($contact_email ?? 'support@mapleafcapitals.com', ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                  </div>

                  <div class="d-flex align-items-center justify-content-between py-1">
                    <span class="text-muted small fw-bold"><i class="bi bi-shield-check text-primary me-2"></i>Status:</span>
                    <span class="badge bg-success-subtle text-success fw-bold px-2.5 py-1 rounded-pill">Active & Ready</span>
                  </div>
                </div>

                <!-- WhatsApp Contact Button -->
                <a href="https://wa.me/13213959088"
                  class="btn btn-success btn-lg w-100 fw-bold rounded-pill shadow-sm hover-shadow d-flex align-items-center justify-content-center py-3"
                  target="_blank"
                  rel="noopener noreferrer"
                  style="background-color: #25d366; border: none; color: #fff;">
                  <i class="bi bi-whatsapp me-2 fs-5"></i>
                  Message on WhatsApp
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl py-2 d-flex justify-content-center text-center">
          <div>
            &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            , <strong>Mapleaf Capital.</strong>
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