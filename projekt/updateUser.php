<?php
require("db.php");
    $id = $_POST['id'];
    $login = $_POST["login"];
    $email = $_POST["email"];
    $rola = $_POST['rola'];
    $sql = "UPDATE uzytkownicy SET login = '$login' , email = '$email', rola = '$rola' WHERE id = '$id'";
    $conn ->query($sql);
    header("location: editUsers.php");
?>
