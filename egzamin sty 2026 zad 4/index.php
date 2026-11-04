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
        <h3 id="wybor">Wybierz ucznia z listy:</h3>
        <?php
        $con = mysqli_connect("localhost", "root", "", "matura");
        $sql = mysqli_query($con, "select id, imie, nazwisko from maturzysta where szkola='T3' order by nazwisko ASC;");
        while ($b = mysqli_fetch_assoc($sql)) {
            echo "<a href='wynik.php?id=" . $b['id'] . "&imie=" . $b['imie'] . "&nazwisko=" . $b['nazwisko'] . "'>";
            echo $b['id'] . ". " . $b['imie'] . " " . $b['nazwisko'];
            echo "</a><br>";
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