<?php
session_start();

$timeout = 300; 
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
    session_unset();
    session_destroy();
    header('Location: timeout.html');
    exit();
}

$_SESSION['last_activity'] = time();

$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
</head>
<body>
    <h2>Your cart:</h2>
    <?php if ($cart): ?>
        <ul>
            <?php foreach ($cart as $item): ?>
                <li><?= htmlspecialchars($item) ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="clear_cart.php">Clear cart</a>
    <?php else: ?>
        <p>Cart is empty</p>
    <?php endif; ?>
    <p><a href="index.php">Come back to main page</a></p>
</body>
</html>
