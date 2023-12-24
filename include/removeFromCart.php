<?php

// remove 1 from the quantity of the product in the shopping cart
session_start();

// Connect to the database
include 'database.php';

// Get the product ID
$id = $_POST['id'];

// remove 1 from the quantity or delete the product from the shopping cart if the quantity is 1

// Get the product from the database
$query = "SELECT * FROM shoppingcart WHERE productID = $id";
$result = mysqli_query($link, $query);
$product = mysqli_fetch_assoc($result);

// if the quantity is 1, delete the product from the shopping cart
if ($product['quantity'] == 1) {
    $query = "DELETE FROM shoppingcart WHERE productID = $id";
    mysqli_query($link, $query);
}

// if the quantity is more than 1, remove 1 from the quantity
if ($product['quantity'] > 1) {
    $query = "UPDATE shoppingcart SET quantity = quantity - 1 WHERE productID = $id";
    mysqli_query($link, $query);
}

// Close connection
mysqli_close($link);

// Redirect to the cart page
header("refresh:0;url=../cart/index.php");