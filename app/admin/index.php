<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h1>hello Admin</h1>
     <a href="../auth/signout.php">Sign Out</a>
</body>
</html> -->
<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/functions.php';

requireRole('admin');

?>

<h1>Hello Admin</h1>

<p>
    Welcome,
    <?= htmlspecialchars($_SESSION['user_username']) ?>
</p>

<a href="<?= BASE_URL ?>auth/signout.php">
    Sign Out
</a>