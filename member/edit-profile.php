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
<!-- End Sidebar -->
<div class="main-panel">
<div class="content">
<div class="page-inner" >

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

<div class="card">
<div class="card-header">
<div class="card-title">Edit Profile</div>
</div>
<div class="card-body">



<div class="card-body" >

<?php if(isset($_REQUEST['m'])=='1'){?>
<div align="center" style="color:#3333FF;font-size:16px;">Your profile successfully updated!</div>
<?php }?>

<form class="form" action="edit-profile-process.php" method="post" enctype="multipart/form-data">
<div class="row mt-3">
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Name</label>
<input type="text" class="form-control" name="name" placeholder="Name" value="<?=getMember($conn,$_SESSION['mid'],'name')?>" <?php if(getMember($conn,$_SESSION['mid'],'name')){?>readonly="readonly"<?php }?> />
</div>
</div>
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Email</label>
<input type="email" class="form-control" name="email" placeholder="Name" value="<?=getMember($conn,$_SESSION['mid'],'email')?>" <?php if(getMember($conn,$_SESSION['mid'],'email')){?>readonly="readonly"<?php }?> />
</div>
</div>
</div>

<div class="row mt-3">
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Phone</label>
<input type="text" class="form-control" id="phone" name="phone" value="<?=getMember($conn,$_SESSION['mid'],'phone')?>" placeholder="Phone Number" maxlength="10" <?php if(getMember($conn,$_SESSION['mid'],'phone')){?>readonly="readonly"<?php }?> />
</div>
</div>
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Address</label>
<input type="text" class="form-control" value="<?=getMember($conn,$_SESSION['mid'],'address')?>" name="address" id="address" placeholder="Address" <?php if(getMember($conn,$_SESSION['mid'],'address')){?>readonly="readonly"<?php }?> />
</div>
</div>
</div>

<div class="row mt-3">
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Bank Name</label>
<input type="text" class="form-control" name="bname" id="bname" placeholder="Bank Name" value="<?=getMember($conn,$_SESSION['mid'],'bname')?>" <?php if(getMember($conn,$_SESSION['mid'],'bname')){?>readonly="readonly"<?php }?> />
</div>
</div>
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Branch</label>
<input type="text" class="form-control" name="branch" placeholder="Branch Name" id="branch" value="<?=getMember($conn,$_SESSION['mid'],'branch')?>" <?php if(getMember($conn,$_SESSION['mid'],'branch')){?>readonly="readonly"<?php }?> />
</div>
</div>
</div>
 
<div class="row mt-3">
<div class="col-md-6">
<div class="form-group form-group-default">
<label>IFS CODE</label>
<input type="text" class="form-control" name="ifscode" id="ifscode" placeholder="IFSC CODE" value="<?=getMember($conn,$_SESSION['mid'],'ifscode')?>" <?php if(getMember($conn,$_SESSION['mid'],'ifscode')){?>readonly="readonly"<?php }?> />
</div>
</div>



<div class="col-md-6">
<div class="form-group form-group-default">
<label>Account Name</label>
<input type="text" class="form-control" name="accname" id="accname" placeholder="Account Name" value="<?=getMember($conn,$_SESSION['mid'],'accname')?>" <?php if(getMember($conn,$_SESSION['mid'],'accname')){?>readonly="readonly"<?php }?> />
</div>
</div>
</div>

<div class="row mt-3">
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Account No</label>
<input type="text" class="form-control" name="accno" id="accno" placeholder="Account No" value="<?=getMember($conn,$_SESSION['mid'],'accno')?>" <?php if(getMember($conn,$_SESSION['mid'],'accno')){?>readonly="readonly"<?php }?> />
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Profile</label>
<input type="file" name="file" id="file" onChange="loadFile(event)" accept=".jpg,.jpeg,.png,.pjp" />
</div>
</div>
</div>

<div class="row mt-3">
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Tron Wallet</label>
<input type="text" class="form-control" name="tronwallet" id="tronwallet" placeholder="Tron Wallet" value="<?=getMember($conn,$_SESSION['mid'],'tronwallet')?>" <?php if(getMember($conn,$_SESSION['mid'],'tronwallet')){?>readonly="readonly"<?php }?> />
</div>
</div>

<div class="row mt-3">
<div class="col-md-6">
<img id="output" height="100" width="100" style="display:none;" />
<script>
var loadFile = function(event)
{
var output = document.getElementById('output');
document.getElementById('output').style.display='inline';
output.src = URL.createObjectURL(event.target.files[0]);
};
</script>
<?php 
//if(getMember($conn,$_SESSION['mid'],'profile'))
{?>
<!--<img height="100" width="100" src="profile/<?=getMember($conn,$_SESSION['mid'],'profile')?>" />
--><?php }?>
</div>
</div>

<div class="text-left mt-3 mb-3">
<button class="btn btn-success">UPDATE</button>
</div>

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
</div>
<?php include('footer.php');?>
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