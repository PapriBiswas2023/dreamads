<?php include('header.php');
$left=3;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->


<div class="app-content content container-fluid">
<div class="content-wrapper">
<div class="content-header row">
<div class="content-header-left col-md-6 col-xs-12 mb-1">
</div>

</div>
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">


<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">Member Details</h4>
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

<div class="portlet-body" style="overflow:auto;">
<?php
$sql="SELECT * FROM `da_member` WHERE `id`='".$_REQUEST['mid']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<table width="95%" class="table table-striped table-bordered table-hover" id="sample_1">
<tr><td width="33%">User ID</td>
<td width="67%"><?=$fetch['userid']?></td>
</tr>
<tr><td>Sponsor ID</td><td><?php if($fetch['sponsor']){?><?=$fetch['sponsor']?><?php }else{?>---<?php }?></td></tr>

<tr><td>Name</td><td><?=$fetch['name']?></td></tr>
<tr><td>Password</td><td><?=base64_decode($fetch['password'])?></td></tr>
<tr><td>Package</td><td><?=getSettingsPackage($conn,$fetch['package'],'package')?></td></tr>

<tr><td>Email</td><td><?=$fetch['email']?></td></tr>
<tr><td>Phone</td><td><?=$fetch['phone']?></td></tr>

<tr><td>Address</td><td><?php if($fetch['address']){?><?=$fetch['address']?><?php }else{?>---<?php }?></td></tr>
<tr><td>Status</td><td><?php if($fetch['status']=='A'){?><span style="color:#009900;">Unblock</span><?php }else{?><span style="color:#FF0000;">Block</span><?php }?></td></tr>

<tr><td>Payment Status</td><td><?php if($fetch['paystatus']=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td></tr>

<tr><td>Renewal Status</td><td><?php if($fetch['renewalstatus']=='A'){?><span style="color:#009900;">Active</span><?php }else{?><span style="color:#FF0000;">Inactive</span><?php }?></td></tr>

<tr><td>Joining</td><td><?=getDateConvert($fetch['date'])?></td></tr>

<tr><td>Approved</td><td><?php if($fetch['approved']){?><?=getDateConvert($fetch['approved'])?><?php }else{?>---<?php }?></td></tr>

</table>
<?php }?>
</div>



<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">Member Bank Details</h4>
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

<div class="portlet-body" style="overflow:auto;">
<?php
$sql="SELECT * FROM `da_member` WHERE `id`='".$_REQUEST['mid']."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<table width="95%" class="table table-striped table-bordered table-hover" id="sample_1">
<tr><td width="33%">Bank Name</td>
<td width="67%"><?=$fetch['bname']?></td>
</tr>
<tr><td>Branch</td><td><?=$fetch['branch']?></td></tr>
<tr><td>Account Name</td><td><?=$fetch['accname']?></td></tr>
<tr><td>Account No</td><td><?=$fetch['accno']?></td></tr>
<tr><td>IFSC Code</td><td><?=$fetch['ifscode']?></td></tr>
<tr><td>Tron Wallet</td><td><?=$fetch['tronwallet']?></td></tr>
</table>
<?php }?>
</div>
</div>


</div>
</div>
</div>

</div>
</div>
</div>
</section>
</div>
</div>
</div>
<div class="page-footer">
<?php include('footer.php');?>
<div class="scroll-to-top">
</div>
</div>


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