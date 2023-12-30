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
$sql1="SELECT * FROM `da_settings_package` WHERE `package`='".$_REQUEST['package']."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
redirect('package.php?case=add&e=1');
}else{
echo $sql="INSERT INTO `da_settings_package` (`package`,`amount`,`capping`,`selfadd`) VALUES('".ucwords($_POST['package'])."','".$_POST['amount']."','".$_POST['capping']."','".$_POST['selfadd']."')";
$res=query($conn,$sql);
redirect('package.php?case=add&g=3');
}
}

if($_REQUEST['case']=='edit')
{

$sql2="SELECT * FROM `da_settings_package` WHERE `package`='".$_REQUEST['package']."' AND  `id`!='".$_REQUEST['id']."'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
redirect('package.php?case=edit&f=1&id='.$_REQUEST['id']);
}else{

$sql1="UPDATE `da_settings_package` SET `package`='".mysqli_real_escape_string($conn,$_POST['package'])."',`amount`='".mysqli_real_escape_string($conn,$_POST['amount'])."',`capping`='".mysqli_real_escape_string($conn,$_POST['capping'])."',`selfadd`='".mysqli_real_escape_string($conn,$_POST['selfadd'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);

redirect('package.php');

}
}


if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_settings_package` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('package.php');
}
}
?> 