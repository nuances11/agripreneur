<div class="row page-title-div">
	<div class="col-md-6">
		<h2 class="title">Cancelled Orders</h2>
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
						<?php if($this->session->flashdata('success')){
                            echo $this->session->flashdata('success');
						} ?>
						<table id="orders" class="display table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
                                    <th>Trans #</th>
		                            <th>Transaction Date</th>
									<th>Name</th>
                                    <th>Total Amount</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
                                    <th>Trans #</th>
		                            <th>Transaction Date</th>
									<th>Name</th>
                                    <th>Total Amount</th>
									<th>Actions</th>
								</tr>
							</tfoot>
							<tbody>
								<?php
									foreach ($orders as $order) {
										?>
									 		<tr>
												<td>
													<?php
														echo $order->transaction_id;
													?>
												</td>
                                                <td>
                                                    <?php
                                                        $php_timestamp_date = date("d F Y H:i A", strtotime($order->timestamp_created));
                                                        echo "".$php_timestamp_date."";
                                                    ?>
												</td>
												<td><?php echo $order->customer_fname . ' ' . $order->customer_lname ?></td>
                                                <td>
													<?php echo 'PHP ' . number_format($order->total_amount,2); ?>
												</td>
												<td>
                                                    <a class="btn btn-default" href="<?php echo base_url();?>user/view/order/<?php echo $order->transaction_id;?>"><i class="fa fa-eye"></i>View Order</a>
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
