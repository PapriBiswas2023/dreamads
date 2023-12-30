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

$fund=getFundWallet($conn,$userid);
$amount=getSettingsJoining($conn,'joining');
if($fund>=$amount)
{
$date=strtotime(date("Y-m-d"));

$sql1="UPDATE `da_member` SET `renewalstatus`='A'  WHERE `id`='".trim($_SESSION['mid'])."'";
$res1=query($conn,$sql1);

$sql23="INSERT INTO `da_member_renewal`(`userid`,`amount`,`date`) VALUES('".$userid."','".$amount."','".date('Y-m-d')."')";
$res23=query($conn,$sql23);

//-------------------------------------------//  
redirect('dashboard.php?n=1');
}else{
redirect('renewal.php?e=1');
}
}
}
?>