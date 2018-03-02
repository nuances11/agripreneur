<div class="row page-title-div">
	<div class="col-md-6">
		<h2 class="title">Product Category</h2>
	</div>
	<!-- /.col-md-6 -->
	<div class="col-sm-6 right-side">
	</div>
</div>
<div class="row breadcrumb-div">
	<div class="col-md-6">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>admin">
					<i class="fa fa-home"></i> Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>admin/product">Product</a>
			</li>
			<li class="active">Product Category</li>
		</ul>
	</div>
	<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<section class="section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title">
							<h5>Add Product Category</h5>
						</div>
					</div>
					<div class="panel-body">
                        <div id="err"></div>
						<form id="add_product_category">
                            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
                            <input type="hidden" name="action_url" id="action_url" value="<?php echo base_url();?>admin/product/category/save">
                            <input type="hidden" name="source_url" id="source_url" value="<?php echo base_url();?>admin/subcategory/list">
                            <input type="hidden" name="product_id" value="<?php echo $product->product_id;?>">
							<div class="form-group">
								<label for="category">Category</label>
								<select class="form-control" name="category" id="category">
                                    <option value="">Default Select</option>
                                    <?php
                                    foreach ($categories as $category) {
                                        ?>
                                        <option value="<?= $category->category_id ?>"><?= $category->category_name; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
							</div>
                            <div class="form-group" id="sub-category">
								<label for="sub_category">Sub Category</label>
								<select class="form-control" name="sub_category" id="sub_category">
                                </select>
							</div>
							<button type="submit" class="btn btn-primary" id="category_btn">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
