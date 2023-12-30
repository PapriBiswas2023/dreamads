<?php include('header.php'); 
$left=3;
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
<h4 class="card-title">View Kyc Pending Statement</h4>
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
<div align="right" style="padding:5px;">
<form action="kyc-details.php?act=search" method="post">
<input type="text" name="search" id="search" value="<? $_POST['search']?>" class="form-control border-primary" placeholder="User ID" style="width:240px;" />
</form>
</div>


<div class="table-responsive">
<table class="table table-bordered table-striped" align="center">
<thead class="bg-teal bg-lighten-4" align="center">
<tr align="center">
<th width="10%">Sl_No.</th>							
<th width="10%">User_ID</th>				
<th width="10%">Name</th>	
<th width="10%">Pan_Card_No.</th>	
<th width="10%">Pan_Card</th>	
<th width="10%">Status</th>	
<th width="10%">Aadhar_Card_No.</th>	
<th width="10%">Aadhar_Front</th>
<th width="10%">Status</th>
<th width="10%">Aadhar_Back</th>
<th width="10%">Status</th>
<th width="10%">Passbook</th>
<th width="10%">Status</th>	
<th width="10%">Date</th>	
<th width="10%">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='da_member_kyc';
$lim=100;
$tpage='kyc-details-pending.php';

if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".trim($_POST['search'])."' OR `pancardstatus`='I' OR `aadharfrontstatus`='I' OR `aadharbackstatus`='I' OR `status`='I' ORDER BY `id` DESC";
}else{
$where="WHERE `pancardstatus`='I' OR `aadharfrontstatus`='I' OR `aadharbackstatus`='I' OR `status`='I' ORDER BY `id` DESC";
}
include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr align="center">
<td style="padding:2px;"><?=$i?></td>
<td style="padding:2px;"><?=$fetch['userid']?></td>
<td style="padding:2px;"><?=ucwords(getMemberUserid($conn,$fetch['userid'],'name'))?></td>
<td style="padding:2px;"><?=$fetch['pancardno']?></td>
<td style="padding:2px;"><a href="file-download.php?f=<?=$fetch['pancard']?>" style="cursor:pointer;"><img src="images/download.gif" height="40"></a></td>
<td style="padding:2px;"><?php if($fetch['pancardstatus']=='I'){?><a href="kyc-status.php?case=pancard&id=<?=$fetch['id']?>&st=<?=$fetch['pancardstatus']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-info" style="color:#FF0000;">Pending</span></a><?php }else{?><a href="kyc-status.php?case=pancard&id=<?=$fetch['id']?>&st=<?=$fetch['pancardstatus']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-success" style="color:#00CC00;">Approved</span></a><?php }?></td>

<td style="padding:2px;"><?=$fetch['aadharcardno']?></td>
<td style="padding:2px;"><a href="file-download.php?f=<?=$fetch['aadharfront']?>" style="cursor:pointer;"><img src="images/download.gif" height="40"></a></td>
<td style="padding:2px;"><?php if($fetch['aadharfrontstatus']=='I'){?><a href="kyc-status.php?case=aadhar&id=<?=$fetch['id']?>&st=<?=$fetch['aadharfrontstatus']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-info" style="color:#FF0000;">Pending</span></a><?php }else{?><a href="kyc-status.php?case=aadhar&id=<?=$fetch['id']?>&st=<?=$fetch['aadharfrontstatus']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-success" style="color:#00CC00;">Approved</span></a><?php }?></td>

<td style="padding:2px;"><a href="file-download.php?f=<?=$fetch['aadharback']?>" style="cursor:pointer;"><img src="images/download.gif" height="40"></a></td>
<td style="padding:2px;"><?php if($fetch['aadharbackstatus']=='I'){?><a href="kyc-status.php?case=aadharback&id=<?=$fetch['id']?>&st=<?=$fetch['aadharbackstatus']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-info" style="color:#FF0000;">Pending</span></a><?php }else{?><a href="kyc-status.php?case=aadharback&id=<?=$fetch['id']?>&st=<?=$fetch['aadharbackstatus']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-success" style="color:#00CC00;">Approved</span></a><?php }?></td>
<td style="padding:2px;"><a href="file-download.php?f=<?=$fetch['passbook']?>" style="cursor:pointer;"><img src="images/download.gif" height="40"></a></td>
<td style="padding:2px;"><?php if($fetch['status']=='I'){?><a href="kyc-status.php?case=passbook&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-info" style="color:#FF0000;">Pending</span></a><?php }else{?><a href="kyc-status.php?case=passbook&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-success" style="color:#00CC00;">Approved</span></a><?php }?></td>
<td style="padding:2px;"><?=getDateConvert($fetch['date'])?></td>
<td align="center" style="padding:5px;">
<a href="kyc-status.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you sure want to delete?');"><img src="images/delete.png" /></a></td>
</tr>              
<?php $i++;}}else{?>
<tr><td colspan="15" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
<div align="center"><?=$pagination?></div>
</div>
</div>
</div>
</div>
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
