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
$sql1="SELECT * FROM `da_settings_package` WHERE `package`='".mysqli_real_escape_string($conn,$_POST['package'])."' ";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1<1)
{
$sql2="INSERT INTO `da_settings_package` (`package`,`amount`,`selfaddbonus`,`directbonus`,`maxincome`) VALUES('".mysqli_real_escape_string($conn,$_POST['package'])."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".mysqli_real_escape_string($conn,$_POST['selfaddbonus'])."','".mysqli_real_escape_string($conn,$_POST['directbonus'])."','".mysqli_real_escape_string($conn,$_POST['maxincome'])."')";
$res2=query($conn,$sql2);      

redirect('settings-package.php?case=add&m=1');
}else{
redirect('settings-package.php?case=add&e=1');
}
}
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='edit')
{
$sql3="SELECT * FROM `da_settings_package` WHERE `package`='".$_REQUEST['package']."' AND  `id`!='".$_REQUEST['id']."'";
$res3=query($conn,$sql3);
$num3=numrows($res3);
if($num3>0)
{
redirect('settings-package.php?case=edit&f=1&id='.$_REQUEST['id']);
}else{

$sql4="UPDATE `da_settings_package` SET `package`='".$_POST['package']."',`amount`='".$_POST['amount']."',`selfaddbonus`='".mysqli_real_escape_string($conn,$_POST['selfaddbonus'])."',`directbonus`='".$_POST['directbonus']."',`maxincome`='".$_POST['maxincome']."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res4=query($conn,$sql4);

}
redirect('settings-package.php');

}
}
if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_settings_package` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-package.php');
}
}
?>