<?php 
		include('db.php');
  		$conn = db::open();
  		session_start();
?>
<?php 
		if(isset($_POST['submit'])){
			$full_name= $_POST['full_name'];
			$email= $_POST['email'];
			$password= $_POST['password'];
			$pass = crypt($password,'$5$rounds=5000$eshop$');
			$phone= $_POST['phone'];
			$address= $_POST['address'];
			$role= $_POST['role'];
			if (isset($_POST['submit']))
                {
                    if (isset($_FILES['image']))
                    {
                        if ($_FILES['image']['error'] > 0)
                        {
                            echo 'File Upload Bị Lỗi';
                        }
                        else{
                        	$image='images/users/'.uniqid().'_'.$_FILES['image']['name'];
                        	$sql = "insert into users(full_name,email,password,phone,address,image,role) values('{$full_name}', '{$email}','{$pass}','{$phone}','{$address}','{$image}',{$role})";
							db::query($conn,$sql);
                            move_uploaded_file($_FILES['image']['tmp_name'], '../'.$image);
                            echo 'File Uploaded';
                        }
                    }
                    else{
                        echo 'Bạn chưa chọn file upload';
                    }
                }
			//
			$conn->close();
			header("Location:../list_users.php");
		}
	if (isset($_POST['sua'])) {
		$id = $_POST['id'];
		$role= $_POST['role'];
		$sql = "update users set role='{$role}' where id = $id";
		db::query($conn,$sql);
		
		$conn->close();
		header("Location:../list_users.php");
		# code...
	}
	if(isset($_POST['xoa'])){
		$file = $_POST['image_delete'];
		$id = $_POST['id'];
		$sql = "delete from users where id = $id";
		db::query($conn,$sql);
		unlink($file);
		$conn->close();
		header("Location:../list_users.php");
	}
	if (isset($_POST['edit'])) {
		$id = $_POST['id'];
		$full_name = $_POST['full_name'];
		$password = $_POST['password'];
		$pass = crypt($password,'$5$rounds=5000$eshop$');
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$file = $_POST['image_delete'];
		if($_SESSION['username'] == $email){
			$sql = "update users set full_name = '$full_name',password='$pass',phone ='$phone',address='$address'  where id = $id";
		}
		else
		{
			$sql = "update users set full_name = '$full_name',email = '$email',password='$pass',phone ='$phone',address='$address'  where id = $id";
		}
		if (isset($_FILES['image']))
        {
            if ($_FILES['image']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
            	$image='images/users/'.uniqid().'_'.$_FILES['image']['name'];
            	$sql1 = "update users set image='$image' where users.id = $id";
            	unlink($file);
				db::query($conn,$sql1);
                move_uploaded_file($_FILES['image']['tmp_name'], '../'.$image);
            }
        }
        else{
        }
		db::query($conn,$sql);
		
		$conn->close();
		session_destroy();
		header("Location:../login.php");
	}
?>