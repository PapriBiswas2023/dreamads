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
$package=trim($_POST['package']);

$userid=$prefix.rand(1111111,9999999);


$sql="INSERT INTO `da_member` (`userid`,`name`,`email`,`phone`,`password`,`package`,`address`,`date`,`approved`,`bname`,`branch`,`accname`,`accno`,`ifscode`,`tronwallet`,`status`,`paystatus`,`renewalstatus`) VALUES('".$userid."','".mysqli_real_escape_string($conn,$_POST['name'])."','".mysqli_real_escape_string($conn,$_POST['email'])."','".trim(mysqli_real_escape_string($conn,$_POST['phone']))."','".base64_encode($_POST['password'])."','".mysqli_real_escape_string($conn,$package)."','".mysqli_real_escape_string($conn,$_POST['address'])."','".date('Y-m-d')."','".date('Y-m-d H:i:s')."','".mysqli_real_escape_string($conn,$_POST['bname'])."','".mysqli_real_escape_string($conn,$_POST['branch'])."','".mysqli_real_escape_string($conn,$_POST['accname'])."','".mysqli_real_escape_string($conn,$_POST['accno'])."','".mysqli_real_escape_string($conn,$_POST['ifscode'])."','".mysqli_real_escape_string($conn,$_POST['tronwallet'])."','A','A','A')";
$res=query($conn,$sql);

$amount=getSettingsPackage($conn,$package,'amount');
if($amount>0)
{
$sql4="INSERT INTO `da_member_package`(`userid`,`package`,`amount`,`date`) VALUES('".$userid."','".$package."','".$amount."','".date('Y-m-d')."')";
$res4=query($conn,$sql4);
}


redirect('member.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='edit')
{
$sql3="UPDATE `da_member` SET `name`='".mysqli_real_escape_string($conn,$_POST['name'])."',`email`='".mysqli_real_escape_string($conn,$_POST['email'])."',`phone`='".mysqli_real_escape_string($conn,$_POST['phone'])."',`password`='".base64_encode(mysqli_real_escape_string($conn,$_POST['password']))."',`address`='".mysqli_real_escape_string($conn,$_POST['address'])."',`bname`='".mysqli_real_escape_string($conn,$_POST['bname'])."',`branch`='".mysqli_real_escape_string($conn,$_POST['branch'])."',`accname`='".mysqli_real_escape_string($conn,$_POST['accname'])."',`accno`='".mysqli_real_escape_string($conn,$_POST['accno'])."',`ifscode`='".mysqli_real_escape_string($conn,$_POST['ifscode'])."',`tronwallet`='".mysqli_real_escape_string($conn,$_POST['tronwallet'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res3=query($conn,$sql3);

redirect('member.php');
}

if($_REQUEST['case']=='delete')
{
$sql2="DELETE FROM `da_member` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('member.php?page='.$_REQUEST['page']);
}
}
?>