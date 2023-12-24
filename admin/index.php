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
    <link rel="stylesheet" href="admin.css">
</head>

<body>

    <?php include '../include/header/header.php'; ?>

    <!-- admin page that allows to change the admin value of a user, and add, edit and delete products-->
    <section class="admin">
        <div class="adminContainer">
            <h2>Admin</h2>
            <div class="adminInfo">
                <?php
                include '../include/database.php';

                // Get all users from the database
                $query = 'SELECT * FROM users';
                $result = mysqli_query($link, $query);
                $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Loop through the users and display them
                foreach ($users as $user) {
                    echo '<div class="userCard">';
                    echo '<p>First name: ' . $user['firstName'] . '</p>';
                    echo '<p>Last name: ' . $user['lastName'] . '</p>';
                    echo '<p>Address: ' . $user['address'] . '</p>';
                    echo '<p>Email: ' . $user['email'] . '</p>';
                    echo '<p>Admin: ' . $user['admin'] . '</p>';
                    // change admin button
                    echo '<form action="../include/changeAdmin.php" method="post">';
                    echo '<input type="hidden" name="id" value="' . $user['userID'] . '">';
                    echo '<input type="submit" value="Change admin" class="btn">';
                    echo '</form>';
                    echo '</div>';
                }

                // Close connection
                mysqli_close($link);
                ?>
            </div>
        </div>

        <div class="adminContainer">
            <h2>Products</h2>
            <div class="adminInfo">
                <?php
                include '../include/database.php';

                // Get all products from the database
                $query = 'SELECT * FROM products WHERE active = 1';
                $result = mysqli_query($link, $query);
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Loop through the products and display them
                foreach ($products as $product) {
                    echo '<div class="productCard">';
                    echo '<p>Name: ' . $product['productName'] . '</p>';
                    echo '<p>Price: ' . $product['price'] . '</p>';
                    echo '<p>Stock: ' . $product['stock'] . '</p>';
                    echo '<p>Description: ' . $product['description'] . '</p>';
                    echo '<p>Image: ' . $product['image'] . '</p>';
                    // edit product button
                    echo '<form action="../editProduct/index.php" method="post">';
                    echo '<input type="hidden" name="id" value="' . $product['productID'] . '">';
                    echo '<input type="submit" value="Edit product" class="btn">';
                    echo '</form>';
                    // delete product button
                    echo '<form action="../include/deleteProduct.php" method="post">';
                    echo '<input type="hidden" name="id" value="' . $product['productID'] . '">';
                    echo '<input type="submit" value="Delete product" class="btn">';
                    echo '</form>';
                    echo '</div>';
                }

                // Close connection
                mysqli_close($link);
                ?>
            </div>
        </div>

        <div class="adminContainer2">
            <h2>Add product</h2>
            <div class="adminInfo">
                <form class="addProduct" action="../include/addProduct.php" method="post">
                    <label for="name">Name:</label><br>
                    <input type="text" name="name" id="name" required><br>
                    <label for="price">Price:</label><br>
                    <input type="number" name="price" id="price" required><br>
                    <label for="stock">Stock:</label><br>
                    <input type="number" name="stock" id="stock" required><br>
                    <label for="description">Description:</label><br>
                    <input type="text" name="description" id="description" required><br>
                    <label for="image">Image:</label><br>
                    <input type="text" name="image" id="image" required><br>
                    <input type="submit" value="Add product" class="btn">
                </form>
            </div>
        </div>
    </section>

    <?php include '../include/footer/footer.php'; ?>

</body>

</html>