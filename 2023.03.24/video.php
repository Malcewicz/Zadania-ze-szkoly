<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>
    <header>
        <div id="title">
            <h1>Internetowa wypożyczalnia filmów</h1>
        </div>
        <div id="licznik">
            <table>
                <tr>
                    <td>Kryminał</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>
            </table>
        </div>
    </header>

    <section id="polecamy">
        <h3>Polecamy</h3>
        <?php
        $connect = mysqli_connect('localhost', 'root', '', 'dane3');
        $query = mysqli_query($connect, "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN(12,22,23,25)");
        while ($row = mysqli_fetch_array($query)) {
            echo "<div>
                <h4>$row[0]. $row[1]</h4>
                <img src='$row[3]' alt='film'>
                <p>$row[2]</p>
                </div>";
        }
        ?>
    </section>

    <section id="fantastyka">
        <h3>Filmy fantastyczne</h3>
        <?php
        $query = mysqli_query($connect, "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id=12");
        while ($row = mysqli_fetch_array($query)) {
            echo "<div>
                <h4>$row[0]. $row[1]</h4>
                <img src='$row[3]' alt='film'>
                <p>$row[2]</p>
                </div>";
        }
        ?>
    </section>

    <footer>
        <form action="video.php" method="post">
            <label for="input">Usuń film nr.:</label>
            <input type="number" name="input" id="num" min="0">
            <button type="submit">Usuń film</button>
        </form>
        <?php
        if (isset($_POST["num"])) {
            $num = $_POST["num"];
            $query = mysqli_query($connect, "DELETE FROM produkty WHERE id=$num");
        }
        mysqli_close($connect);
        ?>
        <p>Stronę wykonał: <a href="mailto:ja@poczta.com">00042069000</a></p>
    </footer>
</body>

</html>