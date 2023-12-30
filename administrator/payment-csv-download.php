<?php
include('includes/function.php');

$rand=rand(11111,99999);

$arr=array();
$arr[0][0]="Sl_No";
$arr[0][1]="User_ID";
$arr[0][2]="Name";
$arr[0][3]="Amount";
$arr[0][4]="Transaction_ID/UTR_No.";
$arr[0][5]="status";
$arr[0][6]="Date";
if($_REQUEST['formdate'] && $_REQUEST['todate'])
{ 
$sqlm="SELECT * FROM `da_member_payment` WHERE `date` BETWEEN '".$_REQUEST['formdate']."' AND '".$_REQUEST['todate']."' ORDER BY `id` DESC";
}else{
$sqlm="SELECT * FROM `da_member_payment`  ORDER BY `id` DESC";
}
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{
if($fetchm['status']=='P'){$status='Pending';}
if($fetchm['status']=='C'){$status='Approved';}

$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=getMemberUserid($conn,$fetchm['userid'],'name');
$arr[$i][3]=$fetchm['amount'];
$arr[$i][4]=$fetchm['tranid'];
$arr[$i][5]=$status;
$arr[$i][6]=$fetchm['date'];


$i++;
}}

$name='Payment-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');
?>