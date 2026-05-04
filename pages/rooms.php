
<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}

include "../db/connection.php";

$sql = "SELECT * FROM rooms";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Odalar</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="navbar">
    <div class="nav-container">
        <div class="logo">Otel Sistemi</div>
        <div class="nav-links">
            <a href="rooms.php" class="active">Odalar</a>
            <a href="my_reservations.php">Rezervasyonlar</a>
            <a href="../logout.php">Çıkış</a>
        </div>
    </div>
</div>

<div class="hero">
    <h1>Konforlu Konaklama Deneyimi</h1>
    <p>Size en uygun odayı seçin ve rezervasyonunuzu kolayca oluşturun.</p>
</div>

<div class="search-box">
    <div>
        <span>Giriş</span>
        <b>Bugün</b>
    </div>

    <div>
        <span>Çıkış</span>
        <b>Yarın</b>
    </div>

    <div>
        <span>Misafir</span>
        <b>2 Yetişkin</b>
    </div>

    <button type="button">Oda Ara</button>
</div>

<p class="welcome-text">
    Hoşgeldin, <?php echo $_SESSION["user"]; ?>
</p>

<div class="container rooms">
    <h2>Oda Listesi</h2>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {

        $isAvailable = ($row["status"] == "boş" || $row["status"] == "Boş");
        $statusClass = $isAvailable ? "available" : "full";

        echo "<div class='room-card'>
                <div class='room-title'>Oda No: " . $row["room_number"] . "</div>
                <div class='room-info'><b>Tür:</b> " . $row["type"] . "</div>
                <div class='room-info'><b>Fiyat:</b> " . $row["price"] . " TL</div>
                <div class='room-status $statusClass'>Durum: " . $row["status"] . "</div>";

        if ($isAvailable) {
            echo "<a href='reservation.php?room_id=" . $row["id"] . "'>
                    <button class='reserve-btn'>Rezervasyon Yap</button>
                  </a>";
        } else {
            echo "<button class='reserve-btn' disabled>Dolu</button>";
        }

        echo "</div>";
    }
    ?>
</div>

</body>
</html>