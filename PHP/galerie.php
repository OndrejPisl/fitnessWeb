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
                cf = c;               // nastavení globální proměnné
                document.getElementById("fbiceps").src = "../foto/cviky/foto" + c + ".jpg";
                /*document.getElementsByClass[0]("fotka").src("foto/foto1/foto"+c+".jpg");   -- pokud chci použít class místo fotka*/
            }
            function zobrazT(q) {
                cf = q;               // nastavení globální proměnné
                document.getElementById("ftriceps").src = "../foto/cviky/foto" + q + ".jpg";
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
            <h2>Dřep</h2>
            <br>
            <img src="../foto/cviky/foto1.jpg" class="velkefoto" id="fbiceps" alt="foto1.jpg, 6,2kB" title="foto1" width="500" height="400">
            <br>
            <script type="text/javascript">
                var pocet = 7;
                for (i = 1; i <= pocet; i++) {
                    document.write("<img src='../foto/cviky/nahledy/foto" + i + ".jpg' class='malefoto' onclick='zobrazB(" + i + ")' alt='foto1.jpg, 1,9kB' title='foto1' width='143' height='100'>");
                }

            </script>
            <p>Dřep je oprávněně nazýván králem cviků. Je to cvik, který působí komplexně na Vaše tělo, takže ačkoliv primárně je zaměřen na nohy, roste objem celého těla.</p>
            <br>
            <h2>Tlaky s jednoručními činkami</h2>
            <br>
            <img src="../foto/cviky/foto1.jpg"  class="velkefoto" id="ftriceps" alt="foto1.jpg, 6,2kB" title="foto1" width="500" height="400">
            <br>
            <script type="text/javascript">

                for (i = 1; i <= pocet; i++) {
                    document.write("<img src='../foto/cviky/nahledy/foto" + i + ".jpg' class='malefoto' onclick='zobrazT(" + i + ")' alt='foto1.jpg, 1,9kB' title='foto1' width='143' height='100'>");
                }

            </script>
            <p>Obdobou BENCH-PRESSu, ale za použítí jednoručních činek, jsou tlaky s jednoručními činkami.
                Výhodou tohoto cviku je větší dráha pohybu, neboť zde nejste limitování žerdí olympijské tyče zastavující se o hrudník.
                S jednoručkami můžete ještě níže a zefektivnit tak Vaše snažení.
            </p>
            <h2>Mrtvý tah</h2>
            <p>Mrtvý tah je jedním ze cviků tzv. ,,velké trojky", tedy dřep, bech-press a mrtvý tah. 
                Je to komplexní cvik na zádové svalstvo, neboť žádný ze zádových svalů nezůstane bez využití.
                Je jedním z nějčastěji používaných cviků pro svou všestrannost, neboť krom zad procvičíte také nohy, sedací svaly, ruce, trapézy,... Dá se tedy říci, že při mrtvém tahu zůstane jen mizivé množství svalů volných, zda-li nějaký vůbec.
            </p>
            <h2>Tlaky na ramena</h2>
            <p>Tlaky na ramena jsou základním, více kloubovým cvikem, který působí na celá ramena a jsou tak výborným objemovým cvikem.
                Tlaky se dají provádět různými způsoby - ve stoje, v sedě, před hlavou či za hlavou a to jak s velkou činkou, tak i s jednoručkami.
            </p>
            <h2>Bicepsový zdvih</h2>
            <p>Bicepsový zdvih patří k nejzákladnějším cvikům na procvičení bicepsů.
                Můžete jej provádět za použití velké tyče, EZ-tyče, jednoruček nebo kladky.
            </p>
            <h2>Francouzský tlak</h2>
            <p>Francouzský tlak je jedním z nejvíce používaných cviků na procvičení tricepsu.
                Jeho obliba je veliká diky jeho mnohostranné cvičitelnosti.
                Dá se totiž cvičit v leže, v sedě i ve stoje a to jak s velou činkou, tak i s EZ-tyčí, či jednoručkami.
            </p>
        </article>
        <footer>
        </footer>
    </body>
</html>
