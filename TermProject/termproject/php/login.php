<?php
require 'config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

 
    if ($user && password_verify($password, $user['password'])) {
      
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: dashboard.php');
        exit();
    } else {
        $loginError = 'Invalid username or password';
    }
}
?>

<?php include '../includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
    
</head>

<style>
        body {
            background-image: url("../pics/Tread.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
        }

</style> 

<body>
    <h2 style="color: white">Login</h2>
    <?php if (isset($loginError)): ?>
        <p><?php echo $loginError; ?></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="username" style="color: white">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password" style="color: white">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>

<footer class="footer">
        <p>&copy; 2024 Fitness Tracker</p>
</footer>

