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
        ?>
        <article class="artreg">
            <div class="formregistrace">
                <?php
                if (isset($_POST["jmeno"])) {
//formulář byl odeslán
//kontrola dat
                    if ($_POST["jmeno"] == "") {
                        echo "<div class='hlasky'>Zadej své jméno!</div>";
                    }
                    if ($_POST["prijmeni"] == "") {
                        echo "    <div class='hlasky'>Zadej své příjmení!</div>";
                    }
                    if ($_POST["heslo"] != $_POST["kheslo"]) {
                        echo "    <div class='hlasky'>Zadej stejné stejné heslo!</div>";
                    }
                    if ($_POST["datum"] == "") {
                        echo "    <div class='hlasky'>Zadej své datum narození!</div>";
                    }
                    if ($_POST["email"] == "") {
                        echo "    <div class='hlasky'>Zadej sůj E-mail!</div>";
                    }
                    if ($_POST["telefon"] == "") {
                        echo "    <div class='hlasky'>Zadej své telefoní číslo!</div>";
                    }
                    if ($_POST["pohlavi"] == "") {
                        echo "    <div class='hlasky'>Zadej své pohlaví!</div>";
                    }
                    if ($_POST["narodnost"] == "") {
                        echo "    <div class='hlasky'>Zadej svou národnost!</div>";
                    } else {
                        $jmeno = $_POST["jmeno"];
                        $prijmeni = $_POST["prijmeni"];
                        $heslo = md5($_POST["heslo"]);
                        $datum = $_POST["datum"];
                        $email = $_POST["email"];
                        $telefon = $_POST["telefon"];
                        $pohlavi = $_POST["pohlavi"];
                        $narodnost = $_POST["narodnost"];
                        $info = $_POST["info"];
                        $prava = '0';
                        $pristup = '0';
                        //uložení záznamu do tabulky
                        $sql = "INSERT INTO `fitness`.`uzivatele` (`jmeno`, `prijmeni`, `datum`, `email`, `heslo`, `tel`, `pohlavi`, `narodnost_id`, `info`, `prava`, `potvrzeni_pristupu`) VALUES ('$jmeno', '$prijmeni', '$datum', '$email', '$heslo', '$telefon', '$pohlavi', '$narodnost', '$info', '$prava', '$pristup');";
                        $dotaz = mysqli_query($connect, $sql);
                        if ($dotaz) {
                            echo "<div class='okreg'>Data byla vložena</div>\n";
                        } else {
                            echo "<h2>Vše OK, vyčkejte na potvrzení.</h2>\n";
                        }
                    }
                }
                ?>

                <form method="post" action="#">
                    <label>Jméno:</label>
                    
                    <input type="text" name="jmeno" placeholder="Martin" value="<?= isset($_POST["jmeno"]) ? $_POST["jmeno"] : ""; ?>">

                    <label>Přijmení:</label>
                    <input type="text" name="prijmeni" placeholder="Němec"value="<?= isset($_POST["prijmeni"]) ? $_POST["prijmeni"] : ""; ?>">

                    <label>Heslo:</label>
                    <input type="password" name="heslo" placeholder="heslo" value="<?= isset($_POST["heslo"]) ? $_POST["heslo"] : ""; ?>">

                    <label>Kontrola hesla:</label>
                    <input type="password" name="kheslo" placeholder="heslo">

                    <label>Datum narození:</label>
                    <input type="date" name="datum" placeholder="dd.mm.rrrr" value="<?= isset($_POST["datum"]) ? $_POST["datum"] : ""; ?>">
        
                    <label>E-mail:</label>
                    <input type="email" name="email" placeholder="jdemecvicit@seznam.cz" value="<?= isset($_POST["email"]) ? $_POST["email"] : ""; ?>">

                    <label>Telefoní číslo:</label>
                    <input type="text" name="telefon" placeholder="+420 777 777 777" value="<?= isset($_POST["tel"]) ? $_POST["tel"] : ""; ?>">


                    <label>Pohlaví:</label>
                    <select name="pohlavi">
                        <option value=""></option>
                        <option value="1">Muž</option>
                        <option value="2">Žena</option>
                    </select>

                    <label>Národnost:</label>
                    <select name="narodnost">
                        <option value=""></option>
<?php
$data = mysqli_query($connect, "select * from narodnosti order by nazev");
while ($zaznam = mysqli_fetch_array($data)) {
    echo "<option value='{$zaznam["id"]}'>{$zaznam["nazev"]}</option>";
}
?>
                    </select><br>
                    <label>Info o sobě:</label>
                    <textarea class="info" name="info" placeholder="Zde krátce uveď svůj zdravotni stav (alergie, operace, atd.)... " value="<?= isset($_POST["info"]) ? $_POST["info"] : ""; ?>"></textarea>

                    <input type="submit" value="Odeslat">
                </form>
            </div>
        </article>
        <footer>
        </footer>
    </body>
</html>
