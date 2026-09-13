<?php

require_once __DIR__ . '/../../config.php';

$buttons = [
    'Login',
    'Logout',
    'Create Record',
    'Update Record',
    'Delete Record',
    'View Record',
    'Upload File',
    'Download File',
    'Search',
];

?>

<table border="1" cellpadding="10">
    <tr>
        <th>Action</th>
        <th>Test</th>
    </tr>

    <?php foreach ($buttons as $button): ?>
    <tr>
        <td><?= htmlspecialchars($button) ?></td>

        <td>
            <form method="post" action="test-logger.php">
                <input
                    type="hidden"
                    name="action"
                    value="<?= htmlspecialchars($button) ?>"
                >

                <button type="submit">Test</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>

</table>