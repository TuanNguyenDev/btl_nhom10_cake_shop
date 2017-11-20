<?php 
	include('Auth.php');
	//session_start();
	Auth::checkLogin();
 ?>
 <?php
	if(isset($_POST['login'])){
		include("Auth.php");
		session_start();
		$email = mysql_escape_string($_POST['email']);
        $password = mysql_escape_string($_POST['password']);
        Auth::login($email,$password);
	}
 ?>