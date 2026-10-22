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

$current_user = $_SESSION['account_user']; // or however you store the logged-in username

$query = "SELECT * FROM registration WHERE ref = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $current_user);
$stmt->execute();
$results = $stmt->get_result();


$sql = "SELECT COUNT(*) AS total_referrals, 
               SUM(total_referral_bonus) AS total_earnings
        FROM registration
        WHERE ref = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
  die("Query error: " . $conn->error);
}

$stmt->bind_param("s", $current_user);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Step 2: Assign default values
$total_referrals = $data['total_referrals'] ?? 0;
$total_earnings = $data['total_earnings'] ?? 0.00;

// Step 3: Determine referral level dynamically
if ($total_referrals >= 20 || $total_earnings >= 200) {
  $referral_level = "Level 3 (20%)";
} elseif ($total_referrals >= 10 || $total_earnings >= 100) {
  $referral_level = "Level 2 (15%)";
} elseif ($total_referrals >= 5 || $total_earnings >= 50) {
  $referral_level = "Level 1 (10%)";
} else {
  $referral_level = "Starter (0%)";
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

</html>

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Referrals | Altium Capitals.</title>

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
    padding: 20px;
    border-radius: 6px;
    margin-bottom: 25px;
  }

  .info-box h5 {
    color: #2e95c4;
    font-weight: bold;
  }

  .ref-link {
    font-size: 0.95rem;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .ref-link input {
    border: none;
    outline: none;
    width: 100%;
  }

  .copy-btn {
    background-color: #2e95c4;
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
  }

  .copy-btn:hover {
    background-color: #1a74da;
  }

  .table thead th {
    background-color: #f8f9fa;
    color: #333;
  }

  .card {
    transition: all 0.3s ease;
  }

  .card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  }

  .no-referrals {
    text-align: center;
    padding: 20px;
    color: #6c757d;
    font-style: italic;
    background-color: #f8f9fa;
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

          <li class="menu-item active">
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
                  REFERRAL PROGRAM
                </h3>
              </div>
              <p class="text-muted small mt-2 max-w-lg mx-auto">
                Earn a 10% instant commission when your invited partners register and fund an active investment plan.
              </p>
            </div>

            <!-- Referral Summary Cards -->
            <div class="row g-4 mb-5 max-w-5xl mx-auto">

              <!-- Total Referrals -->
              <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center bg-white border" style="border-color: #e2e8f0 !important;">
                  <div class="w-10 h-10 rounded-circle bg-primary-subtle text-primary mx-auto mb-2 d-flex align-items-center justify-content-center">
                    <i class="bx bx-group fs-4"></i>
                  </div>
                  <span class="d-block text-uppercase text-muted fw-bold mb-1" style="font-size: 0.75rem;">Total Partners Referred</span>
                  <h3 class="fw-extrabold text-dark m-0">
                    <?php echo htmlspecialchars($total_referrals ?? 0, ENT_QUOTES, 'UTF-8'); ?>
                  </h3>
                </div>
              </div>

              <!-- Total Referral Earnings -->
              <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center bg-white border" style="border-color: #e2e8f0 !important;">
                  <div class="w-10 h-10 rounded-circle bg-success-subtle text-success mx-auto mb-2 d-flex align-items-center justify-content-center">
                    <i class="bx bx-dollar-circle fs-4"></i>
                  </div>
                  <span class="d-block text-uppercase text-muted fw-bold mb-1" style="font-size: 0.75rem;">Total Commissions Earned</span>
                  <h3 class="fw-extrabold text-success m-0">
                    $<?php echo number_format((float)($total_earnings ?? 0), 2); ?>
                  </h3>
                </div>
              </div>

              <!-- Referral Level -->
              <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center bg-white border" style="border-color: #e2e8f0 !important;">
                  <div class="w-10 h-10 rounded-circle bg-warning-subtle text-warning mx-auto mb-2 d-flex align-items-center justify-content-center">
                    <i class="bx bx-award fs-4"></i>
                  </div>
                  <span class="d-block text-uppercase text-muted fw-bold mb-1" style="font-size: 0.75rem;">Commission Tier Level</span>
                  <h3 class="fw-extrabold text-primary m-0">
                    <?php echo htmlspecialchars($referral_level ?? 'Tier 1 (10%)', ENT_QUOTES, 'UTF-8'); ?>
                  </h3>
                </div>
              </div>

            </div>

            <!-- Referral Link Box -->
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white border max-w-5xl mx-auto mb-5" style="border-color: #e2e8f0 !important;">
              <div class="d-flex align-items-center mb-3">
                <div class="w-10 h-10 rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center me-3">
                  <i class="bx bx-link-alt fs-4"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-0">Your Unique Referral Link</h5>
                  <p class="text-muted small mb-0">Share this link to automatically attribute new investor signups to your account.</p>
                </div>
              </div>

              <!-- Dynamic URL input with copy button -->
              <?php
              $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
              $domain = $_SERVER['HTTP_HOST'];
              $referral_url = $protocol . $domain . "/account/register?ref=" . urlencode($row['username'] ?? '');
              ?>
              <div class="input-group input-group-lg mb-2">
                <input type="text" id="refLink" class="form-control bg-light font-mono text-dark fw-bold border-end-0 fs-6" readonly value="<?php echo htmlspecialchars($referral_url, ENT_QUOTES, 'UTF-8'); ?>">
                <button class="btn btn-primary fw-bold px-4" type="button" id="copyBtn" onclick="copyReferralLink()">
                  <i class="bx bx-copy me-1" id="copyIcon"></i> <span id="copyText">Copy Link</span>
                </button>
              </div>
              <small class="text-muted">
                <i class="bx bx-info-circle me-1"></i> When your referred contacts register and make a deposit, your 10% bonus is instantly credited to your available balance.
              </small>
            </div>

            <!-- Referral History Table -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden max-w-5xl mx-auto border" style="border-color: #e2e8f0 !important;">
              <div class="card-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <i class="bx bx-user-check fs-4 me-2 text-primary"></i>
                  <h5 class="mb-0 fw-bold text-white">Referred Partners History</h5>
                </div>
                <span class="badge bg-secondary font-mono">Direct Downline</span>
              </div>

              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-hover align-middle text-center mb-0">
                    <thead class="bg-light text-muted uppercase font-mono" style="font-size: 0.75rem;">
                      <tr>
                        <th class="py-3">#</th>
                        <th class="py-3">Partner Username</th>
                        <th class="py-3">Email Address</th>
                        <th class="py-3">Registration Date</th>
                        <th class="py-3">Commission Earned ($)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($results) && $results->num_rows > 0) {
                        $count = 1;
                        while ($row2 = $results->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td class='fw-bold text-muted'>{$count}</td>";
                          echo "<td class='fw-bold text-dark'>" . htmlspecialchars($row2['username'], ENT_QUOTES, 'UTF-8') . "</td>";
                          echo "<td class='small text-muted'>" . htmlspecialchars($row2['email'], ENT_QUOTES, 'UTF-8') . "</td>";
                          echo "<td class='small font-mono text-secondary'>" . date('d M Y, H:i', strtotime($row2['date_created'])) . "</td>";
                          echo "<td class='fw-bold text-success'>$" . number_format((float)($row2['total_referral_bonus'] ?? 0), 2) . "</td>";
                          echo "</tr>";
                          $count++;
                        }
                      } else {
                        echo "<tr><td colspan='5' class='py-4 text-muted'><i class='bx bx-info-circle me-1'></i> You haven’t referred any investors yet. Share your link above to begin earning commissions.</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Copy Link Script -->
        <script>
          function copyReferralLink() {
            const refInput = document.getElementById("refLink");
            const copyBtn = document.getElementById("copyBtn");
            const copyText = document.getElementById("copyText");
            const copyIcon = document.getElementById("copyIcon");

            refInput.select();
            refInput.setSelectionRange(0, 99999); // Mobile device support

            navigator.clipboard.writeText(refInput.value).then(() => {
              copyText.innerText = "Copied!";
              copyIcon.className = "bx bx-check me-1";
              copyBtn.classList.remove("btn-primary");
              copyBtn.classList.add("btn-success");

              setTimeout(() => {
                copyText.innerText = "Copy Link";
                copyIcon.className = "bx bx-copy me-1";
                copyBtn.classList.remove("btn-success");
                copyBtn.classList.add("btn-primary");
              }, 2500);
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
        </script>

        <script>
          function copyLink() {
            const refInput = document.getElementById('refLink');
            refInput.select();
            refInput.setSelectionRange(0, 99999);
            document.execCommand('copy');
            alert('Referral link copied to clipboard!');
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