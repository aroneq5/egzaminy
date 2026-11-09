<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfigurator samochodów</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Serwis konfiguracji samochodów</h1>
    </header>
    <nav>
        <h2>Samochody</h2>
        <h2>Konfigurator</h2>
        <h2>Kontakt</h2>
    </nav>
    <main>
        <section id="lewa">
            <table>
                <!-- skrypt1 -->
                <?php
                $con = mysqli_connect("localhost", "root", "", "samochody");
                $sql1 = mysqli_query($con, "select pojazdy.cena, pojazdy.marka, pojazdy.model, kolory.nazwa, kolory.doplata from pojazdy join kolory on kolory.id = pojazdy.kolor where pojazdy.model='alfa';");
                while ($a = mysqli_fetch_assoc($sql1)) {
                    echo "<tr>";
                    echo "<td>" . $a['marka'] . "</td>";
                    echo "<td>" . $a['model'] . "</td>";
                    echo "<td>" . $a['nazwa'] . "</td>";
                    echo "<td>" . $a['doplata'] + $a['cena'] . "</td>";
                    echo "</tr>";
                }
                mysqli_close($con);
                ?>
            </table>
        </section>
        <section id="srodkowa">
            <table>
                <tr>
                    <th colspan="2">Konfiguracja</th>
                    <th>Cena</th>
                </tr>
                <!-- skrypt2 -->
                <?php
                $con = mysqli_connect("localhost", "root", "", "samochody");
                $sql2 = mysqli_query($con, "SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 2;");
                $b = mysqli_fetch_assoc($sql2);
                $b2 = mysqli_fetch_array($sql2);
                ?>
                <tr>
                    <td colspan="3"><img src="PlikiSt202601/a1.jpg" alt="Konfiguracja 1"></td>
                </tr>
                <tr>
                    <td>Marka</td>
                    <td><?= $b['marka']; ?></td>
                    <td rowspan="2"><?= $b['cena']; ?></td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><?= $b['model']; ?></td>
                </tr>
                <tr>
                    <td colspan="3"><img src="PlikiSt202601/a2.jpg" alt="Konfiguracja 2"></td>
                </tr>
                <tr>
                    <td>Marka</td>
                    <td><?= $b2['marka']; ?></td>
                    <td rowspan="2"><?= $b2['cena']; ?></td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><?= $b2['model']; ?></td>
                </tr>
            </table>
            <?php mysqli_close($con); ?>
        </section>
        <section id="prawa">
            <h3>111 222 444</h3>
            <img src="PlikiSt202601/a3.png" alt="Samochód">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 234714961</p>
    </footer>
</body>

</html>