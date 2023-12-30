<?php
include('administrator/includes/function.php');

if(trim($_REQUEST['userid']))
{
$sql1="SELECT * FROM `da_member` WHERE `userid`='".trim($_REQUEST['userid'])."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
$fetch1=fetcharray($res1);
echo $fetch1['name'];
}else{
echo "Invalid Userid"; 
}
}
?>