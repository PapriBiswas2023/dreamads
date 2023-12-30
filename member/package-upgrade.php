<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
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
<div class="card-title">Package Upgrade</div>
</div>

<div class="card-body" style="background:#CCCCCC;">

<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
$renewalstatus=getMember($conn,$_SESSION['mid'],'renewalstatus');
if($paystatus=='A' && $renewalstatus=='I')
{
?>
<div><?php if($_REQUEST['m']=='1'){?><div align="center" style="color:#009900;background:#FFFFFF;font-size:16px;">Upgrade successfull!</div><?php } ?></div>
<div><?php if($_REQUEST['e']=='3'){?><div align="center" style="color:#FF0000;background:#FFFFFF;font-size:16px;">Please Upgrade Previous Package!</div><?php } ?></div>
<div><?php if($_REQUEST['e']=='2'){?><div align="center" style="color:#FF0000;background:#FFFFFF;font-size:16px;">Insufficient Wallet Balance!</div><?php } ?></div>
<div><?php if($_REQUEST['e']=='1'){?><div align="center" style="color:#FF0000;background:#FFFFFF;font-size:16px;">You are already upgraded in this package!</div><?php } ?></div>


<div align="center" style="color:#00CC00;font-size:16px;">Topup Wallet: <?=$currency?> <?=getFundWallet($conn,$userid)?></div>
<div>&nbsp;</div>
<form class="form" action="package-upgrade-process.php?case=add" method="post" name="frm2">
<select name="package" id="package" class="form-control" required>
<option value="">Select Package</option>
<?php
 $sql="SELECT * FROM `da_settings_package` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while ($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['id']?>"><?=ucwords($fetch['package'])?> (<?=$fetch['amount']?>)</option>
<?php }}?>
</select>
<div class="card-action" align="center">
<button class="btn btn-success" onClick="return confirm('Are you sure want to upgrade now?');">Upgrade Now</button>
</div>

<?php }else{?>
<h3 align="center" style="font-size:18px;color:#FF0000;">Your renewal status is  activate</h3>
<?php }?>
</form>
</div>

</div>
</div></div>

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