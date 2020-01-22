
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
<ul>
	<li><a href="<?php echo base_url('genres/index/1'); ?>">Aventure</a></li>
	<li><a href="<?php echo base_url('genres/index/2'); ?>">Erotique</a></li>
	<li><a href="<?php echo base_url('genres/index/3'); ?>">Fantastique</a></li>
	<li><a href="<?php echo base_url('genres/index/4'); ?>">Humour</a></li>
	<li><a href="<?php echo base_url('genres/index/5'); ?>">Jeunesse</a></li>
	<li><a href="<?php echo base_url('genres/index/6'); ?>">Manga</a></li>
	<li><a href="<?php echo base_url('genres/index/7'); ?>">Manga Erotique</a></li>
	<li><a href="<?php echo base_url('genres/index/8'); ?>">Manga X</a></li>
	<li><a href="<?php echo base_url('genres/index/9'); ?>">Science Fiction</a></li>
	<li><a href="<?php echo base_url('genres/index/10'); ?>">Thriller</a></li>
	<li><a href="<?php echo base_url('genres/index/11'); ?>">Non defini</a></li>


</ul>
<h2>Bds</h2>
<!-- Cart info -->
<a href="<?php echo base_url('cart'); ?>" class="cart-link" title="View Cart">
	<i class="glyphicon glyphicon-shopping-cart"></i>
	<span>(<?php echo $this->cart->total_items(); ?>)</span>
</a>

<!-- List all products -->

<div class="row tb_pagination_width" >
	<div id="myTable" >
		<?php if(!empty($grs)){ foreach($grs as $row){ ?>
			<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail">

					<img src="<?php echo base_url('uploads/product_images/'.$row['ref'] . '.jpg'); ?>" />

					<div class="caption">
						<h4 class="pull-right">$<?php echo $row['prix_public']; ?> euros</h4>
						<h4><?php echo $row['titre']; ?></h4>
						<p><?php echo $row['resume']; ?></p>
					</div>
					<div class="atc">
						<a href="<?php echo base_url('bds/addToCart/'.$row['id']); ?>" class="btn btn-success">
							Add to Cart
						</a>
					</div>
				</div>
			</div>
		<?php } }else{ ?>
			<p>Bd(s) not found...</p>
		<?php } ?>
	</div>
</div>



<div class="col-md-12 text-center">
	<ul class="pagination" id="myPager"></ul>
</div>

<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js.js" type="text/javascript"></script>



