<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare('SELECT * FROM activities WHERE user_id = ? ORDER BY date DESC');
$stmt->execute([$user_id]);
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode(['activities' => $activities]);
?>


