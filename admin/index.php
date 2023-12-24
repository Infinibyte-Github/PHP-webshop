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
    <link rel="stylesheet" href="admin.css">
</head>

<body>

    <?php include './include/header/header.php'; ?>

    <!-- admin page that allows to change the admin value of a user, and add, edit and delete products-->
    <section class="admin">
        <div class="adminContainer">
            <h2>Admin</h2>
            <div class="adminInfo">
                <?php
                include './include/database.php';

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
                    echo '<form action="./include/changeAdmin.php" method="post">';
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

    <?php include './include/footer/footer.php'; ?>

</body>

</html>