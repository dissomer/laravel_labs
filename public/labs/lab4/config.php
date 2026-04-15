<?php
session_start();

$host = "postgres";
$dbname = "users_db";
$user = "laravel-getting-started-user";
$pass = "laravel-getting-started-password";

$pdo = new PDO(
    "pgsql:host=$host;dbname=$dbname",
    $user,
    $pass
);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
