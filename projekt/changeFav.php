<?php
require("session.php");
require("db.php");
$idWyscig = $_REQUEST["idWyscig"];
$idUzytkownika = $_SESSION["id"];
$sql = "SELECT id FROM ulubione WHERE idWyscig = $idWyscig AND idUzytkownika =$idUzytkownika";
$result = $conn->query($sql);;
if ($result->num_rows == 1) {
    $id = $result->fetch_object()->id;
    $sql = "DELETE FROM ulubione WHERE id = $id";
} else {
    $sql = "INSERT INTO ulubione (idWyscig, idUzytkownika) VALUES ($idWyscig,$idUzytkownika)";
}
if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
} else {
    echo "sukces";
}
$conn->close();
