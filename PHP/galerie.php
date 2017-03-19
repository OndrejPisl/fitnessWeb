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
        <link rel="shortcut icon" href="../foto/favicon.bmp" type="image/x-icon">
        <script type="text/javascript">

            var pocet = 4;      // celkový počet fotek
            var cf = 1;         // globální proměnná - číslo fotografie
            function zobrazBiceps(c) {
                cf = c;               // nastavení globální proměnné
                document.getElementById("biceps").src = "../foto/svaly/biceps/biceps" + c + ".jpg";
                /*document.getElementsByClass[0]("fotka").src("foto/foto1/foto"+c+".jpg");   -- pokud chci použít class místo fotka*/
            }
            function zobrazPrsa(q) {
                cf = q;               // nastavení globální proměnné
                document.getElementById("prsa").src = "../foto/svaly/prsa/prsa" + q + ".jpg";
                /*document.getElementsByClass[0]("fotka").src("foto/foto1/foto"+c+".jpg");   -- pokud chci použít class místo fotka*/
            }
            function zobrazHamstr(h) {
                cf = h;               // nastavení globální proměnné
                document.getElementById("hamstr").src = "../foto/svaly/hamstr/hamstr" + h + ".jpg";
                /*document.getElementsByClass[0]("fotka").src("foto/foto1/foto"+c+".jpg");   -- pokud chci použít class místo fotka*/
            }
            function zobrazZada(z) {
                cf = z;               // nastavení globální proměnné
                document.getElementById("zada").src = "../foto/svaly/zada/zada" + z + ".jpg";
                /*document.getElementsByClass[0]("fotka").src("foto/foto1/foto"+c+".jpg");   -- pokud chci použít class místo fotka*/
            }
        </script>

    </head>
    <body>
        <div class="barva">
            <?php
            include 'menu.php';
            ?>
            <article  class="galeriearticle">
                <h1>CVIKY</h1>
                <h2>Biceps</h2>
                <br>
                <img src="../foto/svaly/biceps/biceps0.jpg" class="velkefoto" id="biceps">
                <br>
                <script type="text/javascript">
                    for (i = 0; i <= pocet; i++) {
                        document.write("<img src='../foto/svaly/biceps/nahledy/biceps" + i + ".jpg' class='malefoto' onclick='zobrazBiceps(" + i + ")'>");
                    }

                </script>
                <p>Dvojhlavý sval pažní (m. biceps brachii) je kosterním svalem ležícím na přední straně nadloktí, je ohybačem loketního kloubu a natahovačem kloubu ramenního. Je tedy antagonistou trojhlavého svalu, který je natahovačem loketního kloubu.</p>
                <h2>Prsa</h2>
                <br>
                <img src="../foto/svaly/prsa/prsa0.jpg"  class="velkefoto" id="prsa" >
                <br>
                <script type="text/javascript">

                    for (i = 0; i <= pocet; i++) {
                        document.write("<img src='../foto/svaly/prsa/nahledy/prsa" + i + ".jpg' class='malefoto' onclick='zobrazPrsa(" + i + ")'>");
                    }

                </script>
                <p>Prsní svaly jsou dvojího typu: velký prsní sval (musculus pectoralis major) a malý prsní sval (musculus pectoralis minor).</p>
                <p>Patří mezi největší ploché svaly v těle, začíná od vnitřní třetiny klíčku (část klíčková). Od kosti hrudní a přilehlých chrupavek pravých žeber (část hrudníko-žeberní) a od pochvy přímého svalu břišního (část břišní). Z tohoto začátku se masité snopce sbíhají k podpažní jamce, jejíž přední ohraničení tvoří úponová část svalu.</p>
                <h2>Hamstringy</h2>
                <img src="../foto/svaly/hamstr/hamstr0.jpg"  class="velkefoto" id="hamstr" >
                <br>
                <script type="text/javascript">

                    for (i = 0; i <= pocet; i++) {
                        document.write("<img src='../foto/svaly/hamstr/nahledy/hamstr" + i + ".jpg' class='malefoto' onclick='zobrazHamstr(" + i + ")'>");
                    }
                </script>
                <p>Čtyřhlavý sval stehenní (quadriceps femoris) je velká skupina svalů která je na přední straně stehna. Je to extenzorový sval kolene, tzn, že napíná koleno. Vytváří obrovskou masu na přední straně femuru (stehenní kosti).</p>
                <h2>Záda</h2>
                <img src="../foto/svaly/zada/zada0.jpg"  class="velkefoto" id="zada" >
                <br>
                <script type="text/javascript">
                    for (i = 0; i <= pocet; i++) {
                        document.write("<img src='../foto/svaly/zada/nahledy/zada" + i + ".jpg' class='malefoto' onclick='zobrazZada(" + i + ")'>");
                    }
                </script>
                <p>Trapezoid, neboli sval trapézový či kápový sval (podle svého tvaru), leží ze zádových svalů nejpovrchněji. Má tvar nepravidelného čtyřúhelníku, jednotlivé poloviny svalu mají tvar trojúhelníku. Začíná od zevního hrbolu týlního, prostřednictvím šíjového vazu od trnů všech obratlů krčních a hrudních. Upíná se na rameni. Podle průběhu svalových snopců se dělí na 3 části: Horní sestupnou, prostřední vodorovnou a dolní vzestupnou.</p>
                <!-- 
                            <p>Dřep je oprávněně nazýván králem cviků. Je to cvik, který působí komplexně na Vaše tělo, takže ačkoliv primárně je zaměřen na nohy, roste objem celého těla.</p>
                 
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
                 </p> -->
            </article>
            <footer>
            </footer>
        </div>
    </body>
</html>
