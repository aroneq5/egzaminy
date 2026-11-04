<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zdrowy bazarek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
    <h1>Zdrowy bazarek</h1>
    </header>
    <nav>
<?php 
$kon = mysqli_connect("localhost","root","","bazar");
$sql = "select nazwa, plik from towar limit 10;";
$wynik = mysqli_query($kon, $sql);

while($wiersz=mysqli_fetch_assoc($wynik)){
    echo "<img src='pliki3-1/" . $wiersz['plik'] . "' alt='" . $wiersz['nazwa'] . "'>";
}
mysqli_close($kon);
?>
    </nav>
    <main>
        <aside>
            <img src="pliki3-1/market.png" alt="bazarek">
        </aside>
        <section>
            <p>Wybierz owoc lub warzywo i podaj jego wagę</p>
            <form action="index.php" method="post">
                <select name="lista" id="lista">
                    <?php 
                    $kon = mysqli_connect("localhost","root","","bazar");
                    $sql = "select id, nazwa from towar;";
                    $wynik = mysqli_query($kon, $sql);
                    while($wiersz=mysqli_fetch_assoc($wynik)){
                        echo "<option value='" . $wiersz['id'] . "'>" . $wiersz['nazwa'] . "</option>";
                
                    }
                    mysqli_close($kon);
                    ?>
                    </select>
                    <input type="number" name="waga" id="waga">
                    <input type="submit" name="zamow" value="zamów">
                    <?php
    if (isset($_POST['zamow'])) {
    $id = $_POST['lista'];
    $kg = $_POST['waga'];

    $conn = mysqli_connect("localhost", "root", "", "bazar");

    $sql = "SELECT rodzaj, nazwa, cena FROM towar WHERE id = $id";
    $wynik = mysqli_query($conn, $sql);
    $wiersz = mysqli_fetch_assoc($wynik);

    $wartosc = $wiersz['cena'] * $kg;

    echo "<p>" . $wiersz['rodzaj'] . " " . $wiersz['nazwa'] . " wartość: " . $wartosc . " zł</p>";

    $sql2 = "INSERT INTO zamowienia (id_towar, liczba_kg) VALUES ($id, $kg)";
    mysqli_query($conn, $sql2);

    mysqli_close($conn);
}
                    ?>
                </select>
            </form>
        </section>
    </main>
    <footer>
        <p>Stronę opracował: 927498173512815179</p>
    </footer>
</body>
</html>