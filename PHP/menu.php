    <header>
      <div class="odkazy">
        <a href="index.php">NĚCO O MNĚ</a>
        <a href="fitness.php" class="mezery">CO JE TO FITNESS</a>
        <a href="treninky.php" class="mezery">TRÉNINKY/ KONTAKT</a>
        <a href="galerie.php" class="mezery">GALERIE CVIKŮ</a>
       <?php
       if(isset($_SESSION["email"])){
          echo "<a href='uzivatel.php' class='mezery'>MŮJ ÚČET</a>";
          echo "<a href='odhlaseni.php' class='mezery'>ODHLÁSIT SE</a>";

      }else{
        echo"<a href='registrace.php' class='mezery'>REGISTRACE</a>
        <a href='prihlaseni.php' class='mezery'>PŘIHLÁŠENÍ</a>";
      }
        ?>
      </div>
    </header>
