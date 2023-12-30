<?php include('header.php');
$left=3;
?>
<!-- main menu-->
<?php include('leftpanel.php'); ?>

<!-- / main menu-->
<?php if($_REQUEST['case']=='add'){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
<h2 class="content-header-title"></h2>
</div>

</div>
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-3">&nbsp;</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">First Member</h4>
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
<div class="card-block">

<?php if(isset($_REQUEST['e'])==1){?><p align="center" style="color:#CC0000; padding-bottom:8px;">Already Exists !!</p><?php }?>
<?php if(isset($_REQUEST['m'])==1){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Member Added Successfully!!</p><?php }?>

<form class="form" action="member-process.php?case=add" method="post">
<div class="form-body">
<h4 class="form-section"><i class="icon-eye6"></i>Personal Information</h4>

<div class="form-group">
<label for="userinput5">Package<span style="color:#CC0000;">*</span></label>
<select id="package"  class="form-control border-primary" name="package" required>
<option value="">Select Package</option>
<?php
 $sql="SELECT * FROM `da_settings_package` ORDER BY `id`";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
while ($fetch=fetcharray($res))
{
?>
<option value="<?=$fetch['id']?>"><?=ucwords($fetch['package'])?> (<?=$fetch['amount']?>)</option>
<?php }}?>
</select>
</div>

<div class="form-group">
<label for="userinput5">Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Name" required id="name" name="name" value="">
</div>

<div class="form-group">
<label for="userinput5">Password<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="password" placeholder="Enter Password" required id="password" name="password" value="">
</div>



<div class="form-group">
<label for="userinput5">Email<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Email" required id="email" name="email" value="">
</div>

<div class="form-group">
<label for="userinput5">Phone<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Phone" id="phone" name="phone" value=""  pattern="[6789][0-9]{9}" maxlength="10" required>
</div>


<div class="form-group">
<label for="userinput5">Address<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Address" required id="address" name="address" value="">
</div>

<h4 class="form-section"><i class="icon-mail6"></i>Bank Details</h4>
<div class="form-group">
<label for="userinput5">Bank Name</label>
<input class="form-control border-primary" type="text" placeholder="Enter Bank name"  id="bname" name="bname" value="">
</div>

<div class="form-group">
<label for="userinput5">Branch</label>
<input class="form-control border-primary" type="text" placeholder="Enter Branch" id="branch" name="branch" value="" >
</div>

<div class="form-group">
<label for="userinput5">Account Name</label>
<input class="form-control border-primary" type="text" placeholder="Enter Account name"  id="accname" name="accname" value="" >
</div>

<div class="form-group">
<label for="userinput5">Account No</label>
<input class="form-control border-primary" type="text" placeholder="Enter Account no" id="accno" name="accno" value="" >
</div>


<div class="form-group">
<label for="userinput5">IFSC Code</label>
<input class="form-control border-primary" type="text" placeholder="Enter IFSC code"  id="ifscode" name="ifscode" value="">
</div>

<div class="form-group">
<label for="userinput5">Tron Wallet</label>
<input class="form-control border-primary" type="text" placeholder="Enter Tron wallet"  id="tronwallet" name="tronwallet" value="">
</div>

</div>

<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>

<div class="col-md-3">&nbsp;</div>
</div>
</section>
<!-- // Basic form layout section end -->
</div>
</div>
</div>

<?php }else if($_REQUEST['case']=='edit'){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
<h2 class="content-header-title"></h2>
</div>

</div>
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-3">&nbsp;</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">Member</h4>
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
<div class="card-block">

<?php 
$sql="SELECT * FROM `da_member` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form class="form" action="member-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post">
<div class="form-body">
<h4 class="form-section"><i class="icon-eye6"></i>Personal Information</h4>

<div class="form-group">

<label for="userinput5">Name<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Name" required id="name" name="name" value="<?=$fetch['name']?>" />

</div>

<div class="form-group">
<label for="userinput5">Password<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="password" placeholder="Enter Password" required id="password" name="password" value="<?=base64_decode($fetch['password'])?>" />
</div>



<div class="form-group">
<label for="userinput5">Email<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Email" required id="email" name="email" value="<?=$fetch['email']?>" />
</div>

<div class="form-group">
<label for="userinput5">Phone<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Phone" id="phone" name="phone"  pattern="[6789][0-9]{9}" maxlength="10" value="<?=$fetch['phone']?>" required />
</div>

<div class="form-group">
<label for="userinput5">Address<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Address" required id="address" name="address" value="<?=$fetch['address']?>" />
</div>


<h4 class="form-section"><i class="icon-mail6"></i> Bank Details</h4>
<div class="form-group">
<label for="userinput5">Bank Name</label>
<input class="form-control border-primary" type="text" placeholder="Enter Bank Name"  id="bname" name="bname" value="<?=$fetch['bname']?>" />
</div>

<div class="form-group">
<label for="userinput5">Branch</label>
<input class="form-control border-primary" type="text" placeholder="Enter Branch" id="branch" name="branch" value="<?=$fetch['branch']?>" />
</div>


<div class="form-group">
<label for="userinput5">Account Name</label>
<input class="form-control border-primary" type="text" placeholder="Enter Account Name"  id="accname" name="accname" value="<?=$fetch['accname']?>" />
</div>

<div class="form-group">
<label for="userinput5">Account No</label>
<input class="form-control border-primary" type="text" placeholder="Enter Account No" id="accno" name="accno" value="<?=$fetch['accno']?>" />
</div>


<div class="form-group">
<label for="userinput5">IFSC Code</label>
<input class="form-control border-primary" type="text" placeholder="Enter IFSC Code"  id="ifscode" name="ifscode" value="<?=$fetch['ifscode']?>" />
</div>

<div class="form-group">
<label for="userinput5">Tron Wallet</label>
<input class="form-control border-primary" type="text" placeholder="Enter Tron Wallet"  id="tronwallet" name="tronwallet" value="<?=$fetch['tronwallet']?>" />
</div>

</div>

<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit</button>
</div>
</form>
<?php }?>


