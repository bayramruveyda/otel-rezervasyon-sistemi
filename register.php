<?php
include "db/connection.php";

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = hash("sha256", $_POST["password"]);

    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        $success = "Kayıt başarılı! Giriş yapabilirsiniz.";
    } else {
        $error = "Hata: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-page">

<div class="auth-card">

    <div class="auth-left">
        <h1>Otel Rezervasyon Sistemi</h1>
        <p>Hemen kayıt ol ve rezervasyon yapmaya başla.</p>
    </div>

    <div class="auth-right">
        <h2>Kayıt Ol</h2>

        <?php
        if (isset($success)) {
            echo "<p class='success-message'>$success</p>";
        }
        if (isset($error)) {
            echo "<p class='error-message'>$error</p>";
        }
        ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Kullanıcı adı" required>
            <input type="email" name="email" placeholder="E-posta" required>
            <input type="password" name="password" placeholder="Şifre" required>

            <button type="submit" name="register">Kayıt Ol</button>
        </form>

        <p class="auth-link">
            Zaten hesabın var mı? <a href="login.php">Giriş Yap</a>
        </p>
    </div>

</div>

</body>
</html>