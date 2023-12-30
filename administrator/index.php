<?php
session_start();
include('includes/function.php');
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="author" content="PIXINVENT">
<title>Administrator</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
<!-- font icons-->
<link rel="stylesheet" type="text/css" href="app-assets/fonts/icomoon.css">
<link rel="stylesheet" type="text/css" href="app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/pace.css">
<!-- END VENDOR CSS-->
<!-- BEGIN ROBUST CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
<!-- END ROBUST CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.css">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- END Custom CSS-->
<style>
@media only screen and (max-width: 390px) {
  #mainadminlogo {
    width:150px;
  }
}
</style>
</head>
<body  data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">

<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content container-fluid" style="background:url(images/slider.jpg);">
<div class="content-wrapper">
<div class="content-header row">
</div>
<div class="content-body"><section class="flexbox-container">
<div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
<div class="card border-grey border-lighten-3 m-0">
<div class="card-header no-border"  style=" background-color:#000 ;">
<div class="card-title text-xs-center">
<div class="p-1"><img src="images/logo.png" alt="<?=$title?>" width="80%" /></div>
<!--<h1 align="center" style="font-size:36px;color:#FF0000;font-weight:bold;"><I>EASY WONDERS</I></h1>-->
</div>
<h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login with <?=$title?></span></h6>
</div>

<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#FF0000;background:#FFFFFF;height:30px;line-height:30px;">Invalid Username or Password!</p><?php }?>
<div class="card-body collapse in">
<div class="card-block">
<form class="form-horizontal form-simple" action="login-process.php" method="post">
<fieldset class="form-group position-relative has-icon-left mb-0">
<input type="text" class="form-control form-control-lg input-lg" id="username" name="username" placeholder="Username" required autocomplete="off" />
<div class="form-control-position">
	<i class="icon-head"></i>
</div>
</fieldset>
<div>&nbsp;</div>
<fieldset class="form-group position-relative has-icon-left">
<input type="password" class="form-control form-control-lg input-lg" id="password" name="password" placeholder="Password" required autocomplete="off" />
<div class="form-control-position">
	<i class="icon-key3"></i>
</div>
</fieldset>
<button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i>Login</button>
</form>



</div>
</div>

</div>
</div>
</section>

</div>
</div>
</div>
<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>
