<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$nodirect=getSettingsWithdrawal($conn,'nodirect');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?=$title?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

<!-- Fonts and icons -->
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

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

<div class="card" style="background:#CCCCCC;">
<div class="card-header">
<div class="card-title">IMPS Withdrawal</div>
</div>

<?php if($_REQUEST['case']=='add'){?>

<div class="card-body" style="background:#CCCCCC;">
<?php if($_REQUEST['p']==1){?><p align="center" style="color:#009933; padding-bottom:8px;font-size:16px;">Your request is sent to administrator. Once verify amount will be credited your registered bank account!</p><?php }?>
<?php if($_REQUEST['m']==3){?><p align="center" style="color:#FF0000; padding-bottom:8px;">Amount Must be Greater Than zero</p><?php }?>
<?php if($_REQUEST['r']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;font-size:16px;">Insufficient Wallet Balance</p><?php }?>

<?php if($_REQUEST['s']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;font-size:16px;">Minimum withdrawal amount is Rs.&nbsp;<?=getSettingsWithdrawal($conn,'minimum')?> <br />& Maximum withdrawal amount is Rs.&nbsp;<?=getSettingsWithdrawal($conn,'maximum')?></p><?php }?>

<?php if($_REQUEST['g']==1){?><p align="center" style="color:#FF0000; padding-bottom:8px;font-size:16px;">You Must Have Greater Than or Equal To&nbsp;<?=$nodirect?>&nbsp;Direct  <?php }?>

<?php if(getSettingsOnoff($conn,'impswithdrawal')=='A'){?>

<?php 
$userid=getMember($conn,$_SESSION['mid'],'userid');
$avabal=getAvailableWallet($conn,$userid);

$min=getSettingsWithdrawal($conn,'minimum');
if($avabal>=$min)
{

if(getMember($conn,$_SESSION['mid'],'bname') && getMember($conn,$_SESSION['mid'],'branch') && getMember($conn,$_SESSION['mid'],'accname') && getMember($conn,$_SESSION['mid'],'accno') && getMember($conn,$_SESSION['mid'],'ifscode')){?>

<div class="row">
<div class="col-md-12">
<h4 class="form-section" style="color:#009900;" align="center">Current Wallet:&nbsp;Rs. <?=getAvailableWallet($conn,getMember($conn,$_SESSION['mid'],'userid'))?></h4>

</div>
</div>

<?php
$acsponsor=getActiveSponsor($conn,$userid);

if(getKycInformation($conn,$userid,'pancardstatus')=='A' && getKycInformation($conn,$userid,'aadharfrontstatus')=='A' && getKycInformation($conn,$userid,'aadharbackstatus')=='A' && getKycInformation($conn,$userid,'status')=='A')
{
if(date('H')>=7 && date('H')<24)
{
$renewalstatus=getMember($conn,$_SESSION['mid'],'renewalstatus');
if($renewalstatus=='A')
{
$sqlw="SELECT * FROM `da_withdrawal_imps` WHERE `userid`='".$userid."' AND `date`='".date('Y-m-d')."'";
$resw=query($conn,$sqlw);
$numw=numrows($resw);
if($numw<1)
{
?>
<form class="form" action="imps-withdrawal-process.php?case=add" method="post">
<div class="form-group">
<label for="pillInput"><strong style="color:#FF0000;">Amount<span style="color:#FF0000;">*</span></strong></label>
<input type="text" class="form-control input-pill" id="amount" name="amount" placeholder="Enter Amount" required />
</div>

<div class="card-action">
<button class="btn btn-success">Send Now</button>
</div>
</form>
<?php }else{?>
<h3 align="center" style="color:#FF0000; font-size:18px;color:#FF0000;background:#FFFFFF;border-radius:10px;">Withdrawal once in a day! You can withdrawal tomorrow!</h3>
<?php }?>

<?php }else{?>
<h3 align="center" style="color:#FF0000; font-size:18px;color:#FF0000;background:#FFFFFF;border-radius:10px;"><a href="renewal.php">Click here</a> to Renew your account!</h3>
<?php }?>

<?php }else{?>
<h5 align="center" style="color:#FF0000;font-size:16px;"><strong>Withdrawal available only 7 AM To 11 AM</strong></h5>
<?php }?>
<?php }else{?>
<h5 align="center" style="color:#FF0000;font-size:16px;"><strong>Kindly <a href="kyc-update.php">update KYC</a> or KYC not approved yet!</strong></h5>
<?php }?>

<?php }else{?>
<div align="center"><div align="center" style="display:inline-block;padding:10px;border:1px solid #FF6600;"><a href="edit-profile.php" style="text-decoration:none; color:#FF3300;font-size:16px;font-weight:bold;" title="Go to Bank Details">Please click here to and fill bank details for payment</a>
</div></div>
<div>&nbsp;</div>
<?php }} else{?>
<h5 align="center" style="color:#FF0000;font-size:16px;"><strong>You don't have minimum balance for withdrawal</strong></h5>
<?php } ?>

</div>
<?php }else{?>
<h2 align="center" style="color: #FFFF00; padding:30px; font-size:30px;">Software is under maintenance!</h2>
<?php }?>
<? }?>
</div>

</div>
</div>
</div>
</div>

</div>

<!-- Custom template | don't include it in your project! -->
<!-- End Custom template -->
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
