<?php
include('includes/function.php');

$rand=rand(11111,99999);

$arr=array();
$arr[0][0]="Sl No";
$arr[0][1]="User ID";
$arr[0][2]="Name";
$arr[0][3]="Wallet";
$arr[0][4]="Amount";
$arr[0][5]="Remarks";

$arr[0][6]="Date";


$sqlm="SELECT * FROM `da_deposit` ORDER BY `id` DESC";
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
$arr[$i][3]=$fetchm['wallet'];
$arr[$i][4]=$fetchm['amount'];

$arr[$i][5]=$fetchm['remarks'];

$arr[$i][6]=$fetchm['date'];

$i++;
}}

$name='Deposit-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');
?>