<?php
// Relative path to root config file: 2 levels up from auth/
require_once __DIR__ . '/../config/config.php';

$_SESSION = [];
session_destroy();

header('Location: ' . BASE_URL . 'index.php');
exit;
?>