<div id="mainBody">
	<div class="container">
		<div class="row">
			<?php $this->load->view('shop/sidebar'); ?>
			<div class="span9">
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo base_url();?>shop">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">Registration</li> 
				</ul>
				<h3> Registration</h3>
				<div class="well">
	 				<div id="err"></div>
					<form class="form-horizontal" id="user_save">
						<input type="hidden" name="action_url" id="action_url" value="<?php echo base_url();?>user/save">
						<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
						<h4>Your personal information</h4>
						<div class="control-group">
							<label class="control-label">Title
								<sup>*</sup>
							</label>
							<div class="controls">
								<select class="span1" name="title">
									<option value="">-</option>
									<option value="Mr.">Mr.</option>
									<option value="Mrs.">Mrs.</option>
									<option value="Ms.">Ms.</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="fname">First name
								<sup>*</sup>
							</label>
							<div class="controls">
								<input type="text" id="fname" name="fname" placeholder="First Name">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="lname">Last name
								<sup>*</sup>
							</label>
							<div class="controls">
								<input type="text" id="lname" name="lname" placeholder="Last Name">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="email">Email
								<sup>*</sup>
							</label>
							<div class="controls">
								<input type="text" id="email" name="email" placeholder="Email">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="password">Password
								<sup>*</sup>
							</label>
							<div class="controls">
								<input type="password" id="password" name="password" placeholder="Password">
							</div>
                        </div>
                        <div class="control-group">
							<label class="control-label" for="password">Confirm Password
								<sup>*</sup>
							</label>
							<div class="controls">
								<input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Date of Birth
							</label>
							<div class="controls">
								<select class="span1" name="day">
									<option value="">--</option>
                                    <?php
                                        for($i = 1 ; $i < 32 ; $i++)
                                        {
                                            echo '<option value=' . $i . '>' . $i . '</option>';
                                        }
                                    ?>
								</select>
								<select class="span1" name="month">
                                    <option value="">--</option>
                                    <?php
                                        for($m=1; $m<=12; ++$m){
                                            echo '<option value=' . date('F', mktime(0, 0, 0, $m, 1)) . '>' . date('F', mktime(0, 0, 0, $m, 1)) . '</option>';
                                        }
                                    ?>
								</select>
								<select class="span1" name="year">
									<option value="">--</option>
                                    <?php
                                        $curYear = date("Y");
                                        $reqyear = $curYear - 18;
                                        $maxYear = $curYear - 99;
                                        for($i = 1980 ; $i <= $reqyear ; $i++)
                                        {
                                            echo '<option value=' . $i . '>' . $i . '</option>';
                                        }
                                    ?>
                                </select>
                                <span class="muted">(DD - MM - YYYY)</span>
							</div>
						</div>
                        <div class="control-group">
							<label class="control-label" for="gender">Gender
								<sup>*</sup>
							</label>
							<div class="controls">
								<select id="gender" name="gender">
									<option value="">-</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
								</select>
							</div>
                        </div>
						<div class="control-group">
							<label class="control-label" for="address">Address
								<sup>*</sup>
							</label>
							<div class="controls">
                                <input type="text" id="address" placeholder="Adress" name="address"/>
                                <input type="hidden" name="longitude" id="long">
                                <input type="hidden" name="latitude" id="lat">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="mobile">Mobile Phone
								<sup>*</sup>
							</label>

							<div class="controls">
								<input type="text" name="mobile" id="mobile" placeholder="Mobile Phone" />
							</div>
						</div>

						<p>
							<sup>*</sup>Required field </p>

						<div class="control-group">
							<div class="controls">
								<input class="btn btn-large btn-success" type="submit" value="Register" id="save_user_btn" />
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- MainBody End ============================= -->
