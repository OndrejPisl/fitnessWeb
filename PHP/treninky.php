<?php
  session_start();
  include 'pripojeni.php';
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
<?php
  include 'menu.php';
 ?>
    <article>      <h1>Kdy cvičíme?</h1>
      <br>
      <div class="hodiny" style="overflow-x:auto;">
        <table>
          <tr>
            <th class="hlavicky">Pondělí
            </th>          <td>9:00 - 11:30</td>          <td>15:00 - 20:00</td>
          </tr>
          <tr>
            <th class="hlavicky">Úterý
            </th>          <td>9:00 - 11:30</td>          <td>15:00 - 20:00</td>
          </tr>
          <tr>
            <th  font-size="16px">Střerda
            </th>          <td>9:00 - 11:30</td>          <td>15:00 - 20:00</td>
          </tr>
          <tr>
            <th>Čtvrtek
            </th>          <td>9:00 - 11:30</td>          <td>15:00 - 20:00</td>
          </tr>
          <tr>
            <th>Pátek
            </th>          <td>9:00 - 11:30</td>          <td>15:00 - 20:00</td>
          </tr>
          <tr>
            <th>Sobota
            </th>          <td>9:00 - 11:30</td>          <td>15:00 - 20:00</td>
          </tr>
          <tr>
            <th>Neděle
            </th>          <td>9:00 - 11:30</td>          <td>15:00 - 20:00</td>
          </tr>
        </table>
      </div>    <h2>JAK SE SE MNOU SPOJIT</h2>
      <div class="kontakt">
        <table>
          <tr>
            <th>E-mail:
            </th>
            <th>pojdtecvicit@seznam.cz
            </th>
          </tr>
          <tr>
            <th>Tel.:
            </th>            <td>+420 777 777 777</td>
          </tr>
        </table>
      </div>
    </article>
    <footer>
    </footer>
  </body>
</html>