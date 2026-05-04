<?php
session_start();
include "../db/connection.php";

$room_id = $_GET["room_id"];
$user_email = $_SESSION["user"];

// kullanıcı id çek
$user_sql = "SELECT * FROM users WHERE email='$user_email'";
$user_result = mysqli_query($conn, $user_sql);
$user = mysqli_fetch_assoc($user_result);
$user_id = $user["id"];

// oda bilgisi
$sql = "SELECT * FROM rooms WHERE id='$room_id'";
$result = mysqli_query($conn, $sql);
$room = mysqli_fetch_assoc($result);

// rezervasyon yapma
if (isset($_POST["reserve"])) {
    $date = date("Y-m-d");

    $insert = "INSERT INTO reservations (user_id, room_id, date)
               VALUES ('$user_id', '$room_id', '$date')";

    mysqli_query($conn, $insert);

    echo "<p style='color:green;'>Rezervasyon yapıldı!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rezervasyon</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Rezervasyon Yap</h2>

    <p><b>Oda No:</b> <?php echo $room["room_number"]; ?></p>
    <p><b>Tür:</b> <?php echo $room["type"]; ?></p>
    <p><b>Fiyat:</b> <?php echo $room["price"]; ?> TL</p>

    <form method="POST">
        <button name="reserve">Onayla</button>
    </form>

</div>

</body>
</html>