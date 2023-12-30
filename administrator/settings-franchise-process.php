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
$sql1="SELECT * FROM `da_settings_franchise` WHERE `amount`='".mysqli_real_escape_string($conn,$_POST['amount'])."' ";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1<1)
{
$sql2="INSERT INTO `da_settings_franchise` (`amount`,`bonus`) VALUES('".mysqli_real_escape_string($conn,$_POST['amount'])."','".mysqli_real_escape_string($conn,$_POST['bonus'])."')";
$res2=query($conn,$sql2);      

redirect('settings-franchise.php?case=add&m=1');
}else{
redirect('settings-franchise.php?case=add&e=1');
}
}
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='edit')
{
$sql3="SELECT * FROM `da_settings_franchise` WHERE `amount`='".$_REQUEST['amount']."' AND  `id`!='".$_REQUEST['id']."'";
$res3=query($conn,$sql3);
$num3=numrows($res3);
if($num3>0)
{
redirect('settings-franchise.php?case=edit&f=1&id='.$_REQUEST['id']);
}else{

$sql4="UPDATE `da_settings_franchise` SET `amount`='".$_POST['amount']."',`bonus`='".mysqli_real_escape_string($conn,$_POST['bonus'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res4=query($conn,$sql4);

}
redirect('settings-franchise.php');

}
}
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_settings_franchise` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-franchise.php');
}
}
?>