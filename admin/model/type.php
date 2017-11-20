
<?php 
    include('db.php');
    $conn = db::open();

 ?>
 <?php 
		if(isset($_POST['submit'])){
			$name= $_POST['name'];
			$description= $_POST['description'];
			
			if (isset($_FILES['image']))
                    {
                        if ($_FILES['image']['error'] > 0)
                        {
                            echo 'File Upload Bị Lỗi';
                        }
                        else{
                            $image=uniqid().'_'.$_FILES['image']['name'];
                        	$sql = "insert into type_products(name,description,image) values('{$name}','{$description}','{$image}')";
							db::query($conn,$sql);
                            move_uploaded_file($_FILES['image']['tmp_name'], '../images/type/'.$image);
                        }
                    }
            else{
                echo 'Bạn chưa chọn file upload';
            }
			$conn->close();
            header("Location: ../list_type.php");
		}

    if (isset($_POST['sua'])) {
        $id = $_POST['id'];
        $name= $_POST['name'];
        $description= $_POST['description'];
        //$file = $_POST['image_delete'];
        if(isset($_FILES['image'])){
            if ($_FILES['image']['error'] > 0)
                        {
                            $sql = "update type_products set name='{$name}',description='{$description}' where id = $id";
                        }
                        else{
                            $image=uniqid().'_'.$_FILES['image']['name'];
                            $sql = "update type_products set name='{$name}',description='{$description}',image='{$image}' where id = $id";
                            move_uploaded_file($_FILES['image']['tmp_name'], '../images/type/'.$image);
                            //unlink($file);
                            echo 'File Uploaded';
                        }
        }else{
            $sql = "update type_products set name='{$name}',description='{$description}' where id = $id";
        }
        
        db::query($conn,$sql);
        
        $conn->close();
        header("Location: ../list_type.php");
    }
    if(isset($_POST['xoa'])){
        $id = $_POST['id'];
        $sql = "select count(*) as soluong from products where products.id_type = $id";
        $count = db::query($conn,$sql);
        $result = $count->fetch_assoc();
        $soluong = $result['soluong'];
        if($soluong!=0){
            echo "<label for=\"name\">Loại sản phẩm đang được dùng nên không thể xóa</label>";
            echo "<a href=\"../list_type.php\" class=\"btn btn-warning\">Cancel</a>";
            exit();
        }
        else{
            $file = $_POST['image_delete'];
            $sql = "delete from type_products where id = $id";
            db::query($conn,$sql);
            unlink($file);
            $conn->close();
        }
        header("Location:../list_type.php");
    }
?>