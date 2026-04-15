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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab2: 4</title>
</head>
<body>
    <h2>Product List</h2>
    <ul>
        <li><a href="add_to_cart.php?item=Laptop">Laptop</a></li>
        <li><a href="add_to_cart.php?item=Phone">Phone</a></li>
        <li><a href="add_to_cart.php?item=Headphones">Headphones</a></li>
    </ul>

    <p><a href="cart.php">View Cart</a></p>

    <?php
    if (isset($_COOKIE['previous_purchases'])) {
        $previous = json_decode($_COOKIE['previous_purchases'], true);
        echo "<h3>Previous purchases:</h3><ul>";
        foreach ($previous as $item) {
            echo "<li>" . htmlspecialchars($item) . "</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
