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
    <link rel="stylesheet" href="signup.css">
    <script src="signup.js"></script>
</head>

<body>

    <?php include '../include/header/header.php'; ?>

    <!-- sign up form -->
    <section class="signup">
        <div class="signupContainer">
            <h2>Sign up</h2>
            <form method="post" action="signup.php" onsubmit="return validate()">
                <!-- add firstname, lastname and address fields -->
                <input type="text" name="firstName" id="firstName" placeholder="First Name...">
                <p id="firstNameError" class="error">Please enter a valid first name</p>
                <input type="text" name="lastName" id="lastName" placeholder="Last Name...">
                <p id="lastNameError" class="error">Please enter a valid last name</p>
                <input type="text" name="address" id="address" placeholder="Address...">
                <p id="addressError" class="error">Please enter a valid address</p>
                <input type="email" name="email" id="email" placeholder="Email...">
                <p id="emailError" class="error">Please enter a valid email</p>
                <input type="password" name="password" id="password" placeholder="Password...">
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password...">
                <p id="passwordErrorShort" class="error">Password has to be 8 characters or longer</p>
                <p id="passwordErrorWrong" class="error">Passwords do not match</p>
                <button type="submit">Sign up</button>
            </form>
        </div>
    </section>

    <?php include '../include/footer/footer.php'; ?>

</body>

</html>