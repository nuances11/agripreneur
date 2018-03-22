
<div id="mainBody">
	<div class="container">
		<div class="row">
			<?php $this->load->view('shop/sidebar'); ?>
			<div class="span9">
				<div class="well well-small">
					<h4>Featured Products</h4>
					<div class="row-fluid">
					<?php if(!empty($products)): ?>
						<div id="featured" class="carousel slide">
							<div class="carousel-inner">
								<div class="item active">
									<ul class="thumbnails">
										<?php foreach ($products as $product): ?>
											<li class="span3">
												<div class="thumbnail">
													<a href="<?php echo base_url() ;?>shop/product/<?php echo $product->product_id ;?>">
														<img
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
														?>>
													</a>
													<div class="caption">
														<h5><?php echo ucfirst($product->name); ?></h5>
														<div style="text-align:center;font-weight:600;">
															<!-- <a class="btn" href="<?php echo base_url() ;?>shop/product/<?php echo $product->product_id ;?>">VIEW</a> -->
															<span>PHP <?php echo number_format($product->price, 2);?></span><span style="color:#5bb75b">/<?php echo $product->unit_identifier ?></span>
														</div>
													</div>
												</div>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
                </div>
                <h4>Best Seller </h4>
				<div class="row">
					<div id="gallery" class="span3">
						<a <?php
							if (!empty($product->image)) {
								?>
								href="<?php echo base_url();?>uploads/products/<?php echo $product->image; ?>"
								<?php
							}else{
								?>
								href="<?php echo base_url();?>uploads/no-image.jpg"
								<?php
							}
						?> title="<?php echo $product->name;?>">
							<img <?php
								if (!empty($product->image)) {
									?>
									src="<?php echo base_url();?>uploads/products/<?php echo $product->image; ?>"
									<?php
								}else{
									?>
									src="<?php echo base_url();?>uploads/no-image.jpg"
									<?php
								}
							?> style="width:100%" alt="<?php echo $product->name;?>" />
						</a>

					</div>
					<div class="span6">
						<h3><?php echo $product->name;?></h3>
						<hr class="soft clr" />
						<label class="control-label">
							<span>PHP <?php echo number_format($product->price,2);?></span><span style="color:#5bb75b">/<?php echo $product->unit_identifier ?></span>
						</label>
						<p>
							<?php echo $product->description;?>

						</p>
						<a class="btn btn-small pull-right" href="<?php echo base_url() ;?>shop/product/<?php echo $product->product_id ;?>">More Details</a>
						<br class="clr" />
						<a href="#" name="detail"></a>
						<hr class="soft" />
					</div>

				</div>
				<?php else: ?>
				<div class="well well-danger">
					No Data available
				</div>
				<?php endif; ?>
				<hr>
				<h4>Sales </h4>
				<div id="chartContainer" style="height: 300px; width: 100%;"></div>

			</div>
		</div>
	</div>
</div>
