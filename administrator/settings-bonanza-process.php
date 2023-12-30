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
$sql1="SELECT * FROM `da_settings_bonanza` ";
$res1=query($conn,$sql1);
$num1=numrows($res1);

$sql2="INSERT INTO `da_settings_bonanza` (`withindays`,`memlevel1`,`memlevel2`,`bonus`,`selfaddbonus`) VALUES('".mysqli_real_escape_string($conn,$_POST['withindays'])."','".mysqli_real_escape_string($conn,$_POST['memlevel1'])."','".mysqli_real_escape_string($conn,$_POST['memlevel2'])."','".mysqli_real_escape_string($conn,$_POST['bonus'])."','".mysqli_real_escape_string($conn,$_POST['selfaddbonus'])."')";
$res2=query($conn,$sql2);      

redirect('settings-bonanza.php?case=add&m=1');

}
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_REQUEST['case']=='edit')
{

$sql4="UPDATE `da_settings_bonanza` SET `withindays`='".$_POST['withindays']."',`memlevel1`='".$_POST['memlevel1']."',`memlevel2`='".$_POST['memlevel2']."',`bonus`='".$_POST['bonus']."',`selfaddbonus`='".mysqli_real_escape_string($conn,$_POST['selfaddbonus'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res4=query($conn,$sql4);


redirect('settings-bonanza.php');

}
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_settings_bonanza` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-bonanza.php');
}
}

?>
