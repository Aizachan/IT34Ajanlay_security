<<?php
session_start();

//define(''.'');
define('BASE_URL', 'http://localhost/IT34ALAB'); 

define('DB_HOST', 'localhost');
define('DB_NAME', 'it34a_lab_db'); 
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     echo ("Connetion to the database was successful.");
//     echo($user_id, $user_email, 'Database connection established', 'success');
//    logActivity($pdo,$user_id . $user_email . 'Database connection established', 'success');

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
