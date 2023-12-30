<?php
session_start();
include('includes/function.php');

$sql1="SELECT * FROM `da_member` WHERE `userid`='".$_REQUEST['userid']."'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
$fetch1=fetcharray($res1);
echo $fetch1['name'];
}

?>

                    
