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
$sql1="UPDATE `da_settings_transfer` SET `minimum`='".trim($_POST['minimum'])."',`chargeper`='".trim($_POST['chargeper'])."'  WHERE `id`='".$_REQUEST['id']."'";
$res1=query($conn,$sql1);

redirect('settings-transfer.php');
}
}
?>