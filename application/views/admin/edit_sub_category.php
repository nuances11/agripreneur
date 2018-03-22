<div class="row page-title-div">
	<div class="col-md-6">
		<h2 class="title">Edit Sub Category</h2>
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
				<a href="<?php echo base_url();?>admin/subcategory">Sub Category</a>
			</li>
			<li class="active">Edit Sub Category</li>
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
						<h5><?php echo ucfirst($subcategory->subcategory_name);?></h5>
					</div>
				</div>
                <div id="err"></div>
				<div class="panel-body">
					<form class="form-horizontal" id="edit_sub_category">
                    <input type="hidden" name="action_url" id="action_url" value="<?php echo base_url();?>admin/subcategory/update">
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
                    <input type="hidden" name="subcategory_id" id="subcategory_id" value="<?php echo $subcategory->subcategory_id;?>">
                        <div class="form-group">
							<label for="category" class="col-sm-2 control-label">Category</label>
							<div class="col-sm-10">
                                <select class="form-control" name="category" id="category">
                                    <option value="">Default Select</option>
                                    <?php
                                        foreach($categories as $category){
                                            ?>
                                                <option value="<?php echo $category->category_id;?>" <?php if($subcategory->category_id == $category->category_id){echo 'selected';} ?>><?php echo $category->category_name;?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label for="subcategory_name" class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="subcategory_name" name ="subcategory_name" value="<?php echo $subcategory->subcategory_name;?>">
							</div>
						</div>
						<div class="form-group">
							<label for="subcategory_identifier" class="col-sm-2 control-label">Identifier</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="subcategory_identifier" name="subcategory_identifier" value="<?php echo $subcategory->subcategory_identifier;?>">
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-10">
                                <select class="form-control" name="status" id="status">
                                    <option value="">Default Select</option>
                                    <option value="1" <?php if($subcategory->subcategory_status == 1) {echo 'selected';} ?>>Active</option>
                                    <option value="2" <?php if($subcategory->subcategory_status == 2) {echo 'selected';} ?>>Inactive</option>
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
