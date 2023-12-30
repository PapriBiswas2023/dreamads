<?php
session_start();
include('../master/includes/function.php');
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
<!--<script>
function newJoinMember(userid,position)
{
window.location.href='member-joining.php?placement='+userid+'&position='+position;
}
</script>-->
<style>
.button
{
background:#FF6600;
color:#FFFFFF;
border:1px solid #FF3300;
margin-bottom:5px;
padding:3px 10px;
border-radius:5px;
}
.button:hover
{
background:#009900;
color:#FFFFFF;
border:1px solid #FF3300;
margin-bottom:5px;
}
.tooltip1 {
    position: relative;
    display: inline-block;
   /* border-bottom: 1px dotted black;*/
}

.tooltip1 .tooltiptext1 {
    visibility: hidden;
    width: 400px;
    background-color: #000000;
    color: #FFFFFF;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    
    left: 50%;
	top: 120%;
    margin-left: -200px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip1 .tooltiptext1::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
  
}

.tooltip1:hover .tooltiptext1 {
    visibility: visible;
    opacity: 1;
}
</style>
<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body style="background-image: linear-gradient(to bottom, #f4f5f5, #dfdddd);">
<div class="wrapper">
<!--
Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
-->
<?php include('header.php')?>
<!-- Sidebar -->
<?php include('leftmenu.php')?>
<div class="main-panel">
<div class="content" style="background:#000000;">
<div class="page-inner">

<div class="row">

<div class="col-md-12">

<div class="card" style="background:#FFFFFF;">
<div class="card-header">
<div class="card-title" style="color:#000000;">Tree View</div>
</div>
<div class="card-body">
<div class="portlet-body" style="overflow:auto;min-height:500px;">

