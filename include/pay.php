<?php

// Start the session
session_start();

// Include the database connection
include 'database.php';

// Add the cart items to the order and orderlines table and clear the cart after that
$query = "SELECT * FROM shoppingcart WHERE userID = '{$_SESSION['userID']}'";
$result = mysqli_query($link, $query);

// Create a new order
$query = "INSERT INTO orders (userID, orderDate) VALUES ('{$_SESSION['userID']}', NOW())";
mysqli_query($link, $query);

// Get the orderID of the new order
$query = "SELECT * FROM orders WHERE userID = '{$_SESSION['userID']}' ORDER BY orderID DESC LIMIT 1";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$orderID = $row['orderID'];

// Add the cart items to the orderlines table
$query = "SELECT * FROM shoppingcart WHERE userID = '{$_SESSION['userID']}'";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $query = "INSERT INTO orderlines (orderID, productID, quantity) VALUES ('$orderID', '{$row['productID']}', '{$row['quantity']}')";
    mysqli_query($link, $query);
}

// Clear the cart
$query = "DELETE FROM shoppingcart WHERE userID = '{$_SESSION['userID']}'";
mysqli_query($link, $query);

// Close the database connection
mysqli_close($link);

// Display a message
echo "Your order has been placed. You will be redirected to the cart page in 3 seconds.";

// Redirect to the cart page
header("refresh:3; url=../cart/index.php")
?>