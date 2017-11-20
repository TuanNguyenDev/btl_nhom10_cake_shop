<?php ob_start(); ?>
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

  		
  		//phan trang
  		$name_filter = isset($_GET['keyword'])? " where customer.name like '%".$_GET['keyword']."%'" : "";
  		$count = db::query($conn,"SELECT count(*) as soluong FROM customer $name_filter");
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
		<form action="list_customer.php" metdod="get" accept-charset="utf-8" class="form-inline col-sm-10" id="formfilter">
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
			<th>Full Name</th>
			<th>Gender</th>
			<th>Email</th>
			<th>Address</th>
			<th>Phone</th>
		</tr>
		<?php
			$name_filter = isset($_GET['keyword'])? " where customer.name like '%".$_GET['keyword']."%'" : "";
			//$where = $role_id == 0 ? "":" and users.role = $role_id";
	  		$sql = "select customer.id,customer.name,customer.gender,customer.email,customer.address,customer.phone_number from customer $name_filter order by customer.id ASC LIMIT $numrows OFFSET $off";

	  		$users = db::query($conn,$sql);
			while ($row = $users->fetch_assoc()) {
				echo "<tr>
					<td>".$row['id']."</td>
					<td>".$row['name']."</td>
					<td>".$row['gender']."</td>
					<td>".$row['email']."</td>
					<td>".$row['address']."</td>
					<td>".$row['phone_number']."</td>
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
				echo "<a href='list_customer.php?pageSize={$pagesize}&curpage={$i}&keyword={$keyword}'>{$i}</a> &nbsp;";
			echo"</p>";
		}
	 ?>
	</div>
  <!-- /.content-wrapper -->
  	<?php include('layouts/footer.php'); ?>
  	<?php ob_end_flush();?>
