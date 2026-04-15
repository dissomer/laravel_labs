<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['username']);
    setcookie("username", $name, time() + (7 * 24 * 60 * 60));
    header("Location: welcome.php");
    exit;
}
?>
