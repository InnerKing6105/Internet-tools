<?php include '../includes/header.php'; ?>
<h1 style="color: white">Sign Up</h1>
<form action="signup.php" method="post">
    <label for="username" style="color: white">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="password" style="color: white" >Password:</label>
    <input type="password" id="password" name="password" required>
    <label for="email" style="color: white">Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Sign Up</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'config.php';

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $stmt = $pdo->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)');
    $stmt->execute([$username, $password, $email]);

    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<style>
        body {
            background-image: url("../pics/Tread.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
        }

</style> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign Up </title>
    <link rel="stylesheet" href="../css/style.css">

</head>

<footer class="footer">
        <p>&copy; 2024 Fitness Tracker</p>
</footer>