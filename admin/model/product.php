<?php
 include('db.php');
 $conn= db::open();
 ?>
<?php 
	if(isset($_POST['submit'])){
			$name= $_POST['name'];
			$id_type= $_POST['id_type'];
			$description= $_POST['description'];
			$unit_price= $_POST['unit_price'];
			$promotion_price= $_POST['promotion_price'];
			
			$unit= $_POST['unit'];
			if (isset($_FILES['image']))
                    {
                        if ($_FILES['image']['error'] > 0)
                        {
                            echo 'File Upload Bị Lỗi';
                        }
                        else{
                        	$image='uploads/'.uniqid().'_'.$_FILES['image']['name'];
                        	$sql = "insert into products(name,id_type,description,unit_price,promotion_price,image,unit) values('{$name}', {$id_type},'{$description}',{$unit_price},{$promotion_price},'{$image}','{$unit}')";
							db::query($conn,$sql);
                            move_uploaded_file($_FILES['image']['tmp_name'], '../'.$image);
                        }
                    }
            else{
                echo 'Bạn chưa chọn file upload';
            }
			$conn->close();
			header("Location:../list_product.php");
	}
	if (isset($_POST['sua'])) {
		$id = $_POST['id'];
		$name= $_POST['name'];
		$id_type= $_POST['id_type'];
		$description= $_POST['description'];
		$unit_price= $_POST['unit_price'];
		$promotion_price= $_POST['promotion_price'];
		$unit= $_POST['unit'];
		$file = $_POST['image_delete'];
		if (isset($_FILES['image']))
                    {
                        if ($_FILES['image']['error'] > 0)
                        {
                            $sql = "update products set name='{$name}',id_type='{$id_type}',description='{$description}',unit_price='{$unit_price}',promotion_price='{$promotion_price}',unit='{$unit}' where id = $id";
                        }
                        else{
                        	$image='uploads/'.uniqid().'_'.$_FILES['image']['name'];
			                $sql = "update products set name='{$name}',id_type={$id_type},description='{$description}',unit_price={$unit_price},promotion_price={$promotion_price},image='{$image}',unit='{$unit}' where id = $id";
			                move_uploaded_file($_FILES['image']['tmp_name'], '../'.$image);
			                unlink($file);
			                echo 'File Uploaded';
                        }
                    }
            else{
                $sql = "update products set name='{$name}',id_type='{$id_type}',description='{$description}',unit_price='{$unit_price}',promotion_price='{$promotion_price}',unit='{$unit}' where id = $id";
            }
		/*if (isset($_FILES['image']))
            {
                if ($_FILES['image']['error'] > 0)
                {
                    echo 'File Upload Bị Lỗi';
                }
                else{
            	$image='uploads/'.uniqid().'_'.$_FILES['image']['name'];
                $sql = "update products set name='{$name}',id_type={$id_type},description='{$description}',unit_price={$unit_price},promotion_price={$promotion_price},image='{$image}',unit='{$unit}' where id = $id";
                move_uploaded_file($_FILES['image']['tmp_name'], '../'.$image);
                unlink($file);
                echo 'File Uploaded';
            }
		}else{
			$sql = "update products set name='{$name}',id_type='{$id_type}',description='{$description}',unit_price='{$unit_price}',promotion_price='{$promotion_price}',unit='{$unit}' where id = $id";
		}*/
		
		db::query($conn,$sql);
		
		$conn->close();
		header("Location:../list_product.php");
		
		# code...
	}
	if(isset($_POST['xoa'])){
		$file = $_POST['image_delete'];
		$id = $_POST['id'];
		$sql = "delete from products where id = $id";
		db::query($conn,$sql);
		unlink($file);
		$conn->close();
		header("Location:../list_product.php");
	}
?>