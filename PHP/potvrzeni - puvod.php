<?php
include 'pripojeni.php';
  if(!isset($_SESSION["prava"])=='1'){
    echo"Nemáte opravnění!";
    exit;

  }

if(isset($_GET["id"])){
    $dotaz="UPDATE `uzivatele` SET `potvrzeni_pristupu`='1' WHERE uzivatele.id={$_GET["id"]} limit 1";

    $data=mysqli_query($connect,$dotaz);

    if($data){
      header("Location: prijeti.php");
    } else {
        echo "<h2>chyba</h2>";
    }
  }
?>
