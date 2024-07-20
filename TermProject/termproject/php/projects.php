<?php include '../includes/header.php'; ?>
<h1 style="color: white">Projects</h1>
<?php
require 'config.php';
$stmt = $pdo->query('SELECT * FROM projects');
while ($row = $stmt->fetch()) {
    echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
    echo '<p>' . htmlspecialchars($row['description']) . '</p>';
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
    <title> Projects </title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body> 
<p><a href="https://github.com/InnerKing6105">Visit My GitHub for More Projects!</a></p>
<p><a href="https://www.youtube.com/@randomthingz9631">Visit My Youtube for Project Showcases!</a></p>
</body>

<footer class="footer">
        <p>&copy; 2024 Fitness Tracker</p>
</footer>