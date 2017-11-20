<?php ob_start(); ?>
<?php include('./pages/head.php'); ?>

<?php include('./pages/header.php'); ?>
<?php 
	include('checklog.php');
?>
	<div class="fix-sticky"></div>

	<!-- Main Content -->
	<div class="page-container" id="PageContainer">
		<main class="main-content" id="MainContent" role="main">
			<section class="collection-heading heading-content ">
				<div class="container">
					<div class="row">
						<div class="collection-wrapper">
							<h1 class="collection-title"><span>Your Cart</span></h1>
							<div class="breadcrumb-group">
								<div class="breadcrumb clearfix">
									<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="./index.php" title="Bridal 1" itemprop="url"><span itemprop="title">Home</span></a>
									</span>
									<span class="arrow-space">></span>
									<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
										<a title="Your Cart" itemprop="url"><span itemprop="title">Your Cart</span></a>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="cart-content">
				<div class="cart-wrapper">
					<div class="container">
						<div class="row">
							<div id="shopify-section-cart-template" class="shopify-section">
								<div class="cart-inner">
									<div id="cart">
										<div class="cart-form">
											<form action="./cart.php" method="post" id="cartform">
												<table class="cart-items">
													<thead>
														<tr>
															<th class="image text-left">Item</th>
															<th class="price">Price</th>
															<th class="qty">Quantity</th>
															<th class="total">Total</th>
															<th class="remove"></th>
														</tr>
													</thead>
													<tbody>
														<!---->
														<?php 
														if (isset($_SESSION["cart"])) {
														
														foreach ($_SESSION["cart"] as $key => $value) {
														?>
														<tr>
															<td class="title text-left">
																<ul class="list-inline">
																	<li class="image">
																		<a href="./product.php" >
																			<img width="70" src="./admin/<?=$value['image']?>" alt="Electronic equipment">
																		</a>
																	</li>
																	<li class="link">
																		<a href="./product.php">
																			<p><?=$value['name']?></p>
																			<span class="variant_title"></span>
																		</a>
																	</li>
																</ul>
															</td>
															<td class="price"><span class="money" data-currency-usd="$200.00"><?=$value['price']?></span></td>
															<td class="qty">
																<div class="quantity-wrapper">
																	<div class="wrapper">
																		<p><?=$value['sl']?></p>
																	</div>
																	<!--End wrapper-->
																</div>
																<!--End quantily wrapper-->
															</td>
															<td class="total title-1"><span class="money" data-currency-usd="$200.00">$<?=$value['total_item']?></span></td>
															<td class="remove"><a href="./del_cart.php?id_cart=<?=$key?>" class="cart"><i class="fa fa-trash"></i></a></td>
														</tr>
														<?php
														}
													}
														 ?>
													</tbody>
													
												</table>
												<?php $now = getdate(); 
     													$currentDate = $now["year"] . "-" . $now["mon"] . "-" .$now["mday"];
     													//$id_bill = (int)$now["year"].$now["mon"].$now["mday"].$now["hours"].$now["minutes"].$now["seconds"];
     													$id_bill = $_SESSION['id'].floor(rand()*100);
     													?>
												<table class="cart-items">
													<tr>
														<td>Name</td>
														<input type="hidden" name="id" value="<?= $_SESSION['id']?>">
														<td style="max-width: 190px;"><input type="text" name="name" value="<?= $_SESSION['name']?>" readonly="readonly"></td>
													</tr>
													<tr>
														<td>Phone</td>
														<td><input type="text" name="phone_number" value="<?= $_SESSION['phone_number']?>" readonly="readonly"></td>
													</tr>
													<tr>
														<td>Address</td>
														<td><input type="text" name="address" value="<?= $_SESSION['address']?>" readonly="readonly"></td>
													</tr>
													<tr>
														<td>Date Order</td>
														<td><input type="text" name="date_order" value="<?= $currentDate ?>" readonly="readonly"></td>
													</tr>
													<tr>
														<td>Payment</td>
														<td>
															<input title="Thanh toán tại nhà" id="gender" type="radio" class="input-radio" name="payment" value="COD" checked="checked" style="width: 10%"><span style="margin-right: 10%">Thanh toán khi nhận hàng</span>
															<input title="Chuyển khoản qua tài khoản ATM vủa của hàng sau khi xác nhận sẽ chuyển hàng" id="gender" type="radio" class="input-radio" name="payment" value="ATM" style="width: 10%"><span>Chuyển khoản</span>
														</td>
													</tr>
													<tr>
														<td>Note</td>
														<td style="max-width: 190px;"><input type="text" name="note" value=""></td>
													</tr>
												</table>
												<div class=" cart-buttons">
													<div class="buttons clearfix">
														<?php 
														if(isset($_SESSION['cart'])){
															foreach ($_SESSION['cart'] as $key => $value) {
																if(isset($value['id'])){
																	echo "<input type='submit' id='checkout' class='btn' name='checkout' value='Check Out'>";
																}
															}
														}
															
														 ?>
														
													</div>
												</div>
											</form>
											<?php 
												if (isset($_POST['checkout'])) {
													$id = $_SESSION['id'];
													$date_order = $_POST['date_order'];
													$payment = $_POST['payment'];
													$note = $_POST['note'];
													$total = $_SESSION['total'];
													$sql = "insert into bills(id,id_customer,date_order,total,payment,note) values($id_bill,$id,'$date_order',$total,'$payment','$note')";
													db::query($mysqli,$sql);
													foreach ($_SESSION['cart'] as $key => $value) {
														$value_id = $value['id'];
														$value_sl = $value['sl'];
														$value_price = $value['price'];
														$sql1 = "insert into bill_detail(id_bill, id_product, quantity, unit_price) values ($id_bill,$value_id,$value_sl,$value_price)";
														db::query($mysqli,$sql1);
														header("Location: del_cart.php?id_cart=".$key."");
													}

												}
											 ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>

	<!-- Footer -->
	<?php include('./pages/footer.php'); ?>
	<?php ob_end_flush();?>