<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare('SELECT goals.*, 
                      (SELECT SUM(duration_minutes) FROM activities WHERE activities.user_id = goals.user_id AND activities.date BETWEEN goals.start_date AND goals.end_date) AS current_value 
                      FROM goals WHERE user_id = ?');
$stmt->execute([$user_id]);
$goals = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode(['goals' => $goals]);
?>
