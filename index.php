<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronics Superstore</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <?php include './include/header/header.php'; ?>

    <section class="welcome">
        <h2>Welcome to Electronics Superstore</h2>
        <p>Explore the latest in technology and find the perfect electronics for your needs.</p>
        <a href="./products.php" class="btn">Shop Now</a>
    </section>

    <section class="featuredProducts">
        <h2>Featured Products</h2>
        <div class="productList">
            <?php
            include './include/database.php';

            // display 3 random products
            $query = 'SELECT * FROM products ORDER BY RAND() LIMIT 3';
            $result = mysqli_query($link, $query);
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Loop through the products and display them
            foreach ($products as $product) {
                echo '<div class="productCard">';
                echo '<img src="' . $product['image'] . '" alt="' . $product['productName'] . '">';
                echo '<h3>' . $product['productName'] . '</h3>';
                echo '<p>' . $product['description'] . '</p>';
                echo '<p>€ ' . $product['price'] . '</p>';
                // add to cart button
                echo '<form action="<?php echo $_SERVER[\'PHP_SELF\']; ?>" method="post">';
                echo '<input type="hidden" name="id" value="' . $product['productID'] . '">';
                echo '<input type="submit" value="Add to cart" class="btn">';
                echo '</div>';
            }

            // Close connection
            mysqli_close($link);

            if (isset($_POST['id'])) {
                // Add product to cart
                include './include/cart.php';
                addToCart($_POST['id']);
            }
            ?>
        </div>
        <!-- Add more product cards as needed -->
    </section>

    <?php include './include/footer/footer.php'; ?>

</body>

</html>