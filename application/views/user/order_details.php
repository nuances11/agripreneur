<div class="row page-title-div">
	<div class="col-md-6">
		<h2 class="title">Pending Orders</h2>
	</div>
    <div class="col-md-6 right-side text-right">
        <h2 class="title">Transaction # - <?php echo $transaction->transaction_id;?></h2>
    </div>
	<!-- /.col-md-6 -->
    <div class="col-sm-6 right-side">

    </div>
</div>
<div class="row breadcrumb-div">
	<div class="col-md-6">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>user">
					<i class="fa fa-home"></i> Home</a>
			</li>
			<li class="active">Orders</li>
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
                        <div class="row">
                            <div class="col-sm-6">
                                <dl>
                                  <dt>Customer Name:</dt>
                                  <dd><?php echo ucfirst($transaction->customer_fname) . ' ' . ucfirst($transaction->customer_lname) ;?></dd>
                                  <dt>Customer Email:</dt>
                                  <dd><?php echo $transaction->customer_email;?></dd>
                                  <dt>Contact Number:</dt>
                                  <dd id="contact_number" data-number="<?php echo $transaction->customer_number;?>"><?php echo $transaction->customer_number;?></dd>
                                </dl>
                            </div>
                        </div>



                        <table id="orders" class="display table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
                                    <th>Name</th>
		                            <th>Price</th>
									<th>Quantity</th>
                                    <th class="text-center">Subtotal</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
                                    <th colspan ="3" style="text-align:right">TOTAL</th>
									<th class="text-center"><?php echo number_format($transaction->total_amount,2) ;?></th>
								</tr>
							</tfoot>
							<tbody>
								<?php
									foreach ($orders as $order) {
										?>
									 		<tr>
												<td>
													<?php
														echo $order->product_name;
													?>
												</td>
                                                <td>
                                                    <?php
                                                        echo number_format($order->product_price,2);
                                                    ?>
												</td>
												<td>
                                                    <?php
                                                        echo $order->product_total_qty;
                                                    ?>
                                                </td>
												<td class="text-center">
                                                    <?php
                                                        echo number_format($order->product_total_price,2);
                                                    ?>
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
