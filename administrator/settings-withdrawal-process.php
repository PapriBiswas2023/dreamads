<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
if($_REQUEST['case']=='edit')
{
$sql1="UPDATE `da_settings_withdrawal` SET `minimum`='".trim($_POST['minimum'])."',`maximum`='".trim($_POST['maximum'])."',`tds`='".trim($_POST['tds'])."',`admin`='".trim($_POST['admin'])."',`nodirect`='".trim($_POST['nodirect'])."',`imps`='".trim($_POST['imps'])."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res1=query($conn,$sql1);

redirect('settings-withdrawal.php');
}
}
?>




