<?php
include('includes/function.php');

$rand=rand(11111,99999);

$arr=array();
$arr[0][0]="Sl No";
$arr[0][1]="User ID";
$arr[0][2]="Name";
$arr[0][3]="Request";
$arr[0][4]="TDS Charge";
$arr[0][5]="Admin Charge";
$arr[0][6]="Payout";
$arr[0][7]="Bank Name";
$arr[0][8]="Branch";
$arr[0][9]="Account Name";
$arr[0][10]="Account No.";
$arr[0][11]="IFSC Code";
$arr[0][12]="Tron Wallet";
$arr[0][13]="Status";
$arr[0][14]="Date";
$arr[0][15]="Approved";


$sqlm="SELECT * FROM `da_withdrawal` WHERE `status`='C' ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{

$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=getMemberUserid($conn,$fetchm['userid'],'name');
$arr[$i][3]=$fetchm['request'];
$arr[$i][4]=$fetchm['tds'];
$arr[$i][5]=$fetchm['service'];
$arr[$i][6]=$fetchm['payout'];
$arr[$i][7]=$fetchm['bname'];
$arr[$i][8]=$fetchm['branch'];
$arr[$i][9]=$fetchm['accname'];
$arr[$i][10]=$fetchm['accno'];
$arr[$i][11]=$fetchm['ifscode'];
$arr[$i][12]=$fetchm['tronwallet'];
$arr[$i][13]=$fetchm['status'];
$arr[$i][14]=$fetchm['date'];
$arr[$i][15]=$fetchm['approved'];

$i++;
}}

$name='Approved-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');
