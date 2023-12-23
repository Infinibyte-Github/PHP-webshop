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
    <link rel="stylesheet" href="login.css">
    <script src="login.js"></script>
</head>

<body>

    <?php include '../include/header/header.php'; ?>

    <!-- login form -->
    <section class="login">
        <div class="loginContainer">
            <h2>Log in</h2>
            <form action="login.php" method="post" onsubmit="return validate()">
                <input type="email" name="email" id="email" placeholder="Email...">
                <p id="emailError" class="error">Please enter a valid email</p>
                <input type="password" name="password" id="password" placeholder="Password...">
                <p id="passwordError" class="error">Please enter a valid password</p>
                <button type="submit">Login</button>
            </form>
        </div>
    </section>

    <?php include '../include/footer/footer.php'; ?>

</body>

</html>