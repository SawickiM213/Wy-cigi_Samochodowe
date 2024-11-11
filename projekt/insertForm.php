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
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <p>Nazwa<input type="text" name="nazwa" id="" value=""></p>
        <p>
            Kategoria: <select name="idKategorii">
                <?php
                $sql = "SELECT id, nazwa FROM kategorie";
                $result = $conn->query($sql);
                while ($row = $result->fetch_object()) {
                    echo "<option value='{$row->id}'>{$row->nazwa}</option>";
                }
                $conn->close();
                ?>
            </select>
        <p>Miejsce zbiórki<input type="text" name="zbiorka" id="" value=""></p>
        <p>Opis<textarea name="opis" id="" cols="30" rows="10" value=""></textarea></p>
        <p>Data <input type="date" name="data" id=""></p>
        <p>Obrazek: <input type="file" name="obrazek"></p>
        <input type="submit" value="zatwierdź">
        </form>
        <button><a href="index.php">Strona główna</a></button>
</body>

</html>