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
  		$count = db::query($conn,"SELECT count(*) as soluonguser FROM type_products");
  		$result = $count->fetch_assoc();
  		$songuoidung = $result['soluonguser'];
  		$numrows = isset($_GET['pageSize'])?(int)$_GET['pageSize']:5;
		$numpages = $songuoidung / $numrows;
		if($songuoidung % $numrows !=0){
			$numpages++;
		}
		if(isset($_GET['curpage']))
			$curpage = $_GET['curpage'];
		else
			$curpage = 1;
		$off = $numrows*($curpage-1);


  	 ?>
    <div class=" col-sm-12">
		<form action="list_type.php" metdod="get" accept-charset="utf-8" class="form-inline col-sm-10" id="formfilter">
			<div class="form-group">
				<label> Page Size</label>
					<select name="pageSize">
						<option value="5" >5</option>
						<option value="10" >10</option>
						<option value="15" >15</option>
						<option value="80" >80</option>
						<option value="100" >100</option>
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
			<th>Description</th>
			<th>Image</th>
			<th><a href="add_type.php" class="btn btn-xs btn-success" title="">Create</a></th>
		</tr>
		<?php
			$name_filter = isset($_GET['keyword'])? " where type_products.name like '%".$_GET['keyword']."%'" : "";
	  		$sql = "select * from type_products $name_filter ORDER BY type_products.id ASC LIMIT $numrows OFFSET $off";

	  		$users = db::query($conn,$sql);
			while ($row = $users->fetch_assoc()) {
				echo "<tr>
					<td>".$row['id']."</td>
					<td>".$row['name']."</td>
					<td>".$row['description']."</td>
					<td><img src="."./images/type/".$row['image']."  style='height: 50px;'></td>";
					if($_SESSION['role'] == 900){
						echo "
					<td><a href='edit_type.php?id=".$row['id']."' class='btn btn-xs btn-success'>Edit</a></td>";
					}
					
					echo "
				</tr>";
			}
		 ?>
		
	</table>
	<div class= "pages">
	<?php
		if($numpages>1)
		{
			echo "<p>Trang:&nbsp; ";
			for($i=1; $i<=$numpages; $i++)
				echo "<a href='list_type.php?curpage={$i}'>{$i}</a> &nbsp;";
			echo"</p>";
		}
	 ?>
	</div>
  <!-- /.content-wrapper -->
  	<?php include('layouts/footer.php'); ?>
