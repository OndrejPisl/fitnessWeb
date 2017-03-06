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

<script type="text/javascript">

    var pocet = 7;      // celkový počet fotek
    var cf = 1;         // globální proměnná - číslo fotografie

  function zobrazB(c) {
    cf=c;               // nastavení globální proměnné
      document.getElementById("fbiceps").src="../foto/cviky/foto"+c+".jpg";
      /*document.getElementsByClass[0]("fotka").src("foto/foto1/foto"+c+".jpg");   -- pokud chci použít class místo fotka*/
}
  function zobrazT(q) {
    cf=q;               // nastavení globální proměnné
      document.getElementById("ftriceps").src="../foto/cviky/foto"+q+".jpg";
      /*document.getElementsByClass[0]("fotka").src("foto/foto1/foto"+c+".jpg");   -- pokud chci použít class místo fotka*/
}
</script>

  </head>
  <body>
<?php
  include 'menu.php';
 ?>
    <article  class="galeriearticle">
    <h1>CVIKY</h1>
    <h2>Biceps</h2>
    <br>
    <img src="../foto/cviky/foto1.jpg" class="velkefoto" id="fbiceps" alt="foto1.jpg, 6,2kB" title="foto1" width="500" height="400">
    <br>
    <script type="text/javascript">
    var pocet= 7;
    for(i=1; i<=pocet; i++){
        document.write("<img src='../foto/cviky/nahledy/foto"+i+".jpg' class='malefoto' onclick='zobrazB("+i+")' alt='foto1.jpg, 1,9kB' title='foto1' width='143' height='100'>");
    }

    </script>
<br>
    <h2>Triceps</h2>
    <br>
    <img src="../foto/cviky/foto1.jpg"  class="velkefoto" id="ftriceps" alt="foto1.jpg, 6,2kB" title="foto1" width="500" height="400">
    <br>
    <script type="text/javascript">

    for(i=1; i<=pocet; i++){
        document.write("<img src='../foto/cviky/nahledy/foto"+i+".jpg' class='malefoto' onclick='zobrazT("+i+")' alt='foto1.jpg, 1,9kB' title='foto1' width='143' height='100'>");
    }

    </script>

    </article>
    <footer>
    </footer>
  </body>
</html>
