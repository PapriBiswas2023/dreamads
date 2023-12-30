<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_member_kyc` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('kyc-details.php');
}

if($_REQUEST['case']=='pancardstatus')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}

$sql="UPDATE `da_member_kyc` SET `pancardstatus`='".$st."'  WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('kyc-details.php');
}


if($_REQUEST['case']=='aadharstatus')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}

$sql="UPDATE `da_member_kyc` SET `aadharstatus`='".$st."'  WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('kyc-details.php');
}
}
?>