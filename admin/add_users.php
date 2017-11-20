<?php ob_start(); ?>
<?php 
	include('checklog.php');
	if($_SESSION['role'] != 900){
		header("Location:index.php");
	}
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
		<form action="model/users.php" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Full Name</label>
				<input type="text" id="name" name="full_name" class="form-control" placeholder="Product Name">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input id="email" type="text" value="" name="email" class="form-control" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="type_product">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="description">Phone</label>
				<input type="text" name="phone" class="form-control" placeholder="Phone">
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" value="" name="address" class="form-control" placeholder="Address">
			</div>
			<div class="form-group">
				<label for="address">Image</label>
				<input type="file" value="" name="image" class="form-control" placeholder="Image">
			</div>
			<div class="form-group">
				<label for="promotion_price">Role</label>
				<select name="role" class="form-control">
					
					<?php 
						while($row_role = $roles->fetch_assoc()){
							echo "<option value=".$row_role['id']." >".$row_role['role_name']."</option>";
						}
					?>										
						
				</select>
			<div class="text-center">
				<input type="submit" name="submit" class="btn btn-success" value="Submit">
				<a href="list_users.php" class="btn btn-warning">Cancel</a>
			</div>
		</form>
	</div>
	
<!-- /.content-wrapper -->

<?php include('layouts/footer.php'); ?>
<?php ob_end_flush();?>