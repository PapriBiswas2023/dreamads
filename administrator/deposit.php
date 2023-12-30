<?php include('header.php');
$left=6;
?>
<script src="js/ajax.js" type="text/javascript"></script>
<script>
function getUserIDcheck(val)
{
xmlhttp.open('GET','get-name.php?userid='+val);
xmlhttp.onreadystatechange=getUserIDRequest;
xmlhttp.send();
}
function getUserIDRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{

var response=xmlhttp.responseText;
document.getElementById('name').value=response;
}
}
}
</script>

<script>
function getSponcheck(val)
{

xmlhttp.open('GET','get-name.php?userid='+val);
xmlhttp.onreadystatechange=getSponRequest;
xmlhttp.send();
}
function getSponRequest()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{

var response=xmlhttp.responseText;

document.getElementById('sponDiv').
 
innerHTML=response;
}
}
}
</script>

<script>
function getTotalValue()
{
var quantity=document.getElementById('quantity').value;
var price=document.getElementById('price').value;

var total=quantity*price;

document.getElementById('total').value=total;
}
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
<h4 class="card-title" id="basic-layout-colored-form-control">New Deposit</h4>
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


<?php if(isset($_REQUEST['m'])==1){?><p align="center" style="color:#00CC33; padding-bottom:8px;">Deposit Added Successfully!!</p><?php }?>

<form class="form" action="deposit-process.php?case=add" method="post">
<div class="form-body">


<div class="form-group"><label for="userinput5">User ID<span style="color:#CC0000;">*</span></label>
<input type="text" class="form-control"  placeholder="Enter User ID" name="userid" id="userid" onChange="getSponcheck(this.value);" onBlur="getSponcheck(this.value);"  onKeyUp="getSponcheck(this.value);"  required>
</div>

<div id="sponDiv" style="color:#FF0000; font-size:14px;"></div>

<div class="form-group">
<label for="userinput5">Wallet<span style="color:#CC0000;">*</span></label>
<select name="wallet" class="form-control border-primary" required>
<option value="">Select Wallet</option>
<option value="Current Wallet">Current Wallet</option>
<option value="Fund Wallet">Fund Wallet</option>
</select>
</div>

<div class="form-group">
<label for="userinput5">Amount<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Amount" required id="amount" name="amount" value="" >
</div>


<div class="form-group">
<label for="userinput5">Remarks<span style="color:#CC0000;">*</span></label>
<input class="form-control border-primary" type="text" placeholder="Enter Remarks" id="remarks" name="remarks" value="" required>
</div>

</div>

<div class="form-actions right">

<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Submit</button>
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

<?php }else if($_REQUEST['case']==''){?>
<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">View Deposit</h4>
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

<table width="100%">
<tr>
<td>
<div align="left" style="margin-left:10px;"><a href="deposit-csv-download.php"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div>
</td>
<td>
<div align="right" style="padding:5px;"><form name="frm1" method="post" action="deposit.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID" style="width:150px;" />
</form></div>
</td>
</tr>
</table>

<div class="table-responsive">

<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;" width="10%">Sl_No.</th>
<th style="text-align:center;" width="15%">User_ID</th>
<th style="text-align:center;" width="15%">Name</th>
<th style="text-align:center;" width="15%">Amount</th>
<th style="text-align:center;" width="15%">Wallet</th>
<th style="text-align:center;" width="15%">Remarks</th>
<th style="text-align:center;" width="15%">Date</th>
<th style="text-align:center;" width="10%">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='da_deposit';
$lim=100;
$tpage='deposit.php';

if($_REQUEST['act']=='search')
{
$where="WHERE `userid` LIKE '".trim($_POST['search'])."'  ORDER BY `id` DESC";
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
<td align="center" style="padding:3px;"><?php if ($fetch['userid']){?><?=$fetch['userid']?><?php }else{?>---<?php }?></td>
<td align="center" style="padding:3px;"><?=ucwords(strtolower(getMemberUserid($conn,trim($fetch['userid']),'name')))?></td>
<td align="center" style="padding:3px;"><?=$fetch['amount']?></td>
<td align="center" style="padding:3px;"><?=$fetch['wallet']?></td>
<td align="center" style="padding:3px;"><?=$fetch['remarks']?></td>
<td align="center" style="padding:3px;"><?=getDateConvert($fetch['date'])?></td>
<td align="center" style="padding:3px;">
<a href="deposit-process.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to delete this?')"><img src="images/delete.png" /></a></td>
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
