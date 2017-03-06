<?php
  session_start();
  include 'pripojeni.php';
  if(!isset($_SESSION["prava"])=='1'){
    echo"Nemáte opravnění!";
    exit;

  }
 ?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../CSS/css.css">
  </head>
  <?php
  include 'menu.php';
 ?>
  <?php
if(!isset($_GET["id"])){
echo "neni zadano id";
exit;

}

  $data = mysqli_query($connect, "select uzivatele.id as uzivatel_id, uzivatele.jmeno, uzivatele.prijmeni, uzivatele.datum, uzivatele.email, uzivatele.tel, uzivatele.pohlavi, uzivatele.narodnost_id, uzivatele.info, narodnosti.id as narodnost_id, narodnosti.nazev as narodnost_nazev from uzivatele LEFT JOIN narodnosti ON uzivatele.narodnost_id=narodnosti.id where uzivatele.id='{$_GET["id"]}'");
  $lide = mysqli_fetch_array($data);
  ?>

<body>
<article>

<?php
if(isset($_POST['check'])){

if($_POST['jmeno']!="" && $_POST['prijmeni']!=""){
$dotaz = "update uzivatele set jmeno='{$_POST['jmeno']}', prijmeni='{$_POST['prijmeni']}' where uzivatele.id = {$_GET['id']}";
$vypis = mysqli_query($connect,$dotaz);
if(!$vypis){echo mysqli_error($connect);}
header("Location:sprava-uzivatelu.php");
}
else{
echo"Vypl� data!";
}
}
?>
<form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post">
  

<input type="text" name="jmeno" value="<?php echo $lide['jmeno'];?>"><br>



<input type="text" name="prijmeni" value="<?php echo $lide['prijmeni'];?>"><br>


<textarea name="info" rows="5" cols="50"><?php echo $lide['info'];?></textarea><br>
<input type="hidden" name="check">
<input type="submit" value="Upravit">

</article>
</form>
</body>
</html>
