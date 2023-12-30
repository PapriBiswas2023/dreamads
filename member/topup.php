<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?=$title?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

<!-- Fonts and icons -->
<script src="js/ajax.js" type="text/javascript"></script>

<script src="assets/js/plugin/webfont/webfont.min.js"></script>
<script>
WebFont.load({
google: {"families":["Open+Sans:300,400,600,700"]},
custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
active: function() {
sessionStorage.fonts = true;
}
});
</script>
<script>
function getEpinSet(val)
{
alert()document.frm2.epin.value=val;
}
</script>
<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body >
<div class="wrapper">
<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content" style="background:#fff;">
<div class="page-inner">

<div class="row" >
<div class="col-md-2"></div>
<div class="col-md-8">

<div class="card" style="background:#CCCCCC;" >
<div class="card-header">
<div class="card-title">Other Member Activation</div>
</div>

<?php if($_REQUEST['case']=='check'){?>
<div>&nbsp;</div>
<?php if($_REQUEST['m']=='1'){?><p align="center" style="color:#009900;font-weight:bold;">Member account is successfully activated!</p><?php } ?>
<?php if($_REQUEST['e']=='2'){?><div align="center" style="color:#FF0000;">Invalid User ID OR User ID is already activated!</div><?php } ?>
<?php if($_REQUEST['e']=='1'){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Insufficient Wallet Balence</p><?php }?>

<div class="card-body" style="background:#CCCCCC;">
<form class="form" action="check-process.php?case=check" method="post">

<div class="form-group">
<label for="pillInput">User ID<span style="color:#FF0000;">*</span></label>
<input type="text" class="form-control input-pill" id="userid" name="userid" placeholder="Enter User ID" required>
</div>

<div class="card-action">
<button class="btn btn-success">Check</button>
</div>
</form>
</div>


<?php }else if($_REQUEST['case']=='add'){?>
<?php if($_REQUEST['m']=='1'){?><p align="center" style="color:#009900;font-weight:bold;">Member account is successfully activated!</p><?php } ?>
<?php if($_REQUEST['e']=='2'){?><div align="center" style="color:#FF0000;">Invalid User ID OR User ID is already activated!</div><?php } ?>

<div class="card-body" style="background:#FFFFFF">
<?php if($_REQUEST['m']=='1'){?><p align="center" style="color:#009900;font-weight:bold;">Member account is successfully activated!</p><?php } ?>

<?php if($_REQUEST['e']=='1'){?><div align="center" style="color:#FF0000;">Insufficient Wallet Balance!</div><?php } ?>
<?php if($_REQUEST['e']=='5'){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Something wrong please contact with technical team. Placement ID is missing!</p><?php }?>
<?php
//$pack=getMemberUserid($conn,trim($_REQUEST['userid']),'package');
$name=getMemberUserid($conn,trim($_REQUEST['userid']),'name');
$userid = getMember($conn, $_SESSION['mid'], 'userid'); 
?>


<p align="center" style="color:#0000FF;font-size:16px;">&nbsp;&nbsp;<?=ucwords($name)?></p>
<p align="center" style="color:#0000FF;font-size:16px;">Topup Wallet : <?=$currency?> <?=getFundWallet($conn,$userid)?></p>
<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
$renewalstatus=getMember($conn,$_SESSION['mid'],'renewalstatus');
$packid=getFirstPackageID($conn);
if($paystatus=='A' && $renewalstatus=='A')
{
?>
<form class="form" action="topup-process.php?case=add" method="post" name="frm2">
<input type="hidden" name="userid" id="userid" class="form-control"  placeholder="Enter Userid" required value="<?=trim($_REQUEST['userid'])?>" />
<div align="center">
<div class="col-md-6">
<div class="form-group form-group-default">
<select name="package" id="package" class="form-control" required>
<option value="">Select Package</option>
<?php
$sqlst="SELECT * FROM `da_settings_package` ORDER BY `id`";
$resst=query($conn,$sqlst);
$numst=numrows($resst);
if($numst>0)
{
while($fetchst=fetcharray($resst))
{
?>
<option value="<?=$fetchst['id']?>"><?=ucwords(strtolower($fetchst['package']))?> (<?=$fetchst['amount']?>)</option>
<?php }}?>
</select>
</div>
</div>
</div>


<div class="card-action" align="center">
<button class="btn btn-success" onClick="return confirm('Are you sure want to active now?');">Activate Now</button>
</div>
</form>
<?php }else{?>
<h2 align="center" style="color:#009900;">PLease activate Your Account</h2>
<?php }?>
</div>

<?php }else{ ?>

<div class="row">
<div class="col-md-12">
<div class="card-body" style="overflow:auto;background-color:#CCCCCC">
									
<table class="table table-head-bg-primary mt-1" >
<thead bgcolor="#0033FF">
<tr >
<td align="center" style="color:#fff;"><strong>Sl_No</strong></td>
<td align="center" style="color:#fff;"><strong>Topup_ID</strong></td>
<td align="center" style="color:#fff;"><strong>Name</strong></td>
<td align="center" style="color:#fff;"><strong>Package</strong></td>
<td align="center" style="color:#fff;"><strong>Amount</strong></td>
<td align="center" style="color:#fff;"><strong>Date</strong></td>
</tr>
</thead>
<tbody>
<?php
$tname='da_member_topup';
$lim=100;
$tpage='topup.php';
$where="WHERE `userid`='".getMember($conn,$_SESSION['mid'],'userid')."' AND `userid`!=`topupid` ORDER BY `id` DESC";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td align="center"><?=$i?></td>
<td align="center"><?=$fetch['topupid']?></td>
<td align="center"><?=getMemberUserid($conn,$fetch['topupid'],'name')?></td>
<td align="center"><?=getSettingsPackage($conn,$fetch['package'],'package')?></td>
<td align="center"><?=$fetch['amount']?></td>
<td align="center"><?=getDateConvert($fetch['date'])?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="6" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
</div>
</div></div>
<?php }?>
</div>
</div>
</div>
</div>
</div>
<!-- Custom template | don't include it in your project! -->
<!-- End Custom template -->
</div>
</div>
<?php include('footer.php');?>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="assets/js/plugin/datatables/datatables.min.js"></script>


<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script src="assets/js/demo.js"></script>
</body>
</html>