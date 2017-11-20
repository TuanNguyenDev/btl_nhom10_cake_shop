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
  		$type_products = db::query($conn,"select * from type_products where type_products.id =".$_GET['id']);
		$row = $type_products->fetch_assoc();
	 ?>
	<div class="col-sm-12">
		<form action="model/type.php" method="post" accept-charset="utf-8" novalidate enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$row['id']?>">
			<input type="hidden" name="entity_type" value="500">
			<div class="form-group">
				<label for="name">Name</label>
				<input value="<?= $row['name']?>" type="text" id="name" name="name" class="form-control" placeholder="Product Name">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" class="form-control" id="description"><?= $row['description']?></textarea>
			</div>
			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" name="image" class="form-control">
			</div>
			<input type="hidden" name="image_delete" class="form-control" value="<?= $row['image']?>">
			<div class="text-center">
				<input type="submit" value="Sửa" name="sua" class="btn btn-success" onclick="return validate()">
				<input type="submit" value="Xóa" name="xoa" class="btn btn-success">
				<a href="list_type.php" class="btn btn-warning">Cancel</a>
			</div>
		</form>
	</div>
<!-- /.content-wrapper -->
<?php include('layouts/footer.php'); ?>
<script type="text/javascript">
	function validate(){
		var name = document.getElementById("name").value;
		var image = document.getElementById("image").value;
		if (name == "") {
			alert("Hãy nhập name");
			return false;
		}
		if (image == "") {
			alert("Hãy chọn một ảnh");
			return false;
		}
		return true;
	}
	$('#submit').click( function() {
   //kiem tra trinh duyet co ho tro File API
    if (window.File && window.FileReader && window.FileList && window.Blob)
    {
      // lay dung luong va kieu file tu the input file
        var fsize = $('#image')[0].files[0].size;
        var ftype = $('#image')[0].files[0].type;
        var fname = $('#image')[0].files[0].name;
 
       switch(ftype)
        {
            case 'image/png':
            case 'image/gif':
            case 'image/jpeg':
            case 'image/pjpeg':
                alert("Acceptable image file!");
                break;
            default:
                alert('Unsupported File!');
        }
 
    }else{
        alert("Please upgrade your browser, because your current browser lacks some new features we need!");
    }
});
// ckeditor('description');
</script>