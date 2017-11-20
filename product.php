<?php include('./pages/head.php'); ?>

<?php include('./pages/header.php'); ?>
<?php
	$mysqli = db::open();
	$id = isset($_GET['id']) ? "WHERE id = ".$_GET['id'] : "";
	$str = "SELECT * FROM products $id";
	$result = db::query($mysqli, $str);
	$row = $result->fetch_assoc();
?>
<div class="page-container" id="PageContainer">
	<main class="main-content" id="MainContent" role="main">
		<section class="collection-heading heading-content ">
			<div class="container">
				<div class="row">
					<div class="collection-wrapper">
						<h1 class="collection-title">
							<span>
								<a href="./category.php" title="All Products">Sản phẩm</a>
							</span>
						</h1>
						<div class="breadcrumb-group">
							<div class="breadcrumb clearfix">
								<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="./index.php" title="Sarahmarket 1" itemprop="url"><span itemprop="title">Trang chủ</span></a>
								</span>
								<span class="arrow-space">></span>
								<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
									<a href="./category.php" title="All Products" itemprop="url"><span itemprop="title">Sản phẩm</span></a>
								</span>
								<span class="arrow-space">></span>
								<strong><?=$row["name"]?></strong>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Product Detail-->
		<section class="product-detail-content">
			<div class="detail-content-wrapper">
				<div class="container">
					<div class="row">
						<div id="shopify-section-product-template" class="shopify-section">
							<div class="detail-content-inner" itemscope="" itemtype="http://schema.org/Product">
								<meta itemprop="name" content="Today's trending">
								<meta itemprop="url" content="./category.php">
								<meta itemprop="image" content="./assets/images/demo_471×544.png">
								<div id="product" class="neque-porro-quisquam-est-qui-dolor-ipsum-quia-9 detail-content">
									<div class="col-md-12 info-detail-pro clearfix">
										<div class="col-md-5" id="product-image">
											<div class="show-image-load" style="display: none;">
												<div class="show-image-load-inner">
													<i class="fa fa-spinner fa-pulse fa-2x"></i>
												</div>
											</div>
											<div id="featuted-image" class="image featured">
												<div class="image-item">
													<a href="#" class="thumbnail" id="thumbnail-product-1" data-toggle="modal" data-target="#lightbox"> 
														<img src="./admin/<?=$row['image']?>" alt="<?=$row["name"]?>" data-item="1">
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-7" id="product-information">
											<h1 itemprop="name" class="title"><?=$row["name"]?></h1>
											<div class="description" itemprop="description">
												<?=$row["description"]?>
											</div>
											
													<div class="product-price">
														<meta itemprop="price" content="200.00">

														<h2 class="price" id="price-preview"><span class="money" data-currency-usd="$200.00" data-currency="USD"><?=$row['promotion_price']?>VND</span></h2>
													</div>
													<div class="purchase-section multiple">
														<form method="get" action="add_cart.php">
															<div class="quantity-wrapper clearfix">
																<div class="wrapper">
																	<input id="quantity" type="text" name="quantity" value="1" maxlength="5" size="5" class="item-quantity">
																	<input type="hidden" name="id" value="<?=$row['id']?>">
																</div>
															</div>
															<div class="purchase">
																<button id="add-to-cart" type="submit" class="btn add-to-cart" name="add"><!-- <a class="wish-list" href="add_cart.php?id="> --><span class="hidden-xs"><i class="fa fa-shopping-bag"></i>Mua ngay</button>
															</div>

														</form>
													</div>
												</div>
											
										</div>
									</div>
									<div class="related-products col-sm-12">
										<div class="collection-title home-title page-title"><span>Có thể bạn sẽ thích</span></div>
										<div class="group-related">
											<div class="group-related-inner">
												<div class="rp-slider">
													<?php
												 	$str1 = "SELECT * FROM products ORDER BY RAND()";
														$result1 = db::query($mysqli, $str1);
														$i=0;
												 	while (($row1 = $result1->fetch_assoc()) && ($i < 7)) {
												 ?>
													<div class="content_product">
														<div class="row-container product list-unstyled clearfix">
															<div class="row-left">
																<a href="./product.php?id=<?=$row1['id']?>" class="hoverBorder container_item">
																	<div class="hoverBorderWrapper">
																		<img src="./admin/<?=$row1['image']?>" class="not-rotation img-responsive front" alt="Sport machine">
																		<div class="mask"></div>
																		<img src="./admin/<?=$row1['image']?>" class="rotation img-responsive" alt="Sport machine">
																	</div>
																</a>
																<span class="sale_banner">
																	<span class="sale_text">-<?php $k = round(($row1['unit_price'] - $row1['promotion_price']) / $row1['unit_price'] * 100, 1); echo $k?>%</span>
																</span>
																<div class="hover-mask">
																	<div class="group-mask">
																		<div class="inner-mask">
																			<div class="group-actionbutton">
																				<ul class="quickview-wishlist-wrapper">
																					<li class="quickview hidden-xs hidden-sm">
																						<div class="product-ajax-cart">
																							<span class="overlay_mask"></span>
																							<div data-handle="neque-porro-quisquam-est-qui-dolor-ipsum-quia-11" class="quick_shop" data-toggle="modal">
																								<a href="product.php?id=<?= $row1['id']?>" class=""><i class="fa fa-search" title="Quick View"></i></a>
																							</div>
																						</div>
																					</li>
																					<li class="wishlist hidden-xs">
																						<a class="wish-list" href="add_cart.php?id=<?=$row1['id']?>"><span class="hidden-xs"><i class="fa fa-heart" title="Wishlist"></i></span></a>
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
																<div class="product-title"><a class="title-5" href="product.php?id=<?= $row1['id']?>"><?=$row1['name']?></a></div>
																<div class="rating-star">
																	<span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
																	</span>
																</div>
																<div class="product-price">
																	<span class="price_sale"><span class="money" data-currency-usd="$200.00"><?=$row1['promotion_price']?>VND</span></span>
																	<del class="price_compare"> <span class="money" data-currency-usd="$600.00"><?=$row1['unit_price']?>VND</span></del>
																</div>
															</div>
														</div>
													</div>
													<?php
														$i++;
														}
													?>
												</div>
											</div>
										</div>
										<!--END -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<script>
						function active_review_form(){
							if($("#form_6537875078").attr('style')=='display: none;'){
								$("#form_6537875078").css('display','block');
							}
							else {
								$("#form_6537875078").css('display','none');
							}
						}
						jQuery(document).ready(function($){
							$('#gallery-images div.image').on('click', function() {
								var $this = $(this);
								var parent = $this.parents('#gallery-images');
								parent.find('.image').removeClass('active');
								$this.addClass('active');
							});
						});
					</script>
				</div>
			</div>
		</section>

	</main>
</div>
<?php include('./pages/footer.php'); ?>