<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog kulinarny</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <aside>
        <a href="przepisy.php?id=1">Sernik</a><br>
        <a href="przepisy.php?id=2">Sałatka</a><br>
        <a href="przepisy.php?id=3">Pankejki</a><br>
        <a href="przepisy.php?id=4">Nugetsy</a><br>
        <a href="przepisy.php?id=5">Łosoś</a><br>
        <a href="przepisy.php?id=6">Kociołek</a><br>
        <a href="przepisy.php?id=7">Jagnięcina</a><br>
        <a href="przepisy.php?id=8">Hamburgery</a><br>
        <a href="przepisy.php?id=9">Eklerki</a><br>
        <a href="przepisy.php?id=10">Churros</a><br>
        <p>Autor: 414629817849</p>
    </aside>
    <main>
        <h1>
            <!-- skrypt1 -->
            <?php
            $con = mysqli_connect("localhost", "root", "", "przepisy");
            $id = $_GET['id'];
            $sql = mysqli_query($con, "select potrawy.nazwa, rodzaje.rodzaj from potrawy join rodzaje on potrawy.idRodzaje=rodzaje.idRodzaje where potrawy.idPotrawy=$id;");
            while ($a = mysqli_fetch_assoc($sql)) {
                echo $a["rodzaj"];
            }
            mysqli_close($con);
            ?>
        </h1>
        <!-- skrypt2 -->
        <?php
        $con = mysqli_connect("localhost", "root", "", "przepisy");
        $id = $_GET["id"];
        $sql2 = mysqli_query($con, "select nazwa, trudnosc, kalorie from potrawy where IdPotrawy=$id;");
        while ($b = mysqli_fetch_assoc($sql2)) {
            if ($b["trudnosc"] == 1) {
                $trudnosc = "łatwe";
            } elseif ($b["trudnosc"] == 2) {
                $trudnosc = "średnie";
            } elseif ($b["trudnosc"] == 3) {
                $trudnosc = "trudne";
            }
            echo "<h2>" . $b['nazwa'] . "</h2>";
            echo "<p>Trudność: ".$trudnosc.", Kalorie: ".$b["kalorie"]."</p>";
        }
        mysqli_close($con);
        ?>
        <p></p>
        <h2></h2>
        <img src="pliki14/separator.png" alt="przepis">
        <p>Alergeny
            <!-- skrypt3 -->
            <?php
            $con = mysqli_connect("localhost", "root", "", "przepisy");
            $id = $_GET["id"];
            $sql3 = mysqli_query($con,"select potrawy.nazwa, alergeny.alergen from potrawy join lista_alergenow on potrawy.idPotrawy=lista_alergenow.idPotrawy join alergeny on lista_alergenow.idAlergeny=alergeny.idAlergeny where potrawy.idPotrawy=$id;");
            while ($c = mysqli_fetch_assoc($sql3)) {
                echo $c["nazwa"]." ";
            }
            ?>
        </p>
        <h2>Składniki</h2>
        <ul>
            <li>Lorem 1 kg</li>
            <li>Ipsum 2 szt.</li>
            <li>Dolor 200 g</li>
            <li>Sit amet (szczypta)</li>
            <p>
                <!-- skrypt4 -->
                <?php
                $con = mysqli_connect("localhost", "root", "", "przepisy");
                $id = $_GET["id"];
                $sql4 = mysqli_query($con,"select przepis, plik from potrawy where idPotrawy=$id;");
                while ($d = mysqli_fetch_assoc($sql4)) {
                    echo $d["przepis"];
                    $plik = $d['plik'];
                }
                mysqli_close( $con );
                ?>
            </p>
        </ul>
    </main>
    <section>
        <div style="background-image: url('<?php echo "pliki14/".$plik; ?>');">
            <h1>Blog Kulinarny</h1>
        </div>
    </section>
</body>

</html>