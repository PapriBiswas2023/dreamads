<?php
include('administrator/includes/function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Ads</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="img/png" />
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!--====== Slick Slider ======-->
    <link rel="stylesheet" href="assets/css/slick.min.css" />
    <!--====== Magnific ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css" />
    <!--====== Nice Select ======-->
    <link rel="stylesheet" href="assets/css/nice-select.min.css" />
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <!--====== Font Awesome ======-->
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <!--====== Flaticon ======-->
    <link rel="stylesheet" href="assets/css/flaticon.css" />
    <!--====== Spacing Css ======-->
    <link rel="stylesheet" href="assets/css/spacing.min.css" />
    <!--====== Main Css ======-->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!--====== Responsive CSS ======-->
    <link rel="stylesheet" href="assets/css/responsive.css" />
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
crossorigin="anonymous" referrerpolicy="no-referrer"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    
    
   <div style="background:url(images/slider-minimal-slide-2-1920x968.jpg); width:100%; min-height:700px;">
      <!-- RD Google Map-->
     
		<div style="min-height:300px;">
<div class="container">

<div>&nbsp;</div>

<div class="container">
<div class="col-md-12 mx-auto" >
<div class="row">
<div class="col-md-3" ></div>
<div class="col-md-6" style="padding-top:10px;">

<div class="block" style="padding:5px 20px; border-radius: 1px; box-shadow: 0px 1px 46px -4px rgba(0, 0, 0, 0.28);  background-image: radial-gradient(circle, #a9b715, #b59326, #ac753b, #925e48, #6b4f4c);  border-radius: 20px 20px; min-height:350px;">
<div>&nbsp;</div>

<div align="center" ><a href="index.php"><img src="images/logo.png"  style="background:; padding:10px; margin-top:6px; border-radius:10%; color:#FFFFFF;" alt="Next Generation  " /></a></div>



<h2 class="text-center" style="color:#fff; padding:10px;">Sign In</h2>

<?php if($_REQUEST['e']==1){?><div align="center" style="margin:5px;color:#FF0000;background:#FFFFFF;border-radius:5px;">Invalid User ID or Password!</div><?php }?>

<?php if(getSettingsOnOff($conn,'login')=='A'){?>

<form name="form1"  action="login-process.php" method="post" >

<div>&nbsp;</div>
<input type="hidden" name="security" id="security" value="" />
<div style="margin-bottom:8px">
<input type="text" style="background:#FFFFFF;" class="form-control"  name="userid" id="userid"  placeholder="Enter User ID"  required />
</div>


<div style="margin-bottom:8px">
<input type="password" style="background:#FFFFFF;" class="form-control" name="password" id="password" placeholder="Enter Password"  required />
</div>


<div class="form-group">
<div class="col-md-4 col-xs-12 text-xs-center text-md-left" style="margin-left:0px;">
</div>
</div>

<input type="submit" class="btn btn-primary" style="width:100%" value="Sign In" />
</form>

<p class="mt-1" style="text-align:center; color:#FFFF00; padding:10px;">Forgot Password? <a href="forgot.php"><span style="color:#fff;"><strong> Click here</strong></span></a></p>

<?php }else{?>
<h2 align="center" style="color: #FFFFFF; font-size:28px; padding-top:30px;">Software is under maintenance!</h2>
<?php }?>
</div>
</div>


</div>
</div>
</div>


</div>
</div>
    
</div>
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<!-- Javascript-->
   <!-- jQuery Frameworks
    ============================================= -->
 <!-- JS here -->

    <!--====== Jquery ======-->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.6.0.min.js"></script>
    <!--====== Bootstrap ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--====== Slick slider ======-->
    <script src="assets/js/slick.min.js"></script>
    <!--====== Magnific ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--====== Inview ======-->
    <script src="assets/js/jquery.inview.min.js"></script>
    <!--====== Nice Select ======-->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!--====== Wow ======-->
    <script src="assets/js/wow.min.js"></script>
    <!--====== Main JS ======-->
    <script src="assets/js/main.js"></script>
	</body>
</html>