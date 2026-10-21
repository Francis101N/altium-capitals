<?php
session_start();
include('../connect.php');
require_once('../fns.php');

$start_date = date('Y-m-d',strtotime($_POST['start_date']));
$end_date = date('Y-m-d',strtotime($_POST['end_date']));



$now = date('U');
//
  $query = "select * from $tab_account where username='".$_SESSION['ibnk_user']."'";
  $result = mysqli_query($conn,$query);
  $num_results = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);



//work on transaction data here
if($_GET['id'])
{
	$query_t = "select * from $tab_transact where accountnumber='".$row['accountnumber']."' and id = '".$_GET['id']."'";
}elseif($end_date){
	$query_t = "select * from $tab_transact where accountnumber='".$row['accountnumber']."' and date_time between '".$_POST['start_date']."' and '".$end_date."' ORDER BY `id` ASC "; 
}else{
	$query_t = "select * from $tab_transact where accountnumber='".$row['accountnumber']."'";
}

  		  $result_t = mysqli_query($conn,$query_t);
  		  $num_results_t = mysqli_num_rows($result_t);

		  $rownum = 164;

		  for($i=1; $i<=$num_results_t; $i++)
		  {
          	$row_t = mysqli_fetch_array($result_t);
			  
			  $rownum = $rownum+10;

$transactions [] = '
<div style="position:absolute;left:44.00px;top:'.$rownum.'.00px" class="cls_006"><span class="cls_006">'.dDate($row_t['date_time']).'</span></div>
<div style="position:absolute;left:102.00px;top:'.$rownum.'.00px" class="cls_006"><span class="cls_006">'.dDate($row_t['date_time']).'</span></div>
<div style="position:absolute;left:147.00px;top:'.$rownum.'.00px" class="cls_006"><span class="cls_006">0'.$row_t['id'].$row_t['description'].'</span></div>
<div style="position:absolute;left:365.00px;top:'.$rownum.'.00px" class="cls_006"><span class="cls_006">0'.$row_t['id'].$row_t['reference'].'</span></div>
<div style="position:absolute;left:420.00px;top:'.$rownum.'.00px" class="cls_006"><span class="cls_006">'.number_format($row_t['credit'],2).'</span></div>
<div style="position:absolute;left:474.00px;top:'.$rownum.'.00px" class="cls_006"><span class="cls_006">'.number_format($row_t['debit'],2).'</span></div>
<div style="position:absolute;left:531.00px;top:'.$rownum.'.00px" class="cls_006"><span class="cls_006">'.number_format($row_t['balance'],2).'</span></div>';
			  
		 }

$transaction_data =  implode(' ',$transactions);

// reference the Dompdf namespace
use Dompdf\Dompdf;

