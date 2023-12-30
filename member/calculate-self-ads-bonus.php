<?php
$sponsor=getMember($conn,$_SESSION['mid'],'sponsor');
$lpack=getLatestPackage($conn,$userid);

$bonus2=getSettingsPackageBonus($conn,$lpack,'selfaddbonus');
$date2=date('Y-m-d');
$setads2=getRequiredAds($conn);
$noads2=getNoAds($conn,$userid,$date2);

if($noads2>=$setads2)
{
if($bonus2>0)
{
$packageid=getMemberPackageByID($conn,$sponsor);
$sqlb1="SELECT * FROM `da_commission_self_add` WHERE `userid`='".$userid."' AND `date`='".date('Y-m-d')."'";
$resb1=query($conn,$sqlb1);
$numb1=numrows($resb1);
if($numb1<1)
{
$sql12="INSERT INTO `da_commission_self_add` (`userid`,`packageid`,`bonus`,`date`) VALUES ('".$userid."','".$packageid."','".$bonus2."','".date('Y-m-d')."')";
$res12=query($conn,$sql12);

$sppaystatus=getMemberUserID($conn,$userid,'paystatus');
if($sppaystatus=='A')
{
$sqlup="UPDATE `da_commission_level_add` SET `status`='R' WHERE `userid`='".$userid."' AND `date`='".date('Y-m-d')."'";
$resup=query($conn,$sqlup);
}

}
}
}
?>