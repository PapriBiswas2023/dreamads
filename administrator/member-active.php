<?php include('header.php');
$left=3;
?>
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div>&nbsp;</div>
<div class="col-xs-12">
<div class="card">
<div class="card-header">

<h4 class="card-title">Active Member</h4>
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

<div class="card-body collapse in" style="padding:5px;">

<div class="row">
<div class="col-md-2"><div style="padding:5px;"><a href="member-active-csv-download.php?formdate=<?=$_POST['fromdate']?>&todate=<?=$_POST['todate']?>"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div></div>

<form name="frm1" method="post" action="member-active.php?act=search">

<div class="col-md-2"><div style="padding:5px;"><input type="date" name="fromdate" id="fromdate" value="<?=$_POST['fromdate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-1"><div style="padding:5px;">-</div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="date" name="todate" id="todate" value="<?=$_POST['todate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="submit" name="submit" value="Search" class="btn" style="background:#009900;color:#FFFFFF;" /></div></div>
</form>


<div class="col-md-3">
<!--<div style="padding:5px;">
--><div align="right" style="padding:5px;">
<form name="frm1" method="post" action="member-active.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID, Name, Phone" style="width:100%;" />
</form>
<!--</div>-->
</div>
</div>


</div>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th width="10%">Sl_No</th>
<th width="10%">User_ID</th>
<th width="10%">Sponsor_ID</th>
<th width="10%">Name</th>
<th width="10%">Password</th>
<th width="10%">Package</th>
<th width="10%">Phone</th>
<th width="10%">Email</th>
<th width="10%">Tron_Wallet</th>
<th width="10%">Date</th>
<th width="10%">Approved</th>
<th width="10%">Status</th>
<th width="10%">Renewal_Status</th>
<th width="10%">Action</th>
</tr>
</thead>
<tbody>
<?php
$tname='da_member';
$lim=100;
$tpage='member-active.php';


if($_REQUEST['act']=='search')
{
if(trim($_POST['fromdate'])!='' && trim($_POST['todate'])!='')
{
$where="WHERE `paystatus`='A' AND `date` BETWEEN '".trim($_POST['fromdate'])."' AND '".trim($_POST['todate'])."'  ORDER BY `id` DESC";
}else{
$where="WHERE `paystatus`='A' AND `userid` LIKE '".trim($_POST['search'])."' OR `name` LIKE '".trim($_POST['search'])."' OR `phone` LIKE '".trim($_POST['search'])."' ORDER BY `id` DESC";
}
}else{
$where="WHERE `paystatus`='A' ORDER BY `id` DESC";
}

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td align="center" style="padding:3px;"><?=$i?></td>
<td align="center" style="padding:3px;"><a href="../member/admin-login-process.php?userid=<?=$fetch['userid']?>&password=<?=$fetch['password']?>" target="_blank" style="text-decoration:none;"><strong><?=$fetch['userid']?></strong></a></td>
<td align="center" style="padding:3px;"><?php if($fetch['sponsor']){?><?=$fetch['sponsor']?><? }else{?>-----<?php }?></td>
<td align="center" style="padding:3px;"><?=ucwords(strtolower($fetch['name']))?></td>
<td align="center" style="padding:3px;"><?=base64_decode($fetch['password'])?></td>
<td align="center" style="padding:3px;"><?=getSettingsPackage($conn,$fetch['package'],'package')?></td>
<td align="center" style="padding:3px;"><?=$fetch['phone']?></td>
<td align="center" style="padding:3px;"><?=$fetch['email']?></td>
<td align="center" style="padding:3px;"><?=$fetch['tronwallet']?></td>
<td align="center" style="padding:3px;"><?=getDateConvert($fetch['date'])?></td>
<td align="center" style="padding:3px;"><?=getDateConvert($fetch['approved'])?></td>

<td align="center" style="padding:3px;"><?php if($fetch['status']=='I'){?><a href="member-status.php?case=status&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-info" style="color:#FF0000;">Inactive</span></a><?php }else{?><a href="member-status.php?case=status&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-success" style="color:#00CC00;">Active</span></a><?php }?></td>
<td align="center" style="padding:3px;"><?php if($fetch['renewalstatus']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>

<td align="center" style="padding:3px;"><a href="details.php?mid=<?=$fetch['id']?>" title="Member Details" target="_blank"><img src="images/view.png" /></a>&nbsp;<a href="member.php?case=edit&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>"title="Edit" onClick="return confirm('Are you sure want to edit this record?');"><img src="images/edit.png" /></a>&nbsp;<?php if($fetch['status']=='I'){?><a href="member-process.php?case=delete&id=<?=$fetch['id']?>"title="Delete" onClick="return confirm('Are you sure want to Delete this record?');"><img src="images/delete.png" /></a><?php }?>
</td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="12" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>
