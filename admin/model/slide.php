<?php 
	include('db.php');
	$conn = db::open();

 ?>
 <?php 
		if(isset($_POST['submit'])){
			$alt = $_POST['alt'];
			
			if (isset($_FILES['image']))
                    {
                        if ($_FILES['image']['error'] > 0)
                        {
                            echo 'File Upload Bị Lỗi';
                        }
                        else{
                        	$image= uniqid().'_'.$_FILES['image']['name'];
                        	$sql = "insert into slide(alt,image) values('{$alt}', '{$image}')";
							db::query($conn,$sql);
                            move_uploaded_file($_FILES['image']['tmp_name'], '../images/slide/'.$image);
                        }
                    }
            else{
                echo 'Bạn chưa chọn file upload';
            }
			$conn->close();
			header("Location:../list_slide.php");
		}
	if (isset($_POST['sua'])) {
		$id = $_POST['id'];
		$alt = $_POST['alt'];
		$file = $_POST['image_delete'];
		

		if(isset($_FILES['image'])){
			$image= $_FILES['image']['name'];
			if ($_FILES['image']['error'] > 0)
            {
                $sql = "update slide set alt='{$alt}' where id = $id";
            }
            else{
            	$image= uniqid().'_'.$_FILES['image']['name'];
                $sql = "update slide set alt='{$alt}',image='$image' where id = $id";
                move_uploaded_file($_FILES['image']['tmp_name'], '../images/slide/'.$image);
                unlink($file);
                echo 'File Uploaded';
            }
		}else{
			$sql = "update slide set alt='{$alt}' where id = $id";
		}
		
		db::query($conn,$sql);
		
		$conn->close();
		header("Location:../list_slide.php");
	}
	if(isset($_POST['xoa'])){
		$file = $_POST['image_delete'];
		$id = $_POST['id'];
		$sql = "delete from slide where id = $id";
		db::query($conn,$sql);
		unlink($file);
		$conn->close();
		header("Location:../list_slide.php");
	}
?>