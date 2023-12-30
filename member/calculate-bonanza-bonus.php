<?php
$userid=getMember($conn,$_SESSION['mid'],'userid');
$approved=getMember($conn,$_SESSION['mid'],'approved');

$now=time();
$your_date=strtotime($approved);
$datediff = $now - $your_date;
$nodays=round($datediff / (60 * 60 * 24));

$meml1=getCountMatrix($conn,$userid,'da_member','Level 1');
$meml2=getCountMatrix($conn,$userid,'da_member','Level 2');

$sqlb="SELECT * FROM `da_settings_bonanza` WHERE `withindays`>='".$nodays."' AND `memlevel1`<='".$meml1."' AND `memlevel2`<='".$meml2."'";
$resb=query($conn,$sqlb);
$numb=numrows($resb);
if($numb>0)
{
while($fetchb=fetcharray($resb))
{

$sqlb1="SELECT * FROM `da_member_bonanza` WHERE `userid`='".$userid."' AND `bonanzaid`='".$fetchb['id']."' ";
$resb1=query($conn,$sqlb1);
$numb1=numrows($resb1);
if($numb1<1)
{
$sql14="INSERT INTO `da_member_bonanza` (`userid`,`bonanzaid`,`withindays`,`memlevel1`,memlevel2,`bonus`,`selfaddbonus`,`date`) VALUES ('".$userid."','".$fetchb['id']."','".$fetchb['withindays']."','".$fetchb['memlevel1']."','".$fetchb['memlevel2']."','".$fetchb['bonus']."','".$fetchb['selfaddbonus']."','".date('Y-m-d')."')";
$res14=query($conn,$sql14);

$sqlc="INSERT INTO `da_commission_bonanza` (`userid`,`bonanzaid`,`bonus`,`date`) VALUES('".$userid."','".$fetchb['id']."','".$fetchb['bonus']."','".date('Y-m-d')."')";
$resc=query($conn,$sqlc);
}
}
}
?>