<pre>
    <?php //print_r($products);?>
</pre>
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
					<li class="active">Products</li>
				</ul>
				<h3> 
                    <?php 
                        if (isset($_GET['search']) && !empty($_GET['search'])) {
                            echo 'Search result for "' . $_GET['search'] . '"';
                        }else{
                            echo 'Product List';
                        }
                    ?>
                    <small class="pull-right"> <?php if(!empty($products)){echo count($products);}else{echo '0'; } ;?> product(s) are available </small>
                </h3>
                <hr class="soft" />
                <?php
                    if(!empty($products))
                    {
                        ?>
                            <?php 
                                if (isset($_GET['search']) && !empty($_GET['search'])) {
                                    echo '&nbsp;';
                                }else{
                                    ?>
                                    <form class="form-horizontal span6">
                                        <div class="control-group">
                                            <label class="control-label alignL">Sort By </label>
                                            <select id="product_sort" data-type="<?php echo $this->uri->segment(2);?>" data-url="<?php echo base_url();?>" data-subcategory ="<?php echo $this->uri->segment(5);?>" data-category ="<?php echo $this->uri->segment(3);?>">
                                                <option value="">Choose an Option</option>
                                                <option value="date_asc">Date Created (Asc)</option>
                                                <option value="date_desc">Date Created (Desc)</option>
                                                <option value="name_asc">Name (Asc)</option>
                                                <option value="name_desc">Name (Desc)</option>
                                                <option value="price_asc">Price (Asc)</option>
                                                <option value="price_desc">Price (Desc)</option>
                                                <!-- <option value="nearest_5">Nearest (5mi)</option> -->
                                            </select>
                                        </div>
                                    </form>
                                    <?php
                                }
                            ?>
                            
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
                            <div class="tab-content">
                                <div class="tab-pane" id="listView">
                                    <?php
                                        foreach ($products as $product) {
                                            ?>
                                        <div class="row">
                                            <div class="span2">
                                                <img <?php if (!empty($product->image)) { ?> src="
                                                <?php echo base_url();?>uploads/products/<?php echo $product->image; ?>"
                                                <?php
                                                            }else{
                                                                ?>
                                                    src="
                                                    <?php echo base_url();?>uploads/no-image.jpg"
                                                    <?php
                                                            }
                                                        ?> alt="
                                                        <?php echo ucfirst($product->image); ?>" />
                                            </div>
                                            <div class="span4">
                                                <h3>
                                                    <?php echo ucfirst($product->name); ?>
                                                </h3>
                                                <hr class="soft" />
                                                <p>
                                                    <?php echo $product->description; ?>
                                                </p>
                                                <!-- <a class="btn btn-small pull-right" href="product_details.html">View Details</a> -->
                                                <br class="clr" />
                                            </div>
                                            <div class="span3 alignR">
                                                <form class="form-horizontal qtyFrm">
                                                    <h3> PHP
                                                        <?php echo number_format($product->price,2) ;?>
                                                        <span style="color:#5bb75b">/<?php echo $product->unit_identifier ?>
                                                    </h3>
                                                    <br/>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url() ;?>shop/product/<?php echo $product->product_id ;?>" class="btn btn-large btn-success"> Add to
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
                                <div class="tab-pane  active" id="blockView">
                                    <ul class="thumbnails">
                                        <?php
                                            foreach ($products as $product) {
                                                ?>
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
                                                                    ?> alt="<?php echo ucfirst($product->image); ?>" 
                                                        />
                                                    </a>
                                                    <div class="caption">
                                                        <h5>
                                                            <?php echo ucfirst($product->name); ?>
                                                        </h5>
                                                        <p>
                                                            PHP
                                                            <?php echo number_format($product->price,2); ?>
                                                            <span style="color:#5bb75b">/<?php echo $product->unit_identifier ?>
                                                        </p>
                                                        <h4 style="text-align:center">
                                                            <a class="btn btn-success" href="<?php echo base_url() ;?>shop/product/<?php echo $product->product_id ;?>">Add to
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
                            
                        <?php
                    }else{
                        ?>
                            <h4>No products found</h4>
                        <?php
                    }
                ?>
				
			</div>
		</div>
	</div>
</div>

