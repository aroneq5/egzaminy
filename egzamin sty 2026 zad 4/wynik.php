<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matura</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>System informacji dla maturzystów</h1>
    </header>
    <aside>
        <img src="pliki3-2/ma.jpg" alt="Matura"> <br>
        <img src="pliki3-2/tu.jpg" alt="Matura"> <br>
        <img src="pliki3-2/ra.jpg" alt="Matura">
    </aside>
    
    <section>
        <?php
            $id = $_GET["id"];
            $imie = $_GET['imie'];
            $nazwisko = $_GET['nazwisko'];

            echo "<h2>".$imie." ".$nazwisko."</h2>"."<br>";
            $con = mysqli_connect("localhost","root","","matura");
            $sql = mysqli_query($con,"select arkusz.rok, arkusz.sesja, arkusz.przedmiot, wynik.punkty from arkusz JOIN wynik ON arkusz.symbol = wynik.symbol WHERE wynik.maturzysta_id = $id;");
            if (!$sql) { echo mysqli_error($con); };
            while($c=mysqli_fetch_assoc($sql)) {
                echo "<h3>".$c['rok']." ".$c['sesja']."</h3>"."<br>";
                echo "<p>".$c['przedmiot'].": ".$c['punkty']."</p>";
            }
            mysqli_close($con);
        ?>
    </section>
    <section>
        <div class="blok">
            <h4>Przedmioty</h4>
            <?php
            $con = mysqli_connect("localhost", "root", "", "matura");
            $sql = mysqli_query($con, "select DISTINCT przedmiot from arkusz;");
            while ($a = mysqli_fetch_assoc($sql)) {
                echo $a['przedmiot'] . "<br>";
            }
            mysqli_close($con);
            ?>
        </div>
        <div class="blok">
            <h4>Lata</h4>
            <?php
            $con = mysqli_connect("localhost", "root", "", "matura");
            $sql = mysqli_query($con, "select MIN(rok) as najstarszy, MAX(rok) as najmlodszy from arkusz");
            while ($a = mysqli_fetch_assoc($sql)) {
                echo $a['najstarszy'] . " - " . $a['najmlodszy'];
            }
            mysqli_close($con);
            ?>
        </div>
        <div class="blok">
            <h4>Najlepszy wynik</h4>
            <?php
            $con = mysqli_connect("localhost", "root", "", "matura");
            $sql = mysqli_query($con, "select maturzysta_id, avg(punkty) AS Wynik from wynik group by maturzysta_id order by punkty DESC LIMIT 1;");
            while ($a = mysqli_fetch_assoc($sql)) {
                echo $a['maturzysta_id'] . " " . $a['Wynik'] . "%";
            }
            mysqli_close($con);
            ?>
        </div>
        <div class="blok">
            <h4>Najgorszy wynik</h4>
            <?php
            $con = mysqli_connect("localhost", "root", "", "matura");
            $sql = mysqli_query($con, "select maturzysta_id, avg(punkty) AS Wynik from wynik group by maturzysta_id order by punkty ASC LIMIT 1;");
            while ($a = mysqli_fetch_assoc($sql)) {
                echo $a['maturzysta_id'] . " " . $a['Wynik'] . "%";
            }
            mysqli_close($con);
            ?>
        </div>
    </section>
    <footer>Stronę wykonał: 37259623592</footer>
</body>

</html>