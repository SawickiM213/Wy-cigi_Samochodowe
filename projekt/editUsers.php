<?php
require("menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uzytkownicy</title>
    <link rel="stylesheet" href="glowna.css">
</head>
<body>
    <?php
    $sql = "SELECT id, login, email,data,rola FROM uzytkownicy";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
        while ($row = $result->fetch_object()) {
            echo "<tr>";
            echo "<td>{$row->login}</td>";
            echo "<td>{$row->email}</td>";
            echo "<td>{$row->rola}</td>";
            echo "<td><a href='editForm.php?id={$row->id}'>edytuj</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Brak wyników</p>";
    }
    ?>
</body>
</html>