<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZGŁOSZENIA</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Zgłoszenia wydarzeń</h1>
    </header>
    <main>
        <section id="lewa">
            <h2>Personel</h2>
            <form action="index.php" method="post">
                <input type="radio" name="cos" id="policjant" value="policjant" checked>
                <label for="policjant">Policjant</label>
                <input type="radio" name="cos" id="ratownik" value="ratownik">
                <label for="ratownik">Ratownik</label>
                <button name="skrypt1">Pokaż</button>
            </form> <br>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                </tr>
                <?php
                $a = "policjant";
                if (isset($_POST["cos"])) {
                    $a = $_POST["cos"];
                }
                $con = mysqli_connect("localhost", "root", "", "zglosznia");
                $sql = mysqli_query($con, "SELECT id, imie, nazwisko FROM personel WHERE status='$a'");
                while ($b = mysqli_fetch_assoc($sql)) {
                    echo "<tr>";
                    echo "<td>" . $b['id'] . "</td>";
                    echo "<td>" . $b['imie'] . "</td>";
                    echo "<td>" . $b['nazwisko'] . "</td>";
                    echo "</tr>";
                }
                mysqli_close($con);
                ?>
            </table>
        </section>
        <section id="prawa">
            <h2>Nowe zgłoszenie</h2>
                <!-- skrypt 2 -->
                 <ol>
                 <?php
                 $con = mysqli_connect("localhost", "root", "", "zglosznia");
                 $sql = mysqli_query($con,"select id, nazwisko from personel where id NOT IN (select id_personel from rejestr);");
                 while ($c = mysqli_fetch_assoc($sql)) {
                    echo "<li>".$c['id']." ".$c['nazwisko']."</li>";
                 };
                 mysqli_close($con);
                 ?>
                 </ol>
            <form action="index.php" method="post">
                <label for="numer">Wybierz id osoby z listy:</label>
                <input type="number" name="numer" id="">
                <button name="skrypt3">Dodaj zgłoszenie</button>
            </form>
            <?php
            if (isset($_POST["skrypt3"])) {
                $id = $_POST["numer"];
            $con = mysqli_connect("localhost", "root", "","zglosznia");
            $sql = mysqli_query($con,"INSERT INTO rejestr (data, id_personel, id_pojazd) VALUES (CURRENT_DATE,$id, 14);");
            mysqli_close($con); 
            }
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 23941384</p>
    </footer>
</body>

</html>