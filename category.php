<!DOCTYPE html>
<?php include('./pages/head.php'); ?>
<body>
	<?php
		include('./pages/header.php');
	?>
	<div class="fix-sticky"></div>

	<!-- Main Content -->
	<?php
		$mysqli = db::open();
		$id = isset($_GET['id']) ? $_GET['id'] : "all";
		$where  = $id == "all" ? "" : " WHERE id_type = $id";
		//phan trang
  		$count = db::query($mysqli,"SELECT count(*) as soluong FROM products $where");
  		$result = $count->fetch_assoc();
  		$soluong = $result['soluong'];
  		$numrows = 16;
		$numpages = $soluong / $numrows;
		if($soluong % $numrows !=0){
			$numpages++;
		}
		if(isset($_GET['curpage']))
			$curpage = $_GET['curpage'];
		else
			$curpage = 1;
		$off = $numrows*($curpage-1);
	?>
	
<div class="page-container" id="PageContainer">
	<main class="main-content" id="MainContent" role="main">
		<section class="collection-heading heading-content ">
			<div class="container">
				<div class="row">
					<div class="collection-wrapper">
						<h1 class="collection-title"><span>Sản phẩm</span></h1>
						<div class="breadcrumb-group">
							<div class="breadcrumb clearfix">
								<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="./index.html" title="Sarahmarket 1" itemprop="url"><span itemprop="title">Trang chủ</span></a>
								</span>
								<span class="arrow-space">></span>
								<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
									<a href="./collections-all.html" title="Products" itemprop="url">
										<span itemprop="title">Sản phẩm</span>
									</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="collection-content">
			<div class="collection-wrapper">
				<div class="container">
					<div class="row">
						<div id="shopify-section-collection-template" class="shopify-section">
							<div class="collection-inner">
								<!-- Tags loading -->
								<div id="tags-load" style="display:none;"><i class="fa fa-spinner fa-pulse fa-2x"></i></div>
								<div id="collection">
									<div class="collection_inner">
										<div class="collection-leftsidebar sidebar col-sm-3 clearfix">
											<?php
													$str = "SELECT * FROM type_products";
													$result = db::query($mysqli, $str);
											?>
											<div class="sidebar-block collection-block">
												<div class="sidebar-title">
													<span>Categories</span>
													<i class="fa fa-caret-down show_sidebar_content" aria-hidden="true"></i>
												</div>
												<div class="sidebar-content">
													<ul class="list-cat">
														<li class="active"><a href="./category.php?id=all">Tất cả </a></li>
														<?php
															while ($row = $result->fetch_assoc()) {
														?>
														<li><a href="./category.php?id=<?=$row['id']?>"><?=$row["name"]?></a></li>
														<?php
															}
														?>
													</ul>
												</div>
											</div>											
											
										</div>

										<div class="collection-mainarea col-sm-9 clearfix">
											<div class="collection_toolbar">
												<div class="toolbar_left">
													Tất cả:<?= $soluong?> 
												</div>
												<div class="toolbar_right">
													<div class="group_toolbar">
														<!-- View as -->
														<div class="grid_list">
															<span class="toolbar_title">Chọn view:</span>
															<ul class="list-inline option-set hidden-xs" data-option-key="layoutMode">
																<li data-option-value="fitRows" id="goGrid" class="active goAction " data-toggle="tooltip" data-placement="top" title="" data-original-title="Grid">
																	<i class="fa fa fa-th"></i>
																</li>
																<li data-option-value="straightDown" id="goList" class="goAction " data-toggle="tooltip" data-placement="top" title="" data-original-title="List">
																	<i class="fa fa-th-list"></i>
																</li>
															</ul>
														</div>
														<!-- Sort by -->
													</div>
												</div>
											</div>
											<div class="collection-items clearfix">
												<div class="products">
													<?php
														$str2 = "SELECT * FROM products $where ORDER BY products.id ASC LIMIT $numrows OFFSET $off";
														$result2 = db::query($mysqli, $str2);
														while ($row2 = $result2->fetch_assoc()) {
													?>
													<div class="product-item col-sm-3">
														<div class="product">
															<div class="row-left" style="height: 200px;">
																<a href="./product.php?id=<?=$row2['id']?>" class="hoverBorder container_item">
																	<div class="hoverBorderWrapper">
																		<img src="./admin/<?=$row2["image"]?>" class="not-rotation img-responsive front" alt="Digital equipment">
																		<div class="mask"></div>
																		<img src="./admin/<?=$row2["image"]?>" class="rotation img-responsive" alt="Digital equipment">
																	</div>
																</a>
																<span class="sale_banner">
																	<span class="sale_text">-<?php $k = round(($row2['unit_price'] - $row2['promotion_price']) / $row2['unit_price'] * 100, 1); echo $k?>%</span>
																</span>
																<div class="hover-mask grid-mode">
																	<div class="group-mask">
																		<div class="inner-mask">
																			<div class="group-actionbutton">
																				<!-- <form action="./cart.html" method="post">
																					<div class="effect-ajax-cart">
																						<input type="hidden" name="quantity" value="1">
																						<button class="btn select-option" type="button"><i class="fa fa-bars"></i></button>
																					</div>
																				</form> -->
																				<ul class="quickview-wishlist-wrapper">
																					<!-- <li class="quickview hidden-xs hidden-sm">
																						<div class="product-ajax-cart ">
																							<span class="overlay_mask"></span>
																							<div data-handle="seafood-restaurant" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
																								<a class=""><i class="fa fa-search" title="Quick View"></i></a>
																							</div>
																						</div>
																					</li> -->
																					<li class="wishlist hidden-xs">
																						<a class="wish-list" href="add_cart.php?id=<?=$row2['id']?>"><span class="hidden-xs"><i class="fa fa-heart" title="Wishlist"></i></span></a>
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
																<div class="grid-mode">
																	<div class="product-title"><a class="title-5" href="./product.php?id=<?=$row2['id']?>"><?=$row2["name"]?></a></div>
																	<div class="product-price">
																		<span class="price_sale"><span class="money" data-currency-usd="$200.00"><?=$row2['promotion_price']?>VND</span></span>
																		<del class="price_compare"> <span class="money" data-currency-usd="$300.00"><?=$row2['unit_price']?>VND</span></del>
																	</div>
																</div>
																<div class="list-mode hide">
																	<div class="list-left">
																		<div class="product-title"><a class="title-5" href="./product.php?id=<?=$row2['id']?>"><?=$row2["name"]?></a></div>
																		<div class="product-description"><?=$row2['description']?></div>
																	</div>
																	<div class="list-right">
																		<div class="product-price">
																			<span class="price_sale"><span class="money" data-currency-usd="$200.00"><?=$row2['promotion_price']?>VND</span></span>
																			<del class="price_compare"> <span class="money" data-currency-usd="$300.00"><?=$row2['unit_price']?>VND</span></del>
																		</div>
																		<div class="product-group-actions">
																			<form class="product-addtocart" action="./cart.html" method="post">
																				<div class="effect-ajax-cart">
																					<input type="hidden" name="quantity" value="1">
																					<button class="btn btn-1 select-option" type="button"><i class="fa fa-bars"></i></button>
																				</div>
																			</form>
																			<ul class="quickview-wishlist-wrapper">
																				<li class="product-wishlist wishlist">
																					<a class="wish-list"><span class="hidden-xs"><i class="fa fa-heart" title="Wishlist"></i></span></a>
																				</li>
																				<li class="product-quickview quickview hidden-xs hidden-sm">
																					<div class="product-ajax-cart ">
																						<span class="overlay_mask"></span>
																						<div data-handle="seafood-restaurant" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
																							<a class=""><i class="fa fa-search" title="Quick View"></i></a>
																						</div>
																					</div>
																				</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<?php
														}
													?>
												</div>
											</div>
											
											<div class="collection-bottom-toolbar">
												<div class="product-pagination col-sm-6">
													<div class="pagination_group">
														<ul class="pagination">
															<?php
																$curpage = isset($_GET['curpage']) ? $_GET['curpage'] : 0;
																if($numpages>1)
																{
																	if($curpage != 0 && $curpage != 1){
																		$pre = $curpage -1;
																		echo "<li class='prev'><a href='category.php?id={$id}&curpage={$pre}'>Prev</a></li>";
																	}
																	
																	for($i=1; $i<=$numpages; $i++)
																		echo "<li> <a href='category.php?id={$id}&curpage={$i}'>{$i} </a></li>";
																	if($curpage < $numpages -1.5){
																		$next = $curpage +1;
																		echo"<li class='prev'><a href='category.php?id={$id}&curpage={$next}'>Next</a></li>";
																	}
																	
																}
															 ?>
															
															<!-- <li class="active"><a href="../all_category.php">1</a></li>
															<li><a href="../all_category.php">2</a></li>
															<li><a href="../all_category.php">3</a></li> -->
															
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<script type="text/javascript">
								/* Handle Grid - List */
								function handleGridList() {
									if ($('#goList').length) {
										$('#goList').on(clickEv, function(e) {
											$(this).parent().find('li').removeClass('active');
											$(this).addClass('active');
											$('.collection-items').addClass('full_width ListMode');
											$('.collection-items').removeClass('no_full_width GridMode');
											$('.collection-items .row-left').addClass('col-md-5');
											$('.collection-items .row-right').addClass('col-md-7');
											$('.collection-items .product-item').removeClass('col-sm-3 col-sm-4');
											$('.grid-mode').addClass("hide");
											$('.list-mode').removeClass("hide");
										});
									}
									if ($('#goGrid').length) {
										$('#goGrid').on(clickEv, function(e) {
											$(this).parent().find('li').removeClass('active');
											$(this).addClass('active');
											$('.collection-items').removeClass('full_width ListMode');
											$('.collection-items').addClass('no_full_width GridMode');
											$('.collection-items .row-left').removeClass('col-md-5');
											$('.collection-items .row-right').removeClass('col-md-7');

											$('.collection-items .product-item').addClass('col-sm-3');

											$('.grid-mode').removeClass("hide");
											$('.list-mode').addClass("hide");
										});
									}
								}
								$(document).ready(function() {
									if (location.search.search("sort_by=") == -1) {

									} else {
										if (location.search != "") {
											var stpo = location.search.search("sort_by=") + 8,
												sortby_url = '.' + location.search.substr(stpo).split('='),
												sortby_url_a = sortby_url + " a";
											$(sortby_url).addClass("active");
											$('#sortButton .name').html($(sortby_url_a).html());
										} else {
											$('.manual').addClass("active");
										}
									}
									handleGridList();
								});
							</script>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</div>

	<!-- Footer -->
	<?php include('./pages/footer.php'); ?>
</body>