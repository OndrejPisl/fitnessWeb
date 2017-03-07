<?php

include 'pripojeni.php';

if (isset($_POST["id"]) && isset($_POST["datum"]) && isset($_POST["vaha"])) {
    $id = $_POST["id"];
    $datum = $_POST["datum"];
    $vaha = $_POST["vaha"];
    $sql = "INSERT INTO `fitness`.`vahy` (`uzivatele_id`, `vaha`, `datum`) VALUES ('$id', '$vaha', FROM_UNIXTIME('$datum'));";
    if (mysqli_query($connect, $sql)) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}
