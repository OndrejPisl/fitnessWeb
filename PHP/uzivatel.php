<?php
  session_start();
  include 'pripojeni.php';
 ?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../CSS/css.css">
  </head>
<body>
<?php
  include 'menu.php';
 ?>
<article>
    <?php
  if($_SESSION["prava"] == 1 ){
      echo "<a href='prijeti.php' class='uzivatelodkazy'>Přijetí</a>";
      echo "<a href='sprava-uzivatelu.php' class='uzivatelodkazy'>Správa uživatelů</a>";

  }    
    
   $data=mysqli_query($connect,"select uzivatele.id as uzivatel_id, uzivatele.jmeno, uzivatele.prijmeni, uzivatele.datum, uzivatele.email, uzivatele.tel, uzivatele.pohlavi, uzivatele.narodnost_id, uzivatele.info, narodnosti.id as narodnost_id, narodnosti.nazev as narodnost_nazev from uzivatele LEFT JOIN narodnosti ON uzivatele.narodnost_id=narodnosti.id where uzivatele.id='{$_SESSION["id"]}'");
   while ($zaznam=mysqli_fetch_array($data)) {
   if($zaznam["pohlavi"]==1){$pohlavi='muž';}else{$pohlavi='žena';}
   	echo "  <table class='tableuzivatele'>
           
            <tr>
              <th>Jméno:</th>
              <td>{$zaznam["jmeno"]}</td>
            </tr>
                        <tr>
              <th>Příjmení:</th>
              <td>{$zaznam["prijmeni"]}</td>

            </tr>
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
          </table>    ";
   }
  ?>
 
</article><
    <footer>
    </footer>
</body>
</html>
