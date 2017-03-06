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
                        echo "    <div class='hlasky'>Zadej své stené heslo!</div>";
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
                            echo "<h2>Data nebyla vložena</h2>\n";
                        }
                    }
                }
                ?>

                <form method="post" action="#">
                    <label>Jméno:</label>
                    <input type="text" name="jmeno" placeholder="Martin">

                    <label>Přijmení:</label>
                    <input type="text" name="prijmeni" placeholder="Němec">

                    <label>Heslo:</label>
                    <input type="password" name="heslo" placeholder="heslo">

                    <label>Kontrola hesla:</label>
                    <input type="password" name="kheslo" placeholder="heslo">

                    <label>Datum narození:</label>
                    <input type="text" name="datum" placeholder="dd.mm.rrrr">

                    <label>E-mail:</label>
                    <input type="text" name="email" placeholder="jdemecvicit@seznam.cz">

                    <label>Telefoní číslo:</label>
                    <input type="text" name="telefon" placeholder="+420 777 777 777">


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
                    <textarea class="info" name="info" placeholder="Zde krátce uveď svůj zdravotni stav (alergie, operace, atd.)... "></textarea>

                    <input type="submit" value="Odeslat">
                </form>
            </div>
        </article>
        <footer>
        </footer>
    </body>
</html>
