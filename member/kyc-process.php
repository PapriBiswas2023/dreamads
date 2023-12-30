<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
if($_SERVER['REQUEST_METHOD']=='POST')
{
if($_SESSION['mid'])
{
$sqlct="SELECT * FROM `da_member_kyc` WHERE `pancardno`='".trim($_POST['pancardno'])."' OR `aadharcardno`='".trim($_POST['aadharcardno'])."'";
$resct=query($conn,$sqlct);
$numct=numrows($resct);
if($numct>0)
{
redirect('kyc-update.php?e=1');
}else{

//------------------------------//
if($_FILES['pancard']['name'])
{
if(strpos($_FILES['pancard']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="kyc/";
$path1=$rand.$_FILES['pancard']['name'];
$ext = pathinfo($path1, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path1);
move_uploaded_file($_FILES['pancard']['tmp_name'], $target);
}
}
}

if($_FILES['aadharfront']['name'])
{
if(strpos($_FILES['aadharfront']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="kyc/";
$path2=$rand.$_FILES['aadharfront']['name'];
$ext = pathinfo($path2, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path2);
move_uploaded_file($_FILES['aadharfront']['tmp_name'], $target);
}
}
}

if($_FILES['aadharback']['name'])
{
if(strpos($_FILES['aadharback']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="kyc/";
$path3=$rand.$_FILES['aadharback']['name'];
$ext = pathinfo($path2, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path3);
move_uploaded_file($_FILES['aadharback']['tmp_name'], $target);
}
}
}
if($_FILES['passbook']['name'])
{
if(strpos($_FILES['passbook']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="kyc/";
$path4=$rand.$_FILES['passbook']['name'];
$ext = pathinfo($path4, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif')
{
$target=$target.basename($path4);
move_uploaded_file($_FILES['passbook']['tmp_name'], $target);
}
}
}
$userid=getMember($conn,$_SESSION['mid'],'userid');

$sqlc="SELECT * FROM `da_member_kyc` WHERE `userid`='".$userid."'";
$resc=query($conn,$sqlc);
$numc=numrows($resc);
if($numc<1)
{
 $sql="INSERT INTO `da_member_kyc` (`userid`,`pancardno`,`pancard`,`pancardstatus`,`aadharcardno`,`aadharfront`,`aadharfrontstatus`,`aadharback`,`aadharbackstatus`,`passbook`,`status`,`date`) VALUES('".$userid."','".mysqli_real_escape_string($conn,$_POST['pancardno'])."','".$path1."','I','".mysqli_real_escape_string($conn,$_POST['aadharcardno'])."','".$path2."','I','".$path3."','I','".$path4."','I','".date('Y-m-d')."')";
$res=query($conn,$sql);

}else{
$sql="UPDATE `da_member_kyc` SET `pancardno`='".mysqli_real_escape_string($conn,$_POST['pancardno'])."',`pancard`='".$path1."',`aadharcardno`='".mysqli_real_escape_string($conn,$_POST['aadharcardno'])."',`aadharfront`='".$path2."',`aadharback`='".$path3."',`passbook`='".$path4."' WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
}

redirect('kyc-update.php?m=1');
//---------------------------------//
}
}
}
}
?>