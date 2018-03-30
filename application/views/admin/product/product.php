<div class="row page-title-div">
	<div class="col-md-6">
		<h2 class="title">Product</h2>
	</div>
	<!-- /.col-md-6 -->
    <div class="col-sm-6 right-side">
        <a href="<?php echo base_url(); ?>admin/product/add" class="btn bg-black" role="button">Add Product</a>
    </div>
</div>
<div class="row breadcrumb-div">
	<div class="col-md-6">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>/admin">
					<i class="fa fa-home"></i> Home</a>
			</li>
			<li class="active">Product</li>
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

						<?php if($this->session->flashdata('activate')){
                            echo $this->session->flashdata('activate');
                        } ?>
						<table id="products" class="display table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="text-center">Image</th>
									<th>Name</th>
		                            <th>Category</th>
                                    <th>Sub Category</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th class="text-center">Image</th>
									<th>Name</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
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
												<td>
													<?php
													if($product->category_name){
														echo $product->category_name;
													}else {
														echo 'Uncategorized';
													}
													?>
												</td>
                                                <td>
													<?php
													if($product->subcategory_name){
														echo $product->subcategory_name;
													}else {
														echo 'Uncategorized';
													}
													?>
												</td>
												<td>
													<?php
													if (!empty($product->subcategory_name) && !empty($product->category_name)) {
														if ($product->status == 1) {
															?>
																<a href="<?php echo base_url();?>admin/product/deactivate/<?php echo $product->product_id; ?>" class="btn btn-danger icon-only" id="deactivate_product">Deactivate</a>
															<?php
														}else{
															?>
																<a href="<?php echo base_url();?>admin/product/activate/<?php echo $product->product_id; ?>" class="btn btn-success icon-only" id="activate_product" data-action="activate">Activate</a>
															<?php
														}
													}
													?>
													<a href="<?php echo base_url();?>admin/product/category/add/<?php echo $product->product_id; ?>" class="btn btn-default icon-only">Categorize</a>
													<a href="<?php echo base_url();?>admin/product/edit/<?php echo $product->product_id;?>" class="btn btn-default icon-only">Edit</a>
                                                </td>
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
