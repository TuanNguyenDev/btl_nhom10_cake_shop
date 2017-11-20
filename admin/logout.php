<?php
	include('Auth.php');
	session_start();
	Auth::logout();
	header("Location:login.php");
 ?>