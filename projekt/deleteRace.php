<?php
session_start();
require("db.php"); // Plik z połączeniem do bazy danych

// Sprawdzenie, czy użytkownik jest administratorem
if ($_SESSION['rola'] !== 'admin') {
    die("Brak uprawnień do wykonania tej operacji.");
}

// Sprawdzenie, czy przekazano ID wyścigu do usunięcia
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Usunięcie wyścigu z bazy danych
    $sql = "DELETE FROM wyscig WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Wyścig został usunięty pomyślnie.</p>";
    } else {
        echo "<p>Błąd podczas usuwania wyścigu: " . $conn->error . "</p>";
    }

    // Przekierowanie po usunięciu (np. do listy wyścigów)
    header("Location: index.php");
    exit();
} else {
    echo "Nieprawidłowe żądanie.";
}

$conn->close();
?>
