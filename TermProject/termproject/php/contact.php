<?php include '../includes/header.php'; ?>
<h1 style="color: white">Contact</h1>
<form action="contact.php" method="post">
    <label for="name" style="color: white">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="email" style="color: white">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="message" style="color: white" >Message:</label>
    <textarea id="message" name="message" required></textarea>
    <button type="submit">Send</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'config.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $pdo->prepare('INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)');
    $stmt->execute([$name, $email, $message]);

    echo '<p>Message sent!</p>';
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
    <title> Contact </title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<footer class="footer">
        <p>&copy; 2024 Fitness Tracker</p>
</footer>