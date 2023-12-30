<?php 
include('header.php'); 
$left=12;
$tdsA=getApprovedTotalWithdrawal($conn,'tds');
$serviceA=getApprovedTotalWithdrawal($conn,'admin');
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
<h4 class="card-title">Approved Withdrawal Statement</h4>
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
<div class="col-xs-12">
<div class="row">
<div class="col-xs-6">
<div align="left" style="margin-left:10px; margin-top:10px;"><a href="withdrawal-approved-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF; margin-top:10px;" /></a></div>
</div>
<div class="col-xs-3"></div>
<div class="col-xs-3">
<div align="right" style="padding:10px;">
<form name="form3" action="approved-withdrawal.php?act=search" method="post">
<input type="text" name="search" id="search" value="<?=$_REQUEST['search']?>" class="form-control border-primary" style="width:100%; margin-top:10px;" placeholder="User ID" />
</form>
</div>
</div>
</div>
</div>



<table width="98%" style="overflow:auto;color:#4254F4">
<tr><td>
<div align="left" style="margin-left:10px;; font-size:14px;"><strong>Total Request Amount :</strong> <?=getApprovedTotalWithdrawal($conn,'request')?></div>
</td>
<td>
<div align="center" style="padding:10px;font-size:14px;"><strong>Total Charge :</strong> <?=($serviceA+$tdsA)?></div>
</td>
<td>
<div align="right" style="padding:10px;font-size:14px;">
<strong>Total Payout :</strong> <?=getApprovedTotalWithdrawal($conn,'payout')?></div>
</td>
</tr>
</table>


<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<td width="5%" align="center">Sl_No</td>
<td width="6%" align="center">User_ID</td>
<td width="6%" align="center">Name</td>
<td width="7%" align="center">Request</td>
<td width="9%" align="center">TDS</td>
<td width="9%" align="center">Admin</td>
<td width="6%" align="center">Payout</td>
<td width="9%" align="center">Bank_Name</td>
<td width="6%" align="center">Branch</td>
<td width="6%" align="center">Account_Name</td>
<td width="9%" align="center">Account_No.</td>
<td width="8%" align="center">IFSC_Code</td>
<td width="8%" align="center">Tron_Wallet</td>
<td width="5%" align="center">Status</td>
<td width="5%" align="center">Date</td>
</tr>
</thead>
<tbody>

<?php
$tname='da_withdrawal';
$lim=100;
$tpage='approved-withdrawal.php';
if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".trim(mysqli_real_escape_string($conn,$_POST['search']))."' AND `status`='C' ORDER BY `id` DESC";
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
<td align="center" class="tborder" style="padding:3px;"><?=getMemberUserid($conn,$fetch['userid'],'name')?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['request']?></td>
<td align="center" class="tborder" style="padding:5px;"><?=$fetch['tds']?></td>
<td align="center" class="tborder" style="padding:5px;"><?=$fetch['admin']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['payout']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['bname']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['branch']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['accname']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['accno']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['ifscode']?></td>
<td align="center" class="tborder" style="padding:3px;"><?=$fetch['tronwallet']?></td>
<td align="center" class="tborder" style="padding:3px;"><?php if($fetch['status']=='C'){?><span style="color:#009900;">Approved</span><?php }?></td>
<td align="center" class="tborder" style="padding:3px;"><?=getDateConvert($fetch['date'])?></td>
</tr>
<?php $i++;}}else{?>
<tr height="15"><td align="center" colspan="15" style="color:#FF0000;"><div class="norecord">No Record Found!</div></td></tr>
<?php }?>

</tbody>
</table>          

<?php if($_REQUEST['act']==''){?>
<div align="center"><?=$pagination?></div>
<?php } ?>
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