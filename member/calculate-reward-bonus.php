<?php
function getRewardCalcuation($conn,$userid,$k)
{
if($k<=9)
{
$level='Level '.$k;
$team=getCountMatrix($conn,$userid,'da_member',$level);
$noteam=getSettingsReward($conn,$level,'team'); 
$id=getSettingsReward($conn,$level,'id'); 
$rank=getSettingsReward($conn,$level,'rank'); 
$reward=getSettingsReward($conn,$level,'reward'); 
$capping=getSettingsReward($conn,$level,'capping'); 
if($team>=$noteam)
{
$sqlk="SELECT * FROM `da_member_reward` WHERE `userid`='".$userid."' AND `rewardid`='".$id."'";
$resk=query($conn,$sqlk);
$numk=numrows($resk);
if($numk<1)
{

$sppaystatus=getMemberUserID($conn,$userid,'paystatus');
if($sppaystatus=='A')
{
$renewstatus=getMemberUserID($conn,$userid,'renewalstatus');
if($renewstatus=='A')
{
$sqll="INSERT INTO `da_member_reward` (`userid`,`rewardid`,`level`,`rank`,`team`,`reward`,`capping`,`date`) VALUES('".$userid."','".$id."','".$level."','".$rank."','".$team."','".$reward."','".$capping."','".date('Y-m-d')."')";
$resl=query($conn,$sqll);

$sqlm="INSERT INTO `da_commission_reward` (`userid`,`rewardid`,`level`,`rank`,`team`,`bonus`,`date`) VALUES('".$userid."','".$id."','".$level."','".$rank."','".$team."','".$reward."','".date('Y-m-d')."')";
$resm=query($conn,$sqlm);
}
}

}
}
$k=$k+1;
getRewardCalcuation($conn,$userid,$k);
}
}

$k=1;
getRewardCalcuation($conn,$userid,$k);
?>