<?php 
	include('Auth.php');
	session_start();
	Auth::checkLogin();
 ?>