<?php

include 'pripojeni.php';

class Radek {

    public $vaha;

}

//SELECT AVG(vaha), MONTH(datum) month, YEAR(datum) year FROM `vahy` WHERE uzivatele_id = 1 GROUP BY month, YEAR(datum) ORDER BY YEAR(datum), MONTH(datum)
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $odKdy = $_GET["odKdy"];
    $doKdy = $_GET["doKdy"];
    $agregace = $_GET["agregace"];
    $select = "";
    switch ($agregace) {
        case 2:
            $select = "SELECT AVG(vaha) vaha, MONTH(datum) mesic, YEAR(datum) rok "
                    . "FROM vahy "
                    . "WHERE uzivatele_id = {$id} AND  UNIX_TIMESTAMP(datum) >= {$odKdy} AND  UNIX_TIMESTAMP(datum) <= {$doKdy} "
                    . "GROUP BY mesic, rok "
                    . "ORDER BY rok, mesic";
            break;
        case 3:
            $select = "SELECT AVG(vaha) vaha, YEAR(datum) rok "
                    . "FROM vahy "
                    . "WHERE uzivatele_id = {$id} AND  UNIX_TIMESTAMP(datum) >= {$odKdy} AND  UNIX_TIMESTAMP(datum) <= {$doKdy} "
                    . "GROUP BY rok "
                    . "ORDER BY rok";
            break;
        default:
            $select = "SELECT vaha, MONTH(datum) mesic, YEAR(datum) rok, DAY(datum)den "
                    . "FROM vahy "
                    . "WHERE uzivatele_id = {$id} AND  UNIX_TIMESTAMP(datum) >= {$odKdy} AND  UNIX_TIMESTAMP(datum) <={$doKdy} "
                    . "ORDER BY datum";
    }
    $data = mysqli_query($connect, $select);
    $vysledek = array();
    while ($zaznam = mysqli_fetch_array($data)) {
        $radek = new Radek();
        $radek->rok = $zaznam["rok"];
        if (isset($zaznam["mesic"])) {
            $radek->mesic = $zaznam["mesic"];
        }
        if (isset($zaznam["den"])) {
            $radek->den = $zaznam["den"];
        }
        $radek->vaha = $zaznam["vaha"];
        array_push($vysledek, $radek);
    }
    $json = json_encode($vysledek);
    echo $json;
}
    
    

