<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}


if($_SESSION['mid'])
{
$userid=trim($_POST['userid']);
$loginuser=getMember($conn,$_SESSION['mid'],'userid');
$package=trim($_POST['package']);
$amount=getSettingsPackage($conn,$package,'amount');
$available=getFundWallet($conn,$loginuser);
$sponsor=getMemberUserID($conn,$userid,'sponsor');
if($available>=$amount)
{
$sql1="UPDATE `da_member` SET `paystatus`='A',`approved`='".date('Y-m-d')."',`renewalstatus`='A',`package`='".$package."' WHERE `userid`='".trim($userid)."'";
$res1=query($conn, $sql1);

$sqltop="INSERT INTO `da_member_topup` (`userid`,`topupid`,`package`,`amount`,`date`) VALUES('".$loginuser."','".$userid."','".$package."','".$amount."','".date('Y-m-d')."')";
$restop=query($conn,$sqltop);

if($amount>0)
{
$sql20="INSERT INTO `da_member_package` (`userid`,`package`,`amount`,`date`) VALUES ('".$userid."','".$package ."','".$amount."','".date('Y-m-d')."')";
$res20=query($conn,$sql20);
}

//-------------------------------------------------//
if($sponsor)
{
$bonus=getSettingsPackage($conn,$package,'directbonus');
if($bonus>0)
{
$sqll2="INSERT INTO `da_commission_direct`(`userid`,`fromid`,`package`,`bonus`,`date`) VALUES('".$sponsor."','".$userid."','".$package."','".$bonus."','".date('Y-m-d')."')";
$resl2=query($conn,$sqll2);
}
}

//-------------------------//
$sponsor=getMemberUserID($conn,$userid,'sponsor');
if($sponsor)
{
$actmem=getNoOfSponsor($conn,$sponsor);
$sqlb3="SELECT * FROM `da_settings_cto` WHERE `nodirect`<='".$actmem."'";
$resb3=query($conn,$sqlb3);
$numb3=numrows($resb3);
if($numb3>0)
{

while($fetchm=fetcharray($resb3))
{
$sqlb1="SELECT * FROM `da_member_cto` WHERE `userid`='".$sponsor."' AND `nodirect`='".$fetchm['nodirect']."'";
 $resb1=query($conn,$sqlb1);
$numb1=numrows($resb1);
if($numb1<1)
{
$sql12="INSERT INTO `da_member_cto` (`userid`,`ctoid`,`nodirect`,`ctoper`,`date`) VALUES ('".$sponsor."','".$fetchm['id']."','".$fetchm['nodirect']."','".$fetchm['ctoper']."','".date('Y-m-d')."')";
$res12=query($conn,$sql12);
}
}
}
}
//---------------------------//
include('calculate-level-bonus.php');
//-------------------------//

redirect('topup.php?case=check&m=1');
}else{
redirect('topup.php?e=1&case=add&check=correct&userid='.trim(($_POST['userid'])));
}
}

?>