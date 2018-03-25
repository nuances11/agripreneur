<div class="row page-title-div">
	<div class="col-md-6">
		<h2 class="title">Edit Unit</h2>
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
				<a href="<?php echo base_url();?>admin/unit">Unit</a>
			</li>
			<li class="active">Edit Unit</li>
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
						<h5>Unit Information</h5>
					</div>
				</div>
                <div id="err"></div>
				<div class="panel-body">
					<form class="form-horizontal" id="edit_unit">
                    <input type="hidden" name="action_url" id="action_url" value="<?php echo base_url();?>admin/unit/update">
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
                    <input type="hidden" name="unit_id"  value="<?php echo $unit->unit_id;?>">
						<div class="form-group">
							<label for="unit_name" class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="unit_name" name ="unit_name" value="<?php echo $unit->unit_name;?>">
							</div>
						</div>
						<div class="form-group">
							<label for="unit_identifier" class="col-sm-2 control-label">Identifier</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="unit_identifier" name="unit_identifier"  value="<?php echo $unit->unit_identifier;?>">
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-10">
                                <select class="form-control" name="status" id="status">
                                    <option value="">Default Select</option>
                                    <option value="1" <?php if($unit->status == 1){ echo 'selected';} ?>>Active</option>
                                    <option value="2" <?php if($unit->status == 2){ echo 'selected';} ?>>Inactive</option>
                                </select>
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
