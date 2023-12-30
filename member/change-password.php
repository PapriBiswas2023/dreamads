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
<div class="card">
<div class="card-header">
<div class="card-title">Change Password</div>
</div>
<div class="card-body">
<?php if($_REQUEST['m']==1){?><div align="center"><div id="norecord" style="color:#FF0000;">Current password does not match!</div></div><?php }?>
<?php if($_REQUEST['n']==2){?><div align="center"><div id="norecord" style="color:#3333FF;font-size:15px;">New password successfully updated!</div></div><?php }?>
<?php if($_REQUEST['p']==3){?><div align="center"><div id="norecord" style="color:#ff0000;">Confirm password does not match!</div></div><?php }?>
<form class="form" action="change-password-process.php" method="post">

<div class="form-group">
<label for="pillInput"><strong style="color:#3333FF;">Current Password</strong><span style="color:#FF0000;">*</span></label>
<input type="password" class="form-control input-pill" id="current" name="current" placeholder="Current Password" required>
</div>

<div class="form-group">
<label for="pillInput"><strong  style="color:#3333FF;">New Password</strong><span style="color:#FF0000;">*</span></label>
<input type="password" class="form-control input-pill" id="newpass" name="newpass" placeholder="New Password" required>
</div>

<div class="form-group">
<label for="pillInput"><strong  style="color:#3333FF;">Confirm Password</strong><span style="color:#FF0000;">*</span></label>
<input type="password" class="form-control input-pill" id="conpass" name="conpass" placeholder="Confirm Password" required>
</div>



<div class="card-action">
<button class="btn btn-success">Submit</button>
<!--<button class="btn btn-danger">Cancel</button>-->
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