require_once 'vendor/dompdf/dompdf/autoload.inc.php';
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->set_option('enable_html5_parser', TRUE);
$dompdf->loadHtml('<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<style type="text/css">
<!--
span.cls_003{font-family:Times,serif;font-size:7.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_003{font-family:Times,serif;font-size:7.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_004{font-family:Times,serif;font-size:7.0px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
div.cls_004{font-family:Times,serif;font-size:7.0px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
span.cls_002{font-family:Times,serif;font-size:7.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_002{font-family:Times,serif;font-size:7.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_005{font-family:Times,serif;font-size:6.0px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
div.cls_005{font-family:Times,serif;font-size:6.0px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
span.cls_006{font-family:Times,serif;font-size:6.0px;color:white;font-weight:normal;font-style:normal;text-decoration: none}
div.cls_006{font-family:Times,serif;font-size:6.0px;color:white;font-weight:normal;font-style:normal;text-decoration: none}
span.cls_007{font-family:Times,serif;font-size:5.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_007{font-family:Times,serif;font-size:5.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_009{font-family:Times,serif;font-size:6.0px;color:white;font-weight:bold;font-style:normal;text-decoration: none}
div.cls_009{font-family:Times,serif;font-size:6.0px;color:white;font-weight:bold;font-style:normal;text-decoration: none}
span.cls_012{font-family:Times,serif;font-size:6.0px;color:rgb(0,0,255);font-weight:normal;font-style:normal;text-decoration: underline}
div.cls_012{font-family:Times,serif;font-size:6.0px;color:rgb(0,0,255);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_011{font-family:Times,serif;font-size:8.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_011{font-family:Times,serif;font-size:8.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
-->
</style>
</head>
<body>
<div style="position:absolute;left:50%;margin-left:-306px;top:0px;width:612px;height:792px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="images/background1.jpg" width=612 height=792></div>
<div style="position:absolute;left:40.00px;top:4.00px" class="cls_003"><span class="cls_003">Account Statement - </span><span class="cls_004">'.$row['accountnumber'].'</span></div>
<div style="position:absolute;left:40.00px;top:15.00px" class="cls_003"><span class="cls_003">From</span></div>
<div style="position:absolute;left:60.75px;top:15.00px" class="cls_002"><span class="cls_002">'.get_date($row['accountnumber'],'ASC').'</span><span class="cls_003">   To  </span><span class="cls_002">'.get_date($row['accountnumber'],'DESC').'</span></div>
<div style="position:absolute;left:46.00px;top:53.00px" class="cls_002"><span class="cls_002">'.$row['firstname'].' '.$row['lastname'].'</span></div>
<div style="position:absolute;left:336.00px;top:53.00px" class="cls_002"><span class="cls_002">Account Number</span></div>
<div style="position:absolute;left:520.00px;top:53.00px" class="cls_005"><span class="cls_005">'.$row['accountnumber'].'</span></div>
<div style="position:absolute;left:46.00px;top:61.00px" class="cls_002"><span class="cls_002">'.$row['address'].', '.$row['city'].', '.$row['state'].'</span></div>
<div style="position:absolute;left:336.00px;top:64.00px" class="cls_002"><span class="cls_002">Currency</span></div>
<div style="position:absolute;left:455.00px;top:64.00px" class="cls_006"><span class="cls_006">'.get_data($row['accountnumber'],'currency','DESC').'</span></div>
<div style="position:absolute;left:336.00px;top:75.00px" class="cls_002"><span class="cls_002">Opening Balance</span></div>
<div style="position:absolute;left:455.00px;top:75.00px" class="cls_006"><span class="cls_006">'.get_data($row['accountnumber'],'credit','ASC').'</span></div>
<div style="position:absolute;left:46.00px;top:77.00px" class="cls_002"><span class="cls_002">'.$row['country'].'</span></div>
<div style="position:absolute;left:46.00px;top:85.00px" class="cls_002"><span class="cls_002"></span></div>
<div style="position:absolute;left:336.00px;top:86.00px" class="cls_002"><span class="cls_002">Total Debit</span></div>
<div style="position:absolute;left:455.00px;top:86.00px" class="cls_006"><span class="cls_006">'.acc_bal($row['accountnumber'],'debit').'</span></div>
<div style="position:absolute;left:336.00px;top:97.00px" class="cls_002"><span class="cls_002">Total Credit</span></div>
<div style="position:absolute;left:455.00px;top:97.00px" class="cls_006"><span class="cls_006">'.acc_bal($row['accountnumber'],'credit').'</span></div>
<div style="position:absolute;left:46.00px;top:105.00px" class="cls_007"><span class="cls_007">FWB/178/1118094057</span></div>
<div style="position:absolute;left:336.00px;top:108.00px" class="cls_002"><span class="cls_002">Closing Balance</span></div>
<div style="position:absolute;left:455.00px;top:108.00px" class="cls_006"><span class="cls_006">'.acc_bal($row['accountnumber']).'</span></div>
<div style="position:absolute;left:336.00px;top:119.00px" class="cls_002"><span class="cls_002">Debit Count</span></div>
<div style="position:absolute;left:455.00px;top:119.00px" class="cls_006"><span class="cls_006">'.count_transaction($row['accountnumber'],'debit').'</span></div>
<div style="position:absolute;left:46.00px;top:121.00px" class="cls_002"><span class="cls_002">700 W 47th street,</span></div>
<div style="position:absolute;left:46.00px;top:129.00px" class="cls_002"><span class="cls_002">Suite 500,Kansas City, Missouri 64112</span></div>
<div style="position:absolute;left:336.00px;top:130.00px" class="cls_002"><span class="cls_002">Credit Count</span></div>
<div style="position:absolute;left:455.00px;top:130.00px" class="cls_006"><span class="cls_006">'.count_transaction($row['accountnumber'],'credit').'</span></div>
<div style="position:absolute;left:44.00px;top:154.00px" class="cls_009"><span class="cls_009">Transaction Date</span></div>
<div style="position:absolute;left:102.00px;top:154.00px" class="cls_009"><span class="cls_009">Value Date</span></div>
<div style="position:absolute;left:147.00px;top:154.00px" class="cls_009"><span class="cls_009">BR  Transaction Details</span></div>
<div style="position:absolute;left:359.00px;top:154.00px" class="cls_009"><span class="cls_009">Reference</span></div>
<div style="position:absolute;left:420.00px;top:154.00px" class="cls_009"><span class="cls_009">Deposit</span></div>
<div style="position:absolute;left:474.00px;top:154.00px" class="cls_009"><span class="cls_009">Withdrawal</span></div>
<div style="position:absolute;left:548.00px;top:154.00px" class="cls_009"><span class="cls_009">Balance</span></div>'.$transaction_data.'<div style="position:absolute;left:136.00px;top:238.00px" class="cls_007"><span class="cls_007">****************************************************************************************************************************************</span></div>
<div style="position:absolute;left:275.00px;top:306.00px" class="cls_009"><span class="cls_009">END OF STATEMENT</span></div>
<div style="position:absolute;left:42.00px;top:720.40px" class="cls_009"><span class="cls_009">FRAUD ALERT </span><span class="cls_006">:</span></div>
<div style="position:absolute;left:42.00px;top:728.40px" class="cls_006"><span class="cls_006">Please disregard any e-mail informing you of an upgrade on our ATM or Credit Card services and any message requesting you to provide your ATM card details by clicking on any listed link. This mail is a scam with </span></div>
<div style="position:absolute;left:42.00px;top:735.40px" class="cls_006"><span class="cls_006">the sole purpose of defrauding you of the funds. If you have already responded to this scam mail, please contact us immediately on </span><span class="cls_012">'.$contact_email.'</span><span class="cls_006">, '.$contact_phone.'  or visit the nearest Bank branch.</span></div>
<div style="position:absolute;left:42.00px;top:751.40px" class="cls_006"><span class="cls_006">This is a computer generated statement requiring no signature and represents our records of transactions with you. Any exceptions must be advised to the bank immediately.</span></div>
<div style="position:absolute;left:532.00px;top:753.40px" class="cls_011"><span class="cls_011">Page 1 of 1</span></div>
<div style="position:absolute;left:42.00px;top:758.40px" class="cls_006"><span class="cls_006">If we do not hear from you within 2 weeks, we will assume that you are in agreement with the details stated. Any change of address should please be promptly advised to the bank in writing.</span></div>
</div>

</body>
</html>
');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

$output = $dompdf->output();
file_put_contents("Bank Statement_$now.pdf", $output);
header("Location: Bank Statement_$now.pdf");

?>