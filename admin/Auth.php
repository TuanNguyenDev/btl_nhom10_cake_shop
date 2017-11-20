<?php 
	class Auth{	
		public static function login($username,$password){
			include_once('model/db.php');
			$conn = db::open();
			$pass = crypt($password,'$5$rounds=5000$eshop$');
			$sql = "select * from users where email = '$username' and password = '$pass'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			if($row['id'] == NULL)
			{
				return false;
			}
			else{
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $username;
				$_SESSION['full_name'] = $row['full_name'];
				$_SESSION['password'] = $password;
				$_SESSION['phone'] = $row['phone'];
				$_SESSION['address'] = $row['address'];
				$_SESSION['image'] = $row['image'];
				$_SESSION['role'] = $row['role'];
				return true;
				
			}
		}
		public static function checkLogin(){
			if(!isset($_SESSION['username'])){
				header("Location:login.php");
			}
		}
		public static function logout(){
			session_destroy();
		}
	}
 ?>