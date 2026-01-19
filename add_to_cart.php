<?php
session_start();

// Retrieve product details from AJAX request
$productId = $_POST['productId'];
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$quantity = $_POST['quantity'];

// Store product details in session variable
if (!isset($_SESSION['cartItems'])) {
    $_SESSION['cartItems'] = array();
}

$_SESSION['cartItems'][$productId] = array(
    'productName' => $productName,
    'productPrice' => $productPrice,
    'quantity' => $quantity
);

echo "Product added to cart successfully";
?>
