<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 14.09</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Nagłówek</h1>
    </header>
    <main>
        <section id="left">
            <input type="text">
            <input type="text">
            <?php
            $connect = mysqli_connect("localhost", "root", "", "w3schools");
            $query = mysqli_query($connect, "SELECT CustomerName, Country FROM customers LIMIT 10");
            if (isset($_POST['submit'])) {
                $value = "";
                while ($row = mysqli_fetch_array($query)) {
                    $value .= "$row[0], $row[1] \n";
                }
                echo "<textarea rows='10' cols='40' id='textarea' readonly>$value</textarea>";
            }
            ?>
            <form method="post">
                <button type="submit" name="submit">Pobierz</button>
            </form>
            <button type="button" id="copy">Kopiuj</button>
        </section>
        <section id="right">
            <div class="container">
                <p id="wynik">Tutaj pokaże się wynik kopiowania</p>
            </div>
        </section>
    </main>
    <footer>
        <p>Stopka</p> <br>
        <p>Ta stopka zawiera ważne informacje</p> <br>
        <p>Autor: Maciej Bernatowicz</p>
    </footer>
    <script src="script.js"></script>
</body>

</html>