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
$sql1="SELECT * FROM `da_settings_cto` WHERE `nodirect`='".mysqli_real_escape_string($conn,$_POST['nodirect'])."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1<1)
{
$sql2="INSERT INTO `da_settings_cto` (`nodirect`,`ctoper`) VALUES('".mysqli_real_escape_string($conn,$_POST['nodirect'])."','".mysqli_real_escape_string($conn,$_POST['ctoper'])."')";
$res2=query($conn,$sql2);      

redirect('settings-cto.php?case=add&m=1');
}else{
redirect('settings-cto.php?case=add&e=1');
}
}
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='edit')
{
$sql3="SELECT * FROM `da_settings_cto` WHERE `nodirect`='".$_REQUEST['nodirect']."' AND  `id`!='".$_REQUEST['id']."'";
$res3=query($conn,$sql3);
$num3=numrows($res3);
if($num3>0)
{
redirect('settings-cto.php?case=edit&f=1&id='.$_REQUEST['id']);
}else{

$sql4="UPDATE `da_settings_cto` SET `nodirect`='".$_POST['nodirect']."',`ctoper`='".mysqli_real_escape_string($conn,$_POST['ctoper'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res4=query($conn,$sql4);

}
redirect('settings-cto.php');

}
}
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_settings_cto` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-cto.php');
}
}
?>