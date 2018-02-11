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
			<div id="map" style="height: 100%;"></div>
			<script>
				var map;

				function initMap() {
					map = new google.maps.Map(document.getElementById('map'), {
						center: {
							lat: -34.397,
							lng: 150.644
						},
						zoom: 8
					});
				}

			</script>
			<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo MAPS_API_KEY;?>&callback=initMap">


			</script>
		</div>
		<!-- /.section-title -->
	</div>
</div>
<!-- /.col-md-9 -->
</div>
<!-- /.row -->
