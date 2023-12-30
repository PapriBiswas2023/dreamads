<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
$userid=getMember($conn,$_SESSION['mid'],'userid');
$ava=getFundWallet($conn,$userid);
$package=trim($_POST['package']);
$amount=getSettingsPackage($conn,$package,'amount');
$sponsor=getMember($conn,$_SESSION['mid'],'sponsor');
if($ava>=$amount)
{


$sql1 = "UPDATE `da_member` SET `paystatus`='A',`renewalstatus`='A',`package`='".$package."',`approved`='".date('Y-m-d')."' WHERE `id`='" . trim(mysqli_real_escape_string($conn, $_SESSION['mid'])) . "'";
$res1 = query($conn, $sql1);

$sql2="INSERT INTO `da_member_topup` (`userid`,`topupid`,`package`,`amount`,`date`) VALUES ('".$userid."','".$userid."','".$package."','".$amount."','".date('Y-m-d')."')";
$res2=query($conn,$sql2);

if($amount>0)
{
$sql20="INSERT INTO `da_member_package` (`userid`,`package`,`amount`,`date`) VALUES ('".$userid."','".$package."','".$amount."','".date('Y-m-d')."')";
$res20=query($conn,$sql20);
}
/*------------------Direct Bonus------------------------*/
$sponsor=getMember($conn,$_SESSION['mid'],'sponsor');
if($sponsor)
{
$bonus=getSettingsPackage($conn,$package,'directbonus');
if($bonus>0)
{

$sqll2="INSERT INTO `da_commission_direct`(`userid`,`fromid`,`package`,`bonus`,`date`) VALUES('".$sponsor."','".$userid."','".$package."','".$bonus."','".date('Y-m-d')."')";
$resl2=query($conn,$sqll2);
}
}

/*---------------------CTO-----------------*/
$sponsor=getMember($conn,$_SESSION['mid'],'sponsor');
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





//-------------------------//
include('calculate-level-bonus.php');
//-------------------------//


redirect('dashboard.php?m=1');
}else{
redirect('activation.php?e=1');
}
}
?>