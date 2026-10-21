<?php
session_start();

include('connect.php');
require_once('fns.php');

if(!$_SESSION['ibnk_user'])
{
    $error = 'Session Expired';
      include('index.php');
      exit;
}


	$que = "select * from $tab_account where username = '".$_SESSION['ibnk_user']."'";
	$res = mysqli_query($conn, $que);
	$row = mysqli_fetch_array($res);



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Secured Internet Banking App - Funds Transfer</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    $(function() {

        var availableTags = [<?php echo $bank_list; ?>];
        $("#bank_name").autocomplete({
            source: availableTags
        });
    });
    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('side-nav.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('top-bar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Funds Transfer</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <img src="img/btc-banner.jpg" class="img-responsive" style="width: 100%;"><br><br>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                            Add funds to account using BTC

                            <form action="wallet-address.php" method="post">

                                <?php if($error) { ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php } ?>

                                <table class="table table-bordered table-hover">
                                    <tr class="field-area">
                                        <td colspan="3">
                                            <div class="padding-top-10">Load my Account:</div>

                                            <div class="position-relative margin-top-3"><select autocomplete="off"
                                                    class="form-control" id="login_id" maxlength="20" name="login1"
                                                    style="border-radius:0px" tabindex="1">
                                                    <option value="">Select Account</option>
                                                    <option value="<?php echo ($row['accountnumber']); ?>">
                                                        <?php echo ($row['accountnumber']); ?> - Main Account</option>
                                                    <!--<option value="">(**** **** **** 9876) - Credit Card</option>-->
                                                </select>

                                                <div class="js-error"></div>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr class="field-area">
                                        <td colspan="3">
                                            <div class="padding-top-10">Amount in Dollars:</div>

                                            <div class="position-relative margin-top-3"><input autocomplete="off"
                                                    class="form-control" id="login_id" name="amount" required
                                                    style="border-radius:0px" tabindex="1" type="text"
                                                    value="<?php echo $amount; ?>">
                                                <div class="js-error"></div>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="3">
                                            <div class="position-relative margin-top-15"><input class="btn btn-danger"
                                                    tabindex="4" type="submit" value="Proceed to Fund Account"></div>
                                        </td>
                                    </tr>

                                </table>
                                <input type="hidden" name="youraccount" value="<?php echo ($row['accountnumber']); ?>">
                            </form>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">

                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?php echo organisation().' '.date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>