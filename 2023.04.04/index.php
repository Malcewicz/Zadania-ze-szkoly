<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kup mieszkanie</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body,
        html {
            margin: 0;
            padding: 0 0.5rem;
            background-color: #303030;
            color: #fafafa;
        }

        #lewy {
            width: 50%;
            height: 100vh;
            float: left;
            padding-right: 0.5rem;
        }

        #prawy {
            width: 50%;
            height: 100vh;
            float: left;
            padding-left: 0.5rem;
        }

        h1 {
            text-align: center;
        }

        table * {
            border: 1px solid #fafafa;
            border-collapse: collapse;
        }

        #css input {
            margin-block: 0.25rem;
        }
    </style>
</head>

<body>
    <section id="lewy">
        <h1>INFORMACJE Z TABELI</h1>
        <table>
            <thead>
                <tr>
                    <td>Nazwisko</td>
                    <td>Imię</td>
                    <td>Dodatkowe informacje</td>
                </tr>
            </thead>
            <?php
            $connect = mysqli_connect('localhost', 'root', '', 'w3schools');
            $query = mysqli_query($connect, 'SELECT LastName, FirstName, Notes FROM employees');
            while ($row = mysqli_fetch_array($query)) {
                echo "<tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    </tr>";
            }
            ?>
        </table>
    </section>
    <section id="prawy">
        <h1>OBLICZENIA</h1>
        <form action="index.php" method="post">
            <label for="ilosc">ilość</label>
            <input type="number" name="ilosc" id="num" min="0"> <br> <br>
            <select name="produkt" id="produkt">
                <?php
                $query = mysqli_query($connect, 'SELECT ProductName, ProductID FROM products');
                while ($row = mysqli_fetch_array($query)) {
                    echo "<option value='$row[1]'>$row[0]</option>";
                }
                ?>
            </select> <br> <br>
            <input type="checkbox" id="check">Zaznacz <br> <br>
            <input type="submit" value="OPERACJA" id="przycisk"> <br> <br>
        </form>
        <?php
        if (isset($_POST['ilosc']) && isset($_POST['produkt'])) {
            $ilosc = $_POST['ilosc'];
            $produktid = $_POST['produkt'];
            $query = mysqli_query($connect, "SELECT Price, ProductName FROM products WHERE ProductID = $produktid");
            $row = mysqli_fetch_array($query);
            $cena = $row[0];
            $produkt = $row[1];
            $wynik = $cena * $ilosc;
            echo "<p id='wynik'>Koszt zamówienia: $ilosc produktów $produkt wynosi $wynik zł</p>";
        }
        ?>
        <form action="index.php" method="post" id="css">
            <label for="imie">Imie: </label>
            <input type="text" name="imie" id="imie"> <br>
            <label for="nazwisko">Nazwisko: </label>
            <input type="text" name="nazwisko" id="nazwisko"> <br>
            <label for="dataUrodzenia">Data urodzenia: </label>
            <input type="text" name="dataUrodzenia" id="dataUrodzenia"> <br>
            <label for="zdjecie">Zdjecie: </label>
            <input type="text" name="zdjecie" id="zdjecie"> <br>
            <label for="informacje">Informacje: </label>
            <input type="text" name="informacje" id="informacje"> <br> <br>
            <input type="submit" value="Dodaj pracownika"> <br> <br>
        </form>

        <?php
        if (isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['dataUrodzenia']) && isset($_POST['zdjecie']) && isset($_POST['informacje'])) {
            if (!$_POST['imie'] || !$_POST['nazwisko'] || !$_POST['dataUrodzenia'] || !$_POST['zdjecie'] || !$_POST['informacje']) {
                echo "Wypełnij wszystkie pola";
                exit();
            }
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $dataUrodzenia = $_POST['dataUrodzenia'];
            $zdjecie = $_POST['zdjecie'];
            $informacje = $_POST['informacje'];
            $query = mysqli_query($connect, "INSERT INTO `employees` (`FirstName`, `LastName`, `BirthDate`, `Photo`, `Notes`) VALUES ('$imie', '$nazwisko', '$dataUrodzenia', '$zdjecie', '$informacje')");
            if ($query) {
                echo "Dodano pracownika";
            } else {
                echo "Operacja się nie powiodła";
            }
        }
        mysqli_close($connect);
        ?>
    </section>
</body>

</html>