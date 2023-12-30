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

<script src="administrator/js/ajax.js" type="text/javascript"></script>
<script>
function getUserIDcheck(val)
{
xmlhttp.open('GET','get-name.php?userid='+val);
xmlhttp.onreadystatechange=getUserIDRequest;
xmlhttp.send();
}
function getUserIDRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('sponname').value=response;
}
}
}
</script>


</head>

<body>


<div style="background:url(images/slider-minimal-slide-2-1920x968.jpg); width:100%;">
<!-- RD Google Map-->

<div style="min-height:600px;">
<div>&nbsp;</div>

<div class="container">
<div class="col-md-12 mx-auto" >
<div class="row">
<div class="col-md-3" > </div>
<div class="col-md-6" >
<div class="block" style=" background-image: radial-gradient(circle, #a9b715, #b59326, #ac753b, #925e48, #6b4f4c); padding:5px 20px; border-radius: 1px; box-shadow: 0px 1px 46px -4px rgba(0, 0, 0, 0.28);  border-radius: 20px 20px;">

<div>&nbsp;</div>
<div align="center" ><a href="index.php"><img src="images/logo.png"  style="background:; padding:10px; margin-top:6px; border-radius: 10%; color:#FFFFFF;" alt="Next Generation" /></a></div>

<h3 class="text-center" style="color:#fff; padding:10px;">Registration</h3>

<?php if($_REQUEST['msg']==4){?>
<div align="center" style="margin:0;padding:0;color:green; font-size:16px;background-color:#fff;border-radius:10px;"><strong>Your registration is successfully completed!</strong>
<h6 align="center" style="color:green;font-size:18px; font-family:Arial, Helvetica, sans-serif;">User ID: <?=getMember($conn,$_REQUEST['id'],'userid')?></h6>
<h6 align="center" style="color:green;font-size:18px; font-family:Arial, Helvetica, sans-serif;">Name: <?=getMember($conn,$_REQUEST['id'],'name')?></h6></div><?php }?>
<?php if($_REQUEST['q']==4){?><div align="center" style="margin:0;padding:0;color:#FF0000; font-size:18px;margin-bottom:10px;background-color:#fff;border-radius:10px;"><strong>Invalid/Inactive Sponsor ID!</strong></div><?php }?>
<?php if($_REQUEST['p']==2){?><p align="center" style="color:#FF0000;background-color:#fff;border-radius:10px;font-weight:600;font-size:14px;">Phone No. And Email ID Already Used!</p><?php }?>
<?php if($_REQUEST['f']==4){?><p align="center" style="color:#FF0000;background-color:#fff;border-radius:10px;font-weight:600;font-size:14px;">User ID already exists! Try after some time.</p><?php }?>



<div>&nbsp;</div>
<?php if(getSettingsOnoff($conn,'registration')=='A'){?>
<form name="form1"  action="registration-process.php" method="post">
<div style="margin-bottom:8px">
<input type="text" class="form-control"  placeholder="Sponsor ID" name="sponsor" id="sponsor" required onKeyUp="getUserIDcheck(this.value);" onBlur="getUserIDcheck(this.value);"  />
</div>
<div style="color:#000000;margin-bottom:8px">
<input type="text" class="form-control"  placeholder="Sponsor Name" name="sponname" id="sponname"  readonly="" style="color:#000000;" required />
</div>
<div style="margin-bottom:8px">
<input type="text" class="form-control"  placeholder="Name" name="name" id="name" required />
</div>
<div style="margin-bottom:8px">
<input type="tel" class="form-control"  placeholder="Phone No" name="phone" id="phone" pattern="[6789][0-9]{9}" maxlength="10" required />
</div>
<div style="margin-bottom:8px">
<input type="email" name="email" id="email" class="form-control"  placeholder="Email" required />
</div>
<div style="margin-bottom:8px">
<input type="password" class="form-control"  placeholder="Password" name="password" id="password" required />
</div>

<div style="margin-bottom:8px">
<input type="text" class="form-control"  placeholder="Address" name="address" id="address" required />
</div>


<p style="color:#f57eb6; padding:10px; font-size:14px; color:#FFFFFF;"><input type="checkbox" checked="checked" disabled="disabled" style="padding:10px;">  I AGREED TO THIS  TERMS AND CONDITIONS</p>

<input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" style="width:100%" value="Sign Up" />
</form>
<br>
<p class="mt-8" style="text-align:center; color:#FFFF00; padding:10px;">Already have an account ?<a href="login.php" style="color:#fff;"><strong>Login</strong></a></p>
</div>
</div>
<?php }else{?>
<h2 align="center" style="color: #FFFFFF; font-size:28px;padding-bottom:40px;">Software is under maintenance!</h2>
<?php }?>


</div>
</div>

</div>

<div>&nbsp;</div>
</div>


</div>
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<!-- Javascript-->
   <!-- jQuery Frameworks
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