<?php
require("menu.php");
    ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodawanie Recenzji</title>
    <link rel="stylesheet" href="glowna.css">
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $idWyscig = $conn->real_escape_string($_POST['idWyscig']);
        $nick = $_SESSION['login'];
        $ocena = $conn->real_escape_string($_POST['ocena']);
        $tresc = $conn->real_escape_string($_POST['tresc']);

        $sql = "INSERT INTO recenzje (idWyscig, nick, ocena, tresc) VALUES ('$idWyscig', '$nick', '$ocena', '$tresc')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Dodano recenzję.</p>";
            echo "<p><a href='details.php?id=$idWyscig'>Wróć do szczegółów wyścigu</a></p>";
        } else {
            echo "<p>Błąd: " . $sql . "<br>" . $conn->error . "</p>";
        }
        
        $conn->close();
    }
    ?>
</body>
</html>
