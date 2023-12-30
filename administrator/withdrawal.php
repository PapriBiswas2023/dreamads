<?php include('header.php'); 
$left=12;
?>
<style>
table,
thead,
tr,
tbody,
th,
td {
text-align: center;
}
</style>
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<div class="app-content content container-fluid">




<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title"><?php if($_REQUEST['case']=='pending'){?>Pending Withdrawal Statement<?php }else if($_REQUEST['case']=='approve'){?>Approved Withdrawal Statement<?php }?></h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="card-body collapse in">

<?php if($_REQUEST['case']=='pending'){?>
<div class="portlet box blue-hoki">
<div class="portlet-title">
<div class="caption">
<div>&nbsp;</div>

<div align="left" style="margin-left:10px;"><a href="withdrawal-pending-csv-download.php"><input type="button" value="Excel Download" class="btn red" /></a></div>

<div align="right" style="padding:10px;"><form name="form3" action="withdrawal.php?case=pending&act=search" method="post">
<input type="text" name="search" id="search" value="<?=$_REQUEST['search']?>" class="form-control border-primary"style="width:180px;" placeholder="User ID" />
</form></div>
</div>

<table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr height="30" style="font-size:16px;color:#4378A3;">
<td width="23%" align="right" valign="middle"><strong style="font-size:14px;">Total Request Amount:</strong></td>
<td width="9%" align="left" valign="middle" style="font-size:14px;">Rs.&nbsp;<?=getPendingTotalWithdrawal($conn,'request')?></td>
<td width="24%" align="right" valign="middle"><strong style="font-size:14px;">Total Charge:</strong></td>
<td width="10%" align="left" valign="middle" style="font-size:14px;">Rs.&nbsp;<?=getPendingTotalWithdrawal($conn,'tds')+getPendingTotalWithdrawal($conn,'service')?></td>
<td width="22%" align="right" valign="middle"><strong style="font-size:14px;">Total Payout:</strong></td>
<td width="12%" align="left" valign="middle" style="font-size:14px;">Rs.&nbsp;<?=getPendingTotalWithdrawal($conn,'payout')?></td>
</tr>
</table>

<div>&nbsp;</div>

<div class="table-responsive">

<table class="table table-bordered table-striped" align="center" >
<thead class="bg-teal bg-lighten-4" align="center"><tr>
<td width="5%" align="center">Sl_No</td>
<td width="6%" align="center">User_ID</td>
<td width="6%" align="center">Name</td>
<td width="7%" align="center">Request(Rs.)</td>
<td width="9%" align="center">TDS(%)</td>
<td width="9%" align="center">Admin(%)</td>
<td width="6%" align="center">Payout(Rs.)</td>
<td width="9%" align="center">Bank_Name</td>
<td width="6%" align="center">Branch</td>
<td width="6%" align="center">Account_Name</td>
<td width="9%" align="center">Account_No.</td>
<td width="8%" align="center">IFSC_Code</td>
<td width="9%" align="center">Status</td>
<td width="5%" align="center">Date</td>
<td width="6%" align="center">Action</td>
</tr>
</thead>

<tbody>
<?php
$tname='da_withdrawal';
$lim=100;
$tpage='withdrawal.php?case=pending';
if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".trim($_POST['search'])."' AND `status`='P' ORDER BY `id` DESC";
}else{
$where="WHERE `status`='P' ORDER BY `id` DESC";
}
include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr height="30">
<td align="center" class="tborder" style="padding:3px;"><?=$i?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['userid']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=ucwords(strtolower(getMemberUserID($conn,$fetch['userid'],'name')))?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['request']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['tds']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['service']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['payout']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['bname']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['branch']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['accname']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['accno']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['ifscode']?></td>
<td align="center" class="tborder" style="padding:3px;"><?php if($fetch['status']=='P'){?><a href="withdrawal-process.php?case=status&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" onClick="return confirm('Are you sure want to active this status?');" style="text-decoration:none;"><span style="color:#FF0000;">Pending</span></a><?php } ?></td>
<td align="center" class="tborder" style="padding:3px;"><?=getDateConvert($fetch['date'])?></td>
<td ><a href="withdrawal-process.php?case=delete&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to delete?');"><img src="images/delete.png" title="Delete" /></a></td>
</tr>
<?php $i++;}}else{?>
<tr height="15"><td align="center" colspan="15" style="color:#FF0000;"><div class="norecord" >No Record Found!</div></td></tr>
<?php }?>
</tbody>
</table>

