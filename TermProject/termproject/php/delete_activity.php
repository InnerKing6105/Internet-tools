<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id'])) {
        $activityId = $data['id'];

        
        $stmt = $pdo->prepare('DELETE FROM activities WHERE id = ?');
        $stmt->execute([$activityId]);

        
        if ($stmt->rowCount() > 0) {
        
            echo json_encode(['success' => true]);
            exit();
        } else {
            
            echo json_encode(['error' => 'No activity found with that ID']);
            exit();
        }
    } else {
        
        echo json_encode(['error' => 'ID parameter missing']);
        exit();
    }
} else {
    
    echo json_encode(['error' => 'Unsupported request method']);
    exit();
}
?>
