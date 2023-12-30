<?php
//--------------------- Level Calculation---------------------//
function getLevelCalcuation($conn,$userid,$k,$actuser)
{
if($k<=7)
{
$level='Level '.$k;
$bonus=getSettingsLevelAdd($conn,$level,'bonus');
$nodirect=getSettingsLevelAdd($conn,$level,'nodirect');
$sponsor=getMemberUserID($conn,$userid,'sponsor');
if($sponsor)
{
$nosponsor=getNoOfSponsor($conn,$sponsor);
if($nosponsor>=$nodirect)
{
if($bonus>0)
{

$packageid=getMemberPackageByID($conn,$sponsor);

if(getMemberUserID($conn,$sponsor,'paystatus')=='A' && getMemberUserID($conn,$sponsor,'renewalstatus')=='A')
{
$sql12="INSERT INTO `da_commission_level_add` (`userid`,`fromid`,`packageid`,`level`,`bonus`,`status`,`date`) VALUES ('".$sponsor."','".$actuser."','".$packageid."','".$level."','".$bonus."','H','".date('Y-m-d')."')";
$res12=query($conn,$sql12);

}
}
}


}
$k=$k+1;
getLevelCalcuation($conn,$sponsor,$k,$actuser);



}
}

if(getMemberUserID($conn,$userid,'paystatus')=='A' && getMemberUserID($conn,$userid,'renewalstatus')=='A')
{
$k=1;
$actuser=$userid;
getLevelCalcuation($conn,$userid,$k,$actuser);
}
?>