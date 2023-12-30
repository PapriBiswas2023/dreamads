<?php
include('administrator/includes/function.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
$sql="INSERT INTO `da_feedback` (`name`,`email`,`phone`,`subject`,`message`,`date`) VALUES ('".trim($_POST['name'])."','".trim($_POST['email'])."','".trim($_POST['phone'])."','".trim($_POST['subject'])."','".trim(strip_tags(addslashes($_POST['message'])))."','".date('Y-m-d')."')";
$res=query($conn,$sql);

redirect('contact.php?m=1');
}
?>