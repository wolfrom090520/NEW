<?php
// Define your database credentials
$db_host = "localhost";
$db_name = "dbusers";
$db_user = "admin";
$db_pass = "admin";

try {
    // Create a PDO connection to the database
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    echo "Database connection established successfully!";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>
