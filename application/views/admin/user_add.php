<div class="row page-title-div">
	<div class="col-md-6">
		<h2 class="title">Registratin Forms</h2>
	</div>
	<!-- /.col-md-6 -->
    <div class="col-sm-6 right-side">

    </div>
</div>
<div class="row breadcrumb-div">
	<div class="col-md-6">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>/admin">
					<i class="fa fa-home"></i> Home</a>
			</li>
			<li class="active">Registration Forms</li>
		</ul>
	</div>
	<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<section class="section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title">
						</div>
					</div>
					<div class="panel-body p-20">
						<?php if($this->session->flashdata('success')){
                            echo $this->session->flashdata('success');
                        } ?>
						<div id="err"></div>
                        <form id="user_save" class="form-horizontal">
							<input type="hidden" name="action_url" id="action_url" value="<?php echo base_url();?>admin/user/save">
							<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
                            <div class="form-group">
    							<label for="status" class="col-sm-2 control-label">Status</label>
    							<div class="col-sm-3">
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Default Select</option>
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
    							</div>
    						</div>
                            <div class="form-group">
    							<label for="title" class="col-sm-2 control-label">Title</label>
    							<div class="col-sm-3">
                                    <select class="form-control" name="title" id="title">
                                        <option value="">-</option>
    									<option value="Mr.">Mr.</option>
    									<option value="Mrs.">Mrs.</option>
    									<option value="Ms.">Ms.</option>
                                    </select>
    							</div>
    						</div>
                            <div class="form-group">
    							<label for="fname" class="col-sm-2 control-label">First Name</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control" id="fname" name ="fname">
    							</div>
    						</div>
                            <div class="form-group">
    							<label for="categlnameory_name" class="col-sm-2 control-label">Last Name</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control" id="lname" name ="lname">
    							</div>
    						</div>
                            <div class="form-group">
    							<label for="email" class="col-sm-2 control-label">Email</label>
    							<div class="col-sm-10">
    								<input type="email" class="form-control" id="email" name ="email">
    							</div>
    						</div>
                            <div class="form-group">
    							<label for="password" class="col-sm-2 control-label">Password</label>
    							<div class="col-sm-10">
    								<input type="password" class="form-control" id="password" name ="password">
    							</div>
    						</div>
                            <div class="form-group">
    							<label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
    							<div class="col-sm-10">
    								<input type="password" class="form-control" id="cpassword" name ="cpassword">
    							</div>
    						</div>
                            <div class="form-group">
    							<label for="day" class="col-sm-2 control-label">Date of Birth</label>
    							<div class="col-sm-3">
                                    <select class="form-control" name="day" id="day">
                                        <option value="">--</option>
                                        <?php
                                            for($i = 1 ; $i < 32 ; $i++)
                                            {
                                                echo '<option value=' . $i . '>' . $i . '</option>';
                                            }
                                        ?>
                                    </select>
    							</div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="month" id="month">
                                        <option value="">--</option>
                                        <?php
                                            for($m=1; $m<=12; ++$m){
                                                echo '<option value=' . date('F', mktime(0, 0, 0, $m, 1)) . '>' . date('F', mktime(0, 0, 0, $m, 1)) . '</option>';
                                            }
                                        ?>
                                    </select>
    							</div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="year" id="year">
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
    							</div>
    						</div>
                            <div class="form-group">
    							<label for="gender" class="col-sm-2 control-label">Gender</label>
    							<div class="col-sm-3">
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="">-</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
    							</div>
    						</div>
							<div class="form-group">
    							<label for="address" class="col-sm-2 control-label">Address</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control" id="address" name ="address">
									<input type="hidden" name="longitude" id="long">
	                                <input type="hidden" name="latitude" id="lat">
    							</div>
    						</div>

							<div class="form-group">
    							<label for="mobile" class="col-sm-2 control-label">Mobile Phone</label>
    							<div class="col-sm-10">
    								<input type="text" class="form-control" id="mobile" name ="mobile">
    							</div>
    						</div>



    						<div class="form-group">
    							<div class="col-sm-offset-2 col-sm-10">
    								<button type="submit" class="btn btn-primary">Submit</button>
    							</div>
    						</div>
                        </form>
						<!-- /.col-md-12 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
