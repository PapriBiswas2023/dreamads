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
$sql="INSERT INTO `da_announcement` (`announcement`,`date`) VALUES('".trim(addslashes($_POST['announcement']))."','".date('Y-m-d')."')";
$res=query($conn,$sql);

redirect('announcement.php?case=add&m=1');
}

if($_REQUEST['case']=='edit')
{
$sql1="UPDATE `da_announcement` SET `announcement`='".mysqli_real_escape_string($conn,addslashes($_POST['announcement']))."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);

redirect('announcement.php');
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_announcement` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('announcement.php');
}
}
?> 