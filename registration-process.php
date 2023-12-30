<?php 
include('administrator/includes/function.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
$sql="SELECT * FROM `da_member` WHERE `userid`='".trim(mysqli_real_escape_string($conn,$_POST['sponsor']))."' AND `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$sqlp="SELECT * FROM `da_member` WHERE `phone`='".trim(mysqli_real_escape_string($conn,$_POST['phone']))."' OR `email`='".trim(mysqli_real_escape_string($conn,$_POST['email']))."'";
$resp=query($conn,$sqlp);
$nump=numrows($resp);
if($nump<1)
{
$fetch=fetcharray($res);
$userid=$prefix.rand(1111111,9999999);

$sql="INSERT INTO `da_member`(`userid`,`sponsor`,`name`,`password`,`phone`,`email`,`address`,`date`,`status`) VALUES('".trim($userid)."','".trim($_POST['sponsor'])."','".trim($_POST['name'])."','".base64_encode(trim($_POST['password']))."','".trim($_POST['phone'])."','".trim($_POST['email'])."','".trim($_POST['address'])."','".date('Y-m-d')."','A')";
$res=query($conn,$sql);
$id=mysqli_insert_id($conn);


if($id)
{
//-----------------------------------//
if($_POST['email'])
{
$headers="From:".$welcome."\r\n";
$headers.="MIME-Version: 1.0" . "\r\n";
$headers.="Content-type:text/html;charset=iso-8859-1"."\r\n";

$to=trim($_POST['email']);
$subject="Welcome to ".$title.". Your registration is successfully completed!";

$message="Dear ".trim($_POST['name'])." ,<br/> Welcome to ".$title.". <br/>User ID: ".$userid." <br/>Password: ".trim($_POST['password'])." <br/>Visit us ".$domain.". to login into your account. <br/><br/>Thanks & Regards<br/>".$title.".";

mail($to,$subject,$message,$headers);
}
}


if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&msg=4&id='.$id);
}else{
redirect('registration.php?intr='.trim($_POST['sponsor']).'&msg=4&id='.$id);
}

}else{

if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&p=2');
}else{
redirect('registration.php?reg='.trim($_POST['sponsor']).'&p=2');
}
}
}
else
{
if($_REQUEST['case']=='introducer')
{
redirect('introducer.php?intr='.trim($_POST['sponsor']).'&q=5');
}else{
redirect('registration.php?reg='.trim($_POST['sponsor']).'&q=5');
}

}
}

?>