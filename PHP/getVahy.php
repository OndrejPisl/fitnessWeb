<?php

include 'pripojeni.php';

class Radek {
    public $datum;
    public $vaha;
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $odKdy = $_GET["odKdy"];
    $doKdy = $_GET["doKdy"];
    $data = mysqli_query($connect, "SELECT vaha, datum FROM `vahy` WHERE uzivatele_id = {$id} AND datum >= {$odKdy} AND datum <={$doKdy} ORDER BY datum");
    $vysledek = array();
    while ($zaznam=mysqli_fetch_array($data)) {
        $radek = new Radek();
        $radek->datum = $zaznam["datum"];
        $radek->vaha = $zaznam["vaha"];
        array_push($vysledek, $radek);
    }
    $json = json_encode($vysledek);
    echo $json;
}
    
    

