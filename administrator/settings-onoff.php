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
<h4 class="card-title" id="basic-layout-colored-form-control">Settings Edit On Off</h4>
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
<?php if($_REQUEST['e']=='1'){?><p align="center" style=" color:#FF0000;">Record Already Exists!</p><?php }?>
<?php if($_REQUEST['m']=='1'){?><p align="center" style=" color:#00CC33;">Edited Successfully !</p><?php }?>
<?php 
$sql="SELECT * FROM `da_settings_onoff` WHERE `id`='".trim($_REQUEST['id'])."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>
<form class="form" action="settings-onoff-process.php?case=edit&id=<?=$_REQUEST['id']?>&page=<?=$_REQUEST['page']?>" method="post" enctype="multipart/form-data">

<div class="form-body">
<div class="form-group">
<label for="userinput5">Registration<span style="color:#CC0000;">*</span></label>
<select name="registration" id="registration" class="form-control  border-primary" required>
<option value="">Select On/Off</option>
<option value="A" <?php if($fetch['registration']=='A'){ echo 'selected'; } ?>>ON</option>
<option value="I" <?php if($fetch['registration']=='I'){ echo 'selected'; } ?>>OFF</option>
</select>      
</div>


<div class="form-group">
<label for="userinput5">Login<span style="color:#CC0000;">*</span></label>
<select name="login" id="login" class="form-control  border-primary" required>
<option value="">Select On/Off</option>
<option value="A" <?php if($fetch['login']=='A'){ echo 'selected'; } ?>>ON</option>
<option value="I" <?php if($fetch['login']=='I'){ echo 'selected'; } ?>>OFF</option>
</select>       
</div>

<div class="form-group">
<label for="userinput5">Withdrawal<span style="color:#CC0000;">*</span></label>
<select name="withdrawal" id="withdrawal" class="form-control  border-primary" required>
<option value="">Select On/Off</option>
<option value="A" <?php if($fetch['withdrawal']=='A'){ echo 'selected'; } ?>>ON</option>
<option value="I" <?php if($fetch['withdrawal']=='I'){ echo 'selected'; } ?>>OFF</option>
</select>  
</div>


<div class="form-group">
<label for="userinput5">IMPS Withdrawal<span style="color:#CC0000;">*</span></label>
<select name="impswithdrawal" id="impswithdrawal" class="form-control  border-primary" required>
<option value="">Select On/Off</option>
<option value="A" <?php if($fetch['impswithdrawal']=='A'){ echo 'selected'; } ?>>ON</option>
<option value="I" <?php if($fetch['impswithdrawal']=='I'){ echo 'selected'; } ?>>OFF</option>
</select>  
</div>


<div class="form-group">
<label for="userinput5">Current To Fund<span style="color:#CC0000;">*</span></label>
<select name="currenttofund" id="currenttofund" class="form-control  border-primary" required>
<option value="">Select On/Off</option>
<option value="A" <?php if($fetch['currenttofund']=='A'){ echo 'selected'; } ?>>ON</option>
<option value="I" <?php if($fetch['currenttofund']=='I'){ echo 'selected'; } ?>>OFF</option>
</select>     
</div>



<div class="form-group">
<label for="userinput5">Fund To Others<span style="color:#CC0000;">*</span></label>
<select name="fundtoothers" id="fundtoothers" class="form-control  border-primary" required>
<option value="">Select On/Off</option>
<option value="A" <?php if($fetch['fundtoothers']=='A'){ echo 'selected'; } ?>>ON</option>
<option value="I" <?php if($fetch['fundtoothers']=='I'){ echo 'selected'; } ?>>OFF</option>
</select>        
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
<h4 class="card-title">Settings On/Off</h4>
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
<th style="text-align:center;">Registration</th>
<th style="text-align:center;">Login</th>
<th style="text-align:center;">Withdrawal</th>
<th style="text-align:center;">IMPS_Withdrawal</th>
<th style="text-align:center;">Current_To_Fund</th>
<th style="text-align:center;">Fund_To_Others</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='da_settings_onoff';
$lim=100;
$tpage='settings-onoff.php';
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
<td style="text-align:center; padding:2px;"><?php if($fetch['registration']=='A'){?>ON<?php }else{?>OFF<?php }?></td>
<td style="text-align:center; padding:2px;"><?php if($fetch['login']=='A'){?>ON<?php }else{?>OFF<?php }?></td>
<td style="text-align:center; padding:2px;"><?php if($fetch['withdrawal']=='A'){?>ON<?php }else{?>OFF<?php }?></td>
<td style="text-align:center; padding:2px;"><?php if($fetch['impswithdrawal']=='A'){?>ON<?php }else{?>OFF<?php }?></td>
<td style="text-align:center; padding:2px;"><?php if($fetch['currenttofund']=='A'){?>ON<?php }else{?>OFF<?php }?></td>
<td style="text-align:center; padding:2px;"><?php if($fetch['fundtoothers']=='A'){?>ON<?php }else{?>OFF<?php }?></td>

<td align="center" style="padding:2px;"><a href="settings-onoff.php?case=edit&id=<?=$fetch['id']?>"><img src="images/edit.png"></a></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="7" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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
