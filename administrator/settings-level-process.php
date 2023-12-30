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
$sql1="SELECT * FROM `da_settings_level` WHERE `level`='".mysqli_real_escape_string($conn,$_POST['level'])."' ";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1<1)
{
$sql2="INSERT INTO `da_settings_level` (`level`,`bonus`) VALUES('".mysqli_real_escape_string($conn,$_POST['level'])."','".mysqli_real_escape_string($conn,$_POST['bonus'])."')";
$res2=query($conn,$sql2);      

redirect('settings-level.php?case=add&m=1');
}else{
redirect('settings-level.php?case=add&e=1');
}
}
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='edit')
{
$sql3="SELECT * FROM `da_settings_level` WHERE `level`='".$_REQUEST['level']."' AND  `id`!='".$_REQUEST['id']."'";
$res3=query($conn,$sql3);
$num3=numrows($res3);
if($num3>0)
{
redirect('settings-level.php?case=edit&f=1&id='.$_REQUEST['id']);
}else{

$sql4="UPDATE `da_settings_level` SET `level`='".$_POST['level']."',`bonus`='".mysqli_real_escape_string($conn,$_POST['bonus'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res4=query($conn,$sql4);

}
redirect('settings-level.php');

}
}
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_settings_level` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-level.php');
}
}
?>