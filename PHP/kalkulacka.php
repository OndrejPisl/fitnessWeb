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
    </head>
    <body>
        <?php
        include 'menu.php';
        $id = $_SESSION["id"];
        if ($id == null) {
            header("Location: prihlaseni.php");
        }
        ?>
        <article>
            <?php
            if (isset($_POST["datum"])) {
                $str_datum = $_POST["datum"];
                $str_vaha = $_POST["vaha"];
                $datum = DateTime::createFromFormat("d.m.Y H:i", $str_datum);
                $timestamp = $datum->getTimestamp();
                $vaha = floatval($str_vaha);
                // udelej kontroly zadani dat
                $sql = "INSERT INTO vahy (`uzivatele_id`, `vaha`, `datum`) VALUES ('$id', '$vaha', '$timestamp');";
                $dotaz = mysqli_query($connect, $sql);
            }

            $sql = "SELECT MAX(vaha) AS vaha FROM vahy WHERE uzivatele_id={$_SESSION['id']}";
            $data = mysqli_query($connect, $sql);
            $zaznam = mysqli_fetch_array($data);
            $vaha = $zaznam["vaha"];
            if ($vaha == null) {
                $vaha = 0;
            }
            ?>
            <form method="POST">
                <label>Datum:</label>
                <input name="datum" type="datetime"  value="<?= date("d.m.Y H:i", time()); ?>">
                <label>Tvoje vaha:</label>
                <input name="vaha" type="number" step="0.1" value="<?= $vaha ?>" >
                <input type="submit" value="Ulozit">

            </form>
        </article>
    </body>
</html>
