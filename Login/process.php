<?php
$dsn = 'mysql:host=localhost;dbname=dbusers';
$username = 'admin';
$password = 'admin';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $birth_date = $_POST['birth_date'];
    $classification = $_POST['classification'];

    $sql = "INSERT INTO login_info (fname, email, pass, bday, type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$full_name, $email, $password, $birth_date, $classification]);

    header('Location: index.html');
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>