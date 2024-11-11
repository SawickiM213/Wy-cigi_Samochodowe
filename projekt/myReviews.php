<?php
require("menu.php");

$login = $_SESSION['login'];

$sql = "SELECT r.ocena, r.tresc, r.data, w.nazwa, w.id AS idWyscig FROM recenzje r, wyscig w
WHERE w.id = idWyscig AND nick = '$login'";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moje Recenzje</title>
    <link rel="stylesheet" href="glowna.css">
</head>
<body>
    <h1>Moje Recenzje</h1>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_object()) {
            echo "<div class='review'>";
            echo "<p>{$row->ocena}</p> ";
            echo "<p>{$row->tresc}</p>";
            echo "<p>{$row->data}</p>";
            echo "<p>{$row->nazwa}</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Nie masz jeszcze żadnych recenzji.</p>";
    }
    ?>
</body>
</html>