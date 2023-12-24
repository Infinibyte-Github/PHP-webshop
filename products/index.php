<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronics Superstore</title>
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="products.css">
</head>

<body>

    <?php include '../include/header/header.php'; ?>

    <section class="products">
        <h2>Products</h2>

        <div class="productList">
            <?php
            include '../include/database.php';

            // Get all products from the database
            $query = 'SELECT * FROM products WHERE active = 1';
            $result = mysqli_query($link, $query);
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // check if a get request is made
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM products WHERE productID = $id";
                $result = mysqli_query($link, $query);
                $product = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // show the product
                echo '<div class="productCard">';
                echo '<img src="' . $product[0]['image'] . '" alt="' . $product[0]['productName'] . '">';
                echo '<h3>' . $product[0]['productName'] . '</h3>';
                echo '<p>' . $product[0]['description'] . '</p>';
                echo '<p>€ ' . $product[0]['price'] . '</p>';
                // add to cart button
                echo '<form action="../include/cart.php" method="post">';
                echo '<input type="hidden" name="id" value="' . $product[0]['productID'] . '">';
                echo '<input type="submit" value="Add to cart" class="btn">';
                echo '</form>';
                echo '</div>';
            } else {

                // Loop through the products and display them
                foreach ($products as $product) {
                    echo '<div class="productCard">';
                    echo '<img src="' . $product['image'] . '" alt="' . $product['productName'] . '">';
                    echo '<h3>' . $product['productName'] . '</h3>';
                    echo '<p>' . $product['description'] . '</p>';
                    echo '<p>€ ' . $product['price'] . '</p>';
                    // add to cart button
                    echo '<form action="../include/cart.php" method="post">';
                    echo '<input type="hidden" name="id" value="' . $product['productID'] . '">';
                    echo '<input type="submit" value="Add to cart" class="btn">';
                    echo '</form>';
                    echo '</div>';
                }
            }
            // Close connection
            mysqli_close($link);
            ?>
        </div>
        <!-- Add more product cards as needed -->
    </section>

    <?php include '../include/footer/footer.php'; ?>

</body>

</html>