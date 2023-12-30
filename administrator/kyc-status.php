<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='pancard')
{
if($_REQUEST['st']=='I'){$st='A';}else{$st='I';}

$sql="UPDATE `da_member_kyc` SET `pancardstatus`='".$st."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('kyc-details-pending.php');
}

if($_REQUEST['case']=='aadhar')
{
if($_REQUEST['st']=='I'){$st='A';}else{$st='I';}

$sql="UPDATE `da_member_kyc` SET `aadharfrontstatus`='".$st."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('kyc-details-pending.php');
}

if($_REQUEST['case']=='aadharback')
{
if($_REQUEST['st']=='I'){$st='A';}else{$st='I';}

$sql="UPDATE `da_member_kyc` SET `aadharbackstatus`='".$st."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('kyc-details-pending.php');
}

if($_REQUEST['case']=='passbook')
{
if($_REQUEST['st']=='I'){$st='A';}else{$st='I';}

$sql="UPDATE `da_member_kyc` SET `status`='".$st."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('kyc-details-pending.php');
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_member_kyc` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('kyc-details-pending.php');
}

}
?>