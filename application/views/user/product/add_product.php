<div class="row page-title-div">
	<div class="col-md-6">
		<h4 class="title">Add Product</h4>
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
							<h5>Basic Input Fields</h5>
						</div>
					</div>
					<div class="panel-body">
						<div id="err"></div>
						<form class="form-horizontal" id="add_product" enctype="multipart/form-data">
							<input type="hidden" name="action_url" id="action_url" value="<?php echo base_url();?>product/save">
							<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
                            <div class="form-group">
								<label for="product_image" class="col-sm-2 control-label">Product Image</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" id="product_image" name="product_image">
								</div>
							</div>
							<div class="form-group">
								<label for="product_name" class="col-sm-2 control-label">Product Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="product_name" name="product_name">
								</div>
							</div>
							<div class="form-group">
								<label for="quantity" class="col-sm-2 control-label">Quantity</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="quantity" name="quantity">
								</div>
							</div>
							<div class="form-group">
								<label for="predefined" class="col-sm-2 control-label">Unit</label>
								<div class="col-sm-10">
									<select class="form-control" name="unit">
										<option value="">Default Select</option>
										<option value="kg">1</option>
										<option value="bag">2</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="price" class="col-sm-2 control-label">Price</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="price" name="price">
								</div>
							</div>
							<div class="form-group">
                                <label for="harvest_date" class="col-sm-2 control-label">Harvest Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="harvest_date" name="harvest_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_availability" class="col-sm-2 control-label">Product Availability</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="product_availability" name="product_availability">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="btn-group pull-right mt-10" role="group">
                                <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-refresh"></i>Reset</button>
                                <button type="submit" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>Submit</button>
                            </div>
						</form>
						<!-- /.col-md-12 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
