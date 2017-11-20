<?php 
session_start();
include('model/db.php');
if (isset($_GET['id_cart'])) {
	$id = $_GET['id_cart'];
	foreach ($_SESSION["cart"] as $key => $value) {

		if ($id == $key) {
			unset($_SESSION["cart"][$id]);
		}
	}
}else{
	echo "Bạn không thể truy cập trang này";
}
header("location: cart.php");
 ?>
