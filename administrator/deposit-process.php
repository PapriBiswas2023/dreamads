<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='add')
{

$sql1="INSERT INTO `da_deposit`(`userid`,`amount`,`wallet`,`remarks`,`date`) VALUES('".trim($_POST['userid'])."','".trim($_POST['amount'])."','".trim($_POST['wallet'])."','".trim(addslashes($_POST['remarks']))."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);   
if($_POST['wallet']=='Fund Wallet')
{
$sqlf="SELECT * FROM da_settings_franchise WHERE `amount`='".trim($_POST['amount'])."'";
$resf=query($conn,$sqlf);
$numf=numrows($resf);
if($numf>0)
{
$fetch2=fetcharray($resf);
$bonus=$fetch2['bonus'];

$sql2="INSERT INTO da_commission_franchise (`userid`,`amount`,`bonus`,`date`) VALUES('".trim($_POST['userid'])."','".trim($_POST['amount'])."','".$bonus."','".date('Y-m-d')."')";
$res2=query($conn,$sql2);
}  
}
redirect('deposit.php?case=add&m=1');
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_deposit` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('deposit.php');
}
}
?>