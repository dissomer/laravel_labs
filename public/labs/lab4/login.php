<?php require 'config.php'; ?>

<form method="POST">
    Username:<br>
    <input name="username" placeholder="Enter username"><br><br>

    Password:<br>
    <input name="password" type="password" placeholder="Enter password"><br><br>
    <button>Login</button>
</form>

<?php
if ($_POST) {

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :u");
    $stmt->execute([':u' => $_POST['username']]);

    $user = $stmt->fetch();

    if ($user && $user['password'] === md5($_POST['password'])) {

        $_SESSION['user'] = $user['username'];

        header("Location: welcome.php");
        exit;

    } else {
        echo "Wrong login";
    }
}
?>
