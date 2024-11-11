<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edycja użytkownika</title>
    <link rel="stylesheet" href="glowna.css">
</head>
<body>
    <?php
        require("menu.php");
        require("db.php");
        $id = $_GET['id'];
        $sql = "SELECT login, email,rola FROM uzytkownicy where id=$id";
        $result = $conn->query($sql);
        $user = $result->fetch_object();

    ?>
    <form action="updateUser.php" method="post">
        <input type="hidden" name="id" value="<?=$id?>" id="id">
        <input type="text" name="login" id="login" value="<?=$user->login?>">
        <input type="text" name="email" id="email" value="<?=$user->email?>">
        <select name="rola" id="rola">
            <option value="admin" <?php if($user->rola == "admin") echo "selected = 'selected'"?>>admin</option>
            <option value="user" <?php if($user->rola == "user") echo "selected = 'selected'"?>>user</option>
        </select>
        <input type="submit" value="zapisz">
    </form>     
</body>
</html>