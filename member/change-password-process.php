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
$sql="SELECT * FROM `da_member` WHERE `id`='".$_SESSION['mid']."' AND `password`='".base64_encode(trim($_POST['current']))."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
if(trim($_POST['newpass'])==trim($_POST['conpass']))
{
$sql="UPDATE `da_member` SET `password`='".base64_encode(trim($_POST['newpass']))."' WHERE `id`='".trim($_SESSION['mid'])."'";
$res=query($conn,$sql);

redirect('change-password.php?n=2');
}else{
redirect('change-password.php?p=3');
}

}else{
redirect('change-password.php?m=1');
}
}
}
?>