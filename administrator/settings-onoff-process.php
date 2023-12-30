<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
$sql="UPDATE `da_settings_onoff` SET `registration`='".trim($_POST['registration'])."',`login`='".trim($_POST['login'])."',`withdrawal`='".trim($_POST['withdrawal'])."',`impswithdrawal`='".trim($_POST['impswithdrawal'])."',`currenttofund`='".trim($_POST['currenttofund'])."',`fundtoothers`='".trim($_POST['fundtoothers'])."' WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('settings-onoff.php');
}
?>
