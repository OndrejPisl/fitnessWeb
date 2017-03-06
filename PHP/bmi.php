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
        <script type="text/javascript" src="../JS/moment.js"></script>
        <script type="text/javascript" src="../JS/Chart.js"></script>
        <script type="text/javascript">
            var chart;
            var vahaGraf = [];
            var bmiGraf = [];
            var ted = new Date();
            var grafConfig = {
                odKdy : (ted.getTime() - (30 * 24 * 60 * 60 * 1000))/1000,
                doKdy : ted.getTime() / 1000, 
                rozsah : 1 // 1 den, 2 mesic, 3 rok
            }
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
                    
                    var params = "id=" + getUzivatelId() + "&datum=" + zkontrolujDatum(datum).getTime()/1000 + "&vaha=" + vaha;
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
                            vahaPolozka.x = new Date(prvek.datum * 1000);
                            vahaPolozka.y = prvek.vaha;
                            vahaGraf.push(vahaPolozka);
                            var bmiPolozka = {};
                            bmiPolozka.x = vahaPolozka.x;
                            bmiPolozka.y = prvek.vaha / (1.72 * 1.72);
                            bmiGraf.push(bmiPolozka);
                        });
                        chart.update();
                    }
                };
                xhttp.open("GET", "getVahy.php?id=" + id + "&odKdy=" + odKdy + "&doKdy=" + doKdy, true);
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
                } else if (kam === 3) {
                    denElement.style.backgroundColor = originalColor;
                    mesicElement.style.backgroundColor = highlight;
                    rokElement.style.backgroundColor = originalColor;
                } else if (kam === 4) {
                    denElement.style.backgroundColor = originalColor;
                    mesicElement.style.backgroundColor = originalColor;
                    rokElement.style.backgroundColor = highlight;
                } else if (kam === 0) {
                    grafConfig.odKdy = grafConfig.odKdy - 24 * 60 * 60;
                    grafConfig.doKdy = grafConfig.doKdy - 24 * 60 * 60;
                    ziskejVahy(grafConfig.odKdy, grafConfig.doKdy, grafConfig.rozsah);
                } if (kam === 1) {
                    grafConfig.odKdy = grafConfig.odKdy + 24 * 60 * 60;
                    grafConfig.doKdy = grafConfig.doKdy + 24 * 60 * 60;
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
        <?php
        include 'menu.php';
        $id = $_SESSION["id"];
        if ($id == null) {
            header("Location: prihlaseni.php");
        }
        ?>


        <article>
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
                    <input type="button" value="Ulozit" onclick="ulozVahu();">
                    <input type="number" id="uzivatelId" value="<?= $id ?>" style="visibility: hidden">
                    <div id="zprava" class="hlasky" style="visibility: hidden"></div>
                </form>
            </div>
        </article>
    </body>
</html>
