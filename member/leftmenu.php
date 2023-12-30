<div class="sidebar">

<div class="sidebar-background"></div>
<div class="sidebar-wrapper scrollbar-inner">
<div class="sidebar-content">
<div class="user">
<div class="avatar-sm float-left mr-2 avatar-img rounded-circle" style="background:#FFFFFF;" >
<?php
if(getMember($conn,$_SESSION['mid'],'profile'))
{
?>
<img src="profile/<?=getMember($conn,$_SESSION['mid'],'profile')?>" alt="..." class="avatar-img rounded-circle" />
<?php }else{?>
<img src="assets/img/profile.png" alt="..." class="avatar-img rounded-circle" />
<?php }?>
</div>
<div class="info">
<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
<span>
<?=getMember($conn,$_SESSION['mid'],'name')?>
<span class="user-level"><?=getMember($conn,$_SESSION['mid'],'userid')?></span>
<span class="caret"></span>
</span>
</a>
<div class="clearfix"></div>

<div class="collapse in" id="collapseExample">
<ul class="nav">
<li><a href="edit-profile.php"><span class="link-collapse">Edit Profile</span></a></li>
<li><a href="kyc-update.php"><span class="link-collapse" style="color:#FFF;">Kyc Update</span></a></li>
<li><a href="change-password.php"><span class="link-collapse">Change Password</span></a></li>
<li><a href="logout.php" onclick="return confirm('Are you sure want to logout now?');"><span class="link-collapse">Logout</span></a></li>
</ul>
</div>
</div>
</div>

<ul class="nav">
<li class="nav-item active">
<a href="dashboard.php">
<img src="assets/img/home.png"/>
<p> &nbsp; Dashboard</p>
</a>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#base">
<img src="assets/img/members.png"/>
<p> &nbsp; Sponsor & Rank</p>
<span class="caret"></span>
</a>

<div class="collapse" id="base">
<ul class="nav nav-collapse">
<li><a href="member-direct-downline.php"><span class="sub-item">My Sponsor</span></a></li>
<li><a href="member-renewal.php"><span class="sub-item">Renewal Statement</span></a></li>
<li><a href="member-rewards.php"><span class="sub-item">Rank Statement</span></a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#forms">
<img src="assets/img/commitions.png"/>
<p> &nbsp;Commission</p>
<span class="caret"></span>
</a>
<div class="collapse" id="forms">
<ul class="nav nav-collapse">
<li><a href="comm-self-add.php"><span class="sub-item">Self Add Bonus</span></a></li>

<li><a href="comm-level.php"><span class="sub-item">Level Bonus</span></a></li>
<li><a href="comm-level-add.php"><span class="sub-item">Level Add view Bonus</span></a></li>
<li><a href="comm-direct.php"><span class="sub-item">Direct Bonus</span></a></li>
<li><a href="comm-bonanza.php"><span class="sub-item">Bonanza Bonus</span></a></li>

<li><a href="comm-franchise.php"><span class="sub-item">Franchise Bonus</span></a></li>
<li><a href="comm-cto.php"><span class="sub-item">CTO Bonus</span></a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#forms1">
<img src="assets/img/commitions.png"/>
<p> &nbsp;Package Upgrade</p>
<span class="caret"></span>
</a>
<div class="collapse" id="forms1">
<ul class="nav nav-collapse">
<li><a href="package-upgrade.php"><span class="sub-item">New Upgrade</span></a></li>

<li><a href="package-upgrade-statement.php"><span class="sub-item">View Upgrade</span></a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#form1">
<img src="assets/img/transfer.png"/>
<p> &nbsp;Transfer</p>
<span class="caret"></span>
</a>
<div class="collapse" id="form1">
<ul class="nav nav-collapse">
<li><a href="current.php"><span class="sub-item">Current To Top-Up</span></a></li>
<li><a href="current-statement.php"><span class="sub-item">View Statement</span></a>
<li><a href="fund.php"><span class="sub-item">Top-Up To Others</span></a></li>
<li><a href="fund-statement.php"><span class="sub-item">View Statement</span></a>
</li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#menu">
<img src="assets/img/payment.png"/>
<p> &nbsp;Payment Request</p>
<span class="caret"></span>
</a>
<div class="collapse" id="menu">
<ul class="nav nav-collapse">
<li><a href="payment.php"><span class="sub-item">New Payment</span></a></li>
<li><a href="payment-statement.php"><span class="sub-item">View Statement</span></a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#tables">
<img src="assets/img/payment.png"/>
<p>&nbsp;Topup</p>
<span class="caret"></span>
</a>
<div class="collapse" id="tables">
<ul class="nav nav-collapse">
<li><a href="topup.php?case=check"><span class="sub-item">Other Activation</span></a></li>
<li><a href="topup.php"><span class="sub-item">Topup Statement</span></a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#basic">
<img src="assets/img/add.png"/>
<p> &nbsp;Advertisement</p>
<span class="caret"></span>
</a>
<div class="collapse" id="basic">
<ul class="nav nav-collapse">
<li><a href="advertisement.php"><span class="sub-item">View Statement</span></a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#maps">
<img src="assets/img/gene.png"/>
<p> &nbsp;Genealogy</p>
<span class="caret"></span>
</a>
<div class="collapse" id="maps">
<ul class="nav nav-collapse">
<li><a href="grid-view.php"><span class="sub-item">Grid View</span></a></li>
</ul>
</div>
</li>


<li class="nav-item">
<a data-toggle="collapse" href="#submenu">
<img src="assets/img/withd.png"/>
<p> &nbsp; Withdrawal</p>
<span class="caret"></span>
</a>
<div class="collapse" id="submenu">
<ul class="nav nav-collapse">
<li><a href="withdrawal.php?case=add"><span class="sub-item">New Withdrawal</span></a></li>
<li><a href="withdrawal-statement.php"><span class="sub-item">View Withdrawal</span></a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#isubmenu">
<img src="assets/img/withd.png"/>
<p> &nbsp;IMPS Withdrawal</p>
<span class="caret"></span>
</a>
<div class="collapse" id="isubmenu">
<ul class="nav nav-collapse">
<li><a href="imps-withdrawal.php?case=add"><span class="sub-item">New IMPS Withdrawal</span></a></li>
<li><a href="imps-withdrawal-statement.php"><span class="sub-item">View Statement</span></a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#charts">
<img src="assets/img/support.png"/>
<p> &nbsp;Support</p>
<span class="caret"></span>
</a>
<div class="collapse" id="charts">
<ul class="nav nav-collapse">
<li><a href="support.php?case=add"><span class="sub-item">New Support</span></a></li>
<li><a href="support-statement.php"><span class="sub-item">View Support</span></a></li>
</ul>
</div>
</li>

<li class="nav-item active">
<a href="logout.php" onclick="return confirm('Are you sure want to logout now?');">
<i class="fas fa-lock"></i><p>Logout</p></a>
</li>

</ul>
</div>
</div>
</div>