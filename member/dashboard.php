<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$userid=getMember($conn,$_SESSION['mid'],'userid');
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='A')
{
include('calculate-reward-bonus.php');
include('calculate-bonanza-bonus.php');
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
<body style="background-image: linear-gradient(to bottom, #f4f5f5, #dfdddd); min-height:720px;">
<div class="wrapper">
<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<!-- End Sidebar -->

<div class="main-panel">
<div class="content" style="background:#fff;">
<div class="page-inner">

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="myBtn" style="visibility:hidden;"></button>

<div class="modal fade" id="myModal" role="dialog" style="z-index:9999;">
<div class="modal-dialog">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span style="color:#000;">&times;</span></button></div>
<div class="modal-body">
<?php
$sqlp="SELECT * FROM `da_popup` ORDER BY `id` LIMIT 1";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump>0)
{
while($fetchp=fetcharray($resp))
{
?>
<img src="../administrator/popup/<?=$fetchp['image']?>" width="100%"  />
<?php }}?>
</div>
<!--<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>-->
</div>

</div>
</div>

<script>
function myFunction()
{
document.getElementById("myBtn").click();
}
</script>
<?php
$time=getMember($conn,$_SESSION['mid'],'faststartend');
$strtotime=strtotime($time);
if($strtotime>=time())
{
?>
<script>
// Set the date we're counting down to
var countDownDate1 = new Date("<?=$time?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate1 - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
// document.getElementById("demo").innerHTML = days + "d " + hours + "h "
// + minutes + "m " + seconds + "s ";

 document.getElementById("demo").innerHTML = hours + "h "
 + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
   // window.location.href='dashboard.php';
  }
}, 1000);
</script>
<div class="col-md-12"><div class="row"><div class="col-md-12" style="background:#FFFFFF;font-size:20px;color:#FF0000;border-radius:10px;" align="center">Fast Start Club Time Remaining <br /><span id="demo" style="color:#FF0000;font-size:20px;font-weight:bold;"></span></div></div></div>
<?php }?>
<?php 
if(getKYCCheck($conn,$userid)<1)
{
?>
<h5 align="center" style="color:#0033FF;font-size:16px;"><strong>Kindly Update Your <a href="kyc-update.php" style="color:#FF0000;">KYC</a></strong></h5>
<?php }?>
<?php 
if(getKYCCheck($conn,$userid)>0)
{
if(getKycInformation($conn,$userid,'pancardstatus')=='I' || getKycInformation($conn,$userid,'aadharfrontstatus')=='I' || getKycInformation($conn,$userid,'aadharbackstatus')=='I' || getKycInformation($conn,$userid,'status')=='I')
{
?>
<h5 align="center" style="color:#FFF;font-size:16px;"><strong>Your KYC status is pending. Its processed under verifications.</strong></h5>
<?php }}?>

<?php
$maxrenewal=getMaximumRenewal($conn,$userid);
$maxrenewincome=getSettingsJoining($conn,'maxincomerenewal');
if($maxrenewal>=$maxrenewincome)
{
$quotient=floor($maxrenewal/$maxrenewincome);
$norenewal=getMemberNoRenewal($conn,$userid);
if($norenewal<$quotient)
{
$sqlm1="UPDATE `da_member` SET `renewalstatus`='I'  WHERE `userid`='".$userid."'";
$resm1=query($conn,$sqlm1);
?>
<h3 align="center" style="color:#FF0000; font-size:18px;color:#FF0000;background:#FFFFFF;border-radius:10px;"><a href="renewal.php">Click here</a> to Renew your account!</h3>
<div>&nbsp;</div>
<?php }}?>

<?php if($_REQUEST['n']==1){?><p align="center" style="color:#00CC33;">You have successfully renew your account!!</p><?php }?>

<?php
$sql="SELECT * FROM `da_announcement` ORDER BY `id` DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{?>
<h6 style="font-size:16px;background:#fc8210;padding:10px 15px;color:#fff;border-radius:10px;">
<marquee scrollamount="6"  align="center" style="text-align:center;" direction="left"> 

<?php 
while($fetch=fetcharray($res))
{
?>
<?=strip_tags(stripslashes($fetch['announcement']))?> 
<?php }?>
</marquee></h6>
<?php }?>

<?php
$paystatus=getMember($conn,$_SESSION['mid'],'paystatus');
if($paystatus=='I' || $paystatus=='')
{
?>
<h3 align="center" style="color:#FF0000; font-size:18px;color:#FF0000;"><br /><a href="activation.php">Click here</a> to Activate your account!</h3>
<div>&nbsp;</div>
<?php }?>
<?php if(isset($_REQUEST['m'])==1){?><p align="center" style="color:#006633; padding-bottom:8px; font-size:16px;background:#FFFFFF;"><strong>Your account is successfully activated!</strong></p><?php }?>
<div>&nbsp;</div>

