<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $activity_type = $_POST['activity_type'];
    $duration = $_POST['duration'];
    $distance = $_POST['distance'];
    $intensity = $_POST['intensity'];
    $notes = $_POST['notes'];
    $date = $_POST['date'];

    $stmt = $pdo->prepare('INSERT INTO activities (user_id, activity_type, duration_minutes, distance_km, intensity, notes, date) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$user_id, $activity_type, $duration, $distance, $intensity, $notes, $date]);

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>
