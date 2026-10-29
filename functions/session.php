<?php

//Start user session
function startSession($pdo){

if(!isset($_SESSION['user_id'])){
    return false;

}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("
    INSERT INTO user_sessions(
        user_id,
        session_start
    ) VALUES (
        :user_id,
        NOW()
    )
");


$stmt->execute([
    'user_id' => $user_id,
]);

return $pdo->lastInsertId();
}

//End User
function endSession($pdo){

if(!isset($_SESSION['user_id'])){
    return false;

}

$session_id = $_SESSION['session_id'];

$stmt = $pdo->prepare("
    UPDATE user_sessions
    SET 
        session_end = NOW(),
        session_duration = TIMESTAMPDIFF(
        SECOND,
        session_start, 
        NOW()
        )
    WHERE session_id = :session_id
");
 return $stmt->execute([
    'session_id' => $session_id,
]);
}

//Function check user for active session
function hasActiveUserSession($pdo, $user_id){
    $stmt = $pdo->prepare("
        SELECT session_id
        FROM user_sessions
        WHERE user_id = :user_id
        AND session_end IS NULL
        LIMIT 1
    ");

    $stmt->execute([
        'user_id' => $user_id
    ]);

    return (bool) $stmt->fetchColumn();
}
    
// Session Timeout
function checkSessionTimeout()
{
    global $pdo;

    // 10 seconds for testing
    $timeout = 10;

    // Check login time
    if (isset($_SESSION['login_time'])) {

        $elapsed_time = time() - $_SESSION['login_time'];

        if ($elapsed_time >= $timeout) {

            // End session in database
            endSession($pdo);

            // Destroy session
            session_unset();
            session_destroy();

            // Redirect to login page
            header('Location: ' . BASE_URL . '/index.php?timeout=1');
            exit;
        }
    }
}

?>