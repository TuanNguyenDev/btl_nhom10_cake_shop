<?php
	$mysqli = db::open();
	$str = "SELECT * FROM type_products";
	$result = db::query($mysqli, $str);
	$sql = "select * from slide";
	$slides = db::query($mysqli,$sql);
	$slide = db::single($mysqli,$sql);
?>
<main class="main-content" id="MainContent" role="main">
		<!-- Slide -->
		<div id="shopify-section-1490952756465" class="shopify-section index-section index-section-slideshow">
			<div data-section-id="1490952756465" data-section-type="slideshow-section">
				<section class="home_slideshow main-slideshow">
					<div class="home-slideshow-wrapper">
						<div class="container">
							<div class="row">
								<div class="group-home-slideshow">
									<div class="home-slideshow-inner col-sm-12">
										<div class="home-slideshow">
											<div id="home_main-slider" class="carousel slide  main-slider">
												<ol class="carousel-indicators">
													<li data-target="#home_main-slider" data-slide-to="0" class="carousel-1"></li>
													<li data-target="#home_main-slider" data-slide-to="1" class="carousel-2 active"></li>
												</ol>
												<div class="carousel-inner">
													<div class="item image active">
														<img src="./admin/images/slide/<?= $slide['image']?>" alt="<?= $slide['alt']?>" title="Image Slideshow">
														<div class="slideshow-caption position-middle">
															<div class="slide-caption" style="margin:auto;">
																<div class="group-caption">
																	<div class="content">
																		<span class="title_1">
																			Chào mừng tới
																		</span>
																		<span class="title_2">
																			Eshop
																		</span>
																	</div>
																	<div class="flex-action"><a class="btn" href="./category.php">Mua ngay</a></div>
																</div>
															</div>
														</div>
													</div>
													<?php 
														while ($sli = $slides->fetch_assoc()) { ?>
													<div class="item image">
														<img src="./admin/images/slide/<?= $sli['image']?>" alt="<?= $sli['alt']?>" title="Image slideshow">
														<div class="slideshow-caption position-middle">
															<div class="slide-caption" style="margin:auto;">
																<div class="group-caption">
																	<div class="content">
																		<span class="title_1">
																			Chào mừng tới 
																		</span>
																		<span class="title_2">
																			Eshop
																		</span>
																	</div>
																	<div class="flex-action"><a class="btn" href="./category.php">Mua ngay</a></div>
																</div>
															</div>
														</div>
													</div>
													<?php
														}
													 ?>
													
														
												</div>
												<a class="left carousel-control" href="#home_main-slider" data-slide="prev">
													<span class="icon-prev"></span>
												</a>
												<a class="right carousel-control" href="#home_main-slider" data-slide="next">
													<span class="icon-next"></span>
												</a>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!-- MAYBE YOU PREFER -->
		<div id="shopify-section-1490952827558" class="shopify-section index-section index-section-prosli">
			<div data-section-id="1490952827558" data-section-type="prosli-section">
				<section class="home_prosli_layout">
					<div class="home_prosli_wrapper">
						<div class="container">
							<div class="row">
								<div class="prosli_group">
									<div class="page-title">
										<h2>Có thể bạn sẽ thích</h2>
										<a href="./category.php" class="prosli_action">Xem tất cả sản phẩm</a>
									</div>
									<div class="home_prosli_inner">
										<div class="home_prosli_content">
										 <!-- Product -->
										 <?php
										 	$str2 = "SELECT * FROM products ORDER BY RAND()";
												$result2 = db::query($mysqli, $str2);
												$i = 0;
										 	while (($row = $result2->fetch_assoc()) && ($i < 12)) {
										 ?>
											<div class="content_product col-sm-2">
												<div class="row-container product list-unstyled clearfix">
													<div class="row-left" style="height: 224px;">
														<a href="./product.php?id=<?=$row['id']?>" class="hoverBorder container_item">
															<div class="hoverBorderWrapper">
																<img src="./admin/<?=$row["image"]?>" class="not-rotation img-responsive front" alt="Sport machine">
																<div class="mask"></div>
																<img src="./admin/<?=$row["image"]?>" class="rotation img-responsive" alt="Sport machine">
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
																					<div data-handle="neque-porro-quisquam-est-qui-dolor-ipsum-quia-11" data-target="" class="quick_shop" data-toggle="modal">
																						<a href="product.php?id=<?= $row['id']?>" class=""><i class="fa fa-search" title="Quick View"></i></a>
																					</div>
																				</div>
																			</li>
																			<li class="wishlist hidden-xs">
																				<a class="wish-list" href="add_cart.php?id=<?=$row['id']?>"><span class="hidden-xs"><i class="fa fa-heart" title="Wishlist"></i></span></a>
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
														<div class="product-title"><a class="title-5" href="./product.php?id=<?=$row['id']?>"><?php echo "{$row['name']}";?></a></div>
														<div class="rating-star">
															<span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
															</span>
														</div>
														<div class="product-price">
															<span class="price_sale"><span class="money" data-currency-usd="$200.00"><?php echo "{$row['unit_price']}";?>VND</span></span>
															
														</div>
													</div>
												</div>
											</div>
											<?php
												$i = $i + 1;
												}
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!-- Banner -->
		
		<!-- Best Sell -->
		<div id="shopify-section-1490953257213" class="shopify-section index-section index-section-procol">
			<div data-section-id="1490953257213" data-section-type="procol-section">
				<section class="home_procol_layout">
					<div class="home_procol_wrapper">
						<div class="container">
							<div class="row">
								<div class="home_procol_inner">
									<div class="home_procol_content">
										
										<div class="col-sm-12 procol_column">
											<div class="group-procol">
												<div class="group-inner">
													<div class="page-title">
														<img src="./assets/images/home1_icon-new.png" alt="">
														<h2>Bánh mới</h2>
													</div>
													<div class="column_content style_2">
															<div class="column_item">
															<div class="row-container ">
																<!-- Product-->
																<?php
																	$str4 = "SELECT * FROM products ORDER BY created_at desc";
																	$result4 = db::query($mysqli, $str4);
																	$count = 0;
																	$row1 = $result4->fetch_assoc();
																	while ($count < 4) {
																		$row = $result4->fetch_assoc();
																?>
																<div class="column_product">
																	<div class="product home_product">
																		<div class="row-left">
																			<a href="./product.php?id=<?=$row['id']?>" class="container_item">
																				<div class="hoverBorderWrapper">
																					<img src="./admin/<?=$row['image']?>" class="not-rotation img-responsive front" alt="Digital equipment">
																					<div class="mask"></div>
																					<img src="./admin/<?=$row['image']?>" class="rotation img-responsive" alt="Digital equipment">
																				</div>
																			</a>
																		</div>
																		<div class="row-right">
																			<div class="product-title"><a class="title-5" href="./product.php?id=<?=$row['id']?>"><?php echo "{$row["name"]}";?></a></div>
																			<div class="rating-star">
																				<span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
																				</span>
																			</div>
																			<div class="product-price">
																				<span class="price_sale"><span class="money" data-currency-usd="$200.00"><?php echo "{$row["unit_price"]}";?>VND</span></span>
																			</div>
																		</div>
																	</div>
																</div>
																<?php
																	$count++;
																	}
																?>
															</div>
														</div>
														<div class="column_item">
															<?php
																$row = $result4->fetch_assoc();
															?>
															<div class="column_product">
																<div class="row-container ">
																	<div class="product home_product">
																		<div class="row-left">
																			<a href="./product.php?id=<?=$row['id']?>" class="container_item">
																				<div class="hoverBorderWrapper">
																					<img src="./admin/<?=$row['image']?>" class="not-rotation img-responsive front" alt="Digital equipment">
																					<div class="mask"></div>
																					<img src="./admin/<?=$row['image']?>" class="rotation img-responsive" alt="Digital equipment">
																				</div>
																			</a>
																		</div>
																		<div class="row-right">
																			<div class="product-title"><a class="title-5" href="./product.php?id=<?=$row['id']?>"><?php echo "{$row["name"]}";?></a></div>
																			<div class="rating-star">
																				<span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
																				</span>
																			</div>
																			<div class="product-price">
																				<span class="price_sale"><span class="money" data-currency-usd="$200.00"><?= $row['unit_price']?>VND</span></span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="column_product product_full">
																<div class="row-container product list-unstyled clearfix">
																	<div class="row-left">
																		<a href="./product.php?id=<?=$row['id']?>" class="hoverBorder container_item">
																			<div class="hoverBorderWrapper">
																				<img src="./admin/<?=$row1['image']?>" class="not-rotation img-responsive front" alt="Sport machine">
																				<div class="mask"></div>
																				<img src="./admin/<?=$row1['image']?>" class="rotation img-responsive" alt="Sport machine">
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
																					<div data-handle="neque-porro-quisquam-est-qui-dolor-ipsum-quia-11" data-target="" class="quick_shop" data-toggle="modal">
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
																		<div class="product-title"><a class="title-5" href="./product.php?id=<?=$row1['id']?>"><?php echo "{$row1["name"]}";?></a></div>
																		<div class="rating-star">
																			<span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
																			</span>
																		</div>
																		<div class="product-price">
																			<span class="price_sale"><span class="money" data-currency-usd="$200.00"><?php echo "{$row1["unit_price"]}";?>VND</span></span>
																			
																		</div>
																	</div>
																</div>
															</div>
															<?php
															?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!-- Banner -->
		
		<?php while($row = $result->fetch_assoc()){
			
			?>
		<!-- Type_Product-->
		<div class="shopify-section index-section index-section-protab1">
			<div data-section-id="1490953841934" data-section-type="protab1-section">
				<section class="home_protab1_layout">
					<div class="home_protab1_wrapper">
						<div class="container">
							<div class="row">
								<div class="home_protab1_inner">
									<div class="home_protab1_content">
										<div class="protab1_top page-top">
											<div class="page-title">
												<img src="./assets/images/home1_icon-fa.png" alt="">
												<h3>
													<a href="./category.php?id=<?=$row['id']?>"><?=$row["name"]?></a>
												</h3>
											</div>
											<!-- <ul class="nav nav-tabs">
												<li class="active "><a href="#home_protab1_tab_1" data-toggle="tab">Best Sellers</a></li>
												<li class=""><a href="#home_protab1_tab_2" data-toggle="tab">Specials</a></li>
												<li class=""><a href="#home_protab1_tab_3" data-toggle="tab">Most Reviews</a></li>
												<li class=""><a href="#home_protab1_tab_4" data-toggle="tab">New Arrivals</a></li>
											</ul> -->
										</div>
										<div class="protab1_bottom">
											<div class="protab1_banner">
												<a href="./category.php?id=<?=$row['id']?>"><img src="./admin/<?= $row['image']?>" alt=""></a>
											</div>
											<div class="tab-content">
												<div class="tab-pane active" id="home_protab1_tab_1">
													<div class="protab1_item">
														<!-- Product -->
														<?php
															$str1 = "SELECT * FROM products WHERE id_type = {$row['id']}";
															$result1 = db::query($mysqli, $str1);
																while ($row1 = $result1->fetch_assoc()) {
														?>
														<div class="content_product">
															<div class="row-container product list-unstyled clearfix">
																<div class="row-left" style="height: 267px;">
																	<a href="./product.php?id=<?=$row1['id']?>" class="hoverBorder container_item">
																		<div class="hoverBorderWrapper">
																			<img src="./admin/<?=$row1["image"]?>" class="not-rotation img-responsive front" alt="Sport machine">
																			<div class="mask"></div>
																			<img src="./admin/<?=$row1["image"]?>" class="rotation img-responsive" alt="Sport machine">
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
																					<div data-handle="neque-porro-quisquam-est-qui-dolor-ipsum-quia-11" data-target="" class="quick_shop" data-toggle="modal">
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
																	<div class="product-title"><a class="title-5" href="./product.php?id=<?=$row1['id']?>"><?php echo "{$row1['name']}";?></a></div>
																	<div class="rating-star">
																		<span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
																		</span>
																	</div>
																	<div class="product-price">
																		<span class="price_sale"><span class="money" data-currency-usd="$200.00"><?php echo "{$row1['unit_price']}";?>VND</span></span>
																		
																	</div>
																</div>
															</div>
														</div>
														<?php
															}
														?>
													</div>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>

		<?php
			}
		?>

		<!-- Today's Trending -->
		
		
	</main>