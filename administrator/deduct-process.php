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
$sql="SELECT * FROM `da_member` WHERE `userid`='".trim(mysqli_real_escape_string($conn,$_POST['userid']))."' AND `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
if(trim($_POST['amount'])>0)
{
$sql1="INSERT INTO `da_deduct` (`userid`,`wallet`,`amount`,`remarks`,`date`) VALUES('".trim($_POST['userid'])."','".trim($_POST['wallet'])."','".trim($_POST['amount'])."','".addslashes(strip_tags($_POST['remarks']))."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);    
  
redirect('deduct.php?case=add&m=1');
}else{
redirect('deduct.php?case=add&e=1');
}
}else{
redirect('deduct.php?case=add&f=2');
}

}
}


if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_deduct` WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('deduct.php');
}
}
?>