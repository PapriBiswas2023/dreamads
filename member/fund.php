<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
$left=2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?=$title?></title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<!--<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>-->

<!-- Fonts and icons -->
<script src="assets/js/plugin/webfont/webfont.min.js"></script>
<script src="assets/js/ajax.js"></script>
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
function getUserIDcheck(val)
{
if(val)
{
xmlhttp.open('GET','get-name.php?userid='+val);
xmlhttp.onreadystatechange=getUserIDRequest;
xmlhttp.send();
}
}
function getUserIDRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('sponname').innerHTML=response;
}
}
}
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
<!-- End Sidebar -->
<div class="main-panel">
<div class="content" style="background:#fff;">
<div class="page-inner">

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

<div class="card" style="background:#CCCCCC;">
<div class="card-header">
<div class="card-title">Topup Wallet To Others Member Topup wallet</div>
</div>
<div class="card-body" style="background:#CCCCCC;">

<?php if($_REQUEST['m']==1){?><div align="center" style="color:#00CC00;background:#FFFFFF;height:30px;line-height:30px;">New Transfer successfully completed!</div><?php }?>
<?php if($_REQUEST['e']==1){?><div align="center" style="color:#FF0000;background:#FFFFFF;height:30px;line-height:30px;">Minimum transferl Amount is Rs.  <?=getSettingsTransfer($conn,'minimum')?>!</div><?php }?>
<?php if($_REQUEST['f']==1){?><div align="center" style="color:#FF0000;background:#FFFFFF;height:30px;line-height:30px;">Transfer value must be greater than 0 !</div><?php }?>

<?php if($_REQUEST['e']==2){?><div align="center" style="color:#FF0000;background:#FFFFFF;height:30px;line-height:30px;">Insufficient Balance!</div><?php }?>
<?php if($_REQUEST['e']==3){?><div align="center" style="color:#FF0000;background:#FFFFFF;height:30px;line-height:30px;">Invalid User ID!</div><?php }?>
<h3 align="center" style="color:#000033;">Topup Wallet: <?=getFundWallet($conn,$userid)?></h3>
<div>&nbsp;</div>
<?php if(getSettingsOnoff($conn,'fundtoothers')=='A'){?>
<form class="form" action="fund-process.php" method="post">
<div class="col-md-8">
<div class="form-group form-group-default">
<label>To ID<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="toid" id="toid" placeholder="Enter User ID" value="" onKeyUp="getUserIDcheck(this.value);" onBlur="getUserIDcheck(this.value);" required />
</div>
<span id="sponname" style="color:#FF0000;"></span>
</div>
  
<div class="col-md-8">
<div class="form-group form-group-default">
<label>Amount<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="" required />
</div>
</div>
<!--<div class="col-md-8">
<div class="form-group form-group-default">
<label>Remarks<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks" value="" required />
</div>
</div>-->

<div class="row mt-3">
<div class="col-md-12">
<div class="text-left mt-3 mb-3">&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-success">Transfer Now</button>
</div>
</div>
</div>
</form>
<?php }else{?>
<h2 align="center" style="color: #FFFF00; padding:30px; font-size:30px;">Software is under maintenance!</h2>
<?php }?>
</div>

</div>
</div>

</div>
</div>
</div>

</div>

<!-- End Custom template -->
</div>

</div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script><!-- DateTimePicker -->
<script src="assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>
<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script>
$('#datepicker').datetimepicker({
format: 'MM/DD/YYYY',
});
</script>
</body>
</html>