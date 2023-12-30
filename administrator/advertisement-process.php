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
$sql="INSERT INTO `da_advertisement` (`type`,`title`,`url`,`seconds`,`status`,`date`) VALUES('".mysqli_real_escape_string($conn,$_POST['type'])."','".mysqli_real_escape_string($conn,$_POST['title'])."','".mysqli_real_escape_string($conn,$_POST['url'])."','".mysqli_real_escape_string($conn,$_POST['seconds'])."','A','".date('Y-m-d')."')";
$res=query($conn,$sql);

redirect('advertisement.php?case=add&m=1');
}

if($_REQUEST['case']=='edit')
{
$sql3="UPDATE `da_advertisement` SET `type`='".mysqli_real_escape_string($conn,$_POST['type'])."',`title`='".mysqli_real_escape_string($conn,$_POST['title'])."',`url`='".mysqli_real_escape_string($conn,$_POST['url'])."',`seconds`='".mysqli_real_escape_string($conn,$_POST['seconds'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res3=query($conn,$sql3);

redirect('advertisement.php');
}

if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='I'){$st='A';}else{$st='I';}

$sql="UPDATE `da_advertisement` SET `status`='".$st."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('advertisement.php');
}



if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_advertisement` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('advertisement.php');
}
} 
?>
