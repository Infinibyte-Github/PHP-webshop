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
    <link rel="stylesheet" href="editProduct.css">
</head>

<body>

    <?php include '../include/header/header.php'; ?>

    <!-- page to edit a product -->
    <section class="admin">
        <div class="adminContainer">
            <h2>Edit product</h2>
            <div class="adminInfo">
                <?php
                include '../include/database.php';

                // Get the product ID from the URL
                $id = $_POST['id'];

                // Get the product from the database
                $query = 'SELECT * FROM products WHERE productID = ' . $id;
                $result = mysqli_query($link, $query);
                $product = mysqli_fetch_assoc($result);

                // Display the form to edit the product
                echo '<form class="productCard" action="../include/editProduct.php" method="post">';
                echo '<input type="hidden" name="id" value="' . $product['productID'] . '">';
                echo '<label for="name">Name</label><br>';
                echo '<input type="text" name="name" id="name" value="' . $product['productName'] . '"><br>';
                echo '<label for="price">Price</label><br>';
                echo '<input type="text" name="price" id="price" value="' . $product['price'] . '"><br>';
                echo '<label for="stock">Stock</label><br>';
                echo '<input type="text" name="stock" id="stock" value="' . $product['stock'] . '"><br>';
                echo '<label for="description">Description</label><br>';
                echo '<input type="text" name="description" id="description" value="' . $product['description'] . '"><br>';
                echo '<label for="image">Image</label><br>';
                echo '<input type="text" name="image" id="image" value="' . $product['image'] . '"><br>';
                echo '<input type="submit" value="Edit product" class="btn"><br>';
                echo '</form>';

                // Close connection
                mysqli_close($link);
                ?>
            </div>
        </div>
    </section>

    <?php include '../include/footer/footer.php'; ?>

</body>

</html>