<?php
session_start();
include '../include/database.php';


// Function to validate email format
function isValidEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Function to register a new user
function registerUser($link, $firstName, $lastName, $address, $email, $password)
{
    $email = mysqli_real_escape_string($link, $email);

    // Use prepared statement to prevent SQL injection
    $query = "INSERT INTO users (firstName, lastName, address, email, password, active, admin) VALUES (?, ?, ?, ?, ?, 1, 0)";
    $stmt = mysqli_prepare($link, $query);

    // Hash the password for security
    $hashedPassword = md5($password);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $address, $email, $hashedPassword);

    // Execute query
    return mysqli_stmt_execute($stmt);
}

// Check if the form is submitted for registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input from the registration form
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate email and password
    $isValid = isValidEmail($email) && !empty($password);

    if ($isValid) {
        // Register the new user
        $registrationSuccess = registerUser($link, $firstName, $lastName, $address, $email, $password);

        if ($registrationSuccess) {
            // Successful registration
            echo "Registration successful! Welcome, {$email}!";

            // Set session variables
            $_SESSION['email'] = $email;
            $_SESSION['admin'] = 0;
            // Get the userID from the database
            $query = "SELECT userID FROM users WHERE email = '{$email}'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['userID'] = $row['userID'];

            // Redirect user to home page after 5 seconds
            header("refresh:5;url=../index.php");
        } else {
            // Registration failed
            echo "Registration failed. Please try again.";

            // Redirect user to registration page after 5 seconds
            header("refresh:5;url=../signup.php");
        }
    } else {
        // Invalid form data
        echo "Invalid form data. Please check your inputs and try again.";
    }
}

mysqli_close($link);
