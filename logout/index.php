<?php
// Destroy the session
session_start();
session_destroy();

// Display a message to the user
echo "You have been logged out. Redirecting to the home page...";

// Redirect to the home page
header("refresh:3;url=../index.php");
?>