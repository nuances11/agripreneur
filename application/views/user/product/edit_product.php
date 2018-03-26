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
							<h5>Product Information</h5>
						</div>
					</div>
					<div class="panel-body">
						<div id="err"></div>
						<form class="form-horizontal" id="edit_product" enctype="multipart/form-data">
							<input type="hidden" name="action_url" id="action_url" value="<?php echo base_url();?>product/update">
							<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
							<input type="hidden" name="img_file" value="<?php echo $product->image;?>">
							<input type="hidden" name="product_id" value="<?php echo $product->product_id;?>">
                            <div class="form-group">
								<label for="product_image" class="col-sm-2 control-label"></label>
								<div class="col-sm-10">
                                    <img width="150"
                                    <?php
                                        if (!empty($product->image)) {
                                            ?>
                                            src="<?php echo base_url();?>uploads/products/<?php echo $product->image; ?>"
                                            <?php
                                        }else{
                                            ?>
                                            src="<?php echo base_url();?>uploads/no-image.jpg"
                                            <?php
                                        }
                                    ?>
                                    >
								</div>
							</div>

                            <div class="form-group">
								<label for="product_image" class="col-sm-2 control-label">Product Image</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
								</div>
							</div>
							<div class="form-group">
								<label for="product_name" class="col-sm-2 control-label">Product Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product->name;?>">
								</div>
							</div>
							<div class="form-group">
								<label for="quantity" class="col-sm-2 control-label">Quantity</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $product->quantity;?>">
								</div>
							</div>
							<div class="form-group">
								<label for="predefined" class="col-sm-2 control-label">Unit</label>
								<div class="col-sm-10">
									<select class="form-control" name="unit">
										<option value="">Default Select</option>
										<?php
											foreach ($units as $unit) {
												?>
													<option value="<?php echo $unit->unit_id; ?>" <?php if($product->unit == $unit->unit_id){ echo 'selected';};?>><?php echo $unit->unit_name;?></option>
												<?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="price" class="col-sm-2 control-label">Price</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="price" name="price" value="<?php echo $product->price;?>">
								</div>
							</div>
							<div class="form-group">
                                <label for="harvest_date" class="col-sm-2 control-label">Harvest Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="harvest_date" name="harvest_date"  value="<?php echo $product->harvest_date;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_availability" class="col-sm-2 control-label">Product Availability</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="product_availability" name="product_availability" value="<?php echo $product->availability;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" rows="5"> <?php echo $product->description;?></textarea>
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
