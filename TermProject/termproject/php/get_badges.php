<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    exit();
}

$user_id = $_SESSION['user_id'];
$badges = getEarnedBadges($user_id);

echo json_encode($badges);

function getEarnedBadges($user_id) {
    $badges = [
        [
            'name' => 'Activity Streak',
            'description' => 'Logged activities for 7 consecutive days',
            'image' => '../pics/flame.jpeg'
        ],
        [
            'name' => 'Marathon Runner',
            'description' => 'Ran a total of 42 km',
            'image' => '../pics/Speed.jpg'
        ],
    ];

    return $badges;
}
?>
