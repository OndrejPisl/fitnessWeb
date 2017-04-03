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
        <link rel="shortcut icon" href="../foto/favicon.bmp" type="image/x-icon">
    </head>
    <body>
        <div class="barva">
            <?php
            include 'menu.php';
            ?>
            <article>
                <div class="formregistrace">
                    <?php
                    if (isset($_POST["jmeno"])) {
//formulĂˇĹ™ byl odeslĂˇn
//kontrola dat
                        $chyba = FALSE;
                        if ($_POST["jmeno"] == "") {
                            $chyba = TRUE;
                            echo "<div class='hlasky'>Zadej své jméno!</div>";
                        }
                        if ($_POST["prijmeni"] == "") {
                            $chyba = TRUE;
                            echo "    <div class='hlasky'>Zadej své příjmení!</div>";
                        }
                        if ($_POST["heslo"] != $_POST["kheslo"]) {
                            $chyba = TRUE;
                            echo "    <div class='hlasky'>Zadej stejné heslo!</div>";
                        }
                        if ($_POST["datum"] == "") {
                            $chyba = TRUE;
                            echo "    <div class='hlasky'>Zadej své datum narození!</div>";
                        }if ($_POST["vyska"] == "") {
                            $chyba = TRUE;
                            echo "    <div class='hlasky'>Zadej svou výšku v m!</div>";
                        }
                        if ($_POST["email"] == "") {
                            $chyba = TRUE;
                            echo "    <div class='hlasky'>Zadej svůj E-mail!</div>";
                        }
                        if ($_POST["telefon"] == "") {
                            $chyba = TRUE;
                            echo "    <div class='hlasky'>Zadej své telefonní číslo!</div>";
                        }
                        if ($_POST["pohlavi"] == "") {
                            $chyba = TRUE;
                            echo "    <div class='hlasky'>Zadej své pohlaví!</div>";
                        }
                        if ($_POST["narodnost"] == "") {
                            $chyba = TRUE;
                            echo "    <div class='hlasky'>Zadej svou národnost!</div>";
                        }
                        if (!$chyba) {
                            $jmeno = $_POST["jmeno"];
                            $prijmeni = $_POST["prijmeni"];
                            $heslo = md5($_POST["heslo"]);
                            $datum = $_POST["datum"];
                            $vyska = $_POST["vyska"];
                            $email = $_POST["email"];
                            $telefon = $_POST["telefon"];
                            $pohlavi = $_POST["pohlavi"];
                            $narodnost = $_POST["narodnost"];
                            $info = $_POST["info"];
                            $prava = '0';
                            $pristup = '0';
                            //uloĹľenĂ­ zĂˇznamu do tabulky
                            $overemail="SELECT COUNT(*) as pocet from uzivatele where email='$email'";
                        /*    $om=mysqli_query($connect, $overemail);
                            $vs= mysqli_fetch_array($om); */
                            
                            $data=mysqli_query($connect,$overemail);
                            $zaznam=mysqli_fetch_array($data);
                            $pouzity_email = $zaznam["pocet"];
                    
                            
                            if($pouzity_email=='0'){
                            
                            $sql = "INSERT INTO `uzivatele` (`jmeno`, `prijmeni`, `datum`, `email`, `heslo`, `vyska`, `tel`, `pohlavi`, `narodnost_id`, `info`, `prava`, `potvrzeni_pristupu`) VALUES ('$jmeno', '$prijmeni', '$datum', '$email', '$heslo', '$vyska', '$telefon', '$pohlavi', '$narodnost', '$info', '$prava', '$pristup');";
                            $dotaz = mysqli_query($connect, $sql);
                            if ($dotaz) {
                                echo "<div class='okreg'>Vše OK. Vyčkejte na potvrzení žádosti</div>\n";
                            } else {
                                echo "<div class='hlasky'>Nezdařilo se!</div>\n";
                            }
                            }else{echo"  <div class='hlasky'> Email už je použit.</div>";}
                        }
                        }
                    ?>

                    <form method="post" action="#">
                        <label>Jméno:</label>

                        <input type="text" name="jmeno" placeholder="Martin" value="<?= isset($_POST["jmeno"]) ? $_POST["jmeno"] : ""; ?>">

                        <label>Příjmení:</label>
                        <input type="text" name="prijmeni" placeholder="Němec" value="<?= isset($_POST["prijmeni"]) ? $_POST["prijmeni"] : ""; ?>">

                        <label>Heslo:</label>
                        <input type="password" name="heslo" placeholder="***" value="<?= isset($_POST["heslo"]) ? $_POST["heslo"] : ""; ?>">

                        <label>Kontrola hesla:</label>
                        <input type="password" name="kheslo" placeholder="***">

                        <label>Výška:</label>
                        <input type="number" name="vyska" placeholder="1.90" step="0.01" value="<?= isset($_POST["vyska"]) ? $_POST["vyska"] : ""; ?>">

                        <label>Datum narození­:</label>
                        <input type="date" name="datum" placeholder="dd.mm.rrrr" value="<?= isset($_POST["datum"]) ? $_POST["datum"] : ""; ?>">

                        <label>E-mail:</label>
                        <input type="email" name="email" placeholder="jdemecvicit@seznam.cz" value="<?= isset($_POST["email"]) ? $_POST["email"] : ""; ?>">

                        <label>Telefonní číslo:</label>
                        <input type="text" name="telefon" placeholder="777 777 777" value="<?= isset($_POST["tel"]) ? $_POST["tel"] : ""; ?>">


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
                        <textarea class="info" name="info" placeholder="Zde krátce uveď svůj zdravotní stav (alergie, operace, atd.)... " value="<?= isset($_POST["info"]) ? $_POST["info"] : ""; ?>"></textarea>

                        <input type="submit" value="Odeslat">
                    </form>
                </div>
            </article>
            <footer>
            </footer>
        </div>
    </body>
</html>
