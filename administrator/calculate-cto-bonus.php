<?php 
$fdate=getFirstDayWithMonth($conn,date("m"),date("Y"));
$todate=getLastDayWithMonth($conn,date("m"),date("Y"));
if(date('d')=='01')
{
$sql3d="SELECT * FROM `da_member_cto_date` WHERE `date`='".date('Y-m-d')."'";
$res3d=query($conn,$sql3d);
$num3d=numrows($res3d);
if($num3d<1)
{
$totalamnt=getTotalCTO($conn,$fdate,$todate);

$sqlt="SELECT * FROM `da_settings_cto` ORDER BY `id`";
$rest=query($conn,$sqlt);
$numt=numrows($rest);
if($numt>0)
{
while($fetcht=fetcharray($rest))
{
$ctoid=$fetcht['id'];
$ctoper=$fetcht['ctoper'];

$sql21="SELECT * FROM `da_member_cto` WHERE `ctoid`='".$ctoid."'";
$res21=query($conn,$sql21);
$num21=numrows($res21);
if($num21>0)
{
while($fetch21=fetcharray($res21))
{
$amtmem=($totalamnt*$ctoper)/100;
$amtpermem=($amtmem/$num21);

$sqlc="INSERT INTO `da_commission_cto` (`userid`,`total`,`ctoper`,`amount`,`noachiever`,`bonus`,`date`) VALUES('".$fetch21['userid']."','".$totalamnt."','".$ctoper."','".$amtmem."','".$num21."','".$amtpermem."','".date('Y-m-d')."')";
$resc=query($conn,$sqlc);
}
}

}
}

$sql5="INSERT INTO `da_member_cto_date`(`date`) VALUES('".date('Y-m-d')."')";
$res5=query($conn,$sql5);
}
}
?>