<?php include('./pages/head.php'); ?>

<?php include('./pages/header.php'); ?>
<?php 
	include('checklog.php');
	$sql = "select * from bills where id_customer =".$_SESSION['id'];
	$order = db::query($mysqli,$sql);
	 
 ?>

<main class="main-content" id="MainContent" role="main">
	<section class="collection-heading heading-content ">
		<div class="container">
			<div class="row">
				<div class="collection-wrapper">
					<h1 class="collection-title"><span>My Account</span></h1>
					<div class="breadcrumb-group">
						<div class="breadcrumb clearfix">
							<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
								<a href="./logout.php" title="Logout" itemprop="url">
									<span itemprop="title">Logout</span>
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="account-content">
		<div class="account-content-wrapper">
			<div class="container">
				<div class="row">
					<div class="account-content-inner">
						<div id="customer-account">
							<div id="customer_sidebar" class="col-sm-3 col-md-3">
								<h3 class="sb-title">ACCOUNT DETAILS</h3>
								<div class="sb-group">
									<p class="customer-name"><?=$_SESSION['name']?></p>
									<p class="email note"><?=$_SESSION['email']?></p>
									<div class="address note">
										<p><?=$_SESSION['address']?></p>
										<a id="view_address" href="./profile_edit.php"><i class="fa fa-bookmark-o"></i><span>Edit</span></a>
									</div>
								</div>
								<!--End sb-group-account -->
							</div>
							<div id="customer_orders" class="col-sm-9 col-md-9">
								<table>
									<thead>
										<tr>
											<th class="order_number">Order</th>
											<th class="date">Date</th>
											<th class="payment_status">Payment Status</th>
											<th class="fulfillment_status">Note</th>
											<th class="total">Total</th>
										</tr>
									</thead>
									<tbody>
										<?php while ($orders = $order->fetch_assoc()) {
											?>
											<tr class="odd ">
											<td class="td-name"><a href="./order.html" title=""><?= $orders['id']?></a></td>
											<td class="td-note"><span class="note"><?= $orders['date_order']?></span></td>
											<td class="td-authorized"><span class="status_authorized"><?= $orders['payment']?></span></td>
											<td class="td-unfulfilled"><span class="status_unfulfilled"><?= $orders['note']?></span></td>
											<td class="td-total"><span class="total" style="font-family:'currencies'"><span class="money" data-currency-usd="$292.90"><?= $orders['total']?></span></span>
											</td>
										</tr>
											<?php
										} ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php include('./pages/footer.php'); ?>