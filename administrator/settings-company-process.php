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

if($_FILES['qrcode']['name'])
{
if(strpos($_FILES['qrcode']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="qrcode/";
$path=$rand.$_FILES['qrcode']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['qrcode']['tmp_name'], $target);
}
}

$sql1="UPDATE `da_settings_company` SET `qrcode`='".$path."',`bname`='".trim(mysqli_real_escape_string($conn,$_POST['bname']))."',`branch`='".trim(mysqli_real_escape_string($conn,$_POST['branch']))."',`accname`='".trim(mysqli_real_escape_string($conn,$_POST['accname']))."',`accno`='".trim(mysqli_real_escape_string($conn,$_POST['accno']))."',`ifscode`='".trim(mysqli_real_escape_string($conn,$_POST['ifscode']))."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res1=query($conn,$sql1);
}else{

$sql11="UPDATE `da_settings_company` SET `bname`='".trim(mysqli_real_escape_string($conn,$_POST['bname']))."',`branch`='".trim(mysqli_real_escape_string($conn,$_POST['branch']))."',`accname`='".trim(mysqli_real_escape_string($conn,$_POST['accname']))."',`accno`='".trim(mysqli_real_escape_string($conn,$_POST['accno']))."',`ifscode`='".trim(mysqli_real_escape_string($conn,$_POST['ifscode']))."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res11=query($conn,$sql11);

}

redirect('settings-company.php');
}
}
?>
