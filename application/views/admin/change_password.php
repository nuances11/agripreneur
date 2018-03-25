<div class="row page-title-div">
	<div class="col-md-6">
		<h2 class="title">Change Password</h2>
	</div>
	<!-- /.col-md-6 -->
	<div class="col-md-6 right-side">
	</div>
	<!-- /.col-md-6 text-right -->
</div>
<div class="row breadcrumb-div">
	<div class="col-md-6">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>/admin">
					<i class="fa fa-home"></i> Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>admin/users">Users</a>
			</li>
			<li class="active">Change Password</li>
		</ul>
	</div>
	<!-- /.col-md-6 -->
</div>
<section class="section">
	<div class="row">
		<div class="col-md-6">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">
						<h5>Enter Password</h5>
					</div>
				</div>
                <div id="err"></div>
				<div class="panel-body">
					<form class="form-horizontal" id="change_password">
                    <input type="hidden" name="action_url" id="action_url" value="<?php echo base_url();?>admin/user/update_password">
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
                    <input type="hidden" name="user_id" value="<?php echo $this->uri->segment(3) ;?>">
						<div class="form-group">
							<label for="new_pass" class="col-sm-2 control-label">New Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="new_pass" name ="new_pass">
							</div>
						</div>
						<div class="form-group">
							<label for="confirm_pass" class="col-sm-2 control-label">Confirm Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="confirm_pass" name="confirm_pass">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
