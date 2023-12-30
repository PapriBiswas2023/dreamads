<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_SESSION['mid'])
{
$userid=getMember($conn,$_SESSION['mid'],'userid');

$sql="SELECT * FROM `da_advertisement_view` WHERE `userid`='".trim($userid)."' AND `adsid`='".trim($_POST['ads'])."' AND `date`='".date('Y-m-d')."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num<1)
{
$sqlin="INSERT INTO `da_advertisement_view` (`userid`,`adsid`,`date`) VALUES ('".trim($userid)."','".trim($_POST['ads'])."','".date('Y-m-d')."')";
$resin=query($conn,$sqlin);


include('calculate-self-ads-bonus.php');
include('calculate-level-ads-bonus.php');
}
redirect('advertisement.php?case=start');
}
}
?>