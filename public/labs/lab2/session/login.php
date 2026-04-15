<?php
session_start();

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

if ($login === 'Mark' && $password === '1') {
    $_SESSION['user'] = $login;
    header("Location: dashboard.php");
    exit;
} else {
    echo "Incorrect login or password. <a href='index.html'>Try again</a>";
}
?>
