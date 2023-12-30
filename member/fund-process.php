<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=getMember($conn,$_SESSION['mid'],'userid');
$toid=trim($_POST['toid']);
if($userid!=$toid)
{
$sqlp="SELECT * FROM `da_member` WHERE `userid`='".trim($_POST['toid'])."'";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump>0)
{
$a=$_POST['amount'];
if($_POST['amount']>0)
{

$minimum=getSettingsTransfer($conn,'minimum');
if(trim($_POST['amount'])>=$minimum)
{
$avabal=getFundWallet($conn,$userid);

if($avabal>=trim($_POST['amount']))
{
$sql="INSERT INTO `da_transfer_fund_others` (`userid`,`toid`,`fund`,`date`) VALUES('".trim($userid)."','".trim($_POST['toid'])."','".trim($_POST['amount'])."','".date('Y-m-d')."')";
$res=query($conn,$sql);

redirect('fund.php?m=1');
}else{
redirect('fund.php?e=2');
}
}
else{
redirect('fund.php?e=1');
}
}else{
redirect('fund.php?f=1');
}
}else{
redirect('fund.php?e=3');
}
}else{
redirect('fund.php?e=3');
}
}
?>