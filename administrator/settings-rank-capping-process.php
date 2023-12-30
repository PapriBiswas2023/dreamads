<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='add')
{
$sql2="SELECT * FROM `da_settings_rank_capping` WHERE `level`='".mysqli_real_escape_string($conn,$_POST['level'])."' ";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2<1)
{
$sql1="INSERT INTO `da_settings_rank_capping` (`level`,`rank`,`team`,`capping`) VALUES('".mysqli_real_escape_string($conn,$_POST['level'])."','".mysqli_real_escape_string($conn,$_POST['rank'])."','".mysqli_real_escape_string($conn,$_POST['team'])."','".mysqli_real_escape_string($conn,$_POST['capping'])."')";
$res1=query($conn,$sql1);      

redirect('settings-rank-capping.php?case=add&m=1');
}else{
redirect('settings-rank-capping.php?case=add&e=1');
}
}
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='edit')
{
$sql2="SELECT * FROM `da_settings_rank_capping` WHERE `level`='".trim($_REQUEST['level'])."' AND `id`!='".trim($_REQUEST['id'])."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
redirect('settings-rank-capping.php?case=edit&f=1&id='.$_REQUEST['id']);
}else{

$sql2="UPDATE `da_settings_rank_capping` SET `level`='".trim($_POST['level'])."',`rank`='".mysqli_real_escape_string($conn,$_POST['rank'])."',`team`='".mysqli_real_escape_string($conn,$_POST['team'])."',`capping`='".trim($_POST['capping'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res2=query($conn,$sql2);
}

redirect('settings-rank-capping.php');

}
}
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_settings_rank_capping` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-rank-capping.php');
}
}
?>