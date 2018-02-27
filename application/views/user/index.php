<div class="row page-title-div">
	<div class="col-md-6">
		<h4 class="title">
			<?php echo ucfirst($user->fname) . ' ' . ucfirst($user->lname) ;?>
			<small class="ml-10">My Profile</small>
		</h4>
		<p class="sub-title">One stop solution for perfect admin dashboard!</p>
	</div>
	<!-- /.col-md-6 -->
	<div class="col-md-6 right-side">

	</div>
	<!-- /.col-md-6 text-right -->
</div>
<!-- /.row -->

<div class="row mt-30">
	<div class="col-md-3">
		<div class="panel border-primary no-border border-3-top">
			<div class="panel-heading">
				<div class="panel-title">
					<h5>Profile Picture</h5>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<img src="<?php echo base_url() ?>assets/user/images/avatar-1.svg" alt="User Avatar" class="img-responsive">
						<div class="text-center">
							<button type="button" class="btn btn-primary btn-xs btn-labeled mt-10">Edit Picture
								<span class="btn-label btn-label-right">
									<i class="fa fa-pencil"></i>
								</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.panel -->

		<div class="panel border-primary no-border border-3-top">
			<div class="panel-heading">
				<div class="panel-title">
					<h5>Information</h5>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<table class="table table-striped">
						<tbody>
							<tr>
								<th>
									<small>
										<?php echo $user->address; ?>
									</small>
								</th>
							</tr>
							<tr>
								<th>
									<small>
										<?php echo $user->mobile ;?>
									</small>
								</th>
							</tr>
							<tr>
								<th>
									<small>
										<?php echo $user->email ;?>
									</small>
								</th>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-md-3 -->

	<div class="col-md-9">
		<div class="section-title">
			<iframe
			  width="100%"
			  height="600"
			  frameborder="0"
			  scrolling="no"
			  marginheight="0"
			  marginwidth="0"
			  src="https://maps.google.com/maps?q=<?= $user->latitude ?>,<?= $user->longitude ?>&hl=es;z=14&amp;output=embed"
			 >
			 </iframe>
			 <br />
			 <small>
			   <a
			    href="https://maps.google.com/maps?q=<?= $user->latitude ?>,<?= $user->longitude ?>&hl=es;z=14&amp;output=embed"
			    style="color:#0000FF;text-align:left"
			    target="_blank"
			   >
			     See map bigger
			   </a>
			 </small>
		</div>
		<!-- /.section-title -->
	</div>
</div>
<!-- /.col-md-9 -->
</div>
<!-- /.row -->
