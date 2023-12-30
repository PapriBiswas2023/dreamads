<?php
$table='da_member';
//------------------------------ Level 1 ------------------------------//
$level1=getCountMatrix($conn,$userid,$table,'Level 1');
$nomember1=getSettingsDaily($conn,'Level 1','nomember');
$bonus1=getSettingsDaily($conn,'Level 1','total');
if($level1>=$nomember1)
{
$sqle="SELECT * FROM `da_commission_daily_level` WHERE `userid`='".$userid."' and `date`='".date('Y-m-d')."'";
$rese=query($conn,$sqle);
$nume=numrows($rese);
if($nume<1)
{
$sqlb2="INSERT INTO `da_commission_daily_level`(`userid`,`level`,`bonus`,`date`) VALUES ('".$userid."','Level 1','".$bonus1."','".date('Y-m-d')."')";
$resb2=query($conn,$sqlb2);
}
}


//------------------------------ Level 2 ------------------------------//
$level2=getCountMatrix($conn,$userid,$table,'Level 2');
$nomember2=getSettingsDaily($conn,'Level 2','nomember');
$bonus2=getSettingsDaily($conn, 'Level 2', 'total');
if($level2>=$nomember2)
{
$sqle="SELECT * FROM `da_commission_daily_level` WHERE `userid`='".$userid."' and `date`='".date('Y-m-d')."'";
$rese=query($conn,$sqle);
$nume=numrows($rese);
if($nume<1)
{
$sqlb2="INSERT INTO `da_commission_daily_level`(`userid`,`level`,`bonus`,`date`) VALUES ('".$userid."','Level 2','".$bonus2."','".date('Y-m-d')."')";
$resb2=query($conn,$sqlb2);
}
}


//------------------------------ Level 3 ------------------------------//
$level3=getCountMatrix($conn,$userid,$table,'Level 3');
$nomember3=getSettingsDaily($conn,'Level 3','nomember');
$bonus3=getSettingsDaily($conn, 'Level 3', 'total');
if($level3>=$nomember3)
{
$sqle="SELECT * FROM `da_commission_daily_level` WHERE `userid`='".$userid."' and `date`='".date('Y-m-d')."'";
$rese=query($conn,$sqle);
$nume=numrows($rese);
if($nume<1)
{
$sqlb2="INSERT INTO `da_commission_daily_level`(`userid`,`level`,`bonus`,`date`) VALUES ('".$userid."','Level 3','".$bonus3."','".date('Y-m-d')."')";
$resb2=query($conn,$sqlb2);
}
}


//------------------------------ Level 4 ------------------------------//
$level4=getCountMatrix($conn,$userid,$table,'Level 4');
$nomember4=getSettingsDaily($conn,'Level 4','nomember');
$bonus4=getSettingsDaily($conn, 'Level 4', 'total');
if($level4>=$nomember4)
{
$sqle="SELECT * FROM `da_commission_daily` WHERE `userid`='".$userid."' and `date`='".date('Y-m-d')."'";
$rese=query($conn,$sqle);
$nume=numrows($rese);
if($nume<1)
{
$sqlb2="INSERT INTO `da_commission_daily`(`userid`,`level`,`bonus`,`date`) VALUES ('".$userid."','Level 4','".$bonus4."','".date('Y-m-d')."')";
$resb2=query($conn,$sqlb2);
}
}


//------------------------------ Level 5 ------------------------------//
$level5=getCountMatrix($conn,$userid,$table,'Level 5');
$nomember5=getSettingsDaily($conn,'Level 5','nomember');
$bonus5=getSettingsDaily($conn, 'Level 5', 'total');
if($level5>=$nomember5)
{
$sqle="SELECT * FROM `da_commission_daily` WHERE `userid`='".$userid."' and `date`='".date('Y-m-d')."'";
$rese=query($conn,$sqle);
$nume=numrows($rese);
if($nume<1)
{
$sqlb2="INSERT INTO `da_commission_daily`(`userid`,`level`,`bonus`,`date`) VALUES ('".$userid."','Level 5','".$bonus5."','".date('Y-m-d')."')";
$resb2=query($conn,$sqlb2);
}
}


//------------------------------ Level 6 ------------------------------//
$level6=getCountMatrix($conn,$userid,$table,'Level 6');
$nomember6=getSettingsDaily($conn,'Level 6','nomember');
$bonus6=getSettingsDaily($conn, 'Level 6', 'total');
if($level6>=$nomember6)
{
$sqle="SELECT * FROM `da_commission_daily` WHERE `userid`='".$userid."' and `date`='".date('Y-m-d')."'";
$rese=query($conn,$sqle);
$nume=numrows($rese);
if($nume<1)
{
$sqlb2="INSERT INTO `da_commission_daily`(`userid`,`level`,`bonus`,`date`) VALUES ('".$userid."','Level 6','".$bonus6."','".date('Y-m-d')."')";
$resb2=query($conn,$sqlb2);
}
}

//------------------------------ Level 7 ------------------------------//
$level7=getCountMatrix($conn,$userid,$table,'Level 7');
$nomember7=getSettingsDaily($conn,'Level 7','nomember');
$bonus7=getSettingsDaily($conn, 'Level 7', 'total');
if($level7>=$nomember7)
{
$sqle="SELECT * FROM `da_commission_daily` WHERE `userid`='".$userid."' and `date`='".date('Y-m-d')."'";
$rese=query($conn,$sqle);
$nume=numrows($rese);
if($nume<1)
{
$sqlb2="INSERT INTO `da_commission_daily`(`userid`,`level`,`bonus`,`date`) VALUES ('".$userid."','Level 7','".$bonus6."','".date('Y-m-d')."')";
$resb2=query($conn,$sqlb2);
}
}
?>