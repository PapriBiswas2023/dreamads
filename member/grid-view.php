<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('../index.php');
}
$left=2;
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
<div class="content" style="background:#fff;">
<div class="page-inner">
<div class="row">
<div class="col-md-12">

<div class="card" style="background:#CCCCCC;">
<div class="card-header">
<div class="card-title">Grid View</div>
</div>
<div class="card-body" style="overflow:auto;background:#CCCCCC;">
<div align="center">&nbsp;</div>
<?php if($_REQUEST['placement']){?><h3 align="center" style="color:#24847A;font-size:20px;line-height:20px;">User_ID: <?=trim($_REQUEST['placement'])?>&nbsp;&nbsp;&nbsp;Name: <?=getMemberUserid($conn,trim($_REQUEST['placement']),'name')?></h3><?php }?>
<h2 style="color:#FF0000;font-size:20px;">&nbsp;Genealogy - Level 1</h2>
<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">User_ID</th>
<th align="center">Name</th>
<th align="center">Join</th>
<th align="center">Sponsor</th>
<th align="center">Tron_Wallet</th>
<th align="center">Status</th>
<th align="center">Paystatus</th>
<th align="center">Join</th>
<th align="center">Approved</th>
</tr>
</thead>
<tbody>
<?php
if($_REQUEST['placement'])
{
$sql="SELECT * FROM `da_member` WHERE `sponsor`='".trim($_REQUEST['placement'])."'";
}else{
$sql="SELECT * FROM `da_member` WHERE `sponsor`='".getMember($conn,$_SESSION['mid'],'userid')."'";
}
$res=query($conn,$sql);
$num=numrows($res);
$i=0;
$arr=array();
if($num>0)
{
while($fetch=fetcharray($res))
{
$arr[$i]=$fetch['userid'];
?>
<tr>
<td align="center"><?=($i+1)?></td>
<td align="center"><a href="grid-view.php?placement=<?=$fetch['userid']?>"><?=$fetch['userid']?></a></td>
<td align="center"><?=$fetch['name']?></td>
<td align="center"><?=getDateConvert($fetch['date'])?></td>
<td align="center"><?php if($fetch['sponsor']){?><?=$fetch['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?=getDateConvert($fetch['tronwallet'])?></td>
<td align="center"><?php if($fetch['status']=='A'){?><span style="color:#00CC00;">Unblock</span><?php }else{?><span style="color:#FF0000;">Block</span><?php }?></td>
<td align="center"><?php if($fetch['paystatus']=='A'){?><span style="color:#00CC00;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
<td align="center"><?=getDateConvert($fetch['date'])?></td>
<td align="center"><?=getDateConvert($fetch['approved'])?></td>
</tr>
<?php $i++;}}?>
</tbody>
</table>

<?php
$count=count($arr);
if($count>0)
{?>
<h2 style="color:#FF0000;font-size:20px;">&nbsp;Genealogy - Level 2</h2>
<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">User_ID</th>
<th align="center">Name</th>
<th align="center">Join</th>
<th align="center">Sponsor</th>
<th align="center">Tron_Wallet</th>
<th align="center">Status</th>
<th align="center">Paystatus</th>
<th align="center">Join</th>
<th align="center">Approved</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr1=array();
for($k=0;$k<$count;$k++)
{
$sql1="SELECT * FROM `da_member` WHERE `sponsor`='".$arr[$k]."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
while($fetch1=fetcharray($res1))
{
$arr1[$i]=$fetch1['userid'];
?>
<tr>
<td align="center"><?=($i+1)?></td>
<td align="center"><a href="grid-view.php?placement=<?=$fetch1['userid']?>"><?=$fetch1['userid']?></a></td>
<td align="center"><?=$fetch1['name']?></td>
<td align="center"><?=getDateConvert($fetch1['date'])?></td>
<td align="center"><?php if($fetch1['sponsor']){?><?=$fetch1['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?=getDateConvert($fetch1['tronwallet'])?></td>
<td align="center"><?php if($fetch1['status']=='A'){?><span style="color:#00CC00;">Unblock</span><?php }else{?><span style="color:#FF0000;">Block</span><?php }?></td>
<td align="center"><?php if($fetch1['paystatus']=='A'){?><span style="color:#00CC00;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
<td align="center"><?=getDateConvert($fetch1['date'])?></td>
<td align="center"><?=getDateConvert($fetch1['approved'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table> 
<?php }?>
<?php
$count1=count($arr1);
if($count1>0)
{?>
<h2 style="color:#FF0000;font-size:20px;">&nbsp;Genealogy - Level 3</h2>
<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">User_ID</th>
<th align="center">Name</th>
<th align="center">Join</th>
<th align="center">Sponsor</th>
<th align="center">Tron_Wallet</th>
<th align="center">Status</th>
<th align="center">Paystatus</th>
<th align="center">Join</th>
<th align="center">Approved</th>
</tr></thead>
<tbody>
<?php
$i=0;
$arr2=array();
for($k=0;$k<$count1;$k++)
{
$sql2="SELECT * FROM `da_member` WHERE `sponsor`='".$arr1[$k]."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
while($fetch2=fetcharray($res2))
{
$arr2[$i]=$fetch2['userid'];
?>
<tr>
<td align="center"><?=($i+1)?></td>
<td align="center"><a href="grid-view.php?placement=<?=$fetch2['userid']?>"><?=$fetch2['userid']?></a></td>
<td align="center"><?=$fetch2['name']?></td>
<td align="center"><?=getDateConvert($fetch2['date'])?></td>
<td align="center"><?php if($fetch2['sponsor']){?><?=$fetch2['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?=getDateConvert($fetch2['tronwallet'])?></td>
<td align="center"><?php if($fetch2['status']=='A'){?><span style="color:#00CC00;">Unblock</span><?php }else{?><span style="color:#FF0000;">Block</span><?php }?></td>
<td align="center"><?php if($fetch2['paystatus']=='A'){?><span style="color:#00CC00;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
<td align="center"><?=getDateConvert($fetch2['date'])?></td>
<td align="center"><?=getDateConvert($fetch2['approved'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }?>
<?php
$count2=count($arr2);
if($count2>0)
{?>
<h2 style="color:#FF0000;font-size:20px;">&nbsp;Genealogy - Level 4</h2>
<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">User_ID</th>
<th align="center">Name</th>
<th align="center">Join</th>
<th align="center">Sponsor</th>
<th align="center">Tron_Wallet</th>
<th align="center">Status</th>
<th align="center">Paystatus</th>
<th align="center">Join</th>
<th align="center">Approved</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr3=array();
for($k=0;$k<$count2;$k++)
{
$sql3="SELECT * FROM `da_member` WHERE `sponsor`='".$arr2[$k]."'";
$res3=query($conn,$sql3);
$num3=numrows($res3);
if($num3>0)
{
while($fetch3=fetcharray($res3))
{
$arr3[$i]=$fetch3['userid'];
?>
<tr>
<td align="center"><?=($i+1)?></td>
<td align="center"><a href="grid-view.php?placement=<?=$fetch3['userid']?>"><?=$fetch3['userid']?></a></td>
<td align="center"><?=$fetch3['name']?></td>
<td align="center"><?=getDateConvert($fetch3['date'])?></td>
<td align="center"><?php if($fetch3['sponsor']){?><?=$fetch3['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?=getDateConvert($fetch3['tronwallet'])?></td>
<td align="center"><?php if($fetch3['status']=='A'){?><span style="color:#00CC00;">Unblock</span><?php }else{?><span style="color:#FF0000;">Block</span><?php }?></td>
<td align="center"><?php if($fetch3['paystatus']=='A'){?><span style="color:#00CC00;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
<td align="center"><?=getDateConvert($fetch3['date'])?></td>
<td align="center"><?=getDateConvert($fetch3['approved'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }?>
<?php
$count3=count($arr3);
if($count3>0)
{?>
<h2 style="color:#FF0000;font-size:20px;">&nbsp;Genealogy - Level 5</h2>
<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">User_ID</th>
<th align="center">Name</th>
<th align="center">Join</th>
<th align="center">Sponsor</th>
<th align="center">Tron_Wallet</th>
<th align="center">Status</th>
<th align="center">Paystatus</th>
<th align="center">Join</th>
<th align="center">Approved</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr4=array();
for($k=0;$k<$count3;$k++)
{
$sql4="SELECT * FROM `da_member` WHERE `sponsor`='".$arr3[$k]."'";
$res4=query($conn,$sql4);
$num4=numrows($res4);
if($num4>0)
{
while($fetch4=fetcharray($res4))
{
$arr4[$i]=$fetch4['userid'];
?>
<tr>
<td align="center"><?=($i+1)?></td>
<td align="center"><a href="grid-view.php?placement=<?=$fetch4['userid']?>"><?=$fetch4['userid']?></a></td>
<td align="center"><?=$fetch4['name']?></td>
<td align="center"><?=getDateConvert($fetch4['date'])?></td>
<td align="center"><?php if($fetch4['sponsor']){?><?=$fetch4['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?=getDateConvert($fetch4['tronwallet'])?></td>
<td align="center"><?php if($fetch4['status']=='A'){?><span style="color:#00CC00;">Unblock</span><?php }else{?><span style="color:#FF0000;">Block</span><?php }?></td>
<td align="center"><?php if($fetch4['paystatus']=='A'){?><span style="color:#00CC00;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
<td align="center"><?=getDateConvert($fetch4['date'])?></td>
<td align="center"><?=getDateConvert($fetch4['approved'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }?>
<?php
$count4=count($arr4);
if($count4>0)
{?>
<h2 style="color:#FF0000;font-size:20px;">&nbsp;Genealogy - Level 6</h2>
<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">User_ID</th>
<th align="center">Name</th>
<th align="center">Join</th>
<th align="center">Sponsor</th>
<th align="center">Tron_Wallet</th>
<th align="center">Status</th>
<th align="center">Paystatus</th>
<th align="center">Join</th>
<th align="center">Approved</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr5=array();
for($k=0;$k<$count4;$k++)
{
$sql5="SELECT * FROM `da_member` WHERE `sponsor`='".$arr4[$k]."'";
$res5=query($conn,$sql5);
$num5=numrows($res5);
if($num5>0)
{
while($fetch5=fetcharray($res5))
{
$arr5[$i]=$fetch5['userid'];
?>
<tr>
<td align="center"><?=($i+1)?></td>
<td align="center"><a href="grid-view.php?placement=<?=$fetch5['userid']?>"><?=$fetch5['userid']?></a></td>
<td align="center"><?=$fetch5['name']?></td>
<td align="center"><?=getDateConvert($fetch5['date'])?></td>
<td align="center"><?php if($fetch5['sponsor']){?><?=$fetch5['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?=getDateConvert($fetch5['tronwallet'])?></td>
<td align="center"><?php if($fetch5['status']=='A'){?><span style="color:#00CC00;">Unblock</span><?php }else{?><span style="color:#FF0000;">Block</span><?php }?></td>
<td align="center"><?php if($fetch5['paystatus']=='A'){?><span style="color:#00CC00;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
<td align="center"><?=getDateConvert($fetch5['date'])?></td>
<td align="center"><?=getDateConvert($fetch5['approved'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>

<?php }?>
<?php
$count5=count($arr5);
if($count5>0)
{?>
<h2 style="color:#FF0000;font-size:20px;">&nbsp;Genealogy - Level 7</h2>
<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">User_ID</th>
<th align="center">Name</th>
<th align="center">Join</th>
<th align="center">Sponsor</th>
<th align="center">Tron_Wallet</th>
<th align="center">Status</th>
<th align="center">Paystatus</th>
<th align="center">Join</th>
<th align="center">Approved</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr6=array();
for($k=0;$k<$count5;$k++)
{
$sql6="SELECT * FROM `da_member` WHERE `sponsor`='".$arr5[$k]."'";
$res6=query($conn,$sql6);
$num6=numrows($res6);
if($num6>0)
{
while($fetch6=fetcharray($res6))
{
$arr6[$i]=$fetch6['userid'];
?>
<tr>
<td align="center"><?=($i+1)?></td>
<td align="center"><a href="grid-view.php?placement=<?=$fetch6['userid']?>"><?=$fetch6['userid']?></a></td>
<td align="center"><?=$fetch6['name']?></td>
<td align="center"><?=getDateConvert($fetch6['date'])?></td>
<td align="center"><?php if($fetch6['sponsor']){?><?=$fetch6['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?=getDateConvert($fetch6['tronwallet'])?></td>
<td align="center"><?php if($fetch6['status']=='A'){?><span style="color:#00CC00;">Unblock</span><?php }else{?><span style="color:#FF0000;">Block</span><?php }?></td>
<td align="center"><?php if($fetch6['paystatus']=='A'){?><span style="color:#00CC00;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
<td align="center"><?=getDateConvert($fetch6['date'])?></td>
<td align="center"><?=getDateConvert($fetch6['approved'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>

<?php }?>
<?php
$count6=count($arr6);
if($count6>0)
{?>
<h2 style="color:#FF0000;font-size:20px;">&nbsp;Genealogy - Level 8</h2>
<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">User_ID</th>
<th align="center">Name</th>
<th align="center">Join</th>
<th align="center">Sponsor</th>
<th align="center">Tron_Wallet</th>
<th align="center">Status</th>
<th align="center">Paystatus</th>
<th align="center">Join</th>
<th align="center">Approved</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr7=array();
for($k=0;$k<$count6;$k++)
{
$sql7="SELECT * FROM `da_member` WHERE `sponsor`='".$arr6[$k]."'";
$res7=query($conn,$sql7);
$num7=numrows($res7);
if($num7>0)
{
while($fetch7=fetcharray($res7))
{
$arr7[$i]=$fetch7['userid'];
?>
<tr>
<td align="center"><?=($i+1)?></td>
<td align="center"><a href="grid-view.php?placement=<?=$fetch7['userid']?>"><?=$fetch7['userid']?></a></td>
<td align="center"><?=$fetch7['name']?></td>
<td align="center"><?=getDateConvert($fetch7['date'])?></td>
<td align="center"><?php if($fetch7['sponsor']){?><?=$fetch7['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?=getDateConvert($fetch7['tronwallet'])?></td>
<td align="center"><?php if($fetch7['status']=='A'){?><span style="color:#00CC00;">Unblock</span><?php }else{?><span style="color:#FF0000;">Block</span><?php }?></td>
<td align="center"><?php if($fetch7['paystatus']=='A'){?><span style="color:#00CC00;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
<td align="center"><?=getDateConvert($fetch7['date'])?></td>
<td align="center"><?=getDateConvert($fetch7['approved'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }?>
<?php
$count7=count($arr7);
if($count7>0)
{?>
<h2 style="color:#FF0000;font-size:20px;">&nbsp;Genealogy - Level 9</h2>
<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">User_ID</th>
<th align="center">Name</th>
<th align="center">Join</th>
<th align="center">Sponsor</th>
<th align="center">Tron_Wallet</th>
<th align="center">Status</th>
<th align="center">Paystatus</th>
<th align="center">Join</th>
<th align="center">Approved</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr8=array();
for($k=0;$k<$count7;$k++)
{
$sql8="SELECT * FROM `da_member` WHERE `sponsor`='".$arr7[$k]."'";
$res8=query($conn,$sql8);
$num8=numrows($res8);
if($num8>0)
{
while($fetch8=fetcharray($res8))
{
$arr8[$i]=$fetch8['userid'];
?>
<tr>
<td align="center"><?=($i+1)?></td>
<td align="center"><a href="grid-view.php?placement=<?=$fetch8['userid']?>"><?=$fetch8['userid']?></a></td>
<td align="center"><?=$fetch8['name']?></td>
<td align="center"><?=getDateConvert($fetch8['date'])?></td>
<td align="center"><?php if($fetch8['sponsor']){?><?=$fetch8['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?=getDateConvert($fetch8['tronwallet'])?></td>
<td align="center"><?php if($fetch8['status']=='A'){?><span style="color:#00CC00;">Unblock</span><?php }else{?><span style="color:#FF0000;">Block</span><?php }?></td>
<td align="center"><?php if($fetch8['paystatus']=='A'){?><span style="color:#00CC00;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
<td align="center"><?=getDateConvert($fetch8['date'])?></td>
<td align="center"><?=getDateConvert($fetch8['approved'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }?>
<?php
$count8=count($arr8);
if($count8>0)
{?>
<h2 style="color:#FF0000;font-size:20px;">&nbsp;Genealogy - Level 10</h2>
<table class="table table-head-bg-primary mt-1">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">User_ID</th>
<th align="center">Name</th>
<th align="center">Join</th>
<th align="center">Sponsor</th>
<th align="center">Tron_Wallet</th>
<th align="center">Status</th>
<th align="center">Paystatus</th>
<th align="center">Join</th>
<th align="center">Approved</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$arr9=array();
for($k=0;$k<$count8;$k++)
{
$sql9="SELECT * FROM `da_member` WHERE `sponsor`='".$arr8[$k]."'";
$res9=query($conn,$sql9);
$num9=numrows($res9);
if($num9>0)
{
while($fetch9=fetcharray($res9))
{
$arr9[$i]=$fetch9['userid'];
?>
<tr>
<td align="center"><?=($i+1)?></td>
<td align="center"><a href="grid-view.php?placement=<?=$fetch9['userid']?>"><?=$fetch9['userid']?></a></td>
<td align="center"><?=$fetch9['name']?></td>
<td align="center"><?=getDateConvert($fetch9['date'])?></td>
<td align="center"><?php if($fetch9['sponsor']){?><?=$fetch9['sponsor']?><?php }else{?>----<?php }?></td>
<td align="center"><?=getDateConvert($fetch9['tronwallet'])?></td>
<td align="center"><?php if($fetch9['status']=='A'){?><span style="color:#00CC00;">Unblock</span><?php }else{?><span style="color:#FF0000;">Block</span><?php }?></td>
<td align="center"><?php if($fetch9['paystatus']=='A'){?><span style="color:#00CC00;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
<td align="center"><?=getDateConvert($fetch9['date'])?></td>
<td align="center"><?=getDateConvert($fetch9['approved'])?></td>
</tr>
<?php $i++;}}}?>
</tbody>
</table>
<?php }?>

</div>
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