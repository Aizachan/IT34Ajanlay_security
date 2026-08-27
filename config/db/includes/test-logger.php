<?php

require_once __DIR__ . '/../../config.php';

$user_id = "root";
$user_email = "root";

$action = $_POST['action'] ?? 'test_activity';

$status = random_int(0, 1) === 1 ? 'success' : 'failed';

$success = logActivity(
    $pdo,
    $user_id,
    $user_email,
    $action,
    $status
);

if ($success) {
    echo "Activity: " . htmlspecialchars($action) .
         " | Status: " . htmlspecialchars($status) .
         " | Activity log inserted successfully.";
} else {
    echo "Failed to insert activity log.";
}

?>