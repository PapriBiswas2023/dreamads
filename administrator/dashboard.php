<?php
include('header.php');
$left=1;
include('calculate-cto-bonus.php');
?>

<!-- main menu-->
<?php include('leftpanel.php') ?>
<!-- / main menu-->

<div class="app-content content container-fluid">
<div class="content-wrapper">
<div class="content-header row">
</div>

<div class="content-body" style="min-height:518px;">

<div class="row">

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="member.php" style="color:#fff;">
<div class="card-body" style="background:#143F6B; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white"><?=getTotalMember($conn)?></h3>
<span>Total Member</span>
</div>
<div class="media-right media-middle">
<i class="icon-man white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="member-active.php" style="color:#fff;">
<div class="card-body" style="background:#F55353; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 style="color:#fff;"><?=getActiveMember($conn)?></h3>
<span>Active Member</span>
</div>
<div class="media-right media-middle" >
<i class="icon-woman white font-large-2 float-xs-right" ></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="member-inactive.php" style="color:#fff;">
<div class="card-body" style="background:#FEB139; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white"><?=getInactiveMember($conn)?></h3>
<span>Inactive Member</span>
</div>
<div class="media-right media-middle">
<i class="icon-man-woman white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="commission-self-add.php" style="color:#fff;">
<div class="card-body" style="background:#614124; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="violet" style="color:#fff;"><?=getTotalSelfAddBonus($conn)?></h3>
<span>Self Add Bonus</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="commission-level.php" style="color:#fff;">
<div class="card-body" style="background:#143F6B; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="violet" style="color:#fff;"><?=getTotalLevelBonus($conn)?></h3>
<span>Level Bonus</span>
</div>
<div class="media-right media-middle">
<i class="icon-diagram white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="commission-level-add.php" style="color:#fff;">
<div class="card-body" style="background:#F55353; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white"><?=getTotalLevelAddBonus($conn)?></h3>
<span>Level Add View Bonus</span>
</div>
<div class="media-right media-middle">
<i class="icon-money white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>


<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="commission-direct.php" style="color:#fff;">
<div class="card-body" style="background:#FEB139; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white"><?=getTotalDirectBonus($conn)?></h3>
<span>Direct Bonus</span>
</div>
<div class="media-right media-middle">
<i class="icon-money white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="commission-bonanza.php" style="color:#fff;">
<div class="card-body" style="background:#614124; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white"><?=getTotalBonanzaBonus($conn)?></h3>
<span>Bonanza Bonus</span>
</div>
<div class="media-right media-middle">
<i class="icon-money white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="commission-franchise.php" style="color:#fff;">
<div class="card-body" style="background:#143F6B; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white"><?=getTotalFranchiseBonus($conn)?></h3>
<span>Franchise Bonus</span>
</div>
<div class="media-right media-middle">
<i class="icon-money white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="commission-cto.php" style="color:#fff;">
<div class="card-body" style="background:#F55353; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white"><?=getTotalCtoBonus($conn)?></h3>
<span>CTO Bonus</span>
</div>
<div class="media-right media-middle">
<i class="icon-money white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>


<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="feedback.php" style="color:#ffff;">
<div class="card-body" style="background:#FEB139; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="white"><?=getNoOfFeedback($conn)?></h3>
<span>Total Feedback</span>
</div>
<div class="media-right media-middle">
<i class="icon-feedback white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>


<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="support.php" style="color:#fff;">
<div class="card-body" style="background:#614124; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 style="color:#fff;"><?=getTotalSupport($conn)?></h3>
<span>Total Support</span>
</div>
<div class="media-right media-middle">
<i class="icon-support white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="#" style="color:#fff;">
<div class="card-body" style="background:#143F6B; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="violet" style="color:#fff;"><?=TotalBusinessAmount($conn)?></h3>
<span>Total Business</span>
</div>
<div class="media-right media-middle">
<i class="icon-note white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="pending-withdrawal.php" style="color:#fff;">
<div class="card-body" style="background:#F55353; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 style="color:#FFFFFF;"><?=getPendingWithdrawalAdmin($conn)?></h3>
<span>Pending Withdrawal</span>
</div>
<div class="media-right media-middle">
<i class="icon-note white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>


<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="approved-withdrawal.php" style="color:#fff;">
<div class="card-body" style="background:#FEB139; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="violet" style="color:#fff;"><?=getApprovedWithdrawalAdmin($conn)?></h3>
<span>Approved Withdrawal</span>
</div>
<div class="media-right media-middle">
<i class="icon-note white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
</div>
</div>

<div class="col-xl-3 col-lg-6 col-xs-12">
<div class="card" style="border-radius: 10px;">
<a href="imps-withdrawal.php" style="color:#fff;">
<div class="card-body" style="background:#614124; border-radius: 10px;">
<div class="card-block">
<div class="media">
<div class="media-body text-xs-left">
<h3 class="violet" style="color:#fff;"><?=getTotalIMPSWithdrawal($conn)?></h3>
<span>IMPS Withdrawal</span>
</div>
<div class="media-right media-middle">
<i class="icon-note white font-large-2 float-xs-right"></i>
</div>
</div>
</div>
</div>
</a>
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
<script src="app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="app-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>
