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
        <!-- skrypt1 -->
         <?php
         $con = mysqli_connect("localhost","root","","korona");
         $sql = mysqli_query($con,"select id, nazwa from szczyty order by wysokosc DESC;");
         while($a = mysqli_fetch_assoc($sql)){
            echo "<span><a href='szczyty.php?id=".$a['id']."'>".$a['nazwa']."</a></span>";
         }
         mysqli_close($con);
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