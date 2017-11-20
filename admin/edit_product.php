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
  		$product = db::query($conn,"select * from products where products.id =".$_GET['id']);
		$row = $product->fetch_assoc();
  		$type_products = db::query($conn,"select * from type_products");
  		
	 ?>
	<div class="col-sm-12">
		<form action="model/product.php" method="post" accept-charset="utf-8" novalidate enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$row['id']?>">
			<div class="form-group">
				<label for="name">Name</label>
				<input value="<?= $row['name']?>" type="text" id="name" name="name" class="form-control" placeholder="Product Name">
			</div>
			<div class="form-group">
				<label for="promotion_price">Id_type</label>
				<select name="id_type" class="form-control">
					
					<?php 
						while($type_product = $type_products->fetch_assoc()){
							$selected = $row['id_type'] == $type_product['id'] ? " selected" : "";
							echo "<option value=".$type_product['id']."".$selected." >".$type_product['name']."</option>";
						}
					?>										
						
				</select>
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" class="form-control" id="description"><?= $row['description']?></textarea>
			</div>

			<div class="form-group">
				<label for="address">Unit_price</label>
				<input value="<?= $row['unit_price']?>" type="text" value="" name="unit_price" class="form-control" placeholder="unit_price"  onkeypress="return keyPhone(event);">
			</div>
			<div class="form-group">
				<label for="address">Promotion_price</label>
				<input value="<?= $row['promotion_price']?>" type="text" value="" name="promotion_price" class="form-control" placeholder="promotion_price"  onkeypress="return keyPhone(event);">
			</div>
			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" name="image" class="form-control">
			</div>
			<div class="form-group">
				<label for="address">Unit</label>
				<input value="<?= $row['unit']?>" type="text" value="" name="unit" class="form-control" placeholder="unit">
			</div>
			<input type="hidden" name="image_delete" class="form-control" value="<?= $row['image']?>">
			<div class="text-center">
				<input type="submit" value="Sửa" name="sua" class="btn btn-success" onclick="return validate()">
				<input type="submit" value="Xóa" name="xoa" class="btn btn-success">
				<a href="list_product.php" class="btn btn-warning">Cancel</a>
			</div>
		</form>
	</div>
<!-- /.content-wrapper -->
<?php include('layouts/footer.php'); ?>
<script type="text/javascript">
	function validate(){
		var name = document.getElementById("name").value;
		var unit_price = document.getElementById("unit_price").value;
		var promotion_price = document.getElementById("promotion_price").value;
		var image = document.getElementById("image").value;
		var unit = document.getElementById("unit").value;
		if (name == "") {
			alert("Hãy nhập name");
			return false;
		}
		if (unit_price == "") {
			alert("Hãy nhập unit_price");
			return false;
		}
		if (unit == "") {
			alert("Hãy nhập unit");
			return false;
		}
		if (image == "") {
			alert("Hãy nhập image");
			return false;
		}
		if (promotion_price == "") {
			alert("Hãy nhập promotion_price");
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
	function keyPhone(e)
{
var keyword=null;
    if(window.event)
    {
    keyword=window.event.keyCode;
    }else
    {
        keyword=e.which; //NON IE;
    }
    
    if(keyword<48 || keyword>57)
    {
        if(keyword==48 || keyword==127)
        {
            return ;
        }
        return false;
    }
}
</script>