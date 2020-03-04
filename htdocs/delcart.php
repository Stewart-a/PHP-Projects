<?php 
// Remove the selected item from the cart
// Convert comma separated list of items in cart to array, remove item and remake list
session_start();
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);

if(isset($_GET['remove']) & (!empty($_GET['remove'] || $_GET['remove'] == "0"))){
        $delitem = $_GET['remove'];
	unset($cartitems[$delitem]);
	$itemids = implode(",", $cartitems);
	$_SESSION['cart'] = $itemids;
}
header('location:cart.php');