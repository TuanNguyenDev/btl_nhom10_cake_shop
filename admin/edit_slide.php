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
  		$slide = db::query($conn,"select * from slide where slide.id =".$_GET['id']);
		$row = $slide->fetch_assoc();
	 ?>
	<div class="col-sm-12">
		<form action="model/slide.php" method="post" accept-charset="utf-8" novalidate enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$row['id']?>">
			<div class="form-group">
				<label for="name">Alt</label>
				<input value="<?= $row['alt']?>" type="text" id="alt" name="alt" class="form-control" placeholder="Alt">
			</div>
			<div class="form-group">
				<label for="name">Image</label>
				<input type="file" name="image" class="form-control">
			</div>
			<input type="hidden" name="image_delete" class="form-control" value="<?= $row['image']?>">
			<div class="text-center">
				<input type="submit" value="Sửa" name="sua" class="btn btn-success"  onclick="return validate()">
				<input type="submit" value="Xóa" name="xoa" class="btn btn-success">
				<a href="list_slide.php" class="btn btn-warning">Cancel</a>
			</div>
		</form>
	</div>
<!-- /.content-wrapper -->
<?php include('layouts/footer.php'); ?>
<script type="text/javascript">
	function validate(){
		var alt = document.getElementById("alt").value;
		var image = document.getElementById("image").value;
		if (alt == "") {
			alert("Hãy nhập alt");
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
</script>