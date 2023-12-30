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
<meta charset="utf-8">
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
<script>
function printDivList()
{
var divToPrint=document.getElementById('printdiv');
var newWin=window.open('','Print-Window','width=900,height=800');
newWin.document.open();
newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
newWin.document.close();
}
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body style="background-image: linear-gradient(to bottom, #f4f5f5, #dfdddd);">
<div class="wrapper">

<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="row">

<div class="col-md-12">

<div class="card">
<div class="card-header">
<div class="card-title">Product List</div>
</div>
<div class="card-body" style="background:#FFFFFF;">
<h3 align="center" style="color:#E71F56;font-weight:bold;">Current Wallet: <?=getAvailableWallet($conn,$userid)?></h3>
<?php if($_REQUEST['m']==1){?><div align="center"><div id="norecord" style="color:#009900;">Your order successfully placed!</div></div><?php }?>
<?php if($_REQUEST['e']==1){?><div align="center"><div id="norecord" style="color:#FF0000;">Product does not exists!</div></div><?php }?>
<?php if($_REQUEST['e']==2){?><div align="center"><div id="norecord" style="color:#FF0000;">Insufficient fund!</div></div><?php }?>

<div class="row">

<?php
$sql="SELECT * FROM `da_product` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while($fetch=fetcharray($res))
{
?>
<div class="col-md-4">
<img src="../administrator/product/<?=$fetch['image']?>" height="420" width="400"  alt="image" style="border:2px solid #999999; padding:3px;" />
</div>
<div class="col-md-2"></div>
<div class="col-lg-6">
<h4 style="color:#FF0000;"><?=getProductName($conn,$fetch['pcode'],'title')?> <p style="font-family:Arial, Helvetica, sans-serif; font-size:18px;color:#DC6938;">Product Code: (<?=getProductName($conn,$fetch['id'],'pcode')?>)</p></h4>
<h2 style="color:#000033;">RS <?=$fetch['price']?></h2><h3><br/> </h3><h4><br />
Description:&nbsp;&nbsp;&nbsp;</b><h2 style="color:#0066FF;"><?=getProductName($conn,$fetch['id'],'description')?></h2></h4>
<div align="center">&nbsp;</div>
<div><a href="order-process.php?pid=<?=$fetch['id']?>" onClick="return confirm('Are you sure want to continue?');"><input type="button" name="button" value="Order Now" style="background:#48AAF2;color:#FFFFFF;border-radius:3px solid #006600;cursor:pointer;padding:5px 15px;font-size:16px;" /></a></div>
</div>
</div>
<?php }}?>	


</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Custom template | don't include it in your project! -->

<!-- End Custom template -->
</div>
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
