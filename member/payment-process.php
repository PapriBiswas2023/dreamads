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

/*-----------------------STart OF file CODE-----------*/
if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$rand=rand(1,999999);
$target="receipt/";
$path=$rand.$_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='JPG' || $ext=='gif' || $ext=='xlsx' || $ext=='docx' || $ext=='pdf')
{
$target=$target.basename($path);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
}
}
}
/*-----------------------END OF file CODE-----------*/
$sql1="SELECT * FROM `da_member_payment` WHERE `tranid`='".trim($_POST['tranid'])."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1<1)
{

$sql="INSERT INTO `da_member_payment`(`userid`,`tranid`,`amount`,`receipt`,`status`,`date`) VALUES('".getMember($conn,$_SESSION['mid'],'userid')."','".trim($_POST['tranid'])."','".trim($_POST['amount'])."','".$path."','P','".date('Y-m-d')."')";
$res=query($conn,$sql);

redirect('payment.php?s=1&page='.$_REQUEST['page']);
}else{
redirect('payment.php?f=2&page='.$_REQUEST['page']);
}
}
}
?>