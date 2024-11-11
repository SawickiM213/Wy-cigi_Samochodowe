<?php
require("menu.php");

// Sprawdzenie, czy użytkownik jest administratorem
if ($_SESSION['rola'] !== 'admin') {
    die("Brak uprawnień do wykonania tej operacji.");
}

// Pobranie danych wyścigu do edycji
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT nazwa, zbiorka, data, opis FROM wyscig WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else {
    die("Nieprawidłowe żądanie.");
}

// Zapisanie zmienionych danych po wysłaniu formularza
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nazwa =$_POST['nazwa'];
    $zbiorka = $_POST['zbiorka'];
    $data = $_POST['data'];
    $opis = $_POST['opis'];

    $sql = "UPDATE wyscig SET nazwa = '$nazwa', zbiorka = '$zbiorka', data = '$data', opis = '$opis' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Wyścig został pomyślnie zaktualizowany.</p>";
        header("Location: details.php?id=$id");
        exit();
    } else {
        echo "<p>Błąd podczas aktualizacji wyścigu: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Wyścig</title>
    <link rel="stylesheet" href="glowna.css">
</head>
<body>
    <h1>Edytuj Wyścig</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="nazwa">Nazwa wyścigu:</label>
        <input type="text" name="nazwa" id="nazwa" value="<?= $row['nazwa'] ?>" >
        
        <label for="zbiorka">Miejsce zbiórki:</label>
        <input type="text" name="zbiorka" id="zbiorka" value="<?= $row['zbiorka'] ?>" >
        
        <label for="data">Data:</label>
        <input type="date" name="data" id="data" value="<?= $row['data'] ?>" >

        <label for="opis">Opis:</label>
        <textarea name="opis" id="opis" ><?= $row['opis'] ?></textarea>
        
        <input type="submit" value="Zapisz zmiany">
    </form>
</body>
</html>
