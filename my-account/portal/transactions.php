<?php
session_start();

include('connect.php');
require_once('fns.php');

if(!$_SESSION['account_user'])
{
    $error = 'Session Expired';
      include('index.php');
      exit;
}


	$que = "select * from $tab_account where username = '".$_SESSION['account_user']."'";
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
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Account Transactions | Altium Capitals</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/icon.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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
                <img src="../assets/img/logo.png" alt="" width="180px">
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
              <a href="http://localhost/francis-ibnk/" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Homepage">Home Page</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-grid-alt"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">TRANSACTION</span>
            </li>

            <li class="menu-item active">
              <a href="transactions.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                 <div data-i18n="#">Account Transactions</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="transfer.php?type=own" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-transfer"></i>
                 <div data-i18n="#">Transfer to Altium Capitals</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="transfer.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer"></i>
                 <div data-i18n="#">Transfer to 3rd Party</div>
              </a>
            </li>
            
            <!-- information -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">INFORMATION</span></li>
          
            <li class="menu-item">
              <a href="account-profile.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-id-card"></i>
                <div data-i18n="Basic">Personal Info</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="update_password.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-lock"></i>
                <div data-i18n="Basic">Change Password</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="logout.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Basic">Logout</div>
              </a>
            </li>

            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
            <li class="menu-item">
              <a
                href="customer-care.php"
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
                      <img src="../assets/img/<?php echo ($row['image']); ?>" alt class="rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                             <img src="../assets/img/<?php echo ($row['image']); ?>" alt class="rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $_SESSION['fullname'];?></span>
                            <small class="text-muted">User</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="account-profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="update_password.php">
                        <i class="menu-icon tf-icons bx bx-lock"></i>
                        <span class="align-middle">Change Password</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
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
             <br>

            <div class="container-xxl flex-grow-1 container-p-y">
              <h3 class="fw-bolder mb-4"><span class="text-muted fw-bold">Transaction History & Bank Statement</h3>
              <h5 class="fw-light">View all your banking transactions here. You can filter by date and print transaction receipts as needed.</h5>
              <br>

              <div class="row">
                <div class="first col-12 col-lg-6 ">
                  <span>Account Number: </span><span><b><?php echo $row['accountnumber']; ?></b></span><br><br>
                  <span>Account Holder: </span><span><b><?php echo $row['firstname']; echo' '; echo $row['lastname']; ?></b></span><br><br>
                  <span>Account Balance: </span><span><b><?php echo acc_bal($row['accountnumber']); ?></b></span><br><br>
                </div>
                <div class="second col-12 col-lg-6">
                 <form action="generate-statement/index.php" method="post" onSubmit="return confirm('Confirm you want to print statement of account?');">
                  <span>From: </span><input type="date" name="from" required>
                  <span>To: </span><input type="date" name="to" required><br><br>
                   <div>
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Statement of Account
                                                </button>
                                                <button type="reset" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                    </div>
                 </form>
                    <br><br>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">

                   <!-- Hoverable Table rows -->
              <div class="card bg-dark">
                <h5 class="card-header text-end text-success fw-bolder fs-4"><strong><?php echo acc_bal($row['accountnumber']); ?></strong></h5>
                <form class="row border-top-3">
                    <div class="first col-12 col-lg-6 ps-5">
                       <label for="show" class="text-light">Show</label>
                        <select name="show-entries" id="show-entries" class="ps-2 pe-2 pt-1 pb-1">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> <span class="text-light">entries</span>
                    </div>
                    <div class="second col-12 col-lg-6 text-end pe-5">
                       <label for="search" class="text-light">Search: </label>
                       <input type="text" name="search" id="search">
                    </div>
                </form>
                <br>
                <div class="table-responsive text-nowrap">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>IMAGE</th>
                        <th>DATE / TIME</th>
                        <th>REFERENCE</th>
                        <th>TYPE OF TRANSACTION</th>
                        <th>DEBIT ($)</th>
                        <th>CREDIT ($)</th>
                        <th>STATUS</th>
                        <th></th>
                      </tr>
                    </thead>
                     <tfoot>
                     <tr>
                        <th>#</th>
                        <th>IMAGE</th>
                        <th>DATE / TIME</th>
                        <th>REFERENCE</th>
                        <th>TYPE OF TRANSACTION</th>
                        <th>DEBIT ($)</th>
                        <th>CREDIT ($)</th>
                        <th>STATUS</th>
                        <th></th>
                      </tr>
                     </tr>
                                    
                    </tfoot>
                    <tbody class="table-border-bottom-0">
                        <?php
// Fetch transactions for the user's account
$query_t = "SELECT * FROM $tab_transact WHERE accountnumber = '" . mysqli_real_escape_string($conn, $row['accountnumber']) . "'";
$result_t = mysqli_query($conn, $query_t);

if (mysqli_num_rows($result_t) > 0) {
    $i = 1;
    while ($row_t = mysqli_fetch_assoc($result_t)) {
?>
<tr>
  <td><?php echo $i++; ?></td>

  <td>
    <div class="m-r-10">
      <img src="img/product-pic.jpg" alt="transaction" class="rounded" width="45">
    </div>
  </td>

  <td><?php echo htmlspecialchars($row_t['date_time']); ?></td>
  <td><?php echo htmlspecialchars($row_t['reference']); ?></td>
  <td><?php echo htmlspecialchars($row_t['description']); ?></td>
  <td><?php echo number_format($row_t['debit'], 2); ?></td>
  <td><?php echo number_format($row_t['credit'], 2); ?></td>

  <td>
    <span class="badge bg-label-success me-1">COMPLETED</span>
  </td>

  <td>
    <a href="generate-statement/?id=<?php echo urlencode($row_t['id']); ?>" 
       onclick="return confirm('Do you wish to proceed with printing this transaction?');"
       title="Print Transaction">
      <i class="bi bi-printer fw-bold fs-5 " style="color:white;"></i>
    </a>
  </td>
</tr>
<?php
    }
}
?>
                                
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Hoverable Table rows -->


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
      , <strong>Altium Capitals Saving.</strong>
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