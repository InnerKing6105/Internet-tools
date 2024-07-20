<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id'])) {
        $activityId = $data['id'];

        // Prepare and execute the SQL DELETE statement
        $stmt = $pdo->prepare('DELETE FROM activities WHERE id = ?');
        $stmt->execute([$activityId]);

        // Check if deletion was successful
        if ($stmt->rowCount() > 0) {
            // Return success response
            echo json_encode(['success' => true]);
            exit();
        } else {
            // Return error response if no rows affected
            echo json_encode(['error' => 'No activity found with that ID']);
            exit();
        }
    } else {
        // Return error response if ID parameter is missing
        echo json_encode(['error' => 'ID parameter missing']);
        exit();
    }
} else {
    // Return error response for unsupported request methods
    echo json_encode(['error' => 'Unsupported request method']);
    exit();
}
?>
