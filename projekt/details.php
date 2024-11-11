<?php
require("menu.php");
$id = $_GET['id'];
$idUzytkownika = $_SESSION["login"];
$sql1 = "SELECT id FROM ulubione WHERE idWyscig = $id AND idUzytkownika = $idUzytkownika";
$added = $conn->query($sql1);
$text = $added ? "Usuń z ulubionych" : "Dodaj do ulubionych";
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szczegóły</title>
    <link rel="stylesheet" href="glowna.css">
</head>

<body>
    <?php
    $sql = "SELECT idKategorii, k.nazwa AS nazwaKat, w.nazwa, zbiorka, data, obrazek,opis FROM wyscig w, kategorie k WHERE w.id = $id AND idKategorii=k.id";
    $result = $conn->query($sql);
    if ($row = $result->fetch_object()) {
        echo "<img src='obrazki/{$row->obrazek}' width='200'>";
        echo "<h1>{$row->nazwa}</h1>";
        echo "<p> Miejsce zbiórki: $row->zbiorka</p>";
        echo "<p> Data zbiórki: $row->data</p>";
        echo "<p>Opis: $row->opis</p>";
        $text = $added ? "usun.png" : "dodaj.jpg";
    ?><p class='fav' data-wyscig='<?= $id ?>'>
            <img src='<?= $text ?>' alt='<?= $text ?>' width="50">
        </p><?php
            if ($_SESSION['rola'] === 'admin') {
                echo "<form action='deleteRace.php' method='post' onsubmit='return confirm(\"Czy na pewno chcesz usunąć ten wyścig?\");'>";
                echo "<input type='hidden' name='id' value='{$id}'>";
                echo "<input type='submit' value='Usuń wyścig'>";
                echo "</form>";
                echo "<a href='editRace.php?id=$id'>edytuj </a>";
            }
        } else {
            echo "Wyscig o podanym ID nie istnieje.";
        }

            ?>
    <form action="insertReview.php" method="post">
        <input type="hidden" name="idWyscig" id="idWyscig" readonly value="<?= $id ?>">
        <input type="text" name="nick" id="nick" readonly value="<?= $_SESSION['login'] ?>">
        <input type="number" name="ocena" id="ocena">
        <input type="text" name="tresc" id="tresc">
        <input type="submit" value="Dodaj">
        <?php
        $sql = "SELECT nick, ocena, tresc, data FROM recenzje WHERE idWyscig=$id";
        $res = $conn->query($sql);
        while ($row = $res->fetch_object()) {
            echo "<p>$row->nick $row->ocena $row->tresc</p>";
        }
        ?>

    </form>
    <?php
    require("footer.php");
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>