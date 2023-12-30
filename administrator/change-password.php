<?php include('header.php');
$left=1;
 ?>
    <!-- main menu-->
  <?php include('leftpanel.php'); ?>
    <!-- / main menu-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper" style="min-height:590px;">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            
          </div>
        </div>
        <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	<div class="row match-height">
		<div class="col-md-3">&nbsp;</div>

		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-colored-form-control">Change password</h4>
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

<?php if($_REQUEST['m']==1){?><div align="center"><div id="norecord" style="color:#FF0000;">Current password does not match!</div></div><?php }?>
<?php if($_REQUEST['n']==2){?><div align="center"><div id="norecord" style="color:#009900;">New password successfully updated!</div></div><?php }?>
<?php if($_REQUEST['p']==3){?><div align="center"><div id="norecord" style="color:#FF0000;">Confirm password does not match!</div></div><?php }?>

						<form class="form" action="change-password-process.php" method="post">
							<div class="form-body">

								<div class="form-group">
									<label for="timesheetinput1">Current Password<span style="color:#CC0000;">*</span></label>
									<div class="position-relative has-icon-left">
										<input type="password" id="current" name="current" class="form-control" placeholder="Current Password" required>
										<div class="form-control-position">
											<i class="icon-key"></i>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="timesheetinput2">New Password<span style="color:#CC0000;">*</span></label>
									<div class="position-relative has-icon-left">
										<input type="password" id="newpass" class="form-control" placeholder="New Password" name="newpass" required>
										<div class="form-control-position">
								 			<i class="icon-key"></i>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="timesheetinput3">Confirm Password<span style="color:#CC0000;">*</span></label>
									<div class="position-relative has-icon-left">
										<input type="password" id="conpass" class="form-control" placeholder="Confirm Password" name="conpass" required>
										<div class="form-control-position">
											<i class="icon-lock"></i>
										</div>
									</div>
								</div>
								
								</div>

							<div class="form-actions right">
								<button type="submit" class="btn btn-primary">
									<i class="icon-check2"></i> Save
								</button>
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
    <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
  </body>
</html>
