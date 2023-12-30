<?php include('header.php');
$left=9;
?>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- main menu-->
<?php include('leftpanel.php'); ?>


<div class="app-content content container-fluid">
<div class="content-wrapper" style="min-height:590px;">

<div class="content-body">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Payment Request</h4>
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
<div class="row">
<div class="col-md-2"><div style="padding:5px;"><a href="payment-csv-download.php?formdate=<?=$_POST['fromdate']?>&todate=<?=$_POST['todate']?>"><input type="button" value="Excel Download" class="btn" style="background:#009900;color:#FFFFFF;" /></a></div></div>

<form name="frm1" method="post" action="payment.php?act=search">

<div class="col-md-2"><div style="padding:5px;"><input type="date" name="fromdate" id="fromdate" value="<?=$_POST['fromdate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-1"><div style="padding:5px;">-</div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="date" name="todate" id="todate" value="<?=$_POST['todate']?>" required class="form-control input-line input-medium" /></div></div>
<div class="col-md-2"><div style="padding:5px;"><input type="submit" name="submit" value="Search" class="btn" style="background:#009900;color:#FFFFFF;" /></div></div>
</form>


<div class="col-md-3">
<!--<div style="padding:5px;">
--><div align="right" style="padding:5px;">
<form name="frm1" method="post" action="payment.php?act=search"><input type="text" name="search" id="search" class="form-control input-line input-medium" value="<?=$_REQUEST['search']?>" required placeholder="User ID" style="width:100%;" />
</form>
<!--</div>-->
</div>
</div>


</div>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="bg-teal bg-lighten-4">
<tr>
<th style="text-align:center;">Sl_No</th>
<th style="text-align:center;">User_ID</th>
<th style="text-align:center;">Name</th>
<th style="text-align:center;">Amount</th>
<th style="text-align:center;">Transaction_ID/UTR_No.</th>
<th style="text-align:center;">Receipt</th>
<th style="text-align:center;">Status</th>
<th style="text-align:center;">Date</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>

<?php
$tname='da_member_payment';
$lim=100;
$tpage='payment.php';
if($_REQUEST['act']=='search')
{
if(trim($_POST['fromdate'])!='' && trim($_POST['todate'])!='')
{
$where="WHERE `date` BETWEEN '".trim($_POST['fromdate'])."' AND '".trim($_POST['todate'])."'  ORDER BY `id` DESC";
}else{
$where="WHERE `userid` LIKE '".trim($_POST['search'])."' ORDER BY `id` DESC";
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
<td align="center" style="padding:3px;"><?=$fetch['userid']?></td>
<td align="center" style="padding:3px;"><?=getMemberUserid($conn,$fetch['userid'],'name')?></td>
<td align="center" style="padding:3px;"><?=$fetch['amount']?></td>
<td align="center" style="padding:3px;"><?=$fetch['tranid']?></td>
<td align="center" style="padding:5px;"><a href="file-download-payment.php?f=<?=$fetch['receipt']?>" style="cursor:pointer;"><img src="images/download.gif" height="40"></a></td>
<td align="center" style="padding:3px;"><?php if($fetch['status']=='C'){?><span class="label label-success" style="color:#00CC00;">Approved</span><?php }else{?><a href="payment-process.php?case=status&id=<?=$fetch['id']?>&st=<?=$fetch['status']?>&userid=<?=$fetch['userid']?>&amount=<?=$fetch['amount']?>" style="text-decoration:none;" onClick="return confirm('Are you sure want to change the status?');"><span class="label label-info" style="color:#CC0000;">Pending</span></a><?php }?></td>
<td align="center" style="padding:3px;"><?=getDateConvert($fetch['date'])?></td>
<td align="center" style="padding:3px;"><?php if($fetch['status']=='P'){?><a href="payment-process.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to delete this?')"><img src="images/delete.png" /></a><?php }else{?>---<?php }?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="9" align="center" style="color:#FF0000;">No Record Found!</td></tr>
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