<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pogoda</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header id="pierwszy">
        <img src="pliki9-2/slonce.png" alt="Słonecznie">
    </header>
    <header id="drugi">
        <h1>Pogoda w Europie</h1>
    </header>
    <main>
        <section id="lewa">
            <h2>Temperatury w lipcu</h2>
            <table>
                <tr>
                    <th>Miasto</th>
                    <th>Kraj</th>
                    <th>Temperatura</th>
                    <th>Pogoda</th>
                </tr>
                <!-- skrypt1 -->
                <?php
                $con = mysqli_connect("localhost", "root", "", "pogoda");
                $sql = mysqli_query($con, "select miejscowosc.nazwa, miejscowosc.kraj, pomiary.temperatura from miejscowosc JOIN pomiary ON miejscowosc.id = pomiary.id_miejscowosc JOIN miesiace ON miesiace.id = pomiary.id_miesiac WHERE miesiace.id = 7;");
                while ($a = mysqli_fetch_assoc($sql)) {
                    echo "<tr>";
                    echo "<td>" . $a["nazwa"] . "</td>";
                    echo "<td>" . $a["kraj"] . "</td>";
                    echo "<td>" . $a["temperatura"] . "</td>";

                    if ($a["temperatura"] > 30) {
                        $obraz = "pliki9-2/slonce.png";
                    } elseif ($a["temperatura"] < 26) {
                        $obraz = "pliki9-2/deszcz.png";
                    } else {
                        $obraz = "pliki9-2/chmury.png";
                    }
                    echo "<td><img src='" . $obraz . "' alt='pogoda' id='fota'></td>";
                    echo "</tr>";
                }
                mysqli_close($con);
                ?>
            </table>
        </section>
        <section id="prawa">
            <h2>Średnie temperatury w roku</h2>
            <a href="index.php?id=1">Styczeń</a>
            <a href="index.php?id=2">Luty</a>
            <a href="index.php?id=3">Marzec</a>
            <a href="index.php?id=4">Kwiecień</a>
            <a href="index.php?id=5">Maj</a>
            <a href="index.php?id=6">Czerwiec</a>
            <a href="index.php?id=7">Lipiec</a>
            <a href="index.php?id=8">Sierpień</a>
            <a href="index.php?id=9">Wrzesień</a>
            <a href="index.php?id=10">Październik</a>
            <a href="index.php?id=11">Listopad</a>
            <a href="index.php?id=12">Grudzień</a>
            <p>Średnia temperatura dla wybranego miesiąca wynosi</p>
            <!-- skrypt2 -->
            <?php
            $con = mysqli_connect("localhost","root","","pogoda");
            if(isset($_GET["id"])) {
            $mon = $_GET["id"];
            $sql = mysqli_query($con,"select round(AVG(temperatura),2) AS temperatura from pomiary where id_miesiac=$mon;");
            while ($b = mysqli_fetch_assoc($sql)) {
                echo "<h3>".$b['temperatura']." stopni </h3>";
            }
            }
            mysqli_close($con);
            ?>
        </section>
    </main>
    <footer>
        <p>Numer zdającego: 1418429128479821</p>
    </footer>
</body>

</html>