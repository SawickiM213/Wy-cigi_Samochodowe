<?php
require("menu.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="glowna.css">
</head>

<body>
<form>
        <p>
            <input type="text" name="fraza">
            <input type="submit" value="Wyszukaj">
        </p>
    </form>
    <?php
    $sql = "SELECT id,nazwa,data ,obrazek, zbiorka FROM wyscig";
    if (isset($_GET["fraza"])) {
        $fraza = $_GET["fraza"];
        $sql .= " WHERE nazwa LIKE '%$fraza%'";
    }
    $result = $conn->query($sql);
    ?>
    <div class="hero">
        <div class="hero-content">
            <h1>Dołącz do adrenaliny!</h1>
            <p>Najbliższe wyścigi już wkrótce.</p>
        </div>
    </div>
    <div class="upcoming-races">
        <h2>Nadchodzące wyścigi</h2>
        <div class="nadchodzace">
        <?php
         if ($result->num_rows > 0) {
        echo "<div class='race-card'>";
        while ($row = $result->fetch_object()) {
            echo "<div class='race'>";
            echo "<img src='obrazki/{$row->obrazek}' width='100'>";
            echo "<h3>$row->nazwa</h3>";
            echo "<p>Data:$row->data</p>";
            echo "<p>Miejsce:$row->zbiorka</p>";
            echo "<a href='details.php?id={$row->id}' class='race-button'>Szczegóły</a>";
            echo "</div>";
        }
            echo "</div>";
         }
        ?>
        </div>
    </div>
    <?php
    require("footer.php");
    ?>
</body>

</html>