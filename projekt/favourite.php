<?php
require("menu.php");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ulubione wyścigi</title>
    <link rel="stylesheet" href="glowna.css">

</head>
<body>
    <h1>Ulubione wyścigi</h1>

    <?php
    $idUzytkownika = $_SESSION["id"];
    $sql = "SELECT w.id, w.nazwa 
            FROM wyscig w
            JOIN ulubione u ON w.id = u.idWyscig
            WHERE u.idUzytkownika = $idUzytkownika";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
        while ($row = $result->fetch_object()) {
            echo "<tr>";
            echo "<td><a href='details.php?id={$row->id}'>{$row->nazwa}</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Brak wyników</p>";
    }
    ?>
    <?php
    require("footer.php");
    ?>
</body>
</html>