<div class="col-md-12">
<div class="row">
<div class="col-sm-6">
<div class="card" style="width:100%; background-image: radial-gradient(circle, #ffce47, #eab938, #d4a428, #bf9017, #aa7c00);">
<h5 align="center" style=" background:#fc8210; height:25px; color:#FFFFFF;font-size:18px;"><strong>Congratulation! </strong></h5>
<div class="row">

<div class="col-12">
<div style="padding:20px;">
<div align="center">
<?php
if(getMember($conn,$_SESSION['mid'],'profile'))
{
?>
<img src="profile/<?=getMember($conn,$_SESSION['mid'],'profile')?>" alt="..." height="100" width="100"  />
<?php }else{?>
<img src="assets/img/profile.png" alt="..."  height="100" width="100" />
<?php }?>
</div>
<p align="center" class="card-category"><span style="font-size:24px; font-weight:600;  color:#fff;"> <?=$userid?> </span></p>
<p align="center" class="card-category" style="color:#fff; font-size:14px;"><?=getMember($conn,$_SESSION['mid'],'name')?>&nbsp;&nbsp;<?php if($paystatus=='A'){?><span style="color:#009900;background:#FFFFFF;padding:3px 5px;border-radius:10px; font-size:10px;">Active</span><?php }else{?><span style="color:#FF0000;background:#FFFFFF;padding:3px 5px;border-radius:10px; font-size:10px;">Pending</span><?php }?></p>
<h1 style="color:#FFFFFF;" align="center"><?=getMemberLatestReward($conn,$userid,'rank')?></h1>
<p align="center" class="card-category"><span style="font-size:15px; font-weight:600;  color:#fff;"> Active Date: <?=getDateConvert(getMember($conn,$_SESSION['mid'],'approved'))?>  </span></p>
<p align="center" class="card-category"><span style="font-size:15px; font-weight:600;  color:#fff;"> Joining Date: <?=getDateConvert(getMember($conn,$_SESSION['mid'],'date'))?>  </span></p>
</div>
</div>

</div>
</div>
</div>

<div class="col-sm-6">
<div class="card">
<h5 align="center" style="background:#fc8210; height:25px; color:#fff;font-size:18px;"><strong>Referral Link</strong></h5>
<div class="card-body" style=" background-image: radial-gradient(circle, #ffce47, #eab938, #d4a428, #bf9017, #aa7c00);margin:0;padding:0;">
<div align="center">
<div>&nbsp;</div>
<img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=https://<?=$domain?>/introducer.php?intr=<?=$userid?>&choe=UTF-8" title="<?=$title?>" />
</div>
<h5 align="center" id="p1" style="color:#FFFFFF;">https://<?=$domain?>/introducer.php?intr=<?=$userid?></h5>
<div align="center"><button onClick="copyToClipboard('#p1')" id="cpbutton" class="btn btn-primary">COPY LINK</button>
<div>&nbsp;</div>
</div>
</div>
</div>
</div>

</div>



<div class="row">
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="border-radius: 10px;">
<div class="card-body" style=" background-image: radial-gradient(circle, #3279e3, #2360cf, #1a48bb, #152ea5, #14108e);height:105px; border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<img src="assets/img/user.png" width="100%"/>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">User ID</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getMember($conn,$_SESSION['mid'],'userid')?> <?php if($paystatus=='A'){?><span style="color:#006600;background:#FFFFFF;border-radius:10px;padding:2px 5px;">Active</span><?php }else{?><span style="color:#FF0000;background:#FFFFFF;border-radius:10px;padding:2px 5px;">Inactive</span><?php }?> </h4>
</div>
</div>
</div>
</div>
</div>
</div>

<?php if(getMember($conn,$_SESSION['mid'],'sponsor')){?>
<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="height:105px; border-radius: 10px;">
<div class="card-body"  style="background-image: radial-gradient(circle, #3279e3, #2360cf, #1a48bb, #152ea5, #14108e); border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<div class="icon-big text-center icon-info bubble-shadow-small">
<i class="fas fa-users"></i>
</div>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Sponsor ID</p>
<h4 class="card-title" style="font-size:14px;color:#fff;"><?=getMember($conn,$_SESSION['mid'],'sponsor')?></h4>
</div>
</div>
</div>
</div>
</div>
</div>
<?php }?>


