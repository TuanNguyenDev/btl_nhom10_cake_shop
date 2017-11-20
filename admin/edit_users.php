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
  		$users = db::query($conn,"select * from users where users.id =".$_GET['id']);
		$role_id_row = $users->fetch_assoc();
  		$roles = db::query($conn,"select * from roles");
	 ?>
	<div class="col-sm-12">
		<form action="model/users.php" method="post" accept-charset="utf-8" novalidate enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$role_id_row['id']?>">
			<input type="hidden" name="entity_type" value="500">
			<div class="form-group">
				<label for="name">Full Name</label>
				<input value="<?= $role_id_row['full_name']?>" type="text" id="name" name="full_name" class="form-control" placeholder="Product Name" disabled>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input id="email" type="text" value="<?= $role_id_row['email']?>" name="email" class="form-control" placeholder="Email" disabled>
			</div>
			<div class="form-group">
				<label for="description">Phone</label>
				<input value="<?= $role_id_row['phone']?>" type="text" name="phone" class="form-control" placeholder="Phone" disabled>
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input value="<?= $role_id_row['address']?>" type="text" value="" name="address" class="form-control" placeholder="Address" disabled>
			</div>
			<div class="form-group">
				<label for="promotion_price">Role</label>
				<select name="role" class="form-control">
					
					<?php 
						while($row_role = $roles->fetch_assoc()){
							$selected = $role_id_row['role'] == $row_role['id'] ? " selected" : "";
							echo "<option value=".$row_role['id']."".$selected." >".$row_role['role_name']."</option>";
						}
					?>										
						
				</select>
			</div>
			<input type="hidden" name="image_delete" class="form-control" value="<?= $role_id_row['image']?>">
			<div class="text-center">
				<input type="submit" value="Sửa" name="sua" class="btn btn-success">
				<input type="submit" value="Xóa" name="xoa" class="btn btn-success">
				<a href="list_users.php" class="btn btn-warning">Cancel</a>
			</div>
		</form>
	</div>
<!-- /.content-wrapper -->
<?php include('layouts/footer.php'); ?>