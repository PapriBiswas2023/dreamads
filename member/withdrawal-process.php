<?php
session_start();
include('../administrator/includes/function.php');
if(!isset($_SESSION['mid']))
{
redirect('index.php');
}

if($_SESSION['mid'])
{
if($_REQUEST['case']=='add')
{
 $amount=trim($_POST['amount']);
if($amount>0)
{
$userid=getMember($conn,$_SESSION['mid'],'userid');

$avabal=getAvailableWallet($conn,$userid);
$admin=getSettingsWithdrawal($conn,'admin');
$tds=getSettingsWithdrawal($conn,'tds');
$adminamt=($amount*$admin)/100;
$tdsamt=($amount*$tds)/100;
$payout=($amount-($adminamt+$tdsamt));

$acsponsor=getActiveSponsor($conn,$userid);

$memberwithdrawal=getwithdrawalnomember($conn,$userid); //userid r respect e no of rows

if($avabal>=$_POST['amount'])
{
$minimum=getSettingsWithdrawal($conn,'minimum');
$maximum=getSettingsWithdrawal($conn,'maximum');
if($amount>=$minimum && $amount<=$maximum)
{

if($memberwithdrawal<1)
{
$nodirect=getSettingsWithdrawal($conn,'nodirect');
}


if($acsponsor>=$nodirect)
{
$sql="INSERT INTO `da_withdrawal`(`userid`,`request`,`tds`,`admin`,`payout`,`bname`,`branch`,`accname`,`accno`,`ifscode`,`tronwallet`,`status`,`date`,`approved`) VALUES('".$userid."','".$amount."','".$tdsamt."','".$adminamt."','".$payout."','".getMember($conn,$_SESSION['mid'],'bname')."','".getMember($conn,$_SESSION['mid'],'branch')."','".getMember($conn,$_SESSION['mid'],'accname')."','".getMember($conn,$_SESSION['mid'],'accno')."','".getMember($conn,$_SESSION['mid'],'ifscode')."','".getMember($conn,$_SESSION['mid'],'tronwallet')."','P','".date('Y-m-d')."','')";
$res=query($conn,$sql);

redirect('withdrawal.php?case=add&p=1');
}
else
{
redirect('withdrawal.php?case=add&g=1');


}




}else{
redirect('withdrawal.php?case=add&s=1');
}
}else{
redirect('withdrawal.php?case=add&r=1');
}

}else{
redirect('withdrawal.php?case=add&m=3');
}
}
}
?> 