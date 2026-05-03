<?php
include "db/connection.php";

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = hash("sha256", $_POST["password"]);

    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Kayıt başarılı";
    } else {
        echo "Hata: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
</head>
<body>

<h2>Kayıt Ol</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Kullanıcı adı" required><br><br>
    <input type="email" name="email" placeholder="E-posta" required><br><br>
    <input type="password" name="password" placeholder="Şifre" required><br><br>

    <button type="submit" name="register">Kayıt Ol</button>
</form>

</body>
</html>