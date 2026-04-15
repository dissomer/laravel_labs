<?php require 'config.php'; ?>

<form method="POST">
    Username:<br>
    <input name="username" placeholder="Enter username"><br><br>

    Email:<br>
    <input name="email" placeholder="Enter email"><br><br>

    Password:<br>
    <input name="password" type="password" placeholder="Enter password"><br><br>
    <button>Register</button>
</form>

<?php
if ($_POST) {

    $sql = "INSERT INTO users (username, email, password)
            VALUES (:u, :e, :p)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':u' => $_POST['username'],
        ':e' => $_POST['email'],
        ':p' => md5($_POST['password'])
    ]);

    echo "User created";
}
?>

<a href="login.php">Go to Login</a>
