<?php

session_start();

include '../include/database.php';

// Function to validate email format
function isValidEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Function to authenticate user against the database
function authenticateUser($link, $email, $password)
{
    $email = mysqli_real_escape_string($link, $email);

    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM users WHERE email=? AND password=?";
    $stmt = mysqli_prepare($link, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);

    // Execute query
    mysqli_stmt_execute($stmt);

    // Bind results
    mysqli_stmt_bind_result($stmt, $userID, $firstName, $lastName, $address, $email, $password, $active, $admin);

    // Fetch the result
    $result = mysqli_stmt_fetch($stmt);

    // Check if the user exists
    if ($result) {
        // User exists
        // Set session variables
        $_SESSION['email'] = $email;
        $_SESSION['admin'] = $admin;
        $_SESSION['userID'] = $userID;

        return true;
    } else {
        // User does not exist or invalid credentials
        return false;
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input from the form
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate email and password
    $isValid = isValidEmail($email) && !empty($password);

    if ($isValid) {
        // Hash the password for security
        $hashedPassword = md5($password);

        // Authenticate user against the database
        if (authenticateUser($link, $email, $hashedPassword)) {
            // Successful login
            echo "Login successful! Welcome, {$email}!";

            // Redirect user to home page after 5 seconds
            header("refresh:3;url=../index.php");
        } else {
            // Invalid credentials
            echo "Invalid email or password. Please try again.";

            // Redirect user to login page after 5 seconds
            header("refresh:3;url=index.php");
        }
    } else {
        // Invalid form data
        echo "Invalid form data. Please check your inputs and try again.";
    }
}

mysqli_close($link);
