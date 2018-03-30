<div id="mainBody">
	<div class="container">
		<div class="row">
			<?php $this->load->view('shop/sidebar'); ?>
			<div class="span9">
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo base_url();?>">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">Product Details</li>
				</ul>
				<div class="row">
					<div id="gallery" class="span3">
						<!-- <a href="<?php echo base_url() ?>assets/images/products/large/f1.jpg" title="Fujifilm FinePix S2950 Digital Camera"> -->
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
							?> style="width:100%" alt="<?php echo ucfirst($product->name); ?>" />
						</a>
					</div>
					<div class="span6">
						<h3><?php echo ucfirst($product->name); ?></h3>
						<small><?php echo ucfirst($product->category_name) . '&nbsp;&nbsp;/&nbsp;&nbsp;' . ucfirst($product->subcategory_name)?></small>
						<hr class="soft" />
						<form class="form-horizontal qtyFrm" id="add_to_cart">
							<div class="control-group">
								<label class="control-label">
									<span>PHP <?php echo number_format($product->price,2);?></span><span style="color:#5bb75b">/<?php echo $product->unit_identifier ?></span>
								</label>
								<div class="controls">
									<input type="hidden" name="id" value="<?php echo $product->product_id; ?>">
									<input type="hidden" name="name" value="<?php echo $product->name; ?>">
									<input type="hidden" name="price" value="<?php echo $product->price; ?>">
									<input type="hidden" name="action_url" id="action_url" value="<?php echo base_url();?>cart/add">
									<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
									<input type="number" class="span1" name="quantity" value="1" min="1" max="<?php echo $product->quantity; ?>" />
									<button type="submit" class="btn btn-large btn-success pull-right"> Add to cart
										<i class=" icon-shopping-cart"></i>
									</button>
								</div>
							</div>
						</form>

						<hr class="soft" />
						<h4><?php echo $product->quantity;?> items in stock</h4>
						<hr class="soft clr" />
						<p>
							<?php echo $product->description ?>

						</p>
						<!-- <a class="btn btn-small pull-right" href="#detail">More Details</a> -->
						<br class="clr" />
						<a href="#" name="detail"></a>
						<hr class="soft" />
					</div>

					<div class="span9">
						<ul id="productDetail" class="nav nav-tabs">
							<li class="active">
								<a href="#home" data-toggle="tab">Product Details</a>
							</li>
							<li>
								<a href="#profile" data-toggle="tab">Related Products</a>
							</li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade active in" id="home">
								<h4>Product Information</h4>
								<table class="table table-bordered">
									<tbody>
										<tr class="techSpecRow">
											<th colspan="2">Product Details</th>
										</tr>
										<tr class="techSpecRow">
											<td class="techSpecTD1">Producer: </td>
											<td class="techSpecTD2"><?php echo $producer->title. ' ' . ucfirst($producer->fname). ' ' . ucfirst($producer->lname)  ?></td>
										</tr>
										<!-- <tr class="techSpecRow">
											<td class="techSpecTD1">Location:</td>
											<td class="techSpecTD2"><?php echo $producer->address ?></td>
										</tr> -->
										<tr class="techSpecRow">
											<td class="techSpecTD1">Available Until:</td>
											<td class="techSpecTD2"> <?php echo date("l jS \of F Y h:i:s A", strtotime($producer->availability_end)) ?></td>
										</tr>
										<tr class="techSpecRow">
											<td class="techSpecTD1">Harvest Date:</td>
											<td class="techSpecTD2"> <?php echo date("l jS \of F Y ", strtotime($producer->harvest_date)) ?></td>
										</tr>
										<!-- <tr class="techSpecRow">
											<td class="techSpecTD1">Dimensions:</td>
											<td class="techSpecTD2"> 5.50" h x 5.50" w x 2.00" l, .75 pounds</td>
										</tr>
										<tr class="techSpecRow">
											<td class="techSpecTD1">Display size:</td>
											<td class="techSpecTD2">3</td>
										</tr> -->
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="profile">
								<div id="myTab" class="pull-right">
									<a href="#listView" data-toggle="tab">
										<span class="btn btn-large">
											<i class="icon-list"></i>
										</span>
									</a>
									<a href="#blockView" data-toggle="tab">
										<span class="btn btn-large btn-success">
											<i class="icon-th-large"></i>
										</span>
									</a>
								</div>
								<br class="clr" />
								<hr class="soft" />
								<div class="tab-content">
									<div class="tab-pane" id="listView">
										<?php
											foreach ($related_products as $rp) {
												?>
												<div class="row">
													<div class="span2">
													<img
													<?php
														if (!empty($rp->image)) {
															?>
															src="<?php echo base_url();?>uploads/products/<?php echo $rp->image; ?>"
															<?php
														}else{
															?>
															src="<?php echo base_url();?>uploads/no-image.jpg"
															<?php
														}
													?> alt="<?php echo ucfirst($rp->image); ?>" />
													</div>
													<div class="span4">
														<h3><?php echo ucfirst($rp->name);?></h3>
														<hr class="soft" />
														<p>
															<?php echo ucfirst($rp->description);?>
														</p>
														<!-- <a class="btn btn-small pull-right" href="<?php echo base_url() ;?>shop/product<?php echo $rp->product_id ;?>">View Details</a> -->
														<br class="clr" />
													</div>
													<div class="span3 alignR">
														<form class="form-horizontal qtyFrm">
															<h3> PHP <?php echo number_format($rp->price,2) ;?></h3>
															<br/>
															<div class="btn-group">
																<a href="<?php echo base_url() ;?>shop/product<?php echo $rp->product_id ;?>" class="btn btn-large btn-success"> Add to
																	<i class=" icon-shopping-cart"></i>
																</a>
															</div>
														</form>
													</div>
												</div>
												<hr class="soft" />
												<?php
											}
										?>
									</div>
									<div class="tab-pane active" id="blockView">
										<ul class="thumbnails">
										<?php
											foreach ($related_products as $rp) {
												?>
													<li class="span3">
														<div class="thumbnail">
															<a href="product_details.html">
															<img
																<?php
																	if (!empty($rp->image)) {
																		?>
																		src="<?php echo base_url();?>uploads/products/<?php echo $rp->image; ?>"
																		<?php
																	}else{
																		?>
																		src="<?php echo base_url();?>uploads/no-image.jpg"
																		<?php
																	}
																?> alt="<?php echo ucfirst($rp->image); ?>" />
															</a>
															<div class="caption">
																<h5><?php echo ucfirst($rp->name); ?></h5>
																<p>
																	PHP <?php echo number_format($rp->price,2); ?>
																</p>
																<h4 style="text-align:center">
																	<a class="btn btn-success" href="#">Add to
																		<i class="icon-shopping-cart"></i>
																	</a>
																</h4>
															</div>
														</div>
													</li>
												<?php
											}
										?>
										</ul>
										<hr class="soft" />
									</div>
								</div>
								<br class="clr">
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- MainBody End ============================= -->
