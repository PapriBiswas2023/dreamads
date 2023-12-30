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
<body>
<div class="wrapper">

<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content">
<div class="page-inner">

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

<div class="card" style="background:#FFFFFF;">
<div class="card-header">
<div class="card-title">KYC Information</div>
</div>
<div class="card-body">

<?php if($_REQUEST['m']==1){?><div align="center"><div id="norecord" style="color:#009900;font-size:15px;">Profile updated successefully.</div></div><?php }?>
<?php if($_REQUEST['e']==1){?><div align="center"><div id="norecord" style="color:#FF0000;font-size:15px;">Pancard No or Aadhar No already used in others account!</div></div><?php }?>
<div align="center">&nbsp;</div>
<form class="form" action="kyc-process.php" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Pancard No.</label>
<input type="text" style="height:10px;" class="form-control" name="pancardno" id="pancardno" placeholder="Pancard No." value="<?=getKycInformation($conn,$userid,'pancardno')?>" maxlength="10"  <?php if(getKycInformation($conn,$userid,'pancardno')){?>readonly="readonly"<?php }?> pattern="[A-Za-z]{5}\d{4}[A-Za-z]{1}" required />
</div>
</div>


<div class="col-md-6">
<div class="form-group form-group-default">
<label>Aadhar Card No.</label>
<input type="text" class="form-control" name="aadharcardno" id="aadharcardno" placeholder="Aadhar No." value="<?=getKycInformation($conn,$userid,'aadharcardno')?>" <?php if(getKycInformation($conn,$userid,'aadharcardno')){?>readonly="readonly"<?php }?>  pattern="[0-9]{12}" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Pancard</label>

<?php
$pancard=getKycInformation($conn,$userid,'pancard');
$panst=getKycInformation($conn,$userid,'pancardstatus');
if($pancard)
{
?>
<div align="center"><a href="file-download.php?f=<?=$pancard?>" style="cursor:pointer;"><img src="images/download.gif" height="40"></a></td></div>
<div align="center"><?php if($panst=='I'){?><span style="color:#FF0000;">Pending</span><?php }else{?><span style="color:#009900;">Approved</span><?php }?></div>
<?php }else{?>
<input type="file"  name="pancard" id="pancard" accept=".jpg, .png, .jpeg, .pjp" required />
<?php }?>
</div>
</div>




<div class="col-md-6">
<div class="form-group form-group-default">
<label>Aadhar Card Front</label>
<?php
$aadharfront=getKycInformation($conn,$userid,'aadharfront');
$aadst=getKycInformation($conn,$userid,'aadharfrontstatus');
if($aadharfront)
{
?>
<div align="center"><a href="file-download.php?f=<?=$aadharfront?>" style="cursor:pointer;"><img src="images/download.gif" height="40"></a></div>
<div align="center"><?php if($aadst=='I'){?><span style="color:#FF0000;">Pending</span><?php }else{?><span style="color:#009900;">Approved</span><?php }?></div>
<?php }else{?>
<input type="file"  name="aadharfront" id="aadharfront" accept=".jpg, .png, .jpeg, .pjp" required />
<?php }?>
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Aadhar Card Back</label>
<?php
$aadharback=getKycInformation($conn,$userid,'aadharback');
$aadstback=getKycInformation($conn,$userid,'aadharbackstatus');
if($aadharback)
{
?>
<div align="center"><a href="file-download.php?f=<?=$aadharback?>" style="cursor:pointer;"><img src="images/download.gif" height="40"></a></div>
<div align="center"><?php if($aadstback=='I'){?><span style="color:#FF0000;">Pending</span><?php }else{?><span style="color:#009900;">Approved</span><?php }?></div>
<?php }else{?>
<input type="file"  name="aadharback" id="aadharback" accept=".jpg, .png, .jpeg, .pjp" required />
<?php }?>

</div>
</div>
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Passbook</label>
<?php
$passbook=getKycInformation($conn,$userid,'passbook');
$passbooksta=getKycInformation($conn,$userid,'status');
if($passbook)
{
?>
<div align="center"><a href="file-download.php?f=<?=$passbook?>" style="cursor:pointer;"><img src="images/download.gif" height="40"></a></div>
<div align="center"><?php if($passbooksta=='I'){?><span style="color:#FF0000;">Pending</span><?php }else{?><span style="color:#009900;">Approved</span><?php }?></div>
<?php }else{?>
<input type="file"  name="passbook" id="passbook" accept=".jpg, .png, .jpeg, .pjp" required />
<?php }?>

</div>
</div>
</div>
<div align="center">&nbsp;</div>

<?php
if($pancard=='' || $aadharfront=='' || $aadharback=='' || $passbook=='')
{
?>
<div class="text-left">
<button class="btn btn-primary">Upload Now</button>
</div>
<?php }?>
</form>


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