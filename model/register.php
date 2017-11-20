<?php 
	include('db.php');
	$conn = db::open();
	session_start();
	if (isset($_POST['submit'])) {
		$name = mysql_escape_string($_POST['username']);
		$email = mysql_escape_string($_POST['email']);
		$phone = mysql_escape_string($_POST['phone']);
		$password = mysql_escape_string($_POST['password']);
		$pass = crypt($password,'$5$rounds=5000$eshop$');
		$address = mysql_escape_string($_POST['address']);
		$gender = mysql_escape_string($_POST['gender']) == 1 ? "Nam" : "Nữ";
		$sql = "insert into customer(name,gender,email,password,address,phone_number) values('{$name}', '{$gender}','{$email}','{$pass}','{$address}','{$phone}')";
		db::query($conn,$sql);
		header("Location: ../account.php");
	}
	if(isset($_POST['update'])){
		$id = mysql_escape_string($_POST['id']);
		$name = mysql_escape_string($_POST['username']);
		$email = mysql_escape_string($_POST['email']);
		$phone = mysql_escape_string($_POST['phone']);
		$password = mysql_escape_string($_POST['password']);
		$pass = crypt($password,'$5$rounds=5000$eshop$');
		$address = mysql_escape_string($_POST['address']);
		$gender = mysql_escape_string($_POST['gender']) == 1 ? "Nam" : "Nữ";
		$sql = "update customer set name = '{$name}',gender='{$gender}',email ='{$email}',password='{$pass}',address='{$address}',phone_number='{$phone}' where id = $id";
		db::query($conn,$sql);
		header("Location: ../logout.php");
	}
 ?>