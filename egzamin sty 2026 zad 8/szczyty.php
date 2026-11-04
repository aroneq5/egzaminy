<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korona gór polskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header id="pierwszy">
        <img src="pliki13/logo.png" alt="Logo">
    </header>
    <header id="drugi">
        <h1>Korona Gór Polskich</h1>
    </header>
    <main>
        <!-- skrypt3 -->
        <?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $con = mysqli_connect("localhost","root","","korona");
            $sql = mysqli_query($con,"select plik, nazwa, wysokosc, pasmo, opis.opis from szczyty join opis on szczyty.id=opis.szczyty_id where szczyty.id = $id;");
            while($c=mysqli_fetch_assoc($sql)){
                echo"<img src='pliki13/".$c["plik"]."' alt='szczyt'>";
                echo"<h2>".$c["nazwa"]."</h2>";
                echo"<h3> wysokość: ".$c["wysokosc"]." metrów n.p.m </h3>";
                echo"<h3> pasmo górskie: ".$c["pasmo"]."</h3>";
                echo"<p>".$c["opis"]."</p>";
            }
        }
        ?>
    </main>
    <section>
        <!-- skryp2 -->
         <?php
         $con = mysqli_connect("localhost","root","","korona");
         $sql = mysqli_query($con,"select plik, nazwa from szczyty LIMIT 10;");
         while($b = mysqli_fetch_assoc($sql)){
            echo "<img src='pliki13/".$b["plik"]."' alt='".$b["nazwa"]."' class='miniatury'>";
         }
         ?>
    </section>
    <footer id="jeden">
        <h3>Kontakt</h3>
        <ul>
            <li>Zadzwoń do nas: 111 222 333</li>
            <li>Napisz do nas: <a href="mailto:korona@gory.pl"></a></li>
        </ul>
    </footer>
    <footer id="dwa">
        <h3>© Wykonane przez: 9020125719256</h3>
    </footer>   
</body>
</html>