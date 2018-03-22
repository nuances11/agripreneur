<div class="row page-title-div">
	<div class="col-md-6">
		<h2 class="title">Add Category</h2>
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
				<a href="<?php echo base_url();?>admin/category">Category</a>
			</li>
			<li class="active">Add Category</li>
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
						<h5>Category Information</h5>
					</div>
				</div>
                <div id="err"></div>
				<div class="panel-body">
					<form class="form-horizontal" id="add_category">
                    <input type="hidden" name="action_url" id="action_url" value="<?php echo base_url();?>admin/category/save">
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
						<div class="form-group">
							<label for="category_name" class="col-sm-2 control-label">Category Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="category_name" name ="category_name">
							</div>
						</div>
						<div class="form-group">
							<label for="category_identifier" class="col-sm-2 control-label">Identifier</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="category_identifier" name="category_identifier">
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-10">
                                <select class="form-control" name="status" id="status">
                                    <option value="">Default Select</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
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
