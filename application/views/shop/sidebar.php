<!-- Sidebar ================================================== -->
<div id="sidebar" class="span3">
	<div class="well well-small">
		<a id="myCart" href="<?php echo base_url();?>cart/view">
			<img src="<?php echo base_url() ?>assets/images/ico-cart.png" alt="cart">

			<?php
				$count = 0;
				if(!empty($this->cart->contents())){
					$total = $this->cart->total_items();
					echo $total;
				}else echo 'No';
			?>
			Item(s)

			<span class="badge badge-success pull-right">PHP <?php echo $this->cart->format_number($this->cart->total()); ?></span>
			<?php
				if(!empty($this->cart->contents())){
					?>
					<span><a href="javascript:void(0);" style="color:red !important;font-size:10px;" id="clear_cart" data-url="<?php echo base_url() ?>cart/clear">Empty <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></span>
					<?php
				}
			?>
		</a>
	</div>
	<ul id="sideManu" class="nav nav-tabs nav-stacked" style="display:inline;">
		<li><a href="<?php echo base_url();?>products/all">All Products</a></li>
		<?php
		foreach ($categories as $category) {
			?>
				<li class="subMenu">
					<a><?php echo $category->category_name; ?></a>
					<ul>
						<?php foreach($category->subcategory as $_subcat) : ?>
						<li>
							<a href="<?php echo base_url();?>products/cat/<?php echo $category->category_id ;?>/sub/<?php echo $_subcat->subcategory_id ?>"><i class="icon-chevron-right"></i><?php echo ucfirst($_subcat->subcategory_name) ?></a>
						</li>
						<?php endforeach;?>
					</ul>
				</li>
			<?php
		}
		?>
	</ul>
	<br/>
</div>
<!-- Sidebar end=============================================== -->
