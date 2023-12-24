<?php
// session start
session_start();

// database connection
include "../database.php";

if (isset($_POST['search'])) {
    $search = $_POST['search'];

    $sql = "SELECT * FROM products WHERE productName LIKE '%$search%'";
    $result = mysqli_query($link, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<a href='/PHP-webshop/products/index.php?id=" . $row['productID'] . "'>
            <h3>" . $row['productName'] . "</h3></a>";
        }
    } else {
        echo "<div class='searchResult'>
        <h3>No results found</h3>
        </div>";
    }
}
