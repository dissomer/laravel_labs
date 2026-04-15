<?php
session_start();

if (!isset($_GET['item'])) {
    header("Location: index.php");
    exit;
}

$item = $_GET['item'];

$_SESSION['cart'][] = $item;

$previous = isset($_COOKIE['previous_purchases']) 
    ? json_decode($_COOKIE['previous_purchases'], true) 
    : [];

$previous[] = $item;

setcookie('previous_purchases', json_encode($previous), time() + (30 * 24 * 60 * 60));

header("Location: index.php");
exit;
?>
