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
    <link rel="stylesheet" href="cart.css">
</head>

<body>

    <?php include '../include/header/header.php'; ?>

    <!-- Overview of the user's shopping cart with a button to pay (and write the order to the database) -->
    <section class="cart">
        <div class="cartContainer">
            <h2>Shopping Cart</h2>
            <div class="cartInfo">
                <?php
                include '../include/database.php';

                // Get the user's data from the database
                $query = "SELECT * FROM shoppingcart WHERE userID = '{$_SESSION['userID']}'";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0) {
                    // for each item in the shopping cart
                    echo "<hr>";
                    $totalPrice = 0;

                    while ($row = mysqli_fetch_assoc($result)) {
                        // Get the product's data from the database
                        $query = "SELECT * FROM products WHERE productID = '{$row['productID']}'";
                        $result2 = mysqli_query($link, $query);
                        $row2 = mysqli_fetch_assoc($result2);

                        // Display the product's data
                        echo "<p>Product name: {$row2['productName']}</p>";
                        echo "<p>Price: €{$row2['price']}</p>";
                        echo "<p>Quantity: {$row['quantity']}</p>";
                        $subtotal = $row['quantity'] * $row2['price'];
                        echo "<p>Subtotal: €$subtotal</p>";
                        // remove 1 button
                        echo '<form action="../include/removeFromCart.php" method="post">';
                        echo '<input type="hidden" name="id" value="' . $row['productID'] . '">';
                        echo '<input type="submit" value="Remove 1" class="btn">';
                        echo '</form>';
                        echo "<hr>";

                        // Calculate the total price
                        $totalPrice += $subtotal;
                    }

                    // Display the total price
                    echo "<p>Total price: €$totalPrice</p>";

                    // Pay button
                    echo '<form action="../include/pay.php" method="post">';
                    echo '<input type="hidden" name="totalPrice" value="' . $totalPrice . '">';
                    echo '<input type="submit" value="Pay" class="btn">';
                    echo '</form>';

                    
                } else {
                    echo "<p>You have no items in your shopping cart.</p>";
                }

                // close database connection
                mysqli_close($link);
                ?>
            </div>
        </div>

    <?php include '../include/footer/footer.php'; ?>

</body>

</html>