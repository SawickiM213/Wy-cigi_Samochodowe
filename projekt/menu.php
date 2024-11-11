<?php
require("session.php");
require("db.php");
?>
<nav>
    <div>
    <a href="index.php">Strona główna</a>
    <a href="myReviews.php">Moje recenzje</a>
    <a href="favourite.php">Ulubione</a>
    <?php
    if ($_SESSION["rola"] === "admin"){
        echo "<a href='panel.php'>Panel administratora</a>";
    }
    ?>
    </div>
    <div class="log">
    Witaj <?= $_SESSION["login"] ?>!
    <a href="logout.php">Wyloguj</a>
</div>
</nav>