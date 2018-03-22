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
					<li class="active"> SHOPPING CART</li>
				</ul>
				<?php
            if(!empty($this->cart->contents())){
                ?>

					<h3> SHOPPING CART [ <?php echo $this->cart->total_items();?> Item(s) ]
              <a href="<?php echo base_url();?>products/all" class="btn btn-large pull-right">
                  <i class="icon-arrow-left"></i> Continue Shopping </a>
          </h3>
					<hr class="soft" />
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Product</th>
								<th>Quantity/Update</th>
								<th>Price</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php
                $grand_total = 0;
                foreach ($this->cart->contents() as $item) {
                    $grand_total = $grand_total + $item['subtotal'];
                    ?>
								<tr>
									<td>
										<?php echo $item['name']; ?>
									</td>
									<td>
										<div class="input-append">
											<input class="span1" style="max-width:34px" value="<?php echo $item['qty']; ?>" id="quantity" name="quantity" size="16" type="number" min="1">
											<button class="btn" type="button" id="btn-minus" data-url="<?php echo base_url();?>update/cart" data-id="<?php echo $item['rowid']; ?>">
                                                        <i class="icon-minus"></i>
                                                    </button>
											<button class="btn" type="button" id="btn-plus" data-url="<?php echo base_url();?>update/cart" data-id="<?php echo $item['rowid']; ?>">
                                                        <i class="icon-plus"></i>
                                                    </button>
											<button class="btn btn-success" type="button" id="btn-remove" data-url="<?php echo base_url();?>remove" data-id="<?php echo $item['rowid']; ?>">
                                                        <i class="icon-remove icon-white"></i>
                                                    </button>
										</div>
									</td>
									<td>PHP
										<?php echo number_format($item['price'],2); ?>
									</td>
									<td>PHP
										<?php echo number_format($item['subtotal'],2); ?>
									</td>
								</tr>
								<?php
                      }
                  ?>
									<tr>
										<td colspan="3" style="text-align:right"><strong>Total Price: </strong></td>
										<td style="background-color:#5bb75b:color:#ffffff;font-weight:600"> <strong>PHP <?php echo number_format($grand_total,2); ?></strong></td>
									</tr>
						</tbody>
					</table>
					<a href="<?php echo base_url();?>products/all" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
					<!-- <a href="<?php echo base_url();?>checkout" class="btn btn-large pull-right btn-success">Proceed to Checkout</a> -->

					<!-- Button trigger modal -->
					<a href="#myModal" data-toggle="modal" class="btn btn-large pull-right btn-success">Proceed to Checkout</a>

					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Personal Information</h4>
								</div>
								<div class="modal-body">
									<div id="err"></div>
									<form class="form-horizontal" id="place_order" method="POST" data-url="<?php echo base_url();?>" data-action="<?php echo base_url();?>place_order">
										<div class="control-group">
											<label class="control-label" for="inputCountry">First Name </label>
											<div class="controls">
												<input type="text" id="customer_fname"  name="customer_fname">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputCountry">Last Name </label>
											<div class="controls">
												<input type="text" id="customer_lname" name="customer_lname">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputCountry">Email </label>
											<div class="controls">
												<input type="email" id="customer_email" name="customer_email">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputCountry">Contact No. </label>
											<div class="controls">
												<input type="text" id="customer_number" name="customer_number">
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn btn-success">PLACE ORDER </button>
											</div>
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>

					<?php
            }else{
                ?>
						<div class="alert alert-danger">There are no items on the cart. <strong><a href="<?php echo base_url();?>products/all">Click this</a></strong> to check other items.</div>
						<?php
                }
            ?>
			</div>
		</div>
	</div>
