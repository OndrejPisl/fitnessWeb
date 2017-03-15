<?php
session_start();
include 'pripojeni.php';

if (isset($_SESSION["id"])) {
    $data = mysqli_query($connect, "SELECT vyska FROM uzivatele WHERE uzivatele.id={$_SESSION['id']}");
    $zaznam = mysqli_fetch_array($data);
    $vyska = $zaznam['vyska'];
}
if (isset($_SESSION["potvrzeni_pristupu"])) {
    if ($_SESSION["potvrzeni_pristupu"] == "0")
        header("Location: zatimneprijat.php");
}

if (!isset($_SESSION["email"]))
    header("Location: prihlaseni.php");
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
        </title>
        <link rel="stylesheet" href="../CSS/css.css">
        <link rel="shortcut icon" href="../foto/favicon.bmp" type="image/x-icon">
        <script type="text/javascript" src="../JS/moment.js"></script>
        <script type="text/javascript" src="../JS/Chart.js"></script>
        <script type="text/javascript">
            var chart;
            var vahaGraf = [];
            var bmiGraf = [];
            var ted = new Date();
            var dneska = new Date(ted.getFullYear(), ted.getMonth(), ted.getDate());
            var grafConfig = {
                odKdy: new Date(ted.getFullYear(), ted.getMonth(), ted.getDate()),
                doKdy: new Date(ted.getFullYear(), ted.getMonth(), ted.getDate()),
                rozsah: 1, // 1 den, 2 mesic, 3 rok
                posunODen: function (dopredu) {
                    if (dopredu) {
                        this.odKdy.setDate(this.odKdy.getDate() + 1);
                        this.doKdy.setDate(this.doKdy.getDate() + 1);
                    } else {
                        this.odKdy.setDate(this.odKdy.getDate() - 1);
                        this.doKdy.setDate(this.doKdy.getDate() - 1);
                    }
                },
                posunOMesic: function (dopredu) {
                    if (dopredu) {
                        this.odKdy.setMonth(this.odKdy.getMonth() + 1);
                        this.doKdy.setMonth(this.doKdy.getMonth() + 1);
                    } else {
                        this.odKdy.setMonth(this.odKdy.getMonth() - 1);
                        this.doKdy.setMonth(this.doKdy.getMonth() - 1);
                    }
                },
                posunORok: function (dopredu) {
                    if (dopredu) {
                        this.odKdy.setFullYear(this.odKdy.getFullYear() + 1);
                        this.doKdy.setFullYear(this.doKdy.getFullYear() + 1);
                    } else {
                        this.odKdy.setFullYear(this.odKdy.getFullYear() - 1);
                        this.doKdy.setFullYear(this.doKdy.getFullYear() - 1);
                    }
                }
            }
            // prvotni nastaveni je o mesic pozdeji
            grafConfig.odKdy.setMonth(grafConfig.odKdy.getMonth() - 1);
            var grafData = {
                datasets: [{
                        label: "Vaha",
                        fill: false,
                        backgroundColor: "rgba(0,192,0,0.4)",
                        borderColor: "rgba(0,192,0,0.4)",
                        data: vahaGraf
                    },
                    {
                        label: "BMI",
                        fill: false,
                        backgroundColor: "rgba(192,192,0,0.4)",
                        borderColor: "rgba(192,192,0,0.4)",
                        data: bmiGraf
                    }]
            }

            function ulozVahu() {
                var datum = document.getElementById("datum").value;
                var vaha = document.getElementById("vaha").value;
                console.log("datum: " + datum);
                console.log("vaha: " + vaha);
                var zpravaElement = document.getElementById("zprava");
                if (zkontrolujDatum(datum)) {
                    console.log("zadost o data");
                    zpravaElement.style.visibility = "hidden";
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log("response: ");
                            console.log(xhttp.responseText);
                            ziskejVahy(grafConfig.odKdy, grafConfig.doKdy, grafConfig.rozsah);
                        }
                    };
                    xhttp.open("POST", "ulozVahu.php", true);

                    var params = "id=" + getUzivatelId() + "&datum=" + zkontrolujDatum(datum).getTime() / 1000 + "&vaha=" + vaha;
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.setRequestHeader("Content-length", params.length);
                    xhttp.setRequestHeader("Connection", "close");
                    xhttp.send(params);
                } else {
                    zpravaElement.innerHTML = "Spatny format datumu, zadejte ve formatu d.m.yyyy";
                    zpravaElement.style.visibility = "visible";
                }
            }

            function zkontrolujDatum(value) {
                if (value == "")
                    return false;
                var dtArr = value.split(".");
                if (dtArr.length != 3)
                    return false;

                var dx = new Date(dtArr[2], dtArr[1] - 1, dtArr[0]);
                if (dx.getDate() != dtArr[0])
                    return false;
                if (dx.getMonth() + 1 != dtArr[1])
                    return false;
                return dx;
            }

            function getUzivatelId() {
                var elementId = document.getElementById("uzivatelId");
                return elementId.value;
            }

            function getUzivatelVyska() {
                var elementId = document.getElementById("uzivatelVyska");
                return elementId.value;
            }

            function ziskejVahy(odKdy, doKdy, agregace) {
                var id = getUzivatelId();
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(xhttp.responseText);
                        var hodnoty = JSON.parse(xhttp.responseText);
                        vahaGraf.length = 0;
                        bmiGraf.length = 0;
                        hodnoty.forEach(function (prvek) {
                            var vahaPolozka = {};
                            switch (agregace) {
                                case 1:
                                    vahaPolozka.x = new Date(prvek.rok, prvek.mesic - 1, prvek.den);
                                    break;
                                case 2:
                                    vahaPolozka.x = new Date(prvek.rok, prvek.mesic - 1);
                                    break;
                                case 3:
                                    vahaPolozka.x = new Date(prvek.rok);
                                    break;
                            }
                            vahaPolozka.y = prvek.vaha;
                            vahaGraf.push(vahaPolozka);
                            var bmiPolozka = {};
                            bmiPolozka.x = vahaPolozka.x;
                            bmiPolozka.y = prvek.vaha / (getUzivatelVyska() * getUzivatelVyska());
                            bmiGraf.push(bmiPolozka);
                        });
                        if (vahaGraf.length === 0 || vahaGraf[0].x > odKdy) {
                            // pokud neni hodnota pro pocatecni den, vlozime ji
                            // jako prazdnou, aby graf zobrazoval pocatecni den
                            vahaGraf.push({"x": odKdy, "y": NaN});
                        }
                        if (vahaGraf.length === 0 || vahaGraf[vahaGraf.length - 1].x < doKdy) {
                            // pokud neni hodnota pro konecni den, vlozime ji
                            // jako prazdnou, aby graf zobrazoval cely pozadovany
                            // interval
                            vahaGraf.push({"x": doKdy, "y": NaN});
                        }
                        chart.update();
                    }
                };
                xhttp.open("GET", "getVahy.php?id=" + id + "&odKdy=" + odKdy.getTime() / 1000 + "&doKdy=" + doKdy.getTime() / 1000 + "&agregace=" + agregace, true);
                xhttp.send();
            }

            function posunGraf(kam) {
                var originalColor = '#ccc';
                var highlight = "#666";
                var denElement = document.getElementById("den");
                var mesicElement = document.getElementById("mesic");
                var rokElement = document.getElementById("rok");
                if (kam === 2) {
                    denElement.style.backgroundColor = highlight;
                    mesicElement.style.backgroundColor = originalColor;
                    rokElement.style.backgroundColor = originalColor;
                    grafConfig.timeUnit = 'day';
                    var ted = new Date();
                    grafConfig.doKdy = new Date(ted.getFullYear(), ted.getMonth(), ted.getDate());
                    grafConfig.odKdy = new Date(ted.getFullYear(), ted.getMonth(), ted.getDate());
                    grafConfig.odKdy.setMonth(grafConfig.odKdy.getMonth() - 1);
                    chart.options.scales.xAxes[0].time.unit = 'day';
                    grafConfig.rozsah = 1;
                    ziskejVahy(grafConfig.odKdy, grafConfig.doKdy, grafConfig.rozsah);
                } else if (kam === 3) {
                    denElement.style.backgroundColor = originalColor;
                    mesicElement.style.backgroundColor = highlight;
                    rokElement.style.backgroundColor = originalColor;
                    var ted = new Date();
                    grafConfig.doKdy = new Date(ted.getFullYear(), ted.getMonth(), ted.getDate());
                    grafConfig.odKdy = new Date(ted.getFullYear(), ted.getMonth(), ted.getDate());
                    grafConfig.odKdy.setFullYear(grafConfig.odKdy.getFullYear() - 1);
                    grafConfig.rozsah = 2;
                    chart.options.scales.xAxes[0].time.unit = 'month';
                    ziskejVahy(grafConfig.odKdy, grafConfig.doKdy, grafConfig.rozsah);
                } else if (kam === 4) {
                    denElement.style.backgroundColor = originalColor;
                    mesicElement.style.backgroundColor = originalColor;
                    rokElement.style.backgroundColor = highlight;
                    var ted = new Date();
                    grafConfig.doKdy = new Date(ted.getFullYear(), 11, 31);
                    grafConfig.odKdy = new Date(ted.getFullYear(), 1, 1);
                    grafConfig.odKdy.setFullYear(grafConfig.odKdy.getFullYear() - 10);
                    grafConfig.rozsah = 3;
                    chart.options.scales.xAxes[0].time.unit = 'year';
                    ziskejVahy(grafConfig.odKdy, grafConfig.doKdy, grafConfig.rozsah);
                } else if (kam === 0) {
                    switch (grafConfig.rozsah) {
                        case 1:
                            grafConfig.posunODen(false);
                            break;
                        case 2:
                            grafConfig.posunOMesic(false);
                            break;
                        case 3:
                            grafConfig.posunORok(false);
                            break;
                    }
                    ziskejVahy(grafConfig.odKdy, grafConfig.doKdy, grafConfig.rozsah);
                }
                if (kam === 1) {
                    switch (grafConfig.rozsah) {
                        case 1:
                            grafConfig.posunODen(true);
                            break;
                        case 2:
                            grafConfig.posunOMesic(true);
                            break;
                        case 3:
                            grafConfig.posunORok(true);
                            break;
                    }
                    ziskejVahy(grafConfig.odKdy, grafConfig.doKdy, grafConfig.rozsah);
                }
            }

            window.onload = function () {
                ziskejVahy(grafConfig.odKdy, grafConfig.doKdy, grafConfig.rozsah);
                var ctx = document.getElementById("bmiChart");
                chart = new Chart(ctx, {
                    type: 'line',
                    data: grafData,
                    options: {
                        scales: {
                            xAxes: [{
                                    type: 'time',
                                    time: {
                                        unit: 'day'
                                    }
                                }]
                        }
                    }
                });
            }
        </script>

    </head>
    <body>
        <div class="barva">
            <?php
            include 'menu.php';
            $id = $_SESSION["id"];
            if ($id == null) {
                header("Location: prihlaseni.php");
            }
            ?>


            <article>
                <div class="uzivatelodkazy"><a href="uzivatel.php">Zpět</a></div>
                <div>
                    <canvas id="bmiChart" width="400" height="150"></canvas>
                    <div>
                        <div id="posunZpet" class="tlacitkoOn" onclick="posunGraf(0);">&lt;</div>
                        <div id="posunDalsi" class="tlacitkoOn" onclick="posunGraf(1);">&gt;</div>
                        <div id="den" class="tlacitkoOn" onclick="posunGraf(2);" style = "background-color: #666;">Den</div>
                        <div id="mesic" class="tlacitkoOn" onclick="posunGraf(3);">Mesic</div>
                        <div id="rok" class="tlacitkoOn" onclick="posunGraf(4);">Rok</div>
                    </div>
                </div>
                <br /> <br />
                <div style="float: right"> 
                    <form>
                        <label>Datum:</label>
                        <input id="datum" type="datetime"  value="">
                        <label>Tvoje vaha:</label>
                        <input id="vaha" type="number" step="0.1" value="" >
                        <input type="button" value="Uložit" onclick="ulozVahu();">
                        <input type="number" id="uzivatelId" value="<?= $id ?>" style="visibility: hidden">
                        <input type="number" id="uzivatelVyska" value="<?= $vyska ?>" style="visibility: hidden">
                        <div id="zprava" class="hlasky" style="visibility: hidden"></div>
                    </form>
                </div>
            </article>
            <footer></footer>
        </div>
    </body>
</html>
