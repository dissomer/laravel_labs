<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit;
}

$user = htmlspecialchars($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>User</title></head>
<body>
    <h2>Hi, <?= $user ?>!</h2>
    <a href="logout.php">Log out</a>
</body>
</html>
