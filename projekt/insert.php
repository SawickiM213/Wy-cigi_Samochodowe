<?php
$conn = new mysqli("localhost", "root", "", "wyscigi");
$nazwa = $_POST["nazwa"];
$idkategorii = $_POST["idKategorii"];
$opis = $_POST["opis"];
$zbiorka = $_POST["zbiorka"];
$data = $_POST["data"];
$obrazek = basename($_FILES["obrazek"]["name"]);
move_uploaded_file($_FILES["obrazek"]["tmp_name"], 'obrazki/$obrazek');
$sql = "INSERT INTO wyscig(nazwa,opis,zbiorka,data,idkategorii,obrazek) VALUES ('$nazwa','$opis','$zbiorka','$data','$idkategorii','$obrazek')";
$result = $conn->query($sql);
$conn->close();
header("location: index.php");
?>