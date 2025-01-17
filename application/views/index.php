<h2>Products</h2>

<!-- Cart info -->
<a href="<?php echo base_url('cart'); ?>" class="cart-link" title="View Cart">
	<i class="glyphicon glyphicon-shopping-cart"></i>
	<span>(<?php echo $this->cart->total_items(); ?>)</span>
</a>

<!-- List all products -->
<div class="row">
	<div class="col-lg-12">
		<?php if(!empty($products)){ foreach($products as $row){ ?>
			<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail">
					<img src="<?php echo base_url('uploads/product_images/'.$row['image']); ?>" />
					<div class="caption">
						<h4 class="pull-right">$<?php echo $row['price']; ?> USD</h4>
						<h4><?php echo $row['name']; ?></h4>
						<p><?php echo $row['description']; ?></p>
					</div>
					<div class="atc">
						<a href="<?php echo base_url('products/addToCart/'.$row['id']); ?>" class="btn btn-success">
							Add to Cart
						</a>
					</div>
				</div>
			</div>
		<?php } }else{ ?>
			<p>Product(s) not found...</p>
		<?php } ?>
	</div>
</div>
