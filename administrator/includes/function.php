<?php
/*-----------------Database Connection-----------------------*/
$conn=mysqli_connect('localhost','root','','dreamads');
date_default_timezone_set('Asia/Calcutta');
/*-----------------Database Connection-----------------------*/
error_reporting(0);
$title='Dream Ads';
$domain='www.assoftech.in/develop/dreamads';
$welcome='welcome@dreamads.co.in';
$support='support@dreamads.co.in';
$recovery='recovery@dreamads.co.in';
$prefix='DA';
$currency='Rs.';

function redirect($url)
{
header('Location: '.$url);
exit();
} 
function query($conn,$sql)
{
$res=mysqli_query($conn,$sql);
return $res;
}
function numrows($exe)
{
$no=mysqli_num_rows($exe);
return $no;
}
function fetcharray($res)
{
$fetch=mysqli_fetch_array($res);
return $fetch;
}

function getUser($conn,$id,$field)
{
$sql="SELECT * FROM `da_admin` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


function getTotalMember($conn)
{
$sql="SELECT `id` FROM `da_member`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getMember($conn,$id,$field)
{
$sql="SELECT * FROM `da_member` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getUserID($conn,$id,$field)
{
$sql="SELECT * FROM `da_member` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


function getMemberUserID($conn,$userid,$field)
{
$sql="SELECT * FROM `da_member` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getPendingTotalWithdrawal($conn,$column)
{
$sql="SELECT SUM(`".$column."`) AS total FROM `da_withdrawal` WHERE`status`='P' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getApprovedTotalWithdrawal($conn,$column)
{
$sql="SELECT SUM(`".$column."`) AS total FROM `da_withdrawal` WHERE `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getFromUserID($conn,$userid,$field)
{
$sql="SELECT * FROM `da_member` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function getPendingWithdrawalAdmin($conn)
{
$sql="SELECT SUM(`request`) AS total FROM `da_withdrawal` WHERE `status`='P'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getApprovedWithdrawalAdmin($conn)
{
$sql="SELECT SUM(`request`) AS total FROM `da_withdrawal` WHERE  `status`='C' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTotalSupport($conn)
{
$sql="SELECT `id` FROM `da_support`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getNoOfFeedback($conn)
{
$sql="SELECT `id` FROM `da_feedback`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function geTotalCommission($conn,$userid)
{
$total=(getMemberDirectBonus($conn,$userid)+getMemberLevelBonus($conn,$userid)+getMemberFranchiseBonus($conn,$userid)+getMemberRewardBonus($conn,$userid)+getMemberSelfAddBonus($conn,$userid)+getMemberLevelAddBonus($conn,$userid)+getMemberBonanzaBonus($conn,$userid)+getMemberCtoBonus($conn,$userid));

return $total;
}

function getAvailableWallet($conn,$userid)
{
$total=(geTotalCommission($conn,$userid)+getDepositCurrentMember($conn,$userid))-(getWithdrawalMember($conn,$userid)+getTransferCurrent($conn,$userid)+getDeductCurrentMember($conn,$userid)+getIMPSWithdrawal($conn,$userid));

return $total;
}


function getFundWallet($conn,$userid)
{
$total=(getTransferFundOthersToid($conn,$userid)+getReceivedFund($conn,$userid)+getMemberPayment($conn,$userid)+getDepositFundMember($conn,$userid))-(getTransferFundOthers($conn,$userid)+getMemberRenewal($conn,$userid)+getDeductFundMember($conn,$userid)+getMemberTopup($conn,$userid)+getMemberPackageUpgarde($conn,$userid));

return $total;
}

function getMemberTopup($conn, $userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_member_topup` WHERE `userid`='".$userid."' ORDER BY `id` ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}



function getMemberRenewal($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_member_renewal` WHERE `userid`='".$userid."' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}





function getTransferCurrent($conn,$userid)
{
$sql="SELECT SUM(`current`) AS total FROM `da_transfer_current_fund` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getReceivedFund($conn,$userid)
{
$sql="SELECT SUM(`fund`) AS total FROM `da_transfer_current_fund` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTransferFundOthersToid($conn,$userid)
{
$sql="SELECT SUM(`fund`) AS total FROM `da_transfer_fund_others` WHERE `toid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTransferFundOthers($conn,$userid)
{
$sql="SELECT SUM(`fund`) AS total FROM `da_transfer_fund_others` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberPayment($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_member_payment` WHERE `userid`='".$userid."' AND `status`='C' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getContact($conn,$field)
{
$sql="SELECT * FROM `da_contact` ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


function getDepositMember($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_deposit` WHERE `userid`='".$userid."'  ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDeductMember($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_deduct` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getPendingWithdrawalMember($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `da_withdrawal` WHERE `userid`='".$userid."' AND `status`='P'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getApprovedWithdrawalMember($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `da_withdrawal` WHERE `userid`='".$userid."' AND `status`='C'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getWithdrawalMember($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `da_withdrawal` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getSettingsWithdrawal($conn,$field)
{
$sql="SELECT * FROM `da_settings_withdrawal` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getSettingsFastStart($conn,$field)
{
$sql="SELECT * FROM `da_settings_fast_start_club` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getSettingsTransfer($conn,$field)
{
$sql="SELECT * FROM `da_settings_transfer` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getSettingsJoining($conn,$field)
{
$sql="SELECT * FROM `da_settings_joining` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getDownlineByBoard($conn,$sponsor)
{
$sql="SELECT * FROM `da_genealogy_board1` WHERE `placement`='".$sponsor."' ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['userid'];
}
}



function getUplineIDBoard1($conn,$userid)
{
$sql="SELECT * FROM `da_genealogy_board1` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getUplineIDBoard2($conn,$userid)
{
$sql="SELECT * FROM `da_genealogy_board2` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getUplineIDBoard3($conn,$userid)
{
$sql="SELECT * FROM `da_genealogy_board3` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getUplineIDBoard4($conn,$userid)
{
$sql="SELECT * FROM `da_genealogy_board4` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getUplineIDBoard5($conn,$userid)
{
$sql="SELECT * FROM `da_genealogy_board5` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getUplineIDBoard6($conn,$userid)
{
$sql="SELECT * FROM `da_genealogy_board6` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getCountMatrix($conn,$userid,$table,$level)
{
$sql="SELECT * FROM ".$table."  WHERE `sponsor`='".$userid."' AND `paystatus`='A' AND `status`='A'";
$res=query($conn,$sql);
$num=numrows($res);
$i=0;
$arr=array();
if($num>0)
{
while($fetch=fetcharray($res))
{
$arr[$i]=$fetch['userid'];

$i++;
}

$count=count($arr);
if($count>0)
{
$arr1=array();
$j=0;
for($k=0;$k<$count;$k++)
{
$sql1="SELECT * FROM ".$table." WHERE `sponsor`='".$arr[$k]."' AND `paystatus`='A' AND `status`='A'";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
while($fetch1=fetcharray($res1))
{
$arr1[$j]=$fetch1['userid'];
$j++;
}
}
}
}

$count1=count($arr1);

if($count1>0)
{
$arr2=array();
$m=0;
for($l=0;$l<$count1;$l++)
{
$sql2="SELECT * FROM ".$table." WHERE `sponsor`='".$arr1[$l]."' AND `paystatus`='A' AND `status`='A'";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
while($fetch2=fetcharray($res2))
{
$arr2[$m]=$fetch2['userid'];
$m++;
}
}
}
}
$count2=count($arr2);

if($count2>0)
{
$arr3=array();
$m3=0;
for($l3=0;$l3<$count2;$l3++)
{
$sql3="SELECT * FROM ".$table." WHERE `sponsor`='".$arr2[$l3]."' AND `paystatus`='A' AND `status`='A'";
$res3=query($conn,$sql3);
$num3=numrows($res3);
if($num3>0)
{
while($fetch3=fetcharray($res3))
{
$arr3[$m3]=$fetch3['userid'];
$m3++;
}
}
}
}
$count3=count($arr3);


if($count3>0)
{
$arr4=array();
$m4=0;
for($l4=0;$l4<$count3;$l4++)
{
$sql4="SELECT * FROM ".$table." WHERE `sponsor`='".$arr3[$l4]."' AND `paystatus`='A' AND `status`='A'";
$res4=query($conn,$sql4);
$num4=numrows($res4);
if($num4>0)
{
while($fetch4=fetcharray($res4))
{
$arr4[$m4]=$fetch4['userid'];
$m4++;
}
}
}
}
$count4=count($arr4);

if($count4>0)
{
$arr5=array();
$m5=0;
for($l5=0;$l5<$count4;$l5++)
{
$sql5="SELECT * FROM ".$table." WHERE `sponsor`='".$arr4[$l5]."' AND `paystatus`='A' AND `status`='A'";
$res5=query($conn,$sql5);
$num5=numrows($res5);
if($num5>0)
{
while($fetch5=fetcharray($res5))
{
$arr5[$m5]=$fetch5['userid'];
$m5++;
}
}
}
}
$count5=count($arr5);

if($count5>0)
{
$arr6=array();
$m6=0;
for($l6=0;$l6<$count5;$l6++)
{
$sql6="SELECT * FROM ".$table." WHERE `sponsor`='".$arr5[$l6]."' AND `paystatus`='A' AND `status`='A'";
$res6=query($conn,$sql6);
$num6=numrows($res6);
if($num6>0)
{
while($fetch6=fetcharray($res6))
{
$arr6[$m6]=$fetch6['userid'];
$m6++;
}
}
}
}

$count6=count($arr6);
if($count6>0)
{
$arr7=array();
$m7=0;
for($l7=0;$l7<$count6;$l7++)
{
$sql7="SELECT * FROM ".$table." WHERE `sponsor`='".$arr6[$l7]."' AND `paystatus`='A' AND `status`='A'";
$res7=query($conn,$sql7);
$num7=numrows($res7);
if($num7>0)
{
while($fetch7=fetcharray($res7))
{
$arr7[$m7]=$fetch7['userid'];
$m7++;
}
}
}
}
$count7=count($arr7);
if($count7>0)
{
$arr8=array();
$m8=0;
for($l8=0;$l8<$count7;$l8++)
{
$sql8="SELECT * FROM ".$table." WHERE `sponsor`='".$arr7[$l8]."' AND `paystatus`='A' AND `status`='A'";
$res8=query($conn,$sql8);
$num8=numrows($res8);
if($num8>0)
{
while($fetch8=fetcharray($res8))
{
$arr8[$m8]=$fetch8['userid'];
$m8++;
}
}
}
}
$count8=count($arr8);
if($count8>0)
{
$arr9=array();
$m9=0;
for($l9=0;$l9<$count8;$l9++)
{
$sql9="SELECT * FROM ".$table." WHERE `sponsor`='".$arr8[$l9]."' AND `paystatus`='A' AND `status`='A'";
$res9=query($conn,$sql9);
$num9=numrows($res9);
if($num9>0)
{
while($fetch9=fetcharray($res9))
{
$arr9[$m9]=$fetch9['userid'];
$m9++;
}
}
}
}
$count9=count($arr9);
}

if($level=='Level 1'){return $count;}
if($level=='Level 2'){return $count1;}
if($level=='Level 3'){return $count2;}
if($level=='Level 4'){return $count3;}
if($level=='Level 5'){return $count4;}
if($level=='Level 6'){return $count5;}
if($level=='Level 7'){return $count6;}
if($level=='Level 8'){return $count7;}
if($level=='Level 9'){return $count8;}
if($level=='Level 10'){return $count9;}
}


function getCountMatrixBoard($conn,$userid,$table,$level)
{
$sql="SELECT * FROM ".$table."  WHERE `placement`='".$userid."' ";
$res=query($conn,$sql);
$num=numrows($res);
$i=0;
$arr=array();
if($num>0)
{
while($fetch=fetcharray($res))
{
$arr[$i]=$fetch['userid'];

$i++;
}

$count=count($arr);
if($count>0)
{
$arr1=array();
$j=0;
for($k=0;$k<$count;$k++)
{
$sql1="SELECT * FROM ".$table." WHERE `placement`='".$arr[$k]."' ";
$res1=query($conn,$sql1);
$num1=numrows($res1);
if($num1>0)
{
while($fetch1=fetcharray($res1))
{
$arr1[$j]=$fetch1['userid'];
$j++;
}
}
}
}

$count1=count($arr1);

if($count1>0)
{
$arr2=array();
$m=0;
for($l=0;$l<$count1;$l++)
{
$sql2="SELECT * FROM ".$table." WHERE `placement`='".$arr1[$l]."' ";
$res2=query($conn,$sql2);
$num2=numrows($res2);
if($num2>0)
{
while($fetch2=fetcharray($res2))
{
$arr2[$m]=$fetch2['userid'];
$m++;
}
}
}
}
$count2=count($arr2);

if($count2>0)
{
$arr3=array();
$m3=0;
for($l3=0;$l3<$count2;$l3++)
{
$sql3="SELECT * FROM ".$table." WHERE `placement`='".$arr2[$l3]."' ";
$res3=query($conn,$sql3);
$num3=numrows($res3);
if($num3>0)
{
while($fetch3=fetcharray($res3))
{
$arr3[$m3]=$fetch3['userid'];
$m3++;
}
}
}
}
$count3=count($arr3);


if($count3>0)
{
$arr4=array();
$m4=0;
for($l4=0;$l4<$count3;$l4++)
{
$sql4="SELECT * FROM ".$table." WHERE `placement`='".$arr3[$l4]."' ";
$res4=query($conn,$sql4);
$num4=numrows($res4);
if($num4>0)
{
while($fetch4=fetcharray($res4))
{
$arr4[$m4]=$fetch4['userid'];
$m4++;
}
}
}
}
$count4=count($arr4);
}

if($level=='Level 1'){return $count;}
if($level=='Level 2'){return $count1;}
if($level=='Level 3'){return $count2;}
if($level=='Level 4'){return $count3;}
}

function getMatrixPlacement($conn,$table)
{
$sql="SELECT * FROM ".$table." ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['userid'];
}
}

function getMatrixNextUserID($conn,$matrixid,$table)
{
$sql="SELECT * FROM ".$table." WHERE `placement`='".$matrixid."' ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}

function getGenealogyID($conn,$table,$userid,$field)
{
$sql="SELECT * FROM ".$table." WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getGenealogyNextUserID($conn,$table,$id,$field)
{
$sql="SELECT * FROM ".$table." WHERE `id`>'".$id."' ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}


function dateDiffInDays($conn,$date1,$date2)  
{ 
// Calulating the difference in timestamps 
$diff = strtotime($date2) - strtotime($date1); 

// 1 day = 24 hours 
// 24 * 60 * 60 = 86400 seconds 
return abs(round($diff / 86400)); 
} 


function getSponsorByPosition($conn,$userid,$position)
{
$sql="SELECT `id` FROM `da_member` WHERE `sponsor`='".$userid."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getPlacementByPosition($conn,$userid,$position)
{
$sql="SELECT `id` FROM `da_member` WHERE `placement`='".$userid."' AND `position`='".$position."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getFirstDayWithMonth($conn,$mon,$year)
{
$currentMonth = $mon;
$currentYear = $year;
if($currentMonth == 1) {
$lastMonth = 12;
$lastYear = $currentYear - 1;
}
else {
$lastMonth = $currentMonth -1;
$lastYear = $currentYear;
}
if($lastMonth < 10) {
$lastMonth = '0' . $lastMonth;
}
$lastDayOfMonth = date('d', $lastMonth);
$lastDateOfPreviousMonth = $lastYear . '-' . $lastMonth . '-' . $lastDayOfMonth;
return $lastDateOfPreviousMonth;
}

function getLastDayWithMonth($conn,$mon,$year)
{
$currentMonth = $mon;
$currentYear = $year;
if($currentMonth == 1) {
$lastMonth = 12;
$lastYear = $currentYear - 1;
}
else {
$lastMonth = $currentMonth -1;
$lastYear = $currentYear;
}
if($lastMonth < 10) {
$lastMonth = '0' . $lastMonth;
}
$lastDayOfMonth = date('t', $lastMonth);
$lastDateOfPreviousMonth = $lastYear . '-' . $lastMonth . '-' . $lastDayOfMonth;
return $lastDateOfPreviousMonth;
}

function getTotalSponsor($conn,$userid)
{
$sql="SELECT `id` FROM `da_member` WHERE `sponsor`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}




function getCountSponsorPackage($conn,$sponsor,$date)
{
$sql="SELECT * FROM `da_member` WHERE `sponsor`='".$sponsor."' AND `date`<='".$date."' AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);

return $num;
}



function getMemberTaskVisit($conn,$userid,$adsid,$date)
{
$sql="SELECT * FROM `da_advertisement_view` WHERE `userid`='".$userid."' AND `adsid`='".$adsid."' AND `date`='".$date."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getAdvertisementNum($conn)
{
$sql="SELECT * FROM `da_advertisement`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}


function getMemberAdsNum($conn,$userid,$date)
{
$sql="SELECT * FROM `da_advertisement_view` WHERE `userid`='".$userid."' AND `date`='".$date."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getAdvertisement($conn,$id,$field)
{
$sql="SELECT * FROM `da_advertisement` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getMemberAds($conn,$userid,$date)
{
$sql="SELECT * FROM `da_advertisement_view` WHERE `userid`='".$userid."' AND `date`='".$date."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getTotalAdvertisement($conn)
{
$sql="SELECT * FROM `da_advertisement` WHERE `status`='A' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}




function getActiveMember($conn)
{
$sql="SELECT `id` FROM `da_member` WHERE `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getInactiveMember($conn)
{
$sql="SELECT `id` FROM `da_member` WHERE `paystatus`='I'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getSettingsLevel($conn,$level,$field)
{
$sql="SELECT * FROM `da_settings_level` WHERE `level`='".$level."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}




function getFirstUserID($conn)
{
$sql="SELECT * FROM `da_member` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch['userid'];
}
}


function getPlacement($conn)
{
$sql="SELECT * FROM `da_genealogy_board1_placement` ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

//-------------Board 1--------------------------//
function getMatrixTreeFirstBoard1($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board1` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 0,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}
function getMatrixTreeSecondBoard1($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board1` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 1,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}
function getMatrixTreeThirdBoard1($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board1` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 2,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}

//-------------Board 2--------------------------//
function getMatrixTreeFirstBoard2($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board2` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 0,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}
function getMatrixTreeSecondBoard2($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board2` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 1,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}
function getMatrixTreeThirdBoard2($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board2` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 2,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}

//-------------Board 3--------------------------//
function getMatrixTreeFirstBoard3($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board3` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 0,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}
function getMatrixTreeSecondBoard3($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board3` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 1,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}
function getMatrixTreeThirdBoard3($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board3` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 2,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}

//-------------Board 4--------------------------//
function getMatrixTreeFirstBoard4($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board4` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 0,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}
function getMatrixTreeSecondBoard4($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board4` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 1,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}
function getMatrixTreeThirdBoard4($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board4` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 2,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}

//-------------Board 5--------------------------//
function getMatrixTreeFirstBoard5($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board5` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 0,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}
function getMatrixTreeSecondBoard5($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board5` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 1,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}
function getMatrixTreeThirdBoard5($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board5` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 2,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}

//-------------Board 6--------------------------//
function getMatrixTreeFirstBoard6($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board6` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 0,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}
function getMatrixTreeSecondBoard6($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board6` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 1,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}
function getMatrixTreeThirdBoard6($conn,$placement)
{
$sql="SELECT * FROM `da_genealogy_board6` WHERE `placement`='".$placement."' ORDER BY `id` LIMIT 2,1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['userid'];
}
}

function getPlacementBoard1($conn)
{
$sql="SELECT * FROM `da_genealogy_board1_placement` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getPlacementBoard2($conn)
{
$sql="SELECT * FROM `da_genealogy_board2_placement` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getPlacementBoard3($conn)
{
$sql="SELECT * FROM `da_genealogy_board3_placement` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}
function getPlacementBoard4($conn)
{
$sql="SELECT * FROM `da_genealogy_board4_placement` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getPlacementBoard5($conn)
{
$sql="SELECT * FROM `da_genealogy_board5_placement` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getPlacementBoard6($conn)
{
$sql="SELECT * FROM `da_genealogy_board6_placement` ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['placement'];
}
}

function getNoOfAdsSeenMember($conn,$userid)
{
$sql="SELECT SUM(`count`) AS total FROM `da_advertisement_view` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTaskBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_self_task` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getActiveSponsor($conn,$userid)
{
$sql="SELECT `id` FROM `da_member` WHERE `sponsor`='".$userid."' AND `status`='A' AND `paystatus`='A' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getActiveSponsorByAppDate($conn,$userid,$field)
{
$sql="SELECT `id` FROM `da_member` WHERE `sponsor`='".$userid."' AND `status`='A' AND `paystatus`='A' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getTasksBonusByDate($conn,$userid,$date,$field)
{
$sql="SELECT SUM(`".$field."`) as total FROM `da_commission_self_task` WHERE `userid`='".$userid."' AND `date`='".$date."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalSelfTaskBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_self_task` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTotalDailyLevelBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_daily_level` WHERE `status`='R' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getTotalFastStartClubBonus($conn)
{
$sql="SELECT SUM(`coin`) AS total FROM `da_commission_fast_start_club` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

$total=$fetch['total'];
if($total>0){
$total=$fetch['total'];
}
else{
$total=0;
}
}else{
$total=0;
}
return $total;
}


function getTotalRewardBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_reward` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMemberLevelBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_level` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMaximumRenewal($conn,$userid)
{
$total=(getMemberDailyLevelBonus($conn,$userid)+getMemberRewardBonus($conn,$userid)+getMemberSelfTaskBonus($conn,$userid));
return $total;
}

function getMaximumDailyCapping($conn,$userid,$date)
{
$total=(getMemberDailyLevelByDate($conn,$userid,$date)+getMemberSelfTaskByDate($conn,$userid,$date));
return $total;
}

function getMemberSelfTaskByDate($conn,$userid,$date)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_self_task` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberDailyLevelByDate($conn,$userid,$date)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_daily_level` WHERE `userid`='".$userid."' AND `date`='".$date."' AND `status`='R' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMemberClubByDate($conn,$userid,$date)
{
$sql="SELECT SUM(`coin`) AS total FROM `da_commission_fast_start_club` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

$total=$fetch['total'];

return $total;
}
}

function getMemberRewardByDate($conn,$userid,$date)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_reward` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMemberDailyLevelBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_daily_level` WHERE `userid`='".$userid."' AND `status`='R' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberSelfTaskBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_self_task` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getCommissionFastStart($conn,$userid)
{
$sql="SELECT SUM(`coin`) AS total FROM `da_commission_fast_start_club` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getMemberRewardBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_reward` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getRequiredAds($conn)
{
$sql="SELECT * FROM `da_advertisement` WHERE  `status`='A' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getNoAds($conn,$userid,$date)
{
$sql="SELECT * FROM `da_advertisement_view` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getNoOfSponsor($conn,$sponsorid)
{
$sql="SELECT * FROM `da_member` WHERE `sponsor`='".$sponsorid."' AND `paystatus`='A'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}


function getMemberNoRenewal($conn,$userid)
{
$sql="SELECT * FROM `da_member_renewal` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getMemberNoReward($conn,$userid)
{
$sql="SELECT * FROM `da_member_reward` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getSettingsReward($conn,$level,$field)
{
$sql="SELECT * FROM `da_settings_reward` WHERE `level`='".$level."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getMemberLatestReward($conn,$userid,$field)
{
$sql="SELECT * FROM `da_member_reward` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


function getDateConvert($date)
{
if($date)
{
$date=date('d/m/Y', strtotime($date));
}
return $date;
}




function getDepositFundMember($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_deposit` WHERE `userid`='".$userid."' AND `wallet`='Fund Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDepositCurrentMember($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_deposit` WHERE `userid`='".$userid."' AND `wallet`='Current Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDeductCurrentMember($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_deduct` WHERE `userid`='".$userid."' AND `wallet`='Current Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getDeductFundMember($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_deduct` WHERE `userid`='".$userid."' AND `wallet`='Fund Wallet' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function TotalBusinessAmount($conn)
{

$total=(getTotalActivationAmt($conn)+getTotalRenewalAmt($conn));
return $total;
}

function getTotalActivationAmt($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_member_topup`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalRenewalAmt($conn)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_member_renewal`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getSettingsBank($conn,$field)
{
$sql="SELECT * FROM `da_settings_company` ORDER BY `id` LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getKYCCheck($conn,$userid)
{
$sql="SELECT * FROM `da_member_kyc` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getKycInformation($conn,$userid,$field)
{
$sql="SELECT * FROM `da_member_kyc` WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getTodayAdsViewCheck($conn,$userid,$date)
{
$sql="SELECT * FROM `da_commission_self_task` WHERE `userid`='".$userid."' AND `date`='".$date."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getwithdrawalnomember($conn,$userid){
$sql="SELECT * FROM `da_withdrawal`  WHERE `userid`='".$userid."'";
$res=query($conn,$sql);
$num=numrows($res);
return $num;
}

function getTotalSelfAddBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_self_add` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalLevelBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_level` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalLevelAddBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_level_add` WHERE `status`='R' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalDirectBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_direct` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalFranchiseBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_franchise` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalCtoBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_cto` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberSelfAddBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_self_add` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberLevelAddBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_level_add` WHERE `userid`='".$userid."' AND `status`='R' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberFranchiseBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_franchise` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberDirectBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_direct` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberCtoBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_cto` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getSettingsOnOff($conn,$field)
{
$sql="SELECT * FROM `da_settings_onoff` ORDER BY `id` LIMIT 1 ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}
function getSettingsLevelAdd($conn,$level,$field)
{
$sql="SELECT * FROM `da_settings_level_adsview` WHERE `level`='".$level."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getSettingsPackage($conn,$id,$field)
{
$sql="SELECT * FROM `da_settings_package` ORDER BY `id`='".$id."' DESC ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getMemberPackageUpgarde($conn,$userid)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_member_package_upgrade` WHERE `userid`='".$userid."'  ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}


function getFirstPackageID($conn)
{
$sql="SELECT * FROM `da_settings_package` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['id'];
}
}


function getSettingsCto($conn,$field)
{
$sql="SELECT * FROM `da_settings_cto` ORDER BY `id`='".$id."' DESC ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getTotalBonanzaBonus($conn)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_bonanza` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberBonanzaBonus($conn,$userid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_bonanza` WHERE `userid`='".$userid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getLatestPackage($conn,$userid)
{
$sql="SELECT * FROM `da_member_package` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['package'];
}
}

function getMemberPackageByID($conn,$userid)
{
$sql="SELECT * FROM `da_member_package` WHERE `userid`='".$userid."' ORDER BY `id` DESC LIMIT 1";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch['package'];
}
}
function getMemberTotalPackageAmountByID($conn,$userid,$packageid)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_member_package` WHERE `userid`='".$userid."' AND `id`='".$packageid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getTotalCommssionByID($conn,$userid,$packageid)
{
$total=getDirectBonusByID($conn,$userid,$investid)+getLevelAddBonusByID($conn,$userid,$investid)+getSelfAddBonusByID($conn,$userid,$investid)+getLevelBonusByID($conn,$userid,$investid);

return $total;
}

function getDirectBonusByID($conn,$userid,$investid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_direct` WHERE `userid`='".$userid."' AND `packageid` ='".$packageid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}
function getSelfAddBonusByID($conn,$userid,$investid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_self_add` WHERE `userid`='".$userid."' AND `packageid` ='".$packageid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getLevelBonusByID($conn,$userid,$investid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_level` WHERE `userid`='".$userid."' AND `packageid` ='".$packageid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getLevelAddBonusByID($conn,$userid,$investid)
{
$sql="SELECT SUM(`bonus`) AS total FROM `da_commission_level_add` WHERE `userid`='".$userid."' AND `packageid` ='".$packageid."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getSettingsFranchise($conn,$field)
{
$sql="SELECT * FROM `da_settings_franchise` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getMemberPaymentAmount($conn,$id,$field)
{
$sql="SELECT * FROM `da_member_payment` WHERE `userid`='".$userid."' AND `status`='C' ODER BY `id`='".$id."' DESC";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}


function getTotalCTO($conn,$fdate,$todate)
{
$sql="SELECT SUM(`amount`) AS total FROM `da_member_package` WHERE `date` BETWEEN '".$fdate."' AND '".$todate."' ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=number_format(0,2);
}
}else{
$total=number_format(0,2);
}
return $total;
}

function getMemberCto($conn,$nodirect,$field)
{
$sql="SELECT * FROM `da_member_cto` WHERE `nodirect`='".$nodirect."' ORDER BY `id`='".$id."' DESC ";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getSettingsPackageBonus($conn,$package,$field)
{
$sql="SELECT * FROM `da_settings_package` WHERE `id`='".$package."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);

return $fetch[$field];
}
}

function getTotalIMPSWithdrawal($conn)
{
$sql="SELECT SUM(`request`) AS total FROM `da_withdrawal_imps` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}

function getIMPSWithdrawal($conn,$userid)
{
$sql="SELECT SUM(`request`) AS total FROM `da_withdrawal_imps` WHERE `userid`='".$userid."' AND `status`!='failure'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
if($fetch['total']>0)
{
$total=$fetch['total'];
}else{
$total=0;
}
}else{
$total=0;
}
return $total;
}
?>