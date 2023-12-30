<?php
include('administrator/includes/function.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
$sql="SELECT * FROM `da_member` WHERE `email`='".trim($_POST['email'])."' AND `userid`='".trim($_POST['userid'])."' AND `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

//-------------------------//
$headers="From: ".$recovery."\r\n";
$headers.="MIME-Version: 1.0" . "\r\n";
$headers.="Content-type:text/html;charset=iso-8859-1"."\r\n";

$to=trim($_POST['email']);
$subject="Your account recovery successfully completed.";

$message.="Welcome To ".$title.".<br/><br/>";
$message.="Your User ID ".$fetch['userid'].",<br/>";
$message.="Your Password ".base64_decode($fetch['password']).",<br/>";
$message.="<br />Thanks <br />Support Team";

mail($to,$subject,$message,$headers);
//-------------------------//

redirect('forgot.php?m=1');
}else{
redirect('forgot.php?e=2');
}
}
?>