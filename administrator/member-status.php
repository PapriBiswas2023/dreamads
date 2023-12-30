<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}
if($_SESSION['sid'])
{
if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}

$sql="UPDATE `da_member` SET `status`='".$st."' WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('member.php');
}
if($_REQUEST['case']=='pay')
{
if($_REQUEST['st']=='A'){$st='I';}else{$st='A';}
$sqll="UPDATE `da_member` SET `paystatus`='".$st."' WHERE `id`='".$_REQUEST['id']."'";
$resl=query($conn,$sqll);
redirect('member.php');
}
}
?>