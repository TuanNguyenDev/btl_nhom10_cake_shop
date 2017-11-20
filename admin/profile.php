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
		$conn = db::open();
  		$roles = db::query($conn,"select * from roles");
	 ?>
	<div class="col-sm-12">
		<form action="model/users.php" method="post" accept-charset="utf-8" novalidate enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$_SESSION['id']?>">
			<div class="form-group">
				<label for="name">Full Name</label>
				<input value="<?= $_SESSION['full_name']?>" type="text" id="name" name="full_name" class="form-control" placeholder="Product Name" >
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input id="email" type="text" value="<?= $_SESSION['username']?>" name="email" class="form-control" placeholder="Email" >
			</div>
			<div class="form-group">
				<label for="email">Password</label>
				<input id="email" type="password" value="<?= $_SESSION['password']?>" name="password" class="form-control" placeholder="Email" >
			</div>
			<div class="form-group">
				<label for="description">Phone</label>
				<input value="<?= $_SESSION['phone']?>" type="text" name="phone" class="form-control" placeholder="Phone" >
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input value="<?= $_SESSION['address']?>" type="text" value="" name="address" class="form-control" placeholder="Address" >
			</div>
			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" name="image">
			</div>
			<div class="form-group">
				<label for="promotion_price">Role</label>
				<select name="role" class="form-control" disabled>
					
					<?php 
						while($row_role = $roles->fetch_assoc()){
							$selected = $_SESSION['role'] == $row_role['id'] ? " selected" : "";
							echo "<option value=".$row_role['id']."".$selected." >".$row_role['role_name']."</option>";
						}
					?>										
						
				</select>
			</div>
			<input type="hidden" name="image_delete" class="form-control" value="<?= $_SESSION['image']?>">
			<div class="text-center">
				<input type="submit" value="Sửa" name="edit" class="btn btn-success">
				<input type="submit" value="Xóa" name="xoa" class="btn btn-success">
				<a href="index.php" class="btn btn-warning">Cancel</a>
			</div>
		</form>
	</div>
<!-- /.content-wrapper -->
<?php include('layouts/footer.php'); ?>