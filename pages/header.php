<?php
	session_start();
	include './model/db.php';
	$mysqli = db::open();
	$str = "SELECT * FROM type_products";
	$result = db::query($mysqli, $str);
?>
<!--Header-->
	<header id="top" class="header clearfix">
		<div id="shopify-section-theme-header" class="shopify-section">
			<!--template-->
			<div data-section-id="theme-header" data-section-type="header-section">
				<section class="top-header">
					<div class="top-header-wrapper">
						<div class="container">
							<div class="row">
								<div class="top-header-inner">
									<ul class="unstyled top-menu">
										<!-- Menu Top -->
										<li class="nav-item active">
											<a href="./about-us.php">
												<span> Giới thiệu</span>
											</a>
										</li>
										<li class="nav-item active">
											<a href="./contact.php">
												<span>Liên hệ</span>
											</a>
										</li>
										<li class="nav-item active">
											<a href="./help.php">
												<span> Trợ giúp</span>
											</a>
										</li>
										<!-- Customer Links -->
										<li class="toolbar-customer my-wishlist"><a href="./cart.php">Giỏ hàng</a></li>
										<?php 
											if(isset($_SESSION['email'])){
												echo "<li class='toolbar-customer login-account'><a href='./account.php'>".$_SESSION['name']."</a></li>";
											}
											else{
												echo "<li class='toolbar-customer login-account'><a href='./login.php'>Đăng nhập</a></li>
										<li class='toolbar-customer log-out'><a href='./register.php'><span>/</span>Đăng kí</a></li>";
											}
										 ?>
										
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="main-header">
					<div class="main-header-wrapper">
						<div class="container clearfix">
							<div class="row">
								<div class="main-header-inner">
									<div class="nav-top">
										<div class="nav-logo">
											<a href="./index.php"><img src="./assets/images/logo.png" alt="" title="ESHOP"></a>
											<h1 style="display:none"><a href="./index.php">ESHOP</a></h1>
										</div>
										<div class="group-search-cart">
											<div class="nav-search">
												<form class="search" action="./search.php">
													<input type="text" name="q" class="search_box" placeholder="Nhập tìm kiếm ..." value="">
													
													<button class="search_submit" type="submit" name ="submit">
														<svg aria-hidden="true" role="presentation" class="icon icon-search" viewBox="0 0 37 40"><path d="M35.6 36l-9.8-9.8c4.1-5.4 3.6-13.2-1.3-18.1-5.4-5.4-14.2-5.4-19.7 0-5.4 5.4-5.4 14.2 0 19.7 2.6 2.6 6.1 4.1 9.8 4.1 3 0 5.9-1 8.3-2.8l9.8 9.8c.4.4.9.6 1.4.6s1-.2 1.4-.6c.9-.9.9-2.1.1-2.9zm-20.9-8.2c-2.6 0-5.1-1-7-2.9-3.9-3.9-3.9-10.1 0-14C9.6 9 12.2 8 14.7 8s5.1 1 7 2.9c3.9 3.9 3.9 10.1 0 14-1.9 1.9-4.4 2.9-7 2.9z"></path></svg>
													</button>
												</form>
											</div>
											<div class="nav-cart " id="cart-target">
												<div class="cart-info-group">
													<a href="./cart.php" class="cart dropdown-toggle dropdown-link" data-toggle="dropdown">
														<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i> 
														<div class="num-items-in-cart">
															<div class="items-cart-left">
																<img class="cart_img" src="./assets/images/bg-cart.png" alt="Image Cart" title="Image Cart">
																<span class="cart_text icon"><span class="number">
																	<?php 
																	if (isset($_SESSION["cart"])) {
																		?>
																		<?=count($_SESSION['cart'])?>
																		<?php
																	}
																	 ?>
																</span></span>       
															</div>
															<div class="items-cart-right">
																<span class="title_cart">Giỏ hàng</span>        
															</div>
														</div>
													</a>
													<div class="dropdown-menu cart-info" style="display: none;">
														<div class="cart-content">
															<div class="items control-container">
																<?php 
																if (isset($_SESSION["cart"])) {
																	
																$cart = $_SESSION["cart"];
																	foreach ($cart as $key => $value) {
																?>
																<div class="row">
																	<a class="cart-close" title="Remove" href="./del_cart.php?id_cart=<?=$key?>">
																		<i class="fa fa-times"></i>
																	</a>
																	<div class="cart-left">
																		<a class="cart-image" href="./product.php">
																			<img src="./admin/<?=$value['image']?>" alt="" title="">
																		</a>
																	</div>
																	<div class="cart-right">
																		<div class="cart-title"><a href="./product.php"><?=$value['name']?></a></div>
																		<div class="cart-price"><span class="money" data-currency-usd="$200.00" data-currency="USD"><?=$value['price']?></span><span class="x"> x<?=$value['sl']?></span></div>
																	</div>
																</div>
																<?php
																	}
																}
																 ?>
															</div>
															<div class="subtotal"><span>Subtotal:</span><span class="cart-total-right money" data-currency-usd="$600.00" data-currency="USD">
																<?php 
																if (isset($_SESSION["cart"])) {
																	?>
																	<?=$_SESSION["total"]?>
															</span></div>
															
															<div class="action"><button class="btn float-right" onclick="window.location='./cart.php'">CHECKOUT<i class="fa fa-caret-right"></i></button></div>
																	<?php
																}
																 ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="mobile-navigation">
										<button id="showLeftPush" class="visible-xs"><i class="fa fa-bars fa-2x"></i></button>
										<div class="nav-logo visible-xs">
											<div><a href="./index.php"><img src="./assets/images/logo.png" alt="" title="Sarahmarket 1"></a></div>
										</div>
										<div class="icon_cart visible-xs">
											<div class="cart-info-group">
												<a href="./cart.php" class="cart dropdown-toggle dropdown-link">
													<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
													<i class="sub-dropdown visible-sm visible-md visible-lg"></i> 
													<div class="num-items-in-cart">
														<div class="items-cart-left">
															<img class="cart_img" src="./assets/images/bg-cart.png" alt="Image Cart" title="Image Cart">
															<span class="cart_text icon"><span class="number">
																<?php 
																if (isset($_SESSION["cart"])) {
																	?>
																 	<?=count($_SESSION['car'])?></span></span>       
																	<?php
																}
																 ?>
														</div>
													</div>
												</a>
											</div>
										</div>
										<div class="nav-search visible-xs">
											<form class="search" action="./search.php">
												
												<input type="text" name="q" class="search_box" placeholder="Nhập tìm kiếm ..." value="">
												<button class="search_submit" type="submit">
													<svg aria-hidden="true" role="presentation" class="icon icon-search" viewBox="0 0 37 40"><path d="M35.6 36l-9.8-9.8c4.1-5.4 3.6-13.2-1.3-18.1-5.4-5.4-14.2-5.4-19.7 0-5.4 5.4-5.4 14.2 0 19.7 2.6 2.6 6.1 4.1 9.8 4.1 3 0 5.9-1 8.3-2.8l9.8 9.8c.4.4.9.6 1.4.6s1-.2 1.4-.6c.9-.9.9-2.1.1-2.9zm-20.9-8.2c-2.6 0-5.1-1-7-2.9-3.9-3.9-3.9-10.1 0-14C9.6 9 12.2 8 14.7 8s5.1 1 7 2.9c3.9 3.9 3.9 10.1 0 14-1.9 1.9-4.4 2.9-7 2.9z"></path></svg>
												</button>
											</form>
										</div>
										<div class="mobile-navigation-inner">
											<div class="mobile-navigation-content">
												<div class="mobile-top-navigation visible-xs">
													<div class="mobile-content-top">
														<div class="mobile-language-currency">
															<div class="currencies-switcher">
																<div class="currency btn-group uppercase">
																	<a class="currency_wrapper dropdown-toggle" data-toggle="dropdown">
																		<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
																		<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
																		<span class="currency_code heading hidden-xs">USD</span>
																		<span class="currency_code visible-xs">USD</span>
																		<i class="fa fa-angle-down"></i>
																	</a>
																</div>
															</div>
														</div>
														<div class="mobile-top-account">
															<div class="is-mobile-login">
																<ul class="customer">
																	<li class="logout">
																		<a href="./login.php"><i class="fa fa-user" aria-hidden="true"></i>
																			<span>Đăng nhập</span>
																		</a>
																	</li>
																	<li class="account">
																		<a href=".register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>
																			<span>Đăng kí</span>
																		</a>
																	</li>
																	<li class="is-mobile-cart">
																		<a href="./cart.php">
																			<div class="num-items-in-cart">
																				<i class="fa fa-shopping-cart"></i>
																				<span>Cart</span>
																				<div class="ajax-subtotal" style="display:none;"></div>
																			</div>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="nav-menu visible-xs leftnavi" id="is-mobile-nav-menu">
													<div class="is-mobile-menu-content">
														<div class="mobile-content-link">
															<ul class="nav navbar-nav hoverMenuWrapper">
																<li class="nav-item active">
																	<a href="./index.php">
																		Home
																	</a>
																</li>
																<li class="nav-item navigation navigation_mobile">
																	<a href="./blog.php" class="menu-mobile-link">
																		Blogs
																	</a>
																	<a href="javascript:void(0)" class="arrow">
																		<i class="fa fa-angle-down"></i>
																	</a>
																	<ul class="menu-mobile-container" style="display: none;">
																		<li class=" li-sub-mega navigation_mobile_1">
																			<a href="./blog.php" class="menu-mobile-link">
																				<span>Home &amp; Garden</span>
																			</a>
																			<a href="javascript:void(0)" class="arrow_1">
																				<i class="fa fa-angle-down"></i>
																			</a>
																			<ul class="menu-mobile-container_1" style="display: none;">
																				<script>
																					$(window).ready(function() {
																						$('.navigation_mobile_1 .arrow_1').click(function() {
																							if ($(this).attr('class') == 'arrow_1 class_test') {
																								$('.navigation_mobile_1 .arrow_1').removeClass('class_test');
																								$('.navigation_mobile_1').removeClass('active');
																								$('.navigation_mobile_1').find('.menu-mobile-container_1').hide("slow");
																							} else {
																								$('.navigation_mobile_1 .arrow_1').addClass('class_test');
																								$('.navigation_mobile_1').addClass('active');
																								$('.navigation_mobile_1').find('.menu-mobile-container_1').show("slow");
																							}
																						});
																					});
																				</script>
																				<li class=" li-sub-mega">
																					<a tabindex="-1" href="./product.php">Kitchen</a>
																				</li>
																				<li class=" li-sub-mega">
																					<a tabindex="-1" href="./product.php">Bed Room</a>
																				</li>
																				<li class=" li-sub-mega">
																					<a tabindex="-1" href="./product.php">Garden</a>
																				</li>
																			</ul>
																		</li>
																		<li class=" li-sub-mega">
																			<a tabindex="-1" href="./blog.php">Baby &amp; Mom</a>
																		</li>
																		<li class=" li-sub-mega">
																			<a tabindex="-1" href="./blog.php">Beauty &amp; Skin Care</a>
																		</li>
																		<li class=" li-sub-mega">
																			<a tabindex="-1" href="./blog.php">Food</a>
																		</li>
																		<li class=" li-sub-mega">
																			<a tabindex="-1" href="./blog.php">News</a>
																		</li>
																		<li class=" li-sub-mega">
																			<a tabindex="-1" href="./blog.php">Smartphone &amp; Tablet</a>
																		</li>
																		<li class=" li-sub-mega">
																			<a tabindex="-1" href="./blog.php">Furniture</a>
																		</li>
																	</ul>
																</li>
																<li class="nav-item  navigation_mobile">
																	<a href="./about-us.php" class="menu-mobile-link">
																		Pages
																	</a>
																	<a href="javascript:void(0)" class="arrow">
																		<i class="fa fa-angle-down"></i>
																	</a>
																	<div class="menu-mobile-container" style="display: none;">
																		<ul class="sub-mega-menu">
																			<li class="mega1-collumn1">
																				<ul>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./about-us.php">About Us</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./faqs.php">Shopping Guide</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./lookbook.php">Delivery Information</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./services.php">Privacy Policy</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./contact.php">Sitemap</a>
																					</li>
																				</ul>
																			</li>
																			<li class="mega1-collumn2">
																				<ul>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./account.php">My account</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./login.php">Login</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./cart.php">My cart</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./wish-list.php">Wishlist</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./cart.php">Checkout</a>
																					</li>
																				</ul>
																			</li>
																		</ul>
																	</div>
																</li>
																<li class="nav-item  navigation_mobile">
																	<a href="./category.php" class="menu-mobile-link">
																		Category
																	</a>
																	<a href="javascript:void(0)" class="arrow">
																		<i class="fa fa-angle-down"></i>
																	</a>
																	<div class="menu-mobile-container" style="display: none;">
																		<ul class="sub-mega-menu">
																			<li class="mega2-collumn1">
																				<ul>
																					<li class="list-title">Book &amp; office supply</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Science</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Economic</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Office Supply</a>
																					</li>
																				</ul>
																			</li>
																			<li class="mega2-collumn2">
																				<ul>
																					<li class="list-title">Food Cupboard</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Breakfast Cereals</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Jam, Honey &amp; Spreads</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Crisps, Snacks &amp; Nuts</a>
																					</li>
																				</ul>
																			</li>
																			<li class="mega2-collumn3">
																				<ul>
																					<li class="list-title">Home &amp; garden</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Kitchen</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Bed Room</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Garden</a>
																					</li>
																				</ul>
																			</li>
																		</ul>
																	</div>
																</li>
																<li class="nav-item  navigation_mobile">
																	<a href="./category.php" class="menu-mobile-link">
																		Products
																	</a>
																	<a href="javascript:void(0)" class="arrow">
																		<i class="fa fa-angle-down"></i>
																	</a>
																	<div class="menu-mobile-container" style="display: none;">
																		<ul class="sub-mega-menu">
																			<li class="mega3-collumn1">
																				<ul>
																					<li class="list-title">Category</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Foods</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Hot Deal</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Fashion</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Travel</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Other Services</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./collections.php">Healthy &amp; Beauty</a>
																					</li>
																				</ul>
																			</li>
																			<li class="mega3-collumn2">
																				<ul>
																					<li class="list-title">Pages</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./category.php">Shopping cart</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./cart.php">Checkout</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./cart.php">Track order</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./account.php">My account</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./login.php">Login</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./register.php">Register</a>
																					</li>
																				</ul>
																			</li>
																		</ul>
																	</div>
																</li>
																<li class="nav-item  navigation_mobile">
																	<a href="./super-deal.php" class="menu-mobile-link">
																		Top Brands
																	</a>
																	<a href="javascript:void(0)" class="arrow">
																		<i class="fa fa-angle-down"></i>
																	</a>
																	<div class="menu-mobile-container" style="display: none;">
																		<ul class="sub-mega-menu">
																			<li class="mega4-collumn1">
																				<ul>
																					<li class="list-title">Blogs</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./blog.php">Home &amp; Garden</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./blog.php">Baby &amp; Mom</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./blog.php">Beauty &amp; Skin Care</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./blog.php">Food</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./blog.php">News</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./blog.php">Smartphone &amp; Tablet</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./blog.php">Furniture</a>
																					</li>
																				</ul>
																			</li>
																			<li class="mega4-collumn2">
																				<ul>
																					<li class="list-title">List Pages</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./about-us.php">About us</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./contact.php">Contact</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./faqs.php">FAQs</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./lookbook.php">Lookbook</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./price-table.php">Price Table</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./services.php">Services</a>
																					</li>
																					<li class="list-unstyled li-sub-mega">
																						<a href="./super-deal.php">Super Deal</a>
																					</li>
																				</ul>
																			</li>
																		</ul>
																	</div>
																</li>
															</ul>
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

				<section class="navigation-header">
					<div class="navigation-header-wrapper">
						<div class="container clearfix">
							<div class="row">
								<div class="main-navigation-inner">
									<div class="navigation_area">
										<!-- Shop by Cat-->
										<div class="navigation_left">
											<div class="group_navbtn">
												<a href="./category.php" class="dropdown-toggle" data-toggle="dropdown">                     
													<span class="dropdown-toggle">
													  Loại hàng
													</span>
													<i class="fa fa-bars" aria-hidden="true"></i>
												</a>
												<ul class="navigation_links_left dropdown-menu" style="display: none;">
													<?php 
														while ($row = $result->fetch_assoc()) {
															echo "<li class='nav-item _icon'>
																	<a href='category.php?id=".$row['id']."'>
																		<span>".$row['name']."</span>
																	</a>
																</li>";
														}
													 ?>
												</ul>
											</div>
										</div>
										<!-- Menu -->
										<div class="navigation_right">
											<ul class="navigation_links">
												<li class="nav-item active">
													<a href="./index.php">
														<span>Trang chủ</span>
													</a>
												</li>
												<li class="dropdown mega-menu">
													<a href="./about-us.php" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
														<span>Trang</span>
														<i class="fa fa-angle-down"></i>
														<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
													</a>
													<div class="megamenu-container megamenu-container-1 dropdown-menu" style="background-image: url(./assets/images/demo_466×334.png); width: 1170px;">
														<ul class="sub-mega-menu">
															<li class="mega-links mega1-collumn1 col-sm-3">
																<ul>
																	<li class="list-unstyled li-sub-mega">
																		<a href="./about-us.php">Về chúng tôi</a>
																	</li>
																	<li class="list-unstyled li-sub-mega">
																		<a href="./faqs.php">Điều khoản</a>
																	</li>
																	<li class="list-unstyled li-sub-mega">
																		<a href="./services.php"Dịch vụ</a>
																	</li>
																	<li class="list-unstyled li-sub-mega">
																		<a href="./contact.php">Liên hệ</a>
																	</li>
																</ul>
															</li>
															<li class="mega-links mega1-collumn2 col-sm-3">
																<ul>
																	<li class="list-unstyled li-sub-mega">
																		<a href="./account.php">Tài khoản của tôi</a>
																	</li>
																	<li class="list-unstyled li-sub-mega">
																		<a href="./login.php">Đăng nhập</a>
																	</li>
																	<li class="list-unstyled li-sub-mega">
																		<a href="./cart.php">Đăng kí</a>
																	</li>
																	<li class="list-unstyled li-sub-mega">
																		<a href="./cart.php">Thanh toán</a>
																	</li>
																</ul>
															</li>
															<li class="mega1-collumn3 col-sm-6">
																<div class="col-image"><img src="./assets/images/logo.png" alt=""></div>
																<div class="col-caption">Mua sắm bánh <br> Nhiều loại bánh khác nhau</div>
															</li>
														</ul>
													</div>
												</li>
												<li class="dropdown mega-menu">
													<a href="./category.php" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
														<span>Sản phẩm</span>
														<i class="fa fa-angle-down"></i>
														<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
													</a>
													<div class="megamenu-container megamenu-container-3 dropdown-menu" style="background-image: url(./assets/images/demo_466×334.png); display: none; width: 1170px;">
														<ul class="sub-mega-menu">
															<li class="mega-links mega3-collumn1 col-sm-3">
																<ul>
																	<li class="list-title">Category</li>
																	<?php 
																		while ($row1 = $result->fetch_assoc()) {
																			echo "<li class='list-unstyled li-sub-mega'>
																					<a href='category.php?id=".$row1['id']."'>".$row1['name']."</a>
																				</li>";
																		}
																	 ?>
																</ul>
															</li>
															<li class="mega-links mega3-collumn2 col-sm-3">
																<ul>
																	<li class="list-title">Trang</li>
																	<li class="list-unstyled li-sub-mega">
																		<a href="./category.php">Mua sắm</a>
																	</li>
																	<li class="list-unstyled li-sub-mega">
																		<a href="./cart.php">Thanh toán</a>
																	</li>
																	<li class="list-unstyled li-sub-mega">
																		<a href="./account.php">Tài khoản của tôi</a>
																	</li>
																	<li class="list-unstyled li-sub-mega">
																		<a href="./login.php">Đăng nhập</a>
																	</li>
																	<li class="list-unstyled li-sub-mega">
																		<a href="./register.php">Đăng kí</a>
																	</li>
																</ul>
															</li>
															<li class="mega3-collumn3 col-sm-6">
																<div class="dis_table">
																	<div class="dis_tablecell">
																		<div class="col-caption">
																			<span class="title">
																				Khám phá
																			</span>
																			<span class="content">
																				Bánh mới
																			</span>
																		</div>
																		<a class="btn btn1" href="category.php">Mua sắm ngay</a>
																	</div>
																</div>
															</li>
														</ul>
													</div>
												</li>
												
											</ul>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!--endtemplate-->
			<script>
				function addaffix(scr) {
					if ($(window).innerWidth() >= 992) {
						if (scr > 170) {
							if (!$('#top').hasClass('affix')) {
								$('#top').addClass('affix').addClass('fadeInDown animated');
							}
						} else {
							if ($('#top').hasClass('affix')) {
								$('#top').prev().remove();
								$('#top').removeClass('affix').removeClass('fadeInDown animated');
							}
						}
					} else $('#top').removeClass('affix');
				}
				$(window).scroll(function() {
					var scrollTop = $(this).scrollTop();
					addaffix(scrollTop);
				});
				$(window).resize(function() {
					var scrollTop = $(this).scrollTop();
					addaffix(scrollTop);
				});
			</script>
		</div>
	</header>