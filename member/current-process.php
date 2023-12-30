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
if($_POST['current']>0)
{
$userid=getMember($conn,$_SESSION['mid'],'userid');

$percent=getSettingsTransfer($conn,'chargeper');
$charge=($_POST['current']*$percent)/100;
$fund=($_POST['current']-$charge);

$avabal=getAvailableWallet($conn,$userid);
if($avabal>=$_POST['current'])
{ 
$minimum=getSettingsTransfer($conn,'minimum');
$current=$_POST['current'];

if($_POST['current']>=$minimum)
{
$sql="INSERT INTO `da_transfer_current_fund` (`userid`,`current`,`charge`,`fund`,`date`) VALUES('".trim($userid)."','".$_POST['current']."','".$charge."','".$fund."','".date('Y-m-d')."')";
$res=query($conn,$sql);


redirect('current.php?m=1');
}
else{
redirect('current.php?s=1');
}
}
else{
redirect('current.php?e=2');
}
}else{
redirect('current.php?e=1');
}
}
}
?>