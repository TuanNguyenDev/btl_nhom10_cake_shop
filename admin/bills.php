<?php 
	include('checklog.php');
?>
	<?php include('layouts/head.php'); ?>
  <!-- Left side column. contains tde logo and sidebar -->
  	<?php include('layouts/menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  	<?php include('layouts/content_wraper.php'); ?>
  	<?php 
  		include('model/db.php');
  		$conn = db::open();

  		$sql="SELECT bills.id,customer.name,bills.date_order,bills.total,bills.payment,bills.note from bills,customer WHERE bills.id_customer = customer.id ORDER BY bills.create_at DESC";
  		//phan trang
  		$name_filter = isset($_GET['keyword'])? " and customer.name like '%".$_GET['keyword']."%'" : "";
  		$count = db::query($conn,"SELECT count(*) as soluong FROM bills,customer where bills.id_customer = customer.id $name_filter");
  		$result = $count->fetch_assoc();
  		$soluong = $result['soluong'];
  		$numrows = isset($_GET['pageSize'])?(int)$_GET['pageSize']:5;
		$numpages = $soluong / $numrows;
		if($soluong % $numrows !=0){
			$numpages++;
		}
		if(isset($_GET['curpage']))
			$curpage = $_GET['curpage'];
		else
			$curpage = 1;
		$off = $numrows*($curpage-1);
		$pageSize = isset($_GET['pageSize'])?(int)$_GET['pageSize']:5;

  	 ?>
    <div class=" col-sm-12">
		<form action="bills.php" metdod="get" accept-charset="utf-8" class="form-inline col-sm-10" id="formfilter">
			<div class="form-group">
				<label> Page Size</label>
					<select name="pageSize">
						<?php
							$pagesize = isset($_GET['pageSize'])?(int)$_GET['pageSize']:5;
							for ($i=5; $i <= 20; $i=$i+5) { 
								$selec = $pagesize == $i ? " selected":"";
								echo "<option value=\"$i\" ".$selec.">$i</option>";
							}
						?>
					</select>
			</div>
			
			<div class="form-group">
				<label>Search</label>
				<input type="text" value="" name="keyword" class="form-control">
				<button type="submit" class="btn btn-sm btn-info">Filter</button>
			</div>
		</form>
	</div>
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Date Order</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Unit Price</th>
			<th>Total</th>
			<th>Payment</th>
			<th>Note</th>
		</tr>
		<?php
			$name_filter = isset($_GET['keyword'])? " and customer.name like '%".$_GET['keyword']."%'" : "";
			//$where = $role_id == 0 ? "":" and users.role = $role_id";
	  		//$sql="SELECT bills.id,customer.name,bills.date_order,bills.total,bills.payment,bills.note from bills,customer WHERE bills.id_customer = customer.id $name_filter ORDER BY bills.date_order DESC LIMIT $numrows OFFSET $off";
			$sql = "SELECT bills.id,customer.name,bills.date_order,products.name,bill_detail.quantity,bill_detail.unit_price,bills.total,bills.payment,bills.note from bills,customer,products,bill_detail WHERE bills.id_customer = customer.id and products.id = bill_detail.id and bill_detail.id_bill = bills.id $name_filter ORDER BY bills.date_order DESC LIMIT $numrows OFFSET $off";
	  		$users = db::query($conn,$sql);
			while ($row = $users->fetch_assoc()) {
				echo "<tr>
					<td>".$row['id']."</td>
					<td>".$row['name']."</td>
					<td>".$row['date_order']."</td>
					<td>".$row['name']."</td>
					<td>".$row['quantity']."</td>
					<td>".$row['unit_price']."</td>
					<td>".$row['total']."</td>
					<td>".$row['payment']."</td>
					<td>".$row['note']."</td>
					<td><a href='details.php?id=".$row['id']."' class='btn btn-xs btn-success'>Detail</a></td>
				</tr>";
			}
		 ?>
		
	</table>
	<div class= "pages">
	<?php
		if($numpages>1)
		{
			$pagesize = isset($_GET['pageSize'])?(int)$_GET['pageSize']:5;
			$keyword = isset($_GET['keyword'])?$_GET['keyword']:"";
			echo "<p>Trang:&nbsp; ";
			for($i=1; $i<=$numpages; $i++)
				echo "<a href='bills.php?pageSize={$pagesize}&curpage={$i}&keyword={$keyword}'>{$i}</a> &nbsp;";
			echo"</p>";
		}
	 ?>
	</div>
  <!-- /.content-wrapper -->
  	<?php include('layouts/footer.php'); ?>
