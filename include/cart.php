<?php

// function to add a product to the cart in the database based on the ID
function addToCart($id)
{
    // Connect to the database
    include 'database.php';

    // Get the product from the database
    $query = 'SELECT * FROM products WHERE productID = ' . $id;
    $result = mysqli_query($link, $query);
    $product = mysqli_fetch_assoc($result);

    // Check if the product is already in the cart
    $query = 'SELECT * FROM cart WHERE productID = ' . $id;
    $result = mysqli_query($link, $query);
    $cartProduct = mysqli_fetch_assoc($result);

    if ($cartProduct) {
        // Update the quantity
        $query = 'UPDATE cart SET quantity = quantity + 1 WHERE productID = ' . $id;
        mysqli_query($link, $query);
    } else {
        // Add the product to the cart
        $query = 'INSERT INTO cart (productID, productName, price, quantity) VALUES (' . $id . ', "' . $product['productName'] . '", ' . $product['price'] . ', 1)';
        mysqli_query($link, $query);
    }

    // Close connection
    mysqli_close($link);
}