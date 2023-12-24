<?php

// edit the product in the database
session_start();

// Get the product ID from the form
$id = $_POST['id'];

// Connect to the database
include './database.php';

// update the product in the database
$query = 'UPDATE products SET productName = "' . $_POST['name'] . '", price = ' . $_POST['price'] . ', stock = ' . $_POST['stock'] . ', description = "' . $_POST['description'] . '", image = "' . $_POST['image'] . '" WHERE productID = ' . $id;
mysqli_query($link, $query);

// Close the connection
mysqli_close($link);

// Redirect to the admin page
header("refresh:0; url=../admin/index.php");