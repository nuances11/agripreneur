<div class="row page-title-div">
	<div class="col-md-6">
		<h4 class="title">Edit Profile</h4>
	</div>
	<!-- /.col-md-6 -->
	<div class="col-md-6 right-side">

	</div>
	<!-- /.col-md-6 text-right -->
</div>
<!-- /.row -->
<section class="section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title">
							<h5>Information</h5>
						</div>
					</div>
					<div class="panel-body">
						<div id="err"></div>
						<form class="form-horizontal" id="admin_update_user" enctype="multipart/form-data">
							<input type="hidden" name="action_url" id="action_url" value="<?php echo base_url();?>admin/user/update">
							<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
                            <div class="form-group">
								<label for="fileToUpload" class="col-sm-2 control-label">Profile Image</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" id="fileToUpload" name="fileToUpload">
								</div>
                            </div>
                            <div class="form-group">
								<label for="predefined" class="col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
									<select class="form-control" name="title">
										<option value="">Default Select</option>
										<option value="Mr." <?php if($user->title == 'Mr.'){ echo 'selected'; }?>>Mr.</option>
                                        <option value="Mrs." <?php if($user->title == 'Mrs.'){ echo 'selected'; }?>>Mrs.</option>
                                        <option value="Ms." <?php if($user->title == 'Ms.'){ echo 'selected'; }?>>Ms.</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="fname" class="col-sm-2 control-label">First Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user->fname; ?>">
								</div>
                            </div>
                            <div class="form-group">
								<label for="lname" class="col-sm-2 control-label">Last Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user->lname; ?>">
								</div>
                            </div>
                            <div class="form-group">
								<label for="email" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="email" name="email"  value="<?php echo $user->email; ?>">
								</div>
                            </div>
                            <div class="form-group">
                                <label for="predefined" class="col-sm-2 control-label">Birthday</label>
                                <?php list($day, $month, $years) = explode('-', $user->birthday); ?>
                                    <div class="col-sm-3 col-xs-4">
                                        <select class="form-control" name="day">
                                            <option value="">--</option>
                                            <?php
                                                for($m=1; $m<=31; ++$m){
                                            ?>
                                                <option value="<?= $m ?>" <?php if($day == $m){echo 'selected';}?>>
                                                    <?= $m ?>
                                                </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col-xs-4">
                                        <select class="form-control" name="month">
                                            <option value="">--</option>
                                            <?php
                                                for($m=1; $m<=12; ++$m){
                                            ?>
                                                <option value="">Month</option>
                                                <option value="<?= date('F', mktime(0, 0, 0, $m, 1))?>" <?php if($month == date('F', mktime(0, 0, 0, $m, 1))){echo 'selected';}?>>
                                                    <?= date('F', mktime(0, 0, 0, $m, 1)) ?>
                                                </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col-xs-4">
                                        <select class="form-control" name="year">
                                            <option value="">--</option>
                                            <?php
                                                $year = date("Y");
                                                $newYear = $year - 99;
                                                $limit = $year - 18;
                                                for($m = $limit; $m>=$newYear; --$m){
                                                    ?>
                                            <option value="<?= $m ?>" <?php if($years == $m){echo 'selected';}?>>
                                                <?= $m ?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
							</div>
                            <div class="form-group">
								<label for="predefined" class="col-sm-2 control-label">Gender</label>
								<div class="col-sm-10">
									<select class="form-control" name="unit">
										<option value="">Default Select</option>
										<option value="Mr." <?php if($user->gender == 'Male'){ echo 'selected'; }?>>Male</option>
                                        <option value="Mrs." <?php if($user->gender == 'Female'){ echo 'selected'; }?>>Female</option>
									</select>
								</div>
                            </div>
                            <div class="form-group">
								<label for="address" class="col-sm-2 control-label">address</label>
								<div class="col-sm-10">
                                    <input type="text"  class="form-control" id="address" placeholder="Adress" name="address"  value="<?php echo $user->address; ?>"/>
                                    <input type="hidden" name="longitude" id="long" value="<?php echo $user->longitude; ?>">
                                    <input type="hidden" name="latitude" id="lat" value="<?php echo $user->latitude; ?>">
								</div>
                            </div>
                            <div class="form-group">
								<label for="mobile" class="col-sm-2 control-label">Mobile</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo $user->mobile; ?>">
								</div>
                            </div>


                            <div class="btn-group pull-right mt-10" role="group">
                                <button type="submit" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>Update</button>
                            </div>
						</form>
						<!-- /.col-md-12 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
