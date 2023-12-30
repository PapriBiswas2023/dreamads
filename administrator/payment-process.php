<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
} 
 
if($_SESSION['sid'])
{
if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='P'){$st='C';}else{$st='P';}

$sql="UPDATE `da_member_payment` SET `status`='".$st."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

 
$sqlf="SELECT * FROM da_settings_franchise WHERE `amount`='".trim($_REQUEST['amount'])."'";
$resf=query($conn,$sqlf);
$numf=numrows($resf);
if($numf>0)
{
$fetch2=fetcharray($resf);

$sql2="INSERT INTO `da_commission_franchise` (`userid`,`amount`,`bonus`,`date`) VALUES('".trim($_REQUEST['userid'])."','".trim($_REQUEST['amount'])."','".$fetch2['bonus']."','".date('Y-m-d')."')";
$res2=query($conn,$sql2);
}


redirect('payment.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_member_payment` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('payment.php?page='.$_REQUEST['page']);
}
}
?>
