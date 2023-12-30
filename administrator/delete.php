<?php
session_start();
include('includes/function.php');

if($_SESSION['sid'])
{


if($_REQUEST['case']=='feedback')
{
$sql="DELETE FROM `da_feedback` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('feedback.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='imps')
{
$sql="DELETE FROM `da_withdrawal_imps` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('imps-withdrawal.php?page='.$_REQUEST['page']);
}
}
?>