<?php
require 'config.php';

function getUserById($user_id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$user_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getProjectById($project_id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM projects WHERE id = ?');
    $stmt->execute([$project_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getContactMessageById($message_id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM contact_messages WHERE id = ?');
    $stmt->execute([$message_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deleteActivityById($activity_id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare('DELETE FROM activities WHERE id = ?');
        $stmt->execute([$activity_id]);
        return true;
    } catch (PDOException $e) {
        echo "Error deleting activity: " . $e->getMessage();
        return false;
    }
}

if (isset($_GET['delete_id'])) {
    $activity_id = $_GET['delete_id'];
    if (deleteActivityById($activity_id)) {
        echo "Activity deleted successfully.";
    } else {
        echo "Failed to delete activity.";
    }
}
?>
