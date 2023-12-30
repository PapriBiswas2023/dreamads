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
<script>
function getRedirect(id)
{
window.location.href='advertisement.php?id='+id;
}
</script>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.countdownTimer.js"></script>
</head>
<body>
<div class="wrapper">

<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content" style="background:#fff;">
<div class="page-inner">

<div class="row">
<div class="col-md-12">
<div class="card" style="background:#CCCCCC;">
<div class="card-header">
<div class="card-title">Advertisement</div>
</div>
<div class="card-body">

<?php
$day=date('l',strtotime(date('Y-m-d')));
if($day=='Monday' || $day=='Tuesday' || $day=='Wednesday' || $day=='Thursday' || $day=='Friday')
{
?>

<?php if($_REQUEST['case']!='start') { ?>
<?php if($_REQUEST['id']!='') { ?>
<div style="font-size:25px; color:#FF0066;" align="center">
<form action="ads-view-process.php" method="post">
Time Left :
<?php if($_REQUEST['time']=='') { ?>
<input type="text" name="progressBar" id="progressBar" value="<?=$_REQUEST['time']?>" style="width:50px; border:none; font-size:25px;"/>
<?php } ?>
<input type="hidden" name="ads" id="ads" value="<?=$_REQUEST['id']?>"/>
<input type="hidden" name="url" id="url" value="<?=getAdvertisement($conn,$_REQUEST['id'],'url')?>"/>
<input type="hidden" name="userid" id="userid" value="<?=$userid?>"/>
<input type="hidden" name="second" id="second" value="<?=getAdvertisement($conn,$_REQUEST['id'],'seconds')?>"/>
<?php if($_REQUEST['time']=='over') { ?>
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
<?php } ?>
</form>
</div>
<div id="countdowntimer"><span id="s_timer"></span></div>
<?php if($_REQUEST['time']=='') { ?>
<script>
var ads=document.getElementById("ads").value;
var url=document.getElementById("url").value;
var timeleft = document.getElementById("second").value;
var downloadTimer = setInterval(function(){
  document.getElementById("progressBar").value =timeleft;
  timeleft -= 1;
  if(timeleft <= 0)
    window.location.href="advertisement.php?time=over&id="+ads;
	
}, 1000);
</script>
<?php } ?>
<?php } ?>
<?php } ?>


<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">Title</th>
<th align="center">Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sqlpop="SELECT * FROM `da_advertisement` WHERE `status`='A'";
$respop=query($conn,$sqlpop);
$numpop=numrows($respop);
if($numpop>0)
{
while($fetchpop=fetcharray($respop))
{
$count=getMemberTaskVisit($conn,$userid,$fetchpop['id'],date('Y-m-d'));
?>

<tr>
<td align="center"><?=$i?></td>
<td align="center"><?php if($fetchpop['title']){ ?><?=stripslashes($fetchpop['title'])?><?php } else { ?>---<?php } ?></td>
<td align="center">
<?php 
if(getMemberTaskVisit($conn,$userid,$fetchpop['id'],date('Y-m-d'))<1)
{
?>
<a href="advertisement-view.php?url=<?=$fetchpop['url']?>&id=<?=$fetchpop['id']?>" target="_blank" >
<input type="submit" value="View Add" class="btn red" style="background:#FF0000;color:#FFFFFF;" /></a>
<?php }else{?>
<img src="assets/img/right.png" style="height:25px;" />
<?php }?>
</td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="3" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>

</tbody>
</table>

<?php }else{?>
<h3 align="center" style="color:#FF0000;">Adsview only show Monday To Friday!</h3>
<?php }?>

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