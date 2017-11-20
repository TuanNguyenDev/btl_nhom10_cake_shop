<?php 
	class Auth{	
		public static function login($email,$password){
			include_once('model/db.php');
			$conn = db::open();
			$pass = crypt($password,'$5$rounds=5000$eshop$');
			$sql = "select * from customer where email = '$email' and password = '$pass'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			if($row['id'] == NULL)
			{
				//return false;
				echo "Invalid username or password";
			}
			else{
				
				$_SESSION['id'] = $row['id'];
				$_SESSION['email'] = $email;
				$_SESSION['name'] = $row['name'];
				$_SESSION['gender'] = $row['gender'];
				$_SESSION['password'] = $password;
				$_SESSION['phone_number'] = $row['phone_number'];
				$_SESSION['address'] = $row['address'];
				//return true;
				header("Location:index.php");
			}
		}
		public static function checkLogin(){
			if(!isset($_SESSION['email'])){
				header("Location:login.php");
			}
		}
		public static function logout(){
			session_destroy();
		}
		
	}
 ?>