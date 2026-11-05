<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylizacja paznokci</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <aside>
        <img src="pliki15/manicure.jpg" alt="Stylizacja paznokci">
    </aside>
    <main>
        <header>
            <h1>Twoje wymarzone paznokcie</h1>
        </header>
        <nav>
            <button onmouseover="skrypt2('pierwszy')" id="pierwszy">Kolor</button>
            <button onmouseover="skrypt2('drugi')" id="drugi">Kształt</button>
            <button onmouseover="skrypt2('trzeci')" id="trzeci">Wzór</button>
        </nav>
        <section id="jeden">
            <h2>Kolor</h2>
            <img src="pliki15/kolory.png" alt="Kolory paznokci">
            <input type="color" value="#FF0000">
        </section>
        <section id="dwa">
            <h2>Kształt</h2>
            <img src="pliki15/ksztalt.png" alt="Kształty paznokci">
            <select>
                <option value="midgal">migdał</option>
                <option value="zaokraglony">zaokrąglony</option>
                <option value="kwadratowy">kwadratowy</option>
                <option value="balerina">balerina</option>
                <option value="zaokraglonykwadrat">zaokrąglony kwadrat</option>
            </select>
        </section>
        <section id="trzy">
            <h2>Wzór</h2>
            <!-- skrypt1 -->
             <?php
                for ($i = 1; $i < 11; $i++) {
                    echo "<img src='pliki15/".$i.".jpg' class='wzory' title='".$i."'>";
                }
             ?>
             <input type="number" min="1" max="10">
        </section>
    </main>
    <footer>
        <p>Autor strony: <em>230461241</em></p>
    </footer>
</body>
<script>
    function skrypt2(aidiguzika){
        const kolorg1 =document.getElementById('pierwszy')
        const kolorg2 =document.getElementById('drugi')
        const kolorg3 =document.getElementById('trzeci')
        const sec1 = document.getElementById('jeden')
        const sec2 = document.getElementById('dwa')
        const sec3 = document.getElementById('trzy')

        if(aidiguzika === 'pierwszy'){
            jeden.style.display = 'block'
            dwa.style.display = 'none'
            trzy.style.display = 'none'
            pierwszy.style.backgroundColor = 'salmon'
            drugi.style.backgroundColor = 'crimson'
            trzeci.style.backgroundColor = 'crimson'
        }
        if(aidiguzika === 'drugi'){
            jeden.style.display = 'none'
            dwa.style.display = 'block'
            trzy.style.display = 'none'
            pierwszy.style.backgroundColor = 'crimson'
            drugi.style.backgroundColor = 'salmon'
            trzeci.style.backgroundColor = 'crimson'
        }
        if(aidiguzika === 'trzeci'){
            jeden.style.display = 'none'
            dwa.style.display = 'none'
            trzy.style.display = 'block'
            pierwszy.style.backgroundColor = 'crimson'
            drugi.style.backgroundColor = 'crimson'
            trzeci.style.backgroundColor = 'salmon'
        }
    }   
</script>
</html>