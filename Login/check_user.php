<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db_host = "localhost";
    $db_name = "dbusers";
    $db_user = "admin";
    $db_pass = "admin";

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    $fname = $_POST['full_name'];
    $pass = $_POST['password'];

    if ($fname === 'admin' && $pass === 'admin') {
        header("Location: index_admin.html");
        exit();
    }

    $query = "SELECT * FROM login_info WHERE fname = :fname AND pass = :pass";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        header("Location: index.html");
        exit();
    } else {
        header("Location: login.html?error=1");
        exit();
    }
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}
?>
