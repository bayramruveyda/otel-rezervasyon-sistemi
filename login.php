<?php
session_start();
include "db/connection.php";

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = hash("sha256", $_POST["password"]);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION["user"] = $email;
        echo "Giriş başarılı";
    } else {
        echo "Hatalı giriş";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Giriş</title>
</head>
<body>

<h2>Giriş Yap</h2>

<form method="POST">
    <input type="email" name="email" placeholder="E-posta" required><br><br>
    <input type="password" name="password" placeholder="Şifre" required><br><br>
    <button type="submit" name="login">Giriş Yap</button>
</form>

</body>
</html>