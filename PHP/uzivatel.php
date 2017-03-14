<?php
session_start();
include 'pripojeni.php';
if(isset($_SESSION["potvrzeni_pristupu"])){
    if($_SESSION["potvrzeni_pristupu"] == "0")header ("Location: zatimneprijat.php"); 
}
if(!isset($_SESSION["email"]))header ("Location: prihlaseni.php"); 
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>
    </title>
    <link rel="stylesheet" href="../CSS/css.css">
  </head>
  <body>
      <div class="barva">
<?php
        include 'menu.php';
            ?>
    <article>
<?php
            if ($_SESSION["prava"] == 1) {
                echo "<div class='uzivatelodkazy'><a href='prijeti.php'>Přijetí</a>";
                echo "<a href='sprava-uzivatelu.php'>Správa uživatelů</a></div>";
            }
      ?>
        <div class="uzivatelodkazy"><a href="bmi.php">BMI</a></div>
      <div>
<?php
            $data = mysqli_query($connect, "select uzivatele.id as uzivatel_id, uzivatele.jmeno, uzivatele.prijmeni, uzivatele.datum, uzivatele.email, uzivatele.tel, uzivatele.pohlavi, uzivatele.narodnost_id, uzivatele.info, narodnosti.id as narodnost_id, narodnosti.nazev as narodnost_nazev from uzivatele LEFT JOIN narodnosti ON uzivatele.narodnost_id=narodnosti.id where uzivatele.id='{$_SESSION["id"]}'");
            while ($zaznam = mysqli_fetch_array($data)) {
                if ($zaznam["pohlavi"] == 1) {
                    $pohlavi = 'muž';
                } else {
                    $pohlavi = 'žena';
                }
                echo "<div class='uzivateldiv'>";
                echo "<h1>{$zaznam["jmeno"]} {$zaznam["prijmeni"]}</h1>";
                echo "  <table class='tableuzivatele'>


            <tr>
              <th>Datum narození:</th>
              <td>{$zaznam["datum"]}</td>
            </tr>
                        <tr>
              <th>E-mail:</th>
              <td>{$zaznam["email"]}</td>
            </tr>
            <tr>
              <th>Tel.:</th>
              <td>{$zaznam["tel"]}</td>
            </tr>
                        <tr>
              <th>Pohlaví:</th>
              <td> $pohlavi</td>
            </tr>
            <tr>
              <th>Národnost:</th>
              <td> {$zaznam["narodnost_nazev"]}</td>
            </tr>
            <tr>
              <th>Info:</th>
              <td> {$zaznam["info"]}</td>
            </tr>
          </table>";
            echo "</div>";}
                    ?>
        <form method="post">
           
<textarea name="zprava"></textarea>
          <input type="submit" value="Odeslat">
        </form>
<?php
            if (isset($_POST["zprava"])) {
                if ($_POST["zprava"] == "") {
                    echo "vypln";
                } else {
                    $to = 'pisl.ondrej@gmail.com';
                    $subject = 'můj předmět';
                    $message = 'Můj obsah zprávy....';
                    $headers = 'From: neodepisuj@ondra-fitness.cz' . "\r\n" .
                            'Reply-To: neodepisuj@ondra-fitness.cz' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                    $odeslani = mail($to, $subject, $message, $headers);
                    if ($odeslani == false) {
                        echo "chyba";
                        exit;
                    }
                }
            }
                    ?>
      </div>
    </article>
    <footer>
    </footer>
      </div>
  </body>
</html>
