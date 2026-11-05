<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista aktorów | KinoTEKA</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header id="jeden">
        <h2><a href="index.php"></a>KinoTEKA</h2>
    </header>
    <header id="dwa">
        <p><em>W naszej bazie znajdują się najlepsi aktorzy</em></p>
    </header>
    <main>
        <h1>Najlepsi aktorzy tylko w naszym kinie</h1>
        <div>
            <!-- skyrpt1 -->
             <?php
             $con = mysqli_connect("localhost","root","","kino");
             $sql1 = mysqli_query( $con,"select id_aktora, imie, nazwisko, ocena, plik_awatara from aktorzy order by nazwisko, imie asc;");
             while( $a = mysqli_fetch_assoc( $sql1 ) ){
                echo "<a href='aktor.php?id=".$a["id_aktora"]."'>";
                echo "<div id='sk1'>";
                echo "<img src='pliki17/img/".$a['plik_awatara']."' alt='".$a['imie']." ",$a['nazwisko']."'>";
                echo "<p>".$a['imie']." ".$a['nazwisko'],"</p>";
                echo "</div>"."</a>";
             }
             mysqli_close( $con );
             ?>
        </div>
    </main>
    <footer>
        <p>Autor: <strong>16162417426</strong></p>
    </footer>
</body>
</html>