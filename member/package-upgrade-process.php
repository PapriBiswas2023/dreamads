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
$userid=getMember($conn,$_SESSION['mid'],'userid');
$avamount=getFundWallet($conn,$userid);
$package=trim($_POST['package']);

$amount=getSettingsPackage($conn,$package,'amount');
$sponsor=getMember($conn,$_SESSION['mid'],'sponsor');

if($avamount>=$amount)
{
$maxincome=getSettingsPackage($conn,$package,'maxincome');

/*$date=strtotime(date("Y-m-d"));
$renewal=date('Y-m-d',strtotime('+'.$nodays.'days',$date));
*/
$sql1="UPDATE `da_member` SET `renewalstatus`='A' WHERE `id`='".trim(mysqli_real_escape_string($conn, $_SESSION['mid']))."'";
$res1=query($conn,$sql1);

$sql2="INSERT INTO `da_member_topup` (`userid`,`topupid`,`package`,`amount`,`date`) VALUES ('".$userid."','".$userid."','".$package."','".$amount."','".date('Y-m-d')."')";
$res2=query($conn,$sql2);

if($amount>0)
{
$sql20="INSERT INTO `da_member_package` (`userid`,`package`,`amount`,`date`) VALUES ('".$userid."','".$package ."','".$amount."','".date('Y-m-d')."')";
$res20=query($conn,$sql20);

$sql3="INSERT INTO `da_member_package_upgrade` (`userid`,`package`,`amount`,`date`) VALUES ('".$userid."','".$package ."','".$amount."','".date('Y-m-d')."')";
$res3=query($conn,$sql3);
}

/*------------------Direct Bonus------------------------*/
if($sponsor)
{
$bonus=getSettingsPackage($conn,$package,'directbonus');
$packageid=getMemberPackageByID($conn,$sponsor);
if($bonus>0)
{
$sqll2="INSERT INTO `da_commission_direct`(`userid`,`fromid`,``packageid``,`package`,`bonus`,`date`) VALUES('".$sponsor."','".$userid."','".$packageid."','".$package."','".$bonus."','".date('Y-m-d')."')";
$resl2=query($conn,$sqll2);
}
}

//-------------------------//
include('calculate-level-bonus.php');
//-------------------------//



redirect('package-upgrade.php?m=1');
}else{
redirect('package-upgrade.php?e=2');
}

}
}
?>