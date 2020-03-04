<?php
// Add the selected item to the cart
// Convert comma separated list of cart items to array, add item and remake list
session_start();
	if(isset($_GET['code']) & !empty($_GET['code'])){
               if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
                	$items = $_SESSION['cart'];
                	$cartitems = explode(",", $items);
                	$items .= "," . $_GET['code'];
                	$_SESSION['cart'] = $items;
                	header('location: index.php?status=success');
                }else{
                	$items = $_GET['code'];
                	$_SESSION['cart'] = $items;
                	header('location: index.php?status=success');
                }
	}else{
		header('location: index.php?status=failed');
	}
?>