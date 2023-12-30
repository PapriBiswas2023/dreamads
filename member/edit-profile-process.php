<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
if ($_FILES['file']['name'])
{ 
if (strpos($_FILES['file']['name'], 'php') == false)
{
$rand = rand(1, 999999);
$target = "profile/";
$path = $rand . $_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'gif')
{
$target = $target . basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);

$sql = "UPDATE  `da_member` SET `name`='".trim($_POST['name'])."',`phone`='".trim($_POST['phone'])."',`email`='".trim($_POST['email'])."',`address`='".trim($_POST['address'])."',`bname`='".trim($_POST['bname'])."',`branch`='".trim($_POST['branch'])."',`accname`='".trim($_POST['accname'])."',`accno`='".trim($_POST['accno'])."',`ifscode`='".trim($_POST['ifscode'])."',`tronwallet`='".trim($_POST['tronwallet'])."',`profile`='".$path."' WHERE `id`='" . trim($_SESSION['mid']) . "'";
$res = query($conn, $sql);

redirect('edit-profile.php?m=1');
}
}
}
else
{
$sql = "UPDATE  `da_member` SET `name`='".trim($_POST['name'])."',`phone`='".trim($_POST['phone'])."',`email`='".trim($_POST['email'])."',`address`='".trim($_POST['address'])."',`bname`='".trim($_POST['bname'])."',`branch`='".trim($_POST['branch'])."',`accname`='".trim($_POST['accname'])."',`accno`='".trim($_POST['accno'])."',`ifscode`='".trim($_POST['ifscode'])."',`tronwallet`='".trim($_POST['tronwallet'])."' WHERE `id`='".trim($_SESSION['mid'])."'";
$res = query($conn, $sql);

redirect('edit-profile.php?m=1');
}
}
?>