<?php if($_REQUEST['act']==''){?>
<div align="center"><?=$pagination?></div>
<?php } ?>
</div>
</div>
<?php } if($_REQUEST['case']=='approve'){?>
<div class="portlet box blue-hoki">
<div class="portlet-title">
<div class="caption">
<div>&nbsp;</div>

<div align="left" style="margin-left:10px;"><a href="withdrawal-approved-csv-download.php"><input type="button" value="Excel Download" class="btn red" /></a></div>

<div align="right" style="padding:10px;">
<form name="form3" action="withdrawal.php?case=approve&act=search" method="post">
<input type="text" name="search" id="search" value="<?=$_REQUEST['search']?>" class="form-control border-primary" style="width:180px;" placeholder="User ID" />
</form>
</div>

</div>
<div class="portlet-body" style="overflow:auto;">

<table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr height="30" style="font-size:16px;color:#4378A3;">
<td width="23%" align="right" valign="middle"><strong style="font-size:14px;">Total Request Amount:</strong></td>
<td width="9%" align="left" valign="middle" style="font-size:14px;">Rs.&nbsp;<?=getApprovedTotalWithdrawal($conn,'request')?></td>
<td width="24%" align="right" valign="middle"><strong style="font-size:14px;">Total Charge:</strong></td>
<td width="10%" align="left" valign="middle" style="font-size:14px;">Rs.&nbsp;<?=getApprovedTotalWithdrawal($conn,'tds')+getApprovedTotalWithdrawal($conn,'service')?></td>
<td width="22%" align="right" valign="middle"><strong style="font-size:14px;">Total Payout:</strong></td>
<td width="12%" align="left" valign="middle" style="font-size:14px;">Rs.&nbsp;<?=getApprovedTotalWithdrawal($conn,'payout')?></td>
</tr>
</table>

<div>&nbsp;</div>

<div class="table-responsive">
<table class="table table-bordered table-striped" align="center" >
<thead class="bg-teal bg-lighten-4" align="center"><tr><tr>
<td width="5%" align="center">Sl_No</td>
<td width="6%" align="center">User_ID</td>
<td width="6%" align="center">Name</td>
<td width="7%" align="center">Request(Rs.)</td>
<td width="9%" align="center">TDS(%)</td>
<td width="9%" align="center">Admin(%)</td>
<td width="6%" align="center">Payout(Rs.)</td>
<td width="9%" align="center">Bank_Name</td>
<td width="6%" align="center">Branch</td>
<td width="6%" align="center">Account_Name</td>
<td width="9%" align="center">Account_No.</td>
<td width="8%" align="center">IFSC_Code</td>
<td width="5%" align="center">Date</td>
</tr>
</thead>
<tbody>

<?php
$tname='da_withdrawal';
$lim=100;
$tpage='withdrawal.php?case=approve';
if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".trim($_POST['search'])."' AND `status`='C' ORDER BY `id` DESC";
}else{
$where="WHERE `status`='C' ORDER BY `id` DESC";
}
include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr height="30">
<td align="center" class="tborder" style="padding:3px;"><?=$i?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['userid']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=ucwords(strtolower(getMemberUserID($conn,$fetch['userid'],'name')))?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['request']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['tds']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['service']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['payout']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['bname']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['branch']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['accname']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['accno']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['ifscode']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=getDateConvert($fetch['date'])?></td>
</tr>
<?php $i++;}}else{?>
<tr height="14"><td align="center" colspan="13" style="color:#FF0000;"><div class="norecord">No Record Found!</div></td></tr>
<?php }?>
</tbody>
</table>
<? }?>                   

</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>






<div class="col-md-3">&nbsp;</div>
</div>
</div>
</div>
</div>
<?php include('footer.php') ?>

<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>