</div>
</div>
</div>
</div>

<div class="col-md-3">&nbsp;</div>
</div>
</section>
<!-- // Basic form layout section end -->
</div>
</div>
</div>

<?php }else if($_REQUEST['case']==''){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div>&nbsp;</div>
<div class="col-xs-12">
<div class="card">
<div class="card-header">

<h4 class="card-title">Member Statement</h4>
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
<div class="col-md-2"><div style="padding:5px;"><a href="member-csv-download.php?formdate=<?=$_POST['fromdate']?>&todate=<?=$_POST['todate']?>"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div></div>

<form name="frm1" method="post" action="member.php?act=search">

<div class="col-md-2"><div style="padding:5px;"><input type="date" name="fromdate" id="fromdate" value="<?=$_POST['fromdate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-1"><div style="padding:5px;">-</div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="date" name="todate" id="todate" value="<?=$_POST['todate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="submit" name="submit" value="Search" class="btn" style="background:#009900;color:#FFFFFF;" /></div></div>
</form>


<div class="col-md-3">
<!--<div style="padding:5px;">
--><div align="right" style="padding:5px;">
<form name="frm1" method="post" action="member.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID, Name, Phone" style="width:100%;" />
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
<th width="10%">Pay_Status</th>
<th width="10%">Renewal_Status</th>
<th width="10%">Action</th>
</tr>
</thead>
<tbody>
<?php
$tname='da_member';
$lim=100;
$tpage='member.php';

if($_REQUEST['act']=='search')
{
if(trim($_POST['fromdate'])!='' && trim($_POST['todate'])!='')
{
$where="WHERE `date` BETWEEN '".trim($_POST['fromdate'])."' AND '".trim($_POST['todate'])."'  ORDER BY `id` DESC";
}else{
$where="WHERE `userid` LIKE '".trim($_POST['search'])."' OR `name` LIKE '".trim($_POST['search'])."' OR `phone` LIKE '".trim($_POST['search'])."' ORDER BY `id` DESC";
}
}else{
$where="ORDER BY `id` DESC";
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
<td align="center" style="padding:3px;"><?php if($fetch['package']){?><?=getSettingsPackage($conn,$fetch['package'],'package')?><? }else{?>-----<?php }?></td>
<td align="center" style="padding:3px;"><?=$fetch['phone']?></td>
<td align="center" style="padding:3px;"><?=$fetch['email']?></td>
<td align="center" style="padding:3px;"><?=$fetch['tronwallet']?></td>
<td align="center" style="padding:3px;"><?=getDateConvert($fetch['date'])?></td>
<td align="center" style="padding:3px;"><?=getDateConvert($fetch['approved'])?></td>
<td align="center" style="padding:3px;"><?php if($fetch['status']=='I'){?><a href="member-status.php?case=status&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-info" style="color:#FF0000;">Block</span></a><?php }else{?><a href="member-status.php?case=status&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-success" style="color:#00CC00;">Unblock</span></a><?php }?></td>
<td align="center" style="padding:3px;"><?php if($fetch['paystatus']=='A'){?><span style="color:#00CC00;">Paid</span><?php }else{?><span style="color:#FF0000;">Pending</span><?php }?></td>

<td align="center" style="padding:3px;"><?php if($fetch['renewalstatus']=='A'){?><span style="color:#00CC00;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td>

<td align="center" style="padding:3px;"><a href="details.php?mid=<?=$fetch['id']?>" title="Member Details" target="_blank"><img src="images/view.png" /></a>&nbsp;<a href="member.php?case=edit&id=<?=$fetch['id']?>&page=<?=$_REQUEST['page']?>"title="Edit" onClick="return confirm('Are you sure want to edit this record?');"><img src="images/edit.png" /></a>&nbsp;<?php if($fetch['status']=='I'){?><a href="member-process.php?case=delete&id=<?=$fetch['id']?>"title="Delete" onClick="return confirm('Are you sure want to Delete this record?');"><img src="images/delete.png" /></a><?php }?>
</td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="16" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
<?php }?>

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
