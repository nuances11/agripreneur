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
						<form class="form-horizontal">
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
									<select class="form-control">
										<option>Default Select</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="amount" class="col-sm-2 control-label">Amount</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="amount" name="amount">
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
                                <button type="button" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>Submit</button>
                            </div>
						</form>
						<!-- /.col-md-12 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
