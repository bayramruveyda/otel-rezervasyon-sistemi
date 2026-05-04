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
        header("Location: pages/rooms.php");
        exit();
    } else {
        $error = "E-posta veya şifre hatalı!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-page">

<div class="auth-card">
    <div class="auth-left">
        <h1>Otel Rezervasyon Sistemi</h1>
        <p>Uygun odaları görüntüle, rezervasyon yap ve rezervasyonlarını kolayca yönet.</p>
    </div>

    <div class="auth-right">
        <h2>Giriş Yap</h2>

        <?php
        if (isset($error)) {
            echo "<p class='error-message'>$error</p>";
        }
        ?>

        <form method="POST">
            <input type="email" name="email" placeholder="E-posta" required>
            <input type="password" name="password" placeholder="Şifre" required>
            <button type="submit" name="login">Giriş Yap</button>
        </form>

        <p class="auth-link">
            Hesabın yok mu? <a href="register.php">Kayıt Ol</a>
        </p>
    </div>
</div>

</body>
</html>