<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="border-radius: 10px;">
<div class="card-body" style="background-image: radial-gradient(circle, #3279e3, #2360cf, #1a48bb, #152ea5, #14108e);height:105px; border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<img src="assets/img/level.png" width="100%"/>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Self Add Bonus</p>
<h4 class="card-title" style="font-size:14px; color:#fff;"><?=getMemberSelfAddBonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="border-radius: 10px;">
<div class="card-body" style="background-image: radial-gradient(circle, #3279e3, #2360cf, #1a48bb, #152ea5, #14108e);height:105px; border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<img src="assets/img/level.png" width="100%"/>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Level Bonus</p>
<h4 class="card-title" style="font-size:14px; color:#fff;"><?=getMemberLevelBonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="border-radius: 10px;">
<div class="card-body" style=" background-image: radial-gradient(circle, #e33290, #ce297c, #b8206a, #a31858, #8e1048);height:105px; border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<img src="assets/img/level.png" width="100%"/>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Level Add View Bonus</p>
<h4 class="card-title" style="font-size:14px; color:#fff;"><?=getMemberLevelAddBonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="border-radius: 10px;">
<div class="card-body" style=" background-image: radial-gradient(circle, #e33290, #ce297c, #b8206a, #a31858, #8e1048);height:105px; border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<img src="assets/img/self.png" width="100%"/>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Franchise Bonus</p>
<h4 class="card-title" style="font-size:14px; color:#FFFFFF;"><?=getMemberFranchiseBonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="border-radius: 10px;">
<div class="card-body" style=" background-image: radial-gradient(circle, #e33290, #ce297c, #b8206a, #a31858, #8e1048);height:105px; border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<img src="assets/img/self.png" width="100%"/>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Direct Bonus</p>
<h4 class="card-title" style="font-size:14px; color:#fff;"><?=getMemberDirectBonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="border-radius: 10px;">
<div class="card-body" style=" background-image: radial-gradient(circle, #e33290, #ce297c, #b8206a, #a31858, #8e1048);height:105px; border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<img src="assets/img/level.png" width="100%"/>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Bonanza Bonus</p>
<h4 class="card-title" style="font-size:14px; color:#fff;"><?=getMemberBonanzaBonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="border-radius: 10px;">
<div class="card-body" style="  background-image: radial-gradient(circle, #2da01a, #248713, #1c6f0d, #145808, #0c4203);height:105px; border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<img src="assets/img/level.png" width="100%"/>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">CTO Bonus</p>
<h4 class="card-title" style="font-size:14px; color:#fff;"><?=getMemberCtoBonus($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="border-radius: 10px;">
<div class="card-body" style="  background-image: radial-gradient(circle, #2da01a, #248713, #1c6f0d, #145808, #0c4203);height:105px; border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<img src="assets/img/withdrawal.png" width="100%"/>
</div>

<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Pending Withdrawal</p>
<h4 class="card-title" style="font-size:14px; color:#fff;"><?=getPendingWithdrawalMember($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="border-radius: 10px;">
<div class="card-body" style="  background-image: radial-gradient(circle, #2da01a, #248713, #1c6f0d, #145808, #0c4203); border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<img src="assets/img/withh.png" width="100%"/>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Approved Withdrawal</p>
<h4 class="card-title" style="font-size:14px;"><?=getApprovedWithdrawalMember($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="border-radius: 10px;">
<div class="card-body" style="  background-image: radial-gradient(circle, #2da01a, #248713, #1c6f0d, #145808, #0c4203);height:101px; border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<img src="assets/img/wallet.png" width="100%"/>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Total Income</p>
<h4 class="card-title" style="font-size:14px; color:#fff;"><?=geTotalCommission($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>




<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="border-radius: 10px;">
<div class="card-body" style=" background-image: radial-gradient(circle, #a07c1a, #8f5a13, #793b11, #5f1f0e, #420303);height:101px; border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<img src="assets/img/wallet.png" width="100%"/>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Current Wallet</p>
<h4 class="card-title" style="font-size:14px; color:#fff;"><?=getAvailableWallet($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-sm-6 col-md-3">
<div class="card card-stats card-round" style="border-radius: 10px;">
<div class="card-body" style=" background-image: radial-gradient(circle, #a07c1a, #8f5a13, #793b11, #5f1f0e, #420303);height:101px; border-radius: 10px;">
<div class="row align-items-center">
<div class="col-icon">
<img src="assets/img/wallet.png" width="100%"/>
</div>
<div class="col col-stats ml-3 ml-sm-0">
<div class="numbers">
<p class="card-category" style="color:#fff; font-size:14px;">Topup Wallet</p>
<h4 class="card-title" style="font-size:14px; color:#fff;">
<?=getFundWallet($conn,$userid)?></h4>
</div>
</div>
</div>
</div>
</div>
</div>



<div>&nbsp;</div>


</div>

</div>
</div>

</div>


</div>
</div>




<!-- End Custom template -->


<!--   Core JS Files   -->
<?php include('footer.php');?>
<script>
function copyToClipboard(element) {
var $temp = $("<input>");
$("body").append($temp);
$temp.val($(element).text()).select();
document.execCommand("copy");
$temp.remove();
document.getElementById('cpbutton').innerHTML='COPIED';
}
</script>

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
<?php
$sqlp="SELECT * FROM `da_popup` ORDER BY `id` LIMIT 1";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump>0)
{
?>
<script>myFunction()</script>
<?php }?>
</body>
</html>