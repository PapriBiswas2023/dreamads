<?php
include('includes/function.php');

$rand=rand(11111,99999);

$arr=array();
$arr[0][0]="Sl_No";
$arr[0][1]="User_ID";
$arr[0][2]="Sponsor";
$arr[0][3]="Name";
$arr[0][4]="Phone";
$arr[0][5]="Email";
$arr[0][6]="Tron_Wallet";
$arr[0][7]="Package";
$arr[0][8]="Date";
$arr[0][9]="Approved date";
$arr[0][10]="Status";
$arr[0][11]="Pay status";

$arr[0][12]="Renewal status";

if($_REQUEST['formdate'] && $_REQUEST['todate'])
{ 
$sqlm="SELECT * FROM `da_member` WHERE `date` BETWEEN '".$_REQUEST['formdate']."' AND '".$_REQUEST['todate']."' ORDER BY `id` DESC";
}else{
$sqlm="SELECT * FROM `da_member`  ORDER BY `id` DESC";
}
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{
if($fetchm['status']=='A'){$status='Unblock';}
if($fetchm['status']=='I'){$status='Block';}
if($fetchm['paystatus']=='A'){$pstatus='Paid';}
if($fetchm['paystatus']=='I'){$pstatus='Pending';}
if($fetchm['renewalstatus']=='A'){$rstatus='Active';}
if($fetchm['renewalstatus']=='I'){$pstatus='Pending';}



$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=$fetchm['sponsor'];
$arr[$i][3]=getMemberUserid($conn,$fetchm['userid'],'name');

$arr[$i][4]=$fetchm['phone'];
$arr[$i][5]=$fetchm['email'];
$arr[$i][6]=$fetchm['tronwallet'];
$arr[$i][7]=getSettingsPackage($conn,$fetchm['package'],'package');
$arr[$i][8]=$fetchm['date'];
$arr[$i][9]=$fetchm['approved'];
$arr[$i][10]=$status;
$arr[$i][11]=$pstatus;
$arr[$i][12]=$pstatus;

$i++;
}}

$name='Member-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');
?>