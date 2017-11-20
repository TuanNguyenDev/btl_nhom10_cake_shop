<?php 
session_start();
include('model/db.php');
$conn = db::open();
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sl = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;
	$sql = "select * from products where id= $id";
	$result = $conn->query($sql);
	$data = $result->fetch_assoc();
	if(!empty($_SESSION["cart"])){
		$cart = $_SESSION["cart"];
		if (array_key_exists($id, $cart)) {
			$cart[$id] = array(
			"id"=> $id,
			"sl"=>(int)$cart[$id]["sl"]+$sl,
			"name" => $data['name'],
			"price" => (int)$data['unit_price'],
			"image" => $data['image'],
			"total_item" =>(int) $cart[$id]["total_item"]+$data['unit_price']
		);
		}else{
			$cart[$id] = array(
			"id"=> $id,
			"sl"=>$sl,
			"name" => $data['name'],
			"price" => $data['unit_price'],
			"image" => $data['image'],
			"total_item" => (int)$data['unit_price']
		);
		}
	}else{
		$cart[$id] = array(
			"id"=> $id,
			"sl"=>$sl,
			"name" => $data['name'],
			"price" => $data['unit_price'],
			"image" => $data['image'],
			"total_item" => (int)$data['unit_price'] * $sl
		);
	}
		$_SESSION["cart"] = $cart;
}else{
	echo "No id to add cart";
}
$tong = 0;
foreach ($cart as $key => $value) {
	$tong +=$value['total_item'];
}
$_SESSION["total"] = $tong;

header("location: index.php");
 ?>