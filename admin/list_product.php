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

  		$type = db::query($conn,"select * from type_products");
  		//phan trang
  		$name_filter1 = isset($_GET['keyword'])? " where products.name like '%".$_GET['keyword']."%'" : "";
  		$type_id = isset($_GET['filter_type'])?(int)$_GET['filter_type']:0;
		$where1 = $type_id == 0 ? "":" and products.id_type = $type_id";
  		$count = db::query($conn,"SELECT count(*) as soluong FROM products $name_filter1 $where1");
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


  	 ?>
    <div class=" col-sm-12">
		<form action="list_product.php" metdod="get" accept-charset="utf-8" class="form-inline col-sm-10" id="formfilter">
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
				<label>Role</label>
					<select name="filter_type" onchange="role_change()">
						<option value="0">All Users</option>
						<?php 
							$type_id = isset($_GET['filter_type'])?(int)$_GET['filter_type']:0;
							while($row_type = $type->fetch_assoc()){
								$selected = $type_id == $row_type['id'] ? " selected" : "";
								echo "<option value=".$row_type['id']."".$selected." >".$row_type['name']."</option>";
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
			<th>Type</th>
			<th style="max-width: 550px;">Description</th>
			<th>Unit Price</th>
			<th>Promotion Price</th>
			<th>Image</th>
			<th>Unit</th>
			<th><a href="add_product.php" class="btn btn-xs btn-success" title="">Create</a></th>
		</tr>
		<?php
			$name_filter = isset($_GET['keyword'])? " and products.name like '%".$_GET['keyword']."%'" : "";
			$where = $type_id == 0 ? "":" and products.id_type = $type_id";
	  		$sql = "select products.id,products.name,type_products.name as type,products.description,products.unit_price,products.promotion_price,products.image,products.unit,products.new from products,type_products where products.id_type = type_products.id $where $name_filter ORDER BY products.id ASC LIMIT $numrows OFFSET $off";

	  		$users = db::query($conn,$sql);
			while ($row = $users->fetch_assoc()) {
				echo "<tr>
					<td>".$row['id']."</td>
					<td>".$row['name']."</td>
					<td>".$row['type']."</td>
					<td style='max-width: 550px;'>".$row['description']."</td>
					<td>".$row['unit_price']."</td>
					<td>".$row['promotion_price']."</td>
					<td><img src=".$row['image']." style='height: 100px;'></td>
					<td>".$row['unit']."</td>";
					if($_SESSION['role'] == 900){
						echo "<td><a href='edit_product.php?id=".$row['id']."' class='btn btn-xs btn-success'>Edit</a></td>";
					}
					
					echo "
				</tr>";
			}
		 ?>
		 <img src="" style="height: 100px;">
	</table>
	<div class= "pages">
	<?php
		if($numpages>1)
		{
			$pagesize = isset($_GET['pageSize'])?(int)$_GET['pageSize']:5;
			$filter_type = isset($_GET['filter_type'])?(int)$_GET['filter_type']:0;
			$keyword = isset($_GET['keyword'])?$_GET['keyword']:"";
			echo "<p>Trang: ";
			for($i=1; $i<=$numpages; $i++)
				echo "<a href='list_product.php?curpage={$i}&pageSize={$pagesize}&filter_type={$filter_type}&keyword={$keyword}'>{$i}</a>   ";
			echo"</p>";
		}
	 ?>
	</div>
  <!-- /.content-wrapper -->
  	<?php include('layouts/footer.php'); ?>
