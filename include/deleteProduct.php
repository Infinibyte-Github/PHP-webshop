<?php

// set the active status of the product to 0
session_start();

// Get the product ID from the form
$id = $_POST['id'];

// Connect to the database
include './database.php';

// Set the active status of the product to 0
$query = 'UPDATE products SET active = 0 WHERE productID = ' . $id;
mysqli_query($link, $query);

// Close the connection
mysqli_close($link);

// Redirect to the admin page
header("refresh:0; url=../admin/index.php");
?>