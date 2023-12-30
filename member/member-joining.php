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
<script src="js/ajax.js"></script>
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
<?php include('header.php');?>

<!-- Sidebar -->
<?php include('leftmenu.php');?>
<!-- End Sidebar -->
<div class="main-panel">
<div class="content" style="background:#000000;">
<div class="page-inner">

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

<div class="card">
<div class="card-header">
<div class="card-title">New Member Joining</div>
</div>
<div class="card-body">

<div class="card-body">


<?php if($_REQUEST['msg']==4){?>
<div align="center" style="margin:0;padding:0;color:#0033CC; font-size:18px;"><strong>Your Registration is Successfully Completed!</strong></div>
<h6 align="center" style="color:#0033CC;font-size:18px;">User ID: <?=getMember($conn,$_REQUEST['id'],'userid')?></h6>
<?php }?>
<?php if($_REQUEST['q']==4){?><div align="center" style="margin:0;padding:0;color:#FF0000; font-size:14px;"><strong>Invalid/Inactive Sponsor ID !</strong></div><?php }?>  
<?php if($_REQUEST['e']==1){?><p align="center" style="color:#FF0000;">Phone number or email ID  already used!</p><?php }?>
<?php if($_REQUEST['f']==4){?><p align="center" style="color:#FF0000;">Confirm Password Doesn't Match!</p><?php }?>

<form class="form" action="member-joining-process.php" method="post">
<div class="row mt-3">
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Sponsor ID</label>
<input type="text" class="form-control" name="sponsor" placeholder="Sponsor" value="<?=$userid?>"  required onChange="getSponcheck(this.value)" onBlur="getSponcheck(this.value)" onKeyUp="getSponcheck(this.value)"><strong><div id="sponDiv" style="color:#FF0000; font-size:14px;"><?=getMemberUserid($conn,$userid,'name')?></div></strong>
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Name<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="name" placeholder="Name" value="" required>
</div>
</div>
</div>



<div class="row mt-3">

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Email<span style="color:#CC0000;">*</span></label>
<input type="email" class="form-control" name="email" placeholder="Email" value="" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Phone<span style="color:#CC0000;">*</span></label>
<input type="tel" class="form-control" name="phone" placeholder="Phone"  pattern="[6789][0-9]{9}" maxlength="10" value="" required />
</div>
</div>

</div>

<div class="row mt-3">

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Password<span style="color:#CC0000;">*</span></label>
<input type="password" class="form-control" name="password" placeholder="Password" value="" required />
</div>
</div>
<div class="col-md-6">
<div class="form-group form-group-default">
<label>Confirm Password<span style="color:#CC0000;">*</span></label>
<input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" value="" required />
</div>
</div>
</div>

<div class="row mt-3">

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Bank Name<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="bname" placeholder="Bank Name" value="" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Branch<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="branch" placeholder="Branch Name" value="" required />
</div>
</div>

</div>

<div class="row mt-3">

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Account Holder Name<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="accname" placeholder="Account Holder Name" value="" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-default">
<label>Account No.<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="accno" placeholder="Account No" value="" required />
</div>
</div>

</div>

<div class="row mt-3">

<div class="col-md-6">
<div class="form-group form-group-default">
<label>IFS Code<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control" name="ifscode" placeholder="IFS Code" value="" required />
</div>
</div>

</div>

<div class="row mt-3">
<div class="col-md-12">
<div class="text-left mt-3 mb-3">
<button class="btn btn-success">REGISTER NOW</button>
</div>
</div>
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