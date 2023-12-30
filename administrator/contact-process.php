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
$sql1="INSERT INTO `da_contact` (`office`,`address1`,`address2`,`phone1`,`phone2`,`email1`,`email2`,`date`) VALUES('".$_POST['office']."','".$_POST['address1']."','".mysqli_real_escape_string($conn,$_POST['address2'])."','".mysqli_real_escape_string($conn,$_POST['phone1'])."','".mysqli_real_escape_string($conn,$_POST['phone2'])."','".mysqli_real_escape_string($conn,$_POST['email1'])."','".mysqli_real_escape_string($conn,$_POST['email2'])."','".date('Y-m-d')."')";
$res1=query($conn,$sql1);  
    
redirect('contact.php?case=add&m=1');
}

 
if($_REQUEST['case']=='edit')
{
$sql2="UPDATE `da_contact` SET `office`='".$_POST['office']."',`address1`='".$_POST['address1']."',`address2`='".mysqli_real_escape_string($conn,$_POST['address2'])."',`phone1`='".mysqli_real_escape_string($conn,$_POST['phone1'])."',`phone2`='".mysqli_real_escape_string($conn,$_POST['phone2'])."',`email1`='".mysqli_real_escape_string($conn,$_POST['email1'])."',`email2`='".mysqli_real_escape_string($conn,$_POST['email2'])."' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res2=query($conn,$sql2);

redirect('contact.php');
}


if($_REQUEST['case']=='delete')
{
$sql="DELETE FROM `da_contact` WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql);

redirect('contact.php');
}
}
?>