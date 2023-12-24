<?php

// change the admin status of a user
session_start();

// Get the user ID from the form
$id = $_POST['id'];

// Connect to the database
include './database.php';

// Get the user from the database
$query = 'SELECT * FROM users WHERE userID = ' . $id;
$result = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($result);

// If the user is an admin, make them a regular user
if ($user['admin'] == 1) {
    $query = 'UPDATE users SET admin = 0 WHERE userID = ' . $id;
    mysqli_query($link, $query);
    mysqli_close($link);
    header("refresh:0; url=../admin/index.php");
}

// If the user is a regular user, make them an admin
if ($user['admin'] == 0) {
    $query = 'UPDATE users SET admin = 1 WHERE userID = ' . $id;
    mysqli_query($link, $query);
    // close the connection
    mysqli_close($link);
    header("refresh:0; url=../admin/index.php");
}
?>