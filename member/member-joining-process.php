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
$pass=trim($_POST['password']);
$cpass=trim($_POST['cpassword']);
if($pass==$cpass)
{
$sql="SELECT * FROM `da_member` WHERE `userid`='".trim($_POST['sponsor'])."' AND `status`='A' AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$sqlp="SELECT * FROM `da_member` WHERE `phone`='".trim($_POST['phone'])."' OR `email`='".trim($_POST['email'])."'";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump<1)
{
$userid=$prefix.rand(1111111,9999999);

$sql="INSERT INTO `da_member` (`userid`,`sponsor`,`password`,`name`,`email`,`phone`,`address`,`status`,`paystatus`,`date`,`approved`,`bname`,`branch`,`accname`,`accno`,`ifscode`) VALUES('".trim($userid)."','".trim($_POST['sponsor'])."','".base64_encode(trim($_POST['password']))."','".trim($_POST['name'])."','".trim($_POST['email'])."','".trim($_POST['phone'])."','".trim($_POST['address'])."','A','I','".date('Y-m-d')."','','".trim($_POST['bname'])."','".trim($_POST['branch'])."','".trim($_POST['accname'])."','".trim($_POST['accno'])."','".trim($_POST['ifscode'])."')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);

redirect('member-joining.php?msg=4&id='.$id);
}else{
redirect('member-joining.php?reg='.trim($_POST['sponsor']).'&e=1');
}
}else{
redirect('member-joining.php?reg='.trim($_POST['sponsor']).'&q=4');
}

}else{
redirect('member-joining.php?reg='.trim($_POST['sponsor']).'&f=4');
}
}
}
?>