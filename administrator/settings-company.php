<?php include('header.php');
$left=2;
?>

<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->
<script src="assets/js/ajax.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="pagination.css">
<link rel="stylesheet" href="assets/css/style.css">


<?php if($_REQUEST['case']=='edit'){?>
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
<h4 class="card-title" id="basic-layout-colored-form-control">Settings Edit Company</h4>
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
$sql="SELECT * FROM `da_settings_company` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form class="form" action="settings-company-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post" enctype="multipart/form-data">

<div class="form-body">
<div class="form-group">
<label for="userinput5">Bank Name<span style="color:#CC0000;">*</span></label>
<input type="text" id="bname" name="bname" class="form-control  border-primary" placeholder="Bank Name" value="<?=$fetch['bname']?>" required>         
</div>


<div class="form-group">
<label for="userinput5">Branch<span style="color:#CC0000;">*</span></label>
<input type="text" id="branch" name="branch" class="form-control  border-primary" placeholder="Branch" value="<?=$fetch['branch']?>" required>         
</div>



<div class="form-body">
<div class="form-group">
<label for="userinput5">Account Name<span style="color:#CC0000;">*</span></label>
<input type="text" id="accname" name="accname" class="form-control  border-primary" placeholder="Account Name" value="<?=$fetch['accname']?>" required>         
</div>

<div class="form-body">
<div class="form-group">
<label for="userinput5">Acoount NO<span style="color:#CC0000;">*</span></label>
<input type="text" id="accno" name="accno" class="form-control  border-primary" placeholder="Acoount NO" value="<?=$fetch['accno']?>" required>         
</div>

<div class="form-body">
<div class="form-group">
<label for="userinput5">IFSC Code<span style="color:#CC0000;">*</span></label>
<input type="text" id="ifscode" name="ifscode" class="form-control  border-primary" placeholder="IFSC Code" value="<?=$fetch['ifscode']?>" required>         
</div>


<div class="form-group">
<div><?php if($fetch['qrcode']){?><img src="qrcode/<?=$fetch['qrcode']?>" height="70" width="70" /><?php }?></div>
<label for="userinput5">QR Code</label>
<input type="file" id="qrcode" name="qrcode" class="form-control  border-primary" placeholder="QR code" accept=".jpg,.png,.jpeg,.pjp" value="" />                            
</div>

</div>
   
<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>Submit</button>
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

<?php } if($_REQUEST['case']==''){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">

<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Settings Company</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="table-responsive">
<?php if($_REQUEST['m']=='1'){?><p align="center" style=" color:#00CC33;">Updated Successfully!</p><?php }?>
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No</th>
<th style="text-align:center;">Bank_Name</th>
<th style="text-align:center;">Branch</th>
<th style="text-align:center;">Account_Name</th>
<th style="text-align:center;">Account_No</th>
<th style="text-align:center;">IFSC_Code</th>
<th style="text-align:center;">QR_Code</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='da_settings_company';
$lim=100;
$tpage='settings-company.php';
$where="ORDER BY `id` DESC";

include('pagination.php');
$num=numrows($result);
$i=1;
if($num>0)
{
while($fetch=fetcharray($result))
{
?>
<tr>
<td style="text-align:center; padding:2px;"><?=$i?></td>
<td style="text-align:center; padding:2px;"><?=$fetch['bname']?></td>
<td style="text-align:center; padding:2px;"><?=$fetch['branch']?></td>
<td style="text-align:center; padding:2px;"><?=$fetch['accname']?></td>
<td style="text-align:center; padding:2px;"><?=$fetch['accno']?></td>
<td style="text-align:center; padding:2px;"><?=$fetch['ifscode']?></td>
<td style="text-align:center;"><?php if($fetch['qrcode']){?><img src="qrcode/<?=$fetch['qrcode']?>" height="70" width="70" /><?php }?></td>
<td align="center" style="padding:2px;"><a href="settings-company.php?case=edit&id=<?=$fetch['id']?>"><img src="images/edit.png"></a></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="8" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>

</tbody>
</table>
</div>
<div align="center"><?=$pagination?></div>
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
<!-- END VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
</body>
</html>