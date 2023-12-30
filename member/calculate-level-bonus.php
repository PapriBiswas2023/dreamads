<?php
//--------------------- Level Calculation---------------------//
function getLevelCalcuation($conn,$userid,$k,$actuser)
{
if($k<=7)
{
$level='Level '.$k;
$bonus=getSettingsLevel($conn,$level,'bonus');
$sponsor=getMemberUserID($conn,$userid,'sponsor');
if($sponsor)
{
if(getMemberUserID($conn,$sponsor,'paystatus')=='A' && getMemberUserID($conn,$sponsor,'renewalstatus')=='A')
{
$sql="INSERT INTO `da_commission_level` (`userid`,`fromid`,`level`,`bonus`,`date`) VALUES ('".$sponsor."','".$actuser."','".$level."','".$bonus."','".date('Y-m-d')."')";
$res=query($conn,$sql);
}

$k=$k+1;
getLevelCalcuation($conn,$sponsor,$k,$actuser);

}

}
}


$k=2;
$actuser=$userid;
$sponsor=getMemberUserID($conn,$userid,'sponsor');
if($sponsor)
{
getLevelCalcuation($conn,$sponsor,$k,$actuser);
}
?>