<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'firma');
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sekretariat</title>
  <link rel="stylesheet" href="styl.css">
</head>

<body>
  <article id="left">
    <h1>Akta Pracownicze</h1>

    <!-- skrypt 1 - dane -->
    <?php
    $query = "SELECT imie, nazwisko, adres, miasto, czyRODO, czyBadania FROM pracownicy WHERE id = 2";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    echo "
      <h3>dane</h3>
      <p>{$row['imie']} {$row['nazwisko']}</p>
      <hr>
      <h3>adres</h3>
      <p>{$row['adres']} <br><br> {$row['miasto']}</p>
      <hr>";
    echo $row['czyRODO'] == 1 ? "<p>RODO: podpisano</p>" : "<p>RODO: niepodpisano</p>";
    echo $row['czyBadania'] == 1 ? "<p>Badania: aktualne</p>" : "<p>Badania: nieaktualne</p>";
    echo "<hr>";
    ?>

    <h3>Dokumenty pracownika</h3>
    <a href="cv.txt" download>Pobierz</a>
    <h1>Liczba zatrudnionych pracowników</h1>

    <!-- skrypt 2 - paragraf -->
    <?php
    $query = "SELECT COUNT(*) as liczba FROM pracownicy";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    echo "<p>{$row['liczba']}</p>";
    ?>

  </article>

  <article id="right">

    <!-- skrypt 3 -->
    <?php
    $query = "SELECT id, imie, nazwisko FROM pracownicy WHERE id=2";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    echo "
      <img src='{$row['id']}.jpg' alt='pracownik'>
      <h2>{$row['imie']} {$row['nazwisko']}</h2>";
    $query = "SELECT pracownicy.id, stanowiska.nazwa, stanowiska.opis FROM pracownicy, stanowiska WHERE pracownicy.stanowiska_id = stanowiska.id AND pracownicy.id = 2";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    echo "
      <h4>{$row['nazwa']}</h4>
      <h5>{$row['opis']}</h5>";

    mysqli_close($connect);
    session_abort();
    ?>

  </article>

  <footer>
    <p>Autorem aplikacji jest: 00420213700</p>
    <ul>
      <li>skontaktuj się</li>
      <li>poznaj naszą firmę</li>
    </ul>
  </footer>
</body>

</html>