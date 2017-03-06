<?php
session_start();
include 'pripojeni.php';
  if(!isset($_SESSION["prava"])=='1'){
    echo"Nemáte opravnění!";
    exit;

  }

if(isset($_GET["id"])){
    $dotaz="DELETE FROM uzivatele WHERE id={$_GET["id"]} limit 1";
    $data=mysqli_query($connect,$dotaz);

    if($data){
      header("Location: prijeti.php");
    } else {
        echo "<h2>chyba</h2>";
    }
  }
?>
