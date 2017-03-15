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
    </head>
    <body>
        <div class="barva">
        <?php
        include 'menu.php';
        ?>
        <article>    <h1>Něco o mně</h1>
            <img src="../foto/uvodka.jpg" class="uvodka" alt="uvodka.jpg, 64kB" title="uvodka">
            <p>Ahoj, jmenuji se Martin Němec, je mi 27 let a chtěl bych Vám o sobě něco povědět.</p>
            <p>Ke cvičení jsem se dostal náhodou až ve věku 21 let, když jsem si koupil domů sadu činek a začal jsem cvičit základní cviky. Po delší době jsem se rozhodl navštívit fitness centrum a od té doby si nedokážu představit, že bych přestal cvičit.</p>    
            <p>V roce 2016 jsem si udělal kurz instruktora fitness a kulturistiky v Praze v trenérské škole Ronnie. Momentálně cvičím ve fitness centru Fanatic gym v Chrudimi, kde je možné si domluvit osobní tréninkovou lekci.</p>
            <p>V budoucnu plánuji otevřít soukromou tělocvičnu, která bude zaměřená pouze na individuální tréninky s klienty. </p>
            <h2>PROČ CHCI TRÉNOVAT V SOUKROMÍ</h2>
            <p>Z vlastní zkušenosti vím, že pro někoho je z nějakého důvodu problém jít cvičit do fitness centra. Ať už to je nadváha, žádné zkušenosti se cvičením nebo větší počet lidí. Trénování v soukromí má určité výhody.</p>
            <p>  Klient se při cvičení v soukromí nemusí stydět a může mít jakékoliv otázky ohledně cvičení. Velmi často se také stává, že konkrétní stroj je ve veřejném fitness centru zrovna obsazený, a tudíž nelze cvičit podle určitého tréninkového plánu. Při trénování v soukromí se toto stát nemůže - není nutné čekat a můžeme cvičit bez zbytečných prodlev.</p>
            <h2>PROČ TO DĚLÁM</h2>
            <p>Každý kdo začíná a nemá se cvičením žádné zkušenosti, by měl určitě investovat do osobního trenéra. Správné provedení cviků, sestavení individuálního tréninkového plánu a jídelníčku je základ a s tím bych vám rád pomohl.</p>
            <h1 class="nadpisyuprostred">Tak se nestyď a Přijď si zacvičit!</h1>
        </article>
        <footer>
        </footer>
        </div>
    </body>
</html>
