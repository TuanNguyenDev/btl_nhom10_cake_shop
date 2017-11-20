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
  		$contacts = db::query($conn,"select * from contacts where contacts.id =".$_GET['id']);
		$row = $contacts->fetch_assoc();
	 ?>
	<div class="col-sm-12">
		<form  method="post" accept-charset="utf-8" novalidate enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$row['id']?>">
			<div class="form-group">
				<label for="name">Tên</label>
				<input value="<?= $row['name']?>" type="text" id="name" name="name" class="form-control" placeholder="Name">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input value="<?= $row['email']?>" type="text" id="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Tiêu đề</label>
				<input type="text" id="subject" name="subject" class="form-control" placeholder="Subject">
			</div>
			<div class="form-group">
				<label for="description">Nội dung</label>
				<textarea name="description" class="form-control" id="description"></textarea>
			</div>
			<div class="text-center">
				<input type="submit" value="Send" name="submit" class="btn btn-success">
				<a href="list_customer.php" class="btn btn-warning">Cancel</a>
			</div>
		</form>
	</div>
	<?php 
		include('../mail/send.php');
	    if(isset($_POST['submit'])){
	        $to = isset($_POST['email'])? $_POST['email'] : "khong co";
	        $from = 'lukirito15@gmail.com';
	        $from_name = 'ESHOP';
	        $subject = isset($_POST['subject'])? $_POST['subject'] : "khong co";
	        $body = $_POST['description'];
	        if(smtpmailer($to,$from,$from_name,$subject,$body)){
	        	echo "<h3>Đã gửi thành công</h3>";
	        }else{
	        	echo "<h3>Gửi gặp lỗi</h3>";
	        }
	    }
	 ?>
<!-- /.content-wrapper -->
<?php include('layouts/footer.php'); ?>
