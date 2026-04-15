<?php
$username = $_COOKIE['username'] ?? null;
?>

<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Welcome</title></head>
<body>
<?php if ($username): ?>
    <h2>Hi, <?= htmlspecialchars($username) ?>!</h2>
    <a href="delete_cookie.php">Delete cookie</a>
<?php else: ?>
    <p>Name is not set. <a href="index.html">Try again</a></p>
<?php endif; ?>
</body>
</html>
