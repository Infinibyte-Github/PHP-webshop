<?php
// FILEPATH: /c:/xampp/htdocs/Webshop/include/database.php
$host = "localhost";
$user = "Webuser";
$password = "Lab2021";
$database = "webshop";

try {
    $link = mysqli_connect($host, $user, $password);
    if (!$link) {
        throw new Exception("Error: no connection can be made to the host");
    }
    
    $db_selected = mysqli_select_db($link, $database);
    if (!$db_selected) {
        throw new Exception("Error: no connection can be made to the database");
    }
} catch (Exception $e) {
    echo "<script>alert(" + $e->getMessage() + ");</script>";
}
