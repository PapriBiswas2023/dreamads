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
$sql1="UPDATE `da_support` SET `reply`='".trim($_POST['reply'])."' WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);  
    
redirect('reply.php?case=add&m=1');
}

if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_support` WHERE `id` = '".$_REQUEST['id']."' ";
$res=query($conn,$sql);

redirect('support.php?page='.$_REQUEST['page']);
}

if($_REQUEST['case']=='status')
{
if($_REQUEST['st']=='A'){$st='P';}else{$st='A';}

$sql="UPDATE `da_support` SET `status`='".$st."' WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('support.php?page='.$_REQUEST['page']);
}
}
?>