<?php
if($_REQUEST['userid'])
{
$sqlfist="SELECT * FROM `da_genealogy` WHERE `userid`='".$_REQUEST['userid']."'";
}else{
$sqlfist="SELECT * FROM `da_genealogy` WHERE `userid`='".getMember($conn,$_SESSION['mid'],'userid')."'";
}
$resfirst=query($conn,$sqlfist);
$numfirst=numrows($resfirst);
if($numfirst>0)
{
$fetchfirst=fetcharray($resfirst);
$userid=$fetchfirst['userid'];
?>

<table width="800" align="center">
<tr><td align="center" colspan="2">
<table align="center" width="50%">

<td align="center" colspan="2"><a href="tree-view.php?userid=<?=$userid?>" style="text-decoration:none;">
<div class="boxDiv" align="center">

<div class="tooltip1">

<img src="genealogy.png" width="35" height="35"/>
<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;<?php if(getMemberUserid($conn,$userid,'sponsor')){?><?=getMemberUserid($conn,$userid,'sponsor')?><?php }else{?>----<?php }?>
</td> bv 
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid,'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid,'active')){?><?=getMemberUserid($conn,$userid,'active')?><?php }else{?>----<?php } ?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>
<br /><?=getMemberUserid($conn,$userid,'name')?><br /> (<?=$userid?>)

</div>
</a></td>

</table>
</td></tr>
<tr><td align="center" colspan="2" style="text-align:center;"><img src="line1.png" style="margin:0;padding:0;" /></td></tr>
<tr><td align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid1=getDownlineByPosition($conn,$userid,'Left');
if($userid1)
{
?>
<a href="tree-view.php?userid=<?=$userid1?>" style="text-decoration:none;">
<div class="boxDiv" align="center">
<br /><div class="tooltip1">

<img src="genealogy.png" width="35" height="35"/>
<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid1,'sponsor')){?><?=getMemberUserid($conn,$userid1,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid1,'date')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid1,'active')){?><?=getMemberUserid($conn,$userid1,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid1,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid1,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>

</table>

</span>
</div>


<br /><?=getMemberUserid($conn,$userid1,'name')?><br /> (<?=$userid1?>)


</div></a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid){?>
<a onClick="newJoinMember('<?=$userid?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
<tr><td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line2.png" style="margin:0;padding:0;" /></td></tr>
<tr><td align="center" valign="top">
<table align="center" width="200">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid3=getDownlineByPosition($conn,$userid1,'Left');
if($userid3)
{
?>
<a href="tree-view.php?userid=<?=$userid3?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid3,'sponsor')){?><?=getMemberUserid($conn,$userid3,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid3,'date')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid3,'active')){?><?=getMemberUserid($conn,$userid3,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid3,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid3,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>
<br /><?=getMemberUserid($conn,$userid3,'name')?></br> (<?=$userid3?>)
</div>


</a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid1){?>
<a onClick="newJoinMember('<?=$userid1?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
<tr><td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line3.png" style="margin:0;padding:0;" /></td></tr>
<tr><td width="99" align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid7=getDownlineByPosition($conn,$userid3,'Left');
if($userid7)
{
?>
<a href="tree-view.php?userid=<?=$userid7?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br /><div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid7,'sponsor')){?><?=getMemberUserid($conn,$userid7,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid7,'date')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid7,'active')){?><?=getMemberUserid($conn,$userid7,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid7,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid7,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>


<br /><?=getMemberUserid($conn,$userid7,'name')?> <br /> (<?=$userid7?>)

</div></a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid3){?>
<a onClick="newJoinMember('<?=$userid3?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
</table>
</td><td width="87" align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid8=getDownlineByPosition($conn,$userid3,'Right');
if($userid8)
{
?>
<a href="tree-view.php?userid=<?=$userid8?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />
<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid8,'sponsor')){?><?=getMemberUserid($conn,$userid8,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid8,'date')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid8,'active')){?><?=getMemberUserid($conn,$userid8,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid8,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid8,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>


<br /><?=getMemberUserid($conn,$userid8,'name')?> <br /> (<?=$userid8?>)
</div></a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid3){?>
<a onClick="newJoinMember('<?=$userid3?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
</table>
</td></tr>

</table>
</td><td align="center" valign="top">
<table align="center" width="200">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid4=getDownlineByPosition($conn,$userid1,'Right');
if($userid4)
{
?>
<a href="tree-view.php?userid=<?=$userid4?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">

<table width="100%">
<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid4,'sponsor')){?><?=getMemberUserid($conn,$userid4,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid4,'date')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid4,'active')){?><?=getMemberUserid($conn,$userid4,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid4,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid4,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>
<br /><?=getMemberUserid($conn,$userid4,'name')?> <br /> (<?=$userid4?>)

</div></a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid1){?>
<a onClick="newJoinMember('<?=$userid1?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
<tr><td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line3.png" style="margin:0;padding:0;" /></td></tr>
<tr><td align="center">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid9=getDownlineByPosition($conn,$userid4,'Left');
if($userid9)
{
?>
<a href="tree-view.php?userid=<?=$userid9?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />
<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid9,'sponsor')){?><?=getMemberUserid($conn,$userid9,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid9,'date')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid9,'active')){?><?=getMemberUserid($conn,$userid9,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid9,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid9,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>

</table>

</span>
</div>


<br /><?=getMemberUserid($conn,$userid9,'name')?> <br /> (<?=$userid9?>)

</div></a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid4){?>
<a onClick="newJoinMember('<?=$userid4?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>

</table>
</td><td align="center">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid10=getDownlineByPosition($conn,$userid4,'Right');
if($userid10)
{
?>
<a href="tree-view.php?userid=<?=$userid10?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid10,'sponsor')){?><?=getMemberUserid($conn,$userid10,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid10,'date')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid10,'active')){?><?=getMemberUserid($conn,$userid10,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid10,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid10,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>
</div>


<br /><?=getMemberUserid($conn,$userid10,'name')?><br /> (<?=$userid10?>)


</div></a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid4){?>
<a onClick="newJoinMember('<?=$userid4?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
</table>
</td></tr>
</table>
</td></tr>

</table>
</td><td align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid2=getDownlineByPosition($conn,$userid,'Right');
if($userid2)
{
?>
<a href="tree-view.php?userid=<?=$userid2?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid2,'sponsor')){?><?=getMemberUserid($conn,$userid2,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid2,'date')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid2,'active')){?><?=getMemberUserid($conn,$userid2,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid2,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid2,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>


<br /><?=getMemberUserid($conn,$userid2,'name')?> <br /> (<?=$userid2?>)

</div></a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid){?>
<a onClick="newJoinMember('<?=$userid?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
<tr><td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line2.png" style="margin:0;padding:0;" /></td></tr>
<tr><td align="center" valign="top">
<table align="center" width="200">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid5=getDownlineByPosition($conn,$userid2,'Left');
if($userid5)
{
?>
<a href="tree-view.php?userid=<?=$userid5?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid5,'sponsor')){?><?=getMemberUserid($conn,$userid5,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid5,'date')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid5,'active')){?><?=getMemberUserid($conn,$userid5,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid5,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid5,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>

</span>
</div>


<br /><?=getMemberUserid($conn,$userid5,'name')?><br /> (<?=$userid5?>)


</div></a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid2){?>
<a onClick="newJoinMember('<?=$userid2?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
<tr><td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line3.png" style="margin:0;padding:0;" /></td></tr>
<tr><td align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid11=getDownlineByPosition($conn,$userid5,'Left');
if($userid11)
{
?>
<a href="tree-view.php?userid=<?=$userid11?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />


<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid11,'sponsor')){?><?=getMemberUserid($conn,$userid11,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid11,'date')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid11,'active')){?><?=getMemberUserid($conn,$userid11,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid11,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid11,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>


</span>
</div>

<br /><?=getMemberUserid($conn,$userid11,'name')?><br /> (<?=$userid11?>)

</div></a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid5){?>
<a onClick="newJoinMember('<?=$userid5?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>

</table>
</td><td align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid12=getDownlineByPosition($conn,$userid5,'Right');
if($userid12)
{
?>
<a href="tree-view.php?userid=<?=$userid12?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />
<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid12,'sponsor')){?><?=getMemberUserid($conn,$userid12,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid12,'date')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid12,'active')){?><?=getMemberUserid($conn,$userid12,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid12,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid12,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>


</span>
</div>



<br /><?=getMemberUserid($conn,$userid12,'name')?> <br /> (<?=$userid12?>)

</div></a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid5){?>
<a onClick="newJoinMember('<?=$userid5?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
</table>
</td></tr>
</table>
</td><td align="center" valign="top">
<table align="center" width="200">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid6=getDownlineByPosition($conn,$userid2,'Right');
if($userid6)
{
?>
<a href="tree-view.php?userid=<?=$userid6?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">
<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid6,'sponsor')){?><?=getMemberUserid($conn,$userid6,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid6,'date')?></td>
</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid6,'active')){?><?=getMemberUserid($conn,$userid6,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid6,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid6,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>
</table>
</span>

</div>


<br /><?=getMemberUserid($conn,$userid6,'name')?><br /> (<?=$userid6?>)

</div></a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid2){?>
<a onClick="newJoinMember('<?=$userid2?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
<tr><td align="center" colspan="2" valign="top" style="text-align:center;"><img src="line3.png" style="margin:0;padding:0;" /></td></tr>
<tr><td align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid13=getDownlineByPosition($conn,$userid6,'Left');
if($userid13)
{
?>
<a href="tree-view.php?userid=<?=$userid13?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />

<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid13,'sponsor')){?><?=getMemberUserid($conn,$userid13,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid13,'date')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid13,'active')){?><?=getMemberUserid($conn,$userid13,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid13,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid13,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>

</table>

</span>

</div>



<br /><?=getMemberUserid($conn,$userid13,'name')?><br /> (<?=$userid13?>)
</div></a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid6){?>
<a onClick="newJoinMember('<?=$userid6?>','Left')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />
<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>

</table>
</td><td align="center" valign="top">
<table align="center">
<tr><td align="center" colspan="2">
<div class="boxDiv" align="center">
<?php
$userid14=getDownlineByPosition($conn,$userid6,'Right');
if($userid14)
{
?>
<a href="tree-view.php?userid=<?=$userid14?>" style="text-decoration:none;"><div class="boxDiv" align="center">
<br />


<div class="tooltip1">
<img src="genealogy.png" width="35" height="35" />

<span class="tooltiptext1">

<table width="100%">

<tr height="20">
<td>&nbsp;</td>
<td align="left">Sponsor ID:&nbsp;
<?php if(getMemberUserid($conn,$userid14,'sponsor')){?><?=getMemberUserid($conn,$userid14,'sponsor')?><?php }else{?>----<?php }?>
</td>
<td align="left">Joining Date:&nbsp;<?=getMemberUserid($conn,$userid14,'date')?></td>
</tr>

<tr height="20">
<td>&nbsp;</td>

<td align="left">Approved Date:&nbsp;<?php if(getMemberUserid($conn,$userid14,'active')){?><?=getMemberUserid($conn,$userid14,'active')?><?php }else{?>----<?php } ?></td>

</tr>
<tr height="20">
<td>&nbsp;</td>
<td align="left">Status:&nbsp;<?php if(getMemberUserid($conn,$userid14,'status')=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>
<td align="left">
Pay_Status:&nbsp;<?php if(getMemberUserid($conn,$userid14,'paystatus')=='A'){?><span style="color:#009900;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>
</tr>


</table>


</span>

</div>



<br /><?=getMemberUserid($conn,$userid14,'name')?> <br /> (<?=$userid14?>)


</div></a>
<?php }else{?>
<p>&nbsp;</p>
<?php if($userid6){?>
<a onClick="newJoinMember('<?=$userid6?>','Right')" style="cursor:pointer;color:#FF0000;"><img src="blink.gif" /></a>
<?php }else{?>
<img src="new.png" />

<?php }?>
<p>&nbsp;</p>
<?php }?>
</div>
</td></tr>
</table>
</td></tr>
</table>
</td></tr>
</table>
</td></tr>
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