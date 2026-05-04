<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}
?>
<?php
session_start();
include "../db/connection.php";

$user_email = $_SESSION["user"];

$user_sql = "SELECT * FROM users WHERE email='$user_email'";
$user_result = mysqli_query($conn, $user_sql);
$user = mysqli_fetch_assoc($user_result);
$user_id = $user["id"];

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];

    $getRoom = mysqli_query($conn, "SELECT room_id FROM reservations WHERE id='$id' AND user_id='$user_id'");
    $r = mysqli_fetch_assoc($getRoom);

    if ($r) {
        $room_id = $r["room_id"];

        mysqli_query($conn, "UPDATE rooms SET status='boş' WHERE id='$room_id'");
        mysqli_query($conn, "DELETE FROM reservations WHERE id='$id' AND user_id='$user_id'");
    }

    header("Location: my_reservations.php");
    exit();
}

$sql = "SELECT reservations.*, rooms.room_number, rooms.type, rooms.price 
        FROM reservations 
        JOIN rooms ON reservations.room_id = rooms.id
        WHERE reservations.user_id='$user_id'";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rezervasyonlarım</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="navbar">
    <div class="nav-container">
        <div class="logo">Otel Sistemi</div>
        <div class="nav-links">
            <a href="rooms.php">Odalar</a>
            <a href="my_reservations.php" class="active">Rezervasyonlar</a>
            <a href="../logout.php">Çıkış</a>
        </div>
    </div>
</div>

<div class="container rooms">
    <h2>Rezervasyonlarım</h2>

    <?php
    if (mysqli_num_rows($result) == 0) {
        echo "<p style='text-align:center;'>Henüz rezervasyonunuz yok.</p>";
    }

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='room-card'>
                <div class='room-title'>🏨 Oda No: " . $row["room_number"] . "</div>
                <div class='room-info'><b>Tür:</b> " . $row["type"] . "</div>
                <div class='room-info'><b>Fiyat:</b> " . $row["price"] . " TL</div>
                <div class='date-badge'>📅 " . $row["date"] . "</div>

                <a href='my_reservations.php?delete=" . $row["id"] . "'>
                    <button class='delete-btn'>İptal Et</button>
                </a>
              </div>";
    }
    ?>

</div>

</body>
</html>