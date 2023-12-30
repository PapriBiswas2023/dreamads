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
<script>
function getRedirect(id)
{
window.location.href='advertisement-view.php?id='+id;
}
</script>
<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.countdownTimer.js"></script>
</head>
<body>

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
<input type="text" name="progressBar" id="progressBar" value="" style="width:50px; border:none; font-size:25px;"/>
<?php } ?>
<input type="hidden" name="ads" id="ads" value="<?=trim($_REQUEST['id'])?>"/>
<input type="hidden" name="url" id="url" value="<?=getAdvertisement($conn,trim($_REQUEST['id']),'url')?>"/>
<input type="hidden" name="userid" id="userid" value="<?=$userid?>"/>
<input type="hidden" name="second" id="second" value="<?=getAdvertisement($conn,trim($_REQUEST['id']),'seconds')?>"/>
<?php 
if($_REQUEST['time']=='over'){ ?>
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
window.location.href="advertisement-view.php?time=over&id="+ads;

}, 1000);
</script>
<?php } ?>
<?php } ?>
<?php } ?>

</div>
<?php
$type=getAdvertisement($conn,trim($_REQUEST['id']),'type');
if($type=='Link')
{
?>
<iframe width="100%" height="800" src="<?=trim(getAdvertisement($conn,trim($_REQUEST['id']),'url'))?>"></iframe>
<?php }?>
<?php
if($type=='Youtube Video')
{
?>
<iframe width="100%" height="800" src="https://www.youtube.com/embed/<?=trim(getAdvertisement($conn,trim($_REQUEST['id']),'url'))?>"></iframe>
<?php }?>

<?php }else{?>
<h3 align="center" style="color:#FF0000;">Adsview only show Monday To Friday!</h3>
<?php }?>

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