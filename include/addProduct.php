<?php

// add a product to the database
session_start();

// Connect to the database
include './database.php';

// Add the product to the database
$query = 'INSERT INTO products (productName, price, stock, description, image, active) VALUES ("' . $_POST['name'] . '", ' . $_POST['price'] . ', ' . $_POST['stock'] . ', "' . $_POST['description'] . '", "' . $_POST['image'] . '", 1)';
mysqli_query($link, $query);

// Close the connection
mysqli_close($link);

// Redirect to the admin page
header("refresh:0; url=../admin/index.php");