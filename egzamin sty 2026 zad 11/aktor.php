<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacje o aktorze | KinoTEKA</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2><a href="index.php"></a>KinoTEKA</h2>
    </header>
    <header>
        <p><em>W naszej bazie znajdują się najlepsi aktorzy</em></p>
    </header>
    <main>
        <div>
            <!-- skrypt2 -->
            <?php
            $id = $_GET["id"];
            $con = mysqli_connect("localhost","root","","kino");
            $sql2 = mysqli_query( $con,"select imie, nazwisko, plik_awatara from aktorzy where id_aktora=$id;");
            while ($b = mysqli_fetch_assoc($sql2) ) {
            $imie= $b["imie"];
            echo "<div id='sk2'>";
            echo "<img src='pliki17/img/".$b['plik_awatara']."' alt='".$b['imie']." ".$b["nazwisko"]."' title='".$b['imie']." ".$b["nazwisko"]."'>";
            echo "<h1>".$b['imie']." ".$b['nazwisko']."</h1>";
            echo "</div>";
            }
            mysqli_close($con);
            ?>
        </div>
        <!-- skrypt 3 -->
         <?php
         $id = $_GET["id"];
         $con = mysqli_connect("localhost","root","","kino");
         $sql3 = mysqli_query( $con,"select filmy.id_filmu, filmy.tytul, filmy.rok_produkcji from filmy join filmy_aktorzy on filmy_aktorzy.id_filmu=filmy.id_filmu where filmy_aktorzy.id_aktora=$id;");
        $liczba = mysqli_num_rows($sql3);
            if($liczba ==0){
                echo $imie." nie znajduje się na listach obsady znanych nam produkcji.";
            }else{
                echo $imie." znajduje się na listach obsady ".$liczba." znanych nam produkcji";
            }
         mysqli_close($con);
         ?>
    </main>
    <footer>
        <p>Autor: <strong>16162417426</strong></p>
    </footer>
</body>
</html>