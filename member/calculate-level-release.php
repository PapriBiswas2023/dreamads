<?php
$sqlp1="SELECT * FROM `da_commission_daily_level` WHERE `userid`='".$userid."' AND `status`='H' AND `date`<='".date('Y-m-d')."'";
$resp1=query($conn,$sqlp1);
$nump1=numrows($resp1);
if($nump1>0)
{
while($fetchp1=fetcharray($resp1))
{
$sqlq1="UPDATE `da_commission_daily_level` SET `status`='R' WHERE `userid`='".$userid."' AND `id`='".$fetchp1['id']."'";
$resq1=query($conn,$sqlq1);
}
}
?>