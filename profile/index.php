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
    <link rel="stylesheet" href="profile.css">
</head>

<body>

    <?php include '../include/header/header.php'; ?>


    <!-- profile overview of logged in user (get data from database using the userID) -->
    <section class="profile">
        <div class="profileContainer">
            <h2>Profile</h2>
            <div class="profileInfo">
                <?php
                include '../include/database.php';

                // Get the user's data from the database
                $query = "SELECT * FROM users WHERE userID = '{$_SESSION['userID']}'";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_assoc($result);

                // Display the user's data
                echo "<p>First name: {$row['firstName']}</p>";
                echo "<p>Last name: {$row['lastName']}</p>";
                echo "<p>Address: {$row['address']}</p>";
                echo "<p>Email: {$row['email']}</p>";

                // close database connection
                mysqli_close($link);
                ?>
            </div>
        </div>

        <?php include '../include/footer/footer.php'; ?>

</body>

</html>