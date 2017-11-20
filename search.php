<?php include('./pages/head.php'); ?>

<?php include('./pages/header.php'); ?>
<?php 
	//include('model/db.php');
	$conn = db::open();
	$q = isset($_GET['q']) ? mysql_escape_string($_GET['q']) :"" ;
	//$category = isset($_GET['category']) ? "" : mysql_escape_string($_GET['category']);
	$query = "".$q;
	//$cate = "".$category;
	$sql = "select * from products where name like '%".$q."%'";
	//$sql = "select * from products where name"
	$result = db::query($conn,$sql);

 ?>
<main class="main-content" id="MainContent" role="main">
	<section class="collection-heading heading-content ">
		<div class="container">
			<div class="row">
				<div class="collection-wrapper">
					<h1 class="collection-title"><span>Search Page</span></h1>
					<div class="breadcrumb-group">
						<div class="breadcrumb clearfix">
							<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="./index.html" title="Bridal 1" itemprop="url"><span itemprop="title">Home</span></a>
							</span>
							<span class="arrow-space">></span>
							<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
								<a href="./search.php" title="Search for:  'Electronic equipment'" itemprop="url">
									<span itemprop="title">Search for:  "<?= $q?>"</span>
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="search-content">
		<div class="search-content-wrapper">
			<div class="container">
				<div class="row">
					<div class="search-content-group">
						<div class="search-content-inner">
							<div id="search">
								<!-- Begin results -->
								<?php 
									while ($results = $result->fetch_assoc()) {
										?>
										<div class="product-item-wrapper col-sm-3">
									<div class="row-container product list-unstyled clearfix">
										<div class="row-left">
											<a href="./product.php" class="hoverBorder container_item">
												<div class="hoverBorderWrapper">
													<img src="./admin/<?=$results['image']?>" class="not-rotation img-responsive front" alt="Electronic equipment">
													<div class="mask"></div>
													<img src="./admin/<?=$results['image']?>" class="rotation img-responsive" alt="Electronic equipment">           
												</div>
											</a>
											<div class="hover-mask">
												<div class="group-mask">
													<div class="inner-mask">
														<div class="group-actionbutton">
															<ul class="quickview-wishlist-wrapper">
																<li class="quickview hidden-xs hidden-sm">
																	<div class="product-ajax-cart">
																		<span class="overlay_mask"></span>
																		<div data-handle="navy-peak-dresses-2" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
																			<a href="product.php?id=<?=$results['id']?>" class=""><i class="fa fa-search" title="Quick View"></i></a>
																		</div>
																	</div>
																</li>
																<li class="wishlist hidden-xs">
																	<a class="wish-list" href="add_cart.php?id=<?=$results['id']?>">
																		<span class="hidden-xs"><i class="fa fa-heart" title="Wishlist"></i></span>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<!--inner-mask-->
												</div>
												<!--Group mask-->
											</div>
										</div>
										<div class="row-right animMix">
											<div class="product-title"><a class="title-5" href="./product.php?id=<?=$results['id']?>"><?=$results['name']?></a></div>
											<div class="rating-star">
												<span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
												</span>
											</div>
											<div class="product-price">
												<span class="price_sale"><span class="money" data-currency-usd="<?=$results['unit_price']?>"><?=$results['unit_price']?></span></span>
											</div>
										</div>
									</div>
								</div>
									<?php
									}
								 ?>
								
							</div>
							<!-- /#search -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	</main>
<?php include('./pages/footer.php'); ?>