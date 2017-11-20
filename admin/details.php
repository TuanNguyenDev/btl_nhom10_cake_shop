<?php 
	include('checklog.php');
?>
<?php include('layouts/head.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('layouts/menu.php'); ?>

<!-- Content Wrapper. Contains page content -->
<?php include('layouts/content_wraper.php'); ?>
	<?php 
		include('model/db.php');
		$id = $_GET['id'];
  		$conn = db::open();
  		$sql = "select bills.id,customer.name,customer.email,customer.address,customer.phone_number,bills.date_order,products.name as product,bill_detail.quantity,bill_detail.unit_price,bills.total,bills.payment,bills.note from bills,customer,products,bill_detail WHERE bills.id_customer = customer.id and products.id = bill_detail.id and bill_detail.id_bill = bills.id and bills.id=".$_GET['id'];
  		$bill_details = db::query($conn,$sql);
  		$bill_cus = db::query($conn,$sql);
		$row_cus = $bill_cus->fetch_assoc();
	 ?>
	<div class="col-sm-12">
		<h3>Infomation:</h3>
		<table class='table table-hover'>
			<tr>
				<th>Bill ID</th>
				<td><?=$row_cus['id']?></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><?=$row_cus['name']?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?=$row_cus['email']?></td>
			</tr>
			<tr>
				<th>Address</th>
				<td><?=$row_cus['address']?></td>
			</tr>
			<tr>
				<th>Phone</th>
				<td><?=$row_cus['phone_number']?></td>
			</tr>
			<tr>
				<th>Date Order</th>
				<td><?=$row_cus['date_order']?></td>
			</tr>
		</table>
		<h3>List Product:</h3>
		<?php 
			while ($row = $bill_details->fetch_assoc()) {
				echo "<table class='table table-hover'>
							<tr>
								<th>Product</th>
								<td>".$row['product']."</td>
							</tr>
							<tr>
								<th>Quantity</th>
								<td>".$row['quantity']."</td>
							</tr>
							<tr>
								<th>Unit Price</th>
								<td>".$row['unit_price']."</td>
							</tr>
							<tr>
								<th>Total</th>
								<td>".$row['total']."</td>
							</tr>
							<tr>
								<th>Payment</th>
								<td>".$row['payment']."</td>
							</tr>
							<tr>
								<th>Note</th>
								<td>".$row['note']."</td>
							</tr>
						</table>";
			}
		 ?>
		<div class="text-center">
			<a href="bills.php" class="btn btn-warning">Cancel</a>
		</div>
	</div>
<!-- /.content-wrapper -->
<?php include('layouts/footer.php'); ?>
