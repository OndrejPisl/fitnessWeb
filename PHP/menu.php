<header>
    <div class="odkazy">
        <div class="odkazymobil"><a href="index.php">NĚCO O MNĚ</a></div>
        <div class="odkazymobil"><a href="fitness.php" class="mezery">CO JE TO FITNESS</a></div>
        <div class="odkazymobil"><a href="treninky.php" class="mezery">TRÉNINKY/ KONTAKT</a></div>
        <div class="odkazymobil"><a href="galerie.php" class="mezery">GALERIE CVIKŮ</a></div>
        <?php
        if (isset($_SESSION["email"])) {
            echo "<div class='odkazymobil'><a href='uzivatel.php' class='mezery'>MŮJ ÚČET</a></div>";
            echo "<div class='odkazymobil'><a href='odhlaseni.php' class='mezery'>ODHLÁSIT SE</a></div>";
        } else {
            echo"<div class='odkazymobil'><a href='registrace.php' class='mezery'>REGISTRACE</a></div>
       <div class='odkazymobil'><a href='prihlaseni.php' class='mezery'>PŘIHLÁŠENÍ</a></div>";
        }
        ?>
    </div>
</header>
