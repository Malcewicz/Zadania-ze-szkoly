<!DOCTYPE html>
<html lang="pl">

<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "portal");
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal społecznościowy</title>
  <link rel="stylesheet" href="styl5.css">
</head>

<body>
  <header id="hLeft">
    <h2>Nasze osiedle</h2>
  </header>
  <header id="hRight">
    <!-- skrypt 1 -->
    <?php
    $query = "SELECT COUNT(*) FROM dane";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_row($result);
    echo "<p>Liczba użytkowników portalu: $row[0]</p>"
    ?>
  </header>
  <section id="left">
    <h3>Logowanie</h3>
    <form method="POST">
      <label for="login">login</label> <br>
      <input type="text" name="login" id="login"> <br>
      <label for="haslo">hasło</label> <br>
      <input type="password" name="haslo" id="haslo"> <br>
      <input type="submit" value="Zaloguj">
    </form>
  </section>
  <section id="right">
    <h3>Wizytówka</h3>
    <article id="wizytowka">
      <!-- skrypt 2 -->
      <?php
      if (isset($_POST['login']) && isset($_POST['haslo'])) {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $query = "SELECT haslo FROM uzytkownicy WHERE login='$login'";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_row($result);
        $haslo = sha1($haslo);
        if ($row == null) {
          echo "<p>login nie istnieje</p>";
        } else {
          if ($row[0] == $haslo) {
            $query = "SELECT login, rok_urodz, przyjaciol, hobby, zdjecie FROM uzytkownicy INNER JOIN dane on uzytkownicy.id = dane.id WHERE login = '$login'";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($result);
            $wiek = date("Y") - $row['rok_urodz'];
            echo "<img src='{$row['zdjecie']}' alt='osoba'>";
            echo "<h4>{$row['login']} ($wiek)</h4>";
            echo "<p>hobby: {$row['hobby']}</p>";
            echo "<h1><img src='icon-on.png'> {$row['przyjaciol']}</h1>";
            echo "<a href='dane.html'><button>Więcej informacji</button></a>";
          } else {
            echo "<p>hasło nieprawidłowe</p>";
          }
        }
      }
      ?>
    </article>
  </section>
  <footer>
    <p>Stronę wykonał: 0021376900</p>
  </footer>
</body>
<?php
session_abort();
mysqli_close($connect);
?>

</html>