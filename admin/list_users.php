<?php 
	include('checklog.php');
	if($_SESSION['role'] != 900){
		header("Location:index.php");
	}
?>
	<?php include('layouts/head.php'); ?>
  <!-- Left side column. contains tde logo and sidebar -->
  	<?php include('layouts/menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  	<?php include('layouts/content_wraper.php'); ?>
  	<?php 
  		include('model/db.php');
  		$conn = db::open();

  		$roles = db::query($conn,"select * from roles");
  		//phan trang
  		$name_filter1 = isset($_GET['keyword'])? " where users.full_name like '%".$_GET['keyword']."%'" : "";
  		$role_id = isset($_GET['filter_role'])?(int)$_GET['filter_role']:0;
		$where1 = $role_id == 0 ? "":" and users.role = $role_id";
  		$count = db::query($conn,"SELECT count(*) as soluonguser FROM users $name_filter1 $where1");
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
		<form action="list_users.php" metdod="get" accept-charset="utf-8" class="form-inline col-sm-10" id="formfilter">
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
					<select name="filter_role" onchange="role_change()">
						<option value="0">All Users</option>
						<?php 
							$role_id = isset($_GET['filter_role'])?(int)$_GET['filter_role']:0;
							while($row_role = $roles->fetch_assoc()){
								$selected = $role_id == $row_role['id'] ? " selected" : "";
								echo "<option value=".$row_role['id']."".$selected." >".$row_role['role_name']."</option>";
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
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Role</th>
			<th><a href="add_users.php" class="btn btn-xs btn-success">Create</a></th>";
		</tr>
		<?php
			$name_filter = isset($_GET['keyword'])? " and users.full_name like '%".$_GET['keyword']."%'" : "";
			$where = $role_id == 0 ? "":" and users.role = $role_id";
			$sql = "select users.id,users.full_name,users.email,users.password,users.phone,users.address,roles.role_name as role from users ,roles where users.role = roles.id $where $name_filter ORDER BY users.id ASC LIMIT $numrows OFFSET $off";
			$users = db::query($conn,$sql);
			while ($row = $users->fetch_assoc()) {
				echo "<tr>
					<td>".$row['id']."</td>
					<td>".$row['full_name']."</td>
					<td>".$row['email']."</td>
					<td>".$row['phone']."</td>
					<td>".$row['address']."</td>
					<td>".$row['role']."</td>";
					if($_SESSION['role'] == 900){
						echo "
					<td><a href='edit_users.php?id=".$row['id']."' class='btn btn-xs btn-success'>Edit</a></td>";
					}
					
					echo"
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
				echo "<a href='list_users.php?curpage={$i}'>{$i}</a> &nbsp;";
			echo"</p>";
		}
	 ?>
	</div>
  <!-- /.content-wrapper -->
  	<?php include('layouts/footer.php'); ?>
