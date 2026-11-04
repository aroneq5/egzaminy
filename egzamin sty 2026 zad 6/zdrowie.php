<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wykaz chorób</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Informacja o chorobach w Polsce</h1>
    </header>
    <nav>
        <a href="https://szpitale.pl/" target="_blank">Szpitale</a>
        <a href="https://www.przychodnie.pl/" target="_blank">Przychodnie</a>
        <a href="https://www.nfz.gov.pl/" target="_blank">NFZ</a>
    </nav>
    <main>
        <section id="lewa">
            <h2>Choroby zakaźne</h2>
            <ol>
                <!-- skrypt 1 -->
                <?php
                $con = mysqli_connect("localhost","root","","choroby");
                $sql = mysqli_query($con,"select nazwa from choroby where zakazna='T' order by nazwa asc;");
                while($a = mysqli_fetch_assoc($sql)) {
                    echo "<li>".$a['nazwa']."</li>";
                }
                mysqli_close($con);
                ?>
            </ol>
        </section>
        <section id="prawa">
            <h2>Objawy chorób</h2>
            <form action="zdrowie.php" method="post">
                <select name="skrypt2" id="skrypt2">
                    <!-- skrypt 2 -->
                     <?php
                     $con = mysqli_connect("localhost","root","","choroby");
                     $sql = mysqli_query($con,"select id, nazwa from choroby;");
                     while($b = mysqli_fetch_assoc($sql)) {
                        echo "<option value='".$b["id"]."'>".$b['nazwa']."</option>";
                     }
                     mysqli_close($con);
                     ?>
                </select>
                <button name="skrypt3">Sprawdź</button>
            </form>
            <!-- skrypt 3 -->
             <div>
             <?php
             if (isset($_POST["skrypt3"])) {
                $id = $_POST["skrypt2"];
                $con = mysqli_connect("localhost","root","","choroby");
                $sql = mysqli_query($con,"SELECT objawy.nazwa FROM objawy JOIN choroby_objawy ON objawy.id = choroby_objawy.id_objawy WHERE choroby_objawy.id_choroby = $id;");
            while($c=mysqli_fetch_assoc($sql)) {
                echo "<span> ".$c["nazwa"]." </span>";
            }
                
                mysqli_close($con);
             }
             ?>
             </div>
        </section>
    </main>
    <footer>
        Stronę opracował: 1291597092
    </footer>
    <img src="zdrowia.png" alt="Życzymy zdrowia!">
</body>
</html>