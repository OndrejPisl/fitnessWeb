<?php
session_start();
include 'pripojeni.php';
if (!isset($_SESSION["prava"]) == '1') {
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
    if (!isset($_GET["id"])) {
        echo "neni zadano id";
        exit;
    }

    $data = mysqli_query($connect, "select uzivatele.id as uzivatel_id, uzivatele.jmeno, uzivatele.prijmeni, uzivatele.datum, uzivatele.vyska, uzivatele.email, uzivatele.tel, uzivatele.pohlavi, uzivatele.narodnost_id, uzivatele.info, narodnosti.id as narodnost_id, narodnosti.nazev as narodnost_nazev from uzivatele LEFT JOIN narodnosti ON uzivatele.narodnost_id=narodnosti.id where uzivatele.id='{$_GET["id"]}'");
    $lide = mysqli_fetch_array($data);
    ?>

    <body>
                <div class="barva">
        <article>

            <?php
            if (isset($_POST['check'])) {

                if ($_POST['jmeno'] != "" && $_POST['prijmeni'] != "") {
                    $dotaz = "update uzivatele set jmeno='{$_POST['jmeno']}', prijmeni='{$_POST['prijmeni']}' where uzivatele.id = {$_GET['id']}";
                    $vypis = mysqli_query($connect, $dotaz);
                    if (!$vypis) {
                        echo mysqli_error($connect);
                    }
                    header("Location:sprava-uzivatelu.php");
                } else {
                    echo"Vyplň data!";
                }
            }
            ?>
            <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post">

                <label>Jméno:</label>
                <input type="text" name="jmeno" value="<?php echo $lide['jmeno']; ?>"><br>
                <label>Příjmení:</label>
                <input type="text" name="prijmeni" value="<?php echo $lide['prijmeni']; ?>"><br>

                <label>Výška:</label>
                <input type="number" name="vyska" step="0.01" value="<?php echo $lide['vyska']; ?>"><br>

                <label>Datum narození:</label>
                <input type="date" name="datum" value="<?php echo $lide['datum']; ?>"><br>

                <label>E-mail:</label>
                <input type="email" name="email" value="<?php echo $lide['email']; ?>"><br>

                <label>Telefoní číslo:</label>
                <input type="text" name="telefon" value="<?php echo $lide['tel']; ?>"><br>

                <textarea name="info" rows="5" cols="50"><?php echo $lide['info']; ?></textarea><br>
                <input type="hidden" name="check">
                <input type="submit" value="Upravit">
            </form>

                </article>
                </div>
    </body>
</html>
