<?php
session_start();
include('../administrator/includes/function.php');

if($_REQUEST['userid'])
{
$sql="SELECT * FROM `da_member` WHERE `userid`='".trim($_REQUEST['userid'])."' AND `password`='".trim($_REQUEST['password'])."' AND `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$_SESSION['mid']=$fetch['id'];

redirect('dashboard.php');
}else{
redirect('../registration.php?e=1');
}
}
?> 