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
					<li class="active">Upload Registration Form</li>
				</ul>
				<h3> Registration Form Upload</h3>
				<div class="well">
					<div id="err"></div>
					<form class="form-horizontal" id="upload_form">
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
								<input type="text" id="email" name="email" placeholder="First Name">
							</div>
						</div>
                        <div class="control-group">
							<label class="control-label" for="fname">Registration File
								<sup>*</sup>
							</label>
							<div class="controls">
								<input type="text" id="fileToUpload" name="fileToUpload" placeholder="Registration Form">
							</div>
						</div>

						<p>
							<sup>*</sup>Required field </p>

						<div class="control-group">
							<div class="controls">
								<input class="btn btn-large btn-success" type="submit" value="Submit" />
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- MainBody End ============================= -->
