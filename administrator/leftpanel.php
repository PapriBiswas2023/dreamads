<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
<div class="main-menu-content">
<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main" style="background:#000000;">
<li class=" nav-item"><a href="#"><i class="icon-house"></i><span data-i18n="nav.dash.main" class="menu-title">Home</span></a><ul class="menu-content">
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="dashboard.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-home"></i>Dashboard</a></li>
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="change-password.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-ios-locked"></i>Change Password</a></li>
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="logout.php?case=delete&id=<?=$fetch['id']?>" onclick="return confirm('Are you want to sure to Logout this?')"  data-i18n="nav.dash.main" class="menu-item"><i class="icon-power3"></i>Logout</a>
</li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-list"></i><span data-i18n="nav.dash.main" class="menu-title">Settings</span></a>
<ul class="menu-content">
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-package.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Packages</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-level.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Level</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-bonanza.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Bonanza</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-level-adsview.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Level Ads View</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-rank-capping.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Rank & Capping</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-franchise.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Franchise</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-cto.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>CTO</a></li>

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-transfer.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Transfer</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-company.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Company</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-withdrawal.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Withdrawal</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-onoff.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>On/Off</a></li>
</ul>


<li class=" nav-item"><a href="#"><i class="icon-man-woman"></i><span data-i18n="nav.dash.main" class="menu-title">Member</span></a>
<ul class="menu-content">

<?php if(getTotalMember($conn)<1){ ?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>First Member</a></li>
<?php }?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Member</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="bank-details.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Bank Details</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="income-statment.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Income Statement</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="topup-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Topup Statement</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="package-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Package Statement</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="package-upgrade-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Package Upgrade Statement</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="rank-capping-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Rank And Capping Statement</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="bonanza-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Bonanza Statement</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member-renewal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Renewal Statement</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="cto-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>CTO Statement</a></li>

<li class="<?php if($left=='3'){?> active<?php }?>"><a href="kyc-details-approved.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>KYC Statement Approved</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="kyc-details-pending.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>KYC Statement Pending</a></li>
</ul>

<li class=" nav-item"><a href="#"><i class="icon-money"></i><span data-i18n="nav.dash.main" class="menu-title">Commission</span></a>
<ul class="menu-content">

<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-self-add.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Self Add Bonus</a></li>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-level.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Level Bonus</a></li>

<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-level-add.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Level Add Bonus</a></li>

<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-direct.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Direct Bonus</a></li>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-bonanza.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Bonanza Bonus</a></li>


<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-franchise.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Franchise Bonus</a></li>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-cto.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>CTO Bonus</a></li>

</ul>



<li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.dash.main" class="menu-title">Deposit </span></a>
<ul class="menu-content">
<li class="<?php if($left=='6'){?> active<?php }?>"><a href="deposit.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Deposit</a></li>
<li class="<?php if($left=='6'){?> active<?php }?>"><a href="deposit.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Deposit</a></li>
</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.dash.main" class="menu-title"> Deduct </span></a>
<ul class="menu-content">
<li class="<?php if($left=='7'){?> active<?php }?>"><a href="deduct.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Deduct</a></li>
<li class="<?php if($left=='7'){?> active<?php }?>"><a href="deduct.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Deduct</a></li>
</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-bank"></i><span data-i18n="nav.dash.main" class="menu-title">Transfer</span></a>
<ul class="menu-content">
<li class="<?php if($left=='8'){?> active<?php }?>"><a href="current.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Current To Topup Wallet</a></li>
<li class="<?php if($left=='8'){?> active<?php }?>"><a href="fund.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Topup To Others Member</a></li>
</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-money"></i><span data-i18n="nav.dash.main" class="menu-title">Payment Request</span></a>
<ul class="menu-content">
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="payment.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Statement</a></li>
</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-video"></i><span data-i18n="nav.dash.main" class="menu-title">Advertisement</span></a>
<ul class="menu-content">
<li class="<?php if($left=='10'){?> active<?php }?>"><a href="advertisement.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Advertisement</a>
</li>
<li class="<?php if($left=='10'){?> active<?php }?>"><a href="advertisement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Advertisement</a>
</li>
</ul>
</li>


<li class="nav-item"><a href="#"><i class="icon-tree"></i><span data-i18n="nav.dash.main" class="menu-title">Genealogy</span></a>
<ul class="menu-content">
<li class="<?php if($left=='11'){?> active<?php }?>"><a href="grid-view.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Grid View</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-book"></i><span data-i18n="nav.dash.main" class="menu-title">Withdrawal</span></a>
<ul class="menu-content">
<li class="<?php if($left=='12'){?> active<?php }?>"><a href="pending-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Pending Withdrawal</a>
</li>
<li class="<?php if($left=='12'){?> active<?php }?>"><a href="approved-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Approved Withdrawal</a>
</li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-book"></i><span data-i18n="nav.dash.main" class="menu-title">Imps Withdrawal</span></a>
<ul class="menu-content">
<li class="<?php if($left=='21'){?> active<?php }?>"><a href="imps-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Statement</a>
</li>

</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-feedback"></i><span data-i18n="nav.dash.main" class="menu-title">Announcement</span></a>
<ul class="menu-content">
<li class="<?php if($left=='16'){?> active<?php }?>"><a href="announcement.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Announcement</a></li>
<li class="<?php if($left=='16'){?> active<?php }?>"><a href="announcement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Announcement</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-th"></i><span data-i18n="nav.dash.main" class="menu-title">Others</span></a>
<ul class="menu-content">
<li class="<?php if($left=='13'){?> active<?php }?>"><a href="contact.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Contact</a></li>
<li class="<?php if($left=='13'){?> active<?php }?>"><a href="contact.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Contact</a></li>
<li class="<?php if($left=='13'){?> active<?php }?>"><a href="feedback.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Feedback</a></li>
<li class="<?php if($left=='13'){?> active<?php }?>"><a href="popup.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Popup</a></li>
<li class="<?php if($left=='13'){?> active<?php }?>"><a href="popup.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Popup</a></li>
</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-support"></i><span data-i18n="nav.dash.main" class="menu-title">Support</span></a>
<ul class="menu-content">
<li class="<?php if($left=='14'){?> active<?php }?>"><a href="support.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Support</a></li>
</ul>
</li>

<li class=" nav-item"><a href="logout.php" onclick="return confirm('Are you sure want to logout now?');"><i class="icon-power"></i><span data-i18n="nav.dash.main" class="menu-title">Logout</span></a></li>

</div>
</div>