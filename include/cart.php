<?php
session_start();

// Connect to the database
include 'database.php';

// check if the user is logged in
if (!isset($_SESSION['userID'])) {
    header("refresh:0;url=../login/index.php");
}

// Get the product ID
$id = $_POST['id'];

// Get the product from the database
$query = 'SELECT * FROM products WHERE productID = ' . $id;
$result = mysqli_query($link, $query);
$product = mysqli_fetch_assoc($result);

// Check if the product is already in the cart
$query = 'SELECT * FROM shoppingcart WHERE productID = ' . $id;
$result = mysqli_query($link, $query);
$cartProduct = mysqli_fetch_assoc($result);

if ($cartProduct) {
    // Update the quantity
    $query = 'UPDATE shoppingcart SET quantity = quantity + 1 WHERE productID = ' . $id;
    mysqli_query($link, $query);
} else {
    // Add the product to the cart
    $query = 'INSERT INTO shoppingcart (userID, productID, quantity) VALUES (' . $_SESSION['userID'] . ', ' . $id . ', 1)';
    mysqli_query($link, $query);
}

// Close connection
mysqli_close($link);

// Redirect to the products page
header("refresh:0;url=../products/index.php");