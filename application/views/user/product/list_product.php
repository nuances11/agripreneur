<div class="row page-title-div">
	<div class="col-md-6">
		<h4 class="title">Product List</h4>
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
						</div>
					</div>
					<div class="panel-body p-20">
						<?php if($this->session->flashdata('success')){
                            echo $this->session->flashdata('success');
                        } ?>
						<table id="products" class="display table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="text-center">Image</th>
									<th>Name</th>
									<th>Unit</th>
									<th>Price</th>
									<th>Availability</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th class="text-center">Image</th>
									<th>Name</th>
									<th>Unit</th>
									<th>Price</th>
									<th>Availability</th>
									<th>Actions</th>
								</tr>
							</tfoot>
							<tbody>
								<?php
									foreach ($products as $product) {
										?>
											<tr>
												<td class="text-center">
													<img width="50"
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
												</td>
												<td><?php echo $product->name ?></td>
												<td><?php echo $product->unit_identifier ?></td>
												<td><?php echo number_format($product->price,2) ?></td>
												<td>
													<?php
														echo date('F d, Y h:i A', strtotime($product->availability_start)) . ' - ' . date('F d, Y h:i A', strtotime($product->availability_end)); ?>
												</td>
												<td><a href="<?php echo base_url();?>product/edit/<?php echo $product->product_id ;?>" class="btn btn-success icon-only"><i class="fa fa-pencil"></i></a></td>
											</tr>
										<?php
									}
								?>
							</tbody>
						</table>
						<!-- /.col-md-12 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
