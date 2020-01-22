

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Shop Homepage - Start Bootstrap Template</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/shop-homepage.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css')?>" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="<?php echo base_url('bds'); ?>">Accueil</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link">

						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('genres/index/1'); ?>">Contact</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href"<?php echo base_url('genres/index/2'); ?>">Service</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('genres/index/3'); ?>">Admin</a>
				</li>
				<li>
					<a href="<?php echo base_url('cart'); ?>" class="cart-link" title="View Cart">
						<i class="glyphicon glyphicon-shopping-cart"></i>
						<span>(<?php echo $this->cart->total_items(); ?>)</span>
					</a>
				</li>

			</ul>
		</div>
	</div>
</nav>
<div class="container">

	<div class="row">

		<div class="col-lg-3">

			<h1 class="my-4">Shop Name</h1>
			<div class="list-group">
				<a href="<?php echo base_url('genres/index/1'); ?>" class="list-group-item">Aventure</a>
				<a href="<?php echo base_url('genres/index/2'); ?>" class="list-group-item">Erotique</a>
				<a href="<?php echo base_url('genres/index/3'); ?>" class="list-group-item">Fantastique</a>
				<a href="<?php echo base_url('genres/index/4'); ?>" class="list-group-item">Humour</a>
				<a href="<?php echo base_url('genres/index/5'); ?>" class="list-group-item">Jeunesse</a>
				<a href="<?php echo base_url('genres/index/6'); ?>" class="list-group-item">Manga</a>
				<a href="<?php echo base_url('genres/index/7'); ?>" class="list-group-item">Manga Erotique</a>
				<a href="<?php echo base_url('genres/index/8'); ?>" class="list-group-item">Manga X</a>
				<a href="<?php echo base_url('genres/index/9'); ?>" class="list-group-item">Science Fiction</a>
				<a href="<?php echo base_url('genres/index/10'); ?>" class="list-group-item">Thriller</a>
				<a href="<?php echo base_url('genres/index/11'); ?>" class="list-group-item">Non défini</a>
			</div>

		</div>
		<!-- /.col-lg-3 -->

		<div class="col-lg-9">


<!--<h2>Bds</h2>-->
<!-- Cart info -->


<!-- List all products -->

<div class="row tb_pagination_width" >
	<div id="myTable" >
		<?php if(!empty($grs)){ foreach($grs as $row){ ?>
			<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail">

					<img src="<?php echo base_url('uploads/product_images/'.$row['ref'] . '.jpg') ; ?>"  onerror="this.onerror=null;this.src='<?php echo base_url('uploads/product_images/defaut.jpg')  ; ?> ';" />

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




