<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}


if($_SESSION['mid'])
{
$sql="SELECT * FROM `da_member` WHERE `userid`= '".mysqli_real_escape_string($conn,trim($_REQUEST['userid']))."' AND `paystatus`='I'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
redirect('topup.php?case=add&userid='.trim($_REQUEST['userid']));
}else{
redirect('topup.php?case=check&e=2');
}
}
?>