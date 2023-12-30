<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='add')
{
$userid=getMember($conn,$_SESSION['mid'],'userid');

$sql="INSERT INTO `da_support` (`userid`,`type`,`subject`,`message`,`date`,`status`) VALUES ('".getMember($conn,$_SESSION['mid'],'userid')."','".mysqli_real_escape_string($conn,$_POST['type'])."','".addslashes(mysqli_real_escape_string($conn,$_POST['subject']))."','".addslashes(trim(mysqli_real_escape_string($conn,$_POST['description'])))."','".date('Y-m-d')."','P')";
$res=query($conn,$sql);

redirect('support.php?case=add&m=1');
}
}
}

?> 