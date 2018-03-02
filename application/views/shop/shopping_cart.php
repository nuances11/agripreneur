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

                        <h3> SHOPPING CART [
                            <?php echo $this->cart->total_items();?> Item(s) ]
                            <a href="<?php echo base_url();?>" class="btn btn-large pull-right">
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
                                                    <button class="btn" type="button" id="btn-minus">
                                                        <i class="icon-minus"></i>
                                                    </button>
                                                    <button class="btn" type="button" id="btn-plus">
                                                        <i class="icon-plus"></i>
                                                    </button>
                                                    <button class="btn btn-success" type="button" id="btn-remove" data-id="<?php echo $item['rowid']; ?>">
                                                        <i class="icon-remove icon-white"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>PHP <?php echo number_format($item['price'],2); ?></td>
                                            <td>PHP <?php echo number_format($item['subtotal'],2); ?></td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                <tr>
                                    <td colspan="3" style="text-align:right"><strong>Total Price: </strong></td>
                                    <td> <strong>PHP <?php echo number_format($grand_total,2); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>

                        <?php
                    }else{
                        ?>
                        <div class="alert alert-danger">There are no items on the cart. Click <strong>Continue Shopping</strong> to check other items.</div>
                        <?php
                    }
                ?>
			</div>
		</div>
	</div>
