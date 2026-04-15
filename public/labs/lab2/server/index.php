<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: redirect.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Lab2: 3</title></head>
<body>
    <h2>Requested info:</h2>
    <ul>
        <li><strong>IP client:</strong> <?= $_SERVER['REMOTE_ADDR'] ?></li>
        <li><strong>Browser:</strong> <?= $_SERVER['HTTP_USER_AGENT'] ?></li>
        <li><strong>Script</Script>:</strong> <?= $_SERVER['PHP_SELF'] ?></li>
        <li><strong>Method:</strong> <?= $_SERVER['REQUEST_METHOD'] ?></li>
        <li><strong>File path:</strong> <?= $_SERVER['SCRIPT_FILENAME'] ?></li>
    </ul>
</body>
</html>
