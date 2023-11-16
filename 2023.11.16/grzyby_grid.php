<?php
$conn = mysqli_connect('localhost', 'root', '', 'dane2');
$query = "SELECT nazwa, nazwa_pliku, potoczna FROM grzyby";
$result = mysqli_query($conn, $query);
$tab = mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Grzybobranie</title>
  <link rel="stylesheet" href="styl5.css" />
  <style>
    #lewy {
      display: grid;
      grid-template-columns: repeat(3, 278px);
      gap: 1rem;
      background: BurlyWood;
      height: 700px;
      width: 70%;
      float: left;
    }

    #lewy>* {
      align-self: center;
    }
  </style>
</head>

<body>
  <header>
    <h1>Idziemy na grzyby</h1>
  </header>
  <!-- lewy -->
  <section id="lewy">
    <?php
    while ($tab = mysqli_fetch_row($result)) {
      echo "<img src='$tab[1]' title='$tab[0]' />";
    }
    ?>
  </section>
  <!-- prawy -->
  <aside id="prawy">
    <h2>Grzyby jadalne</h2>
    <?php
    $result = mysqli_query($conn, $query);
    $tab = mysqli_fetch_row($result);
    while ($tab = mysqli_fetch_row($result)) {
      echo "<p>$tab[0] ($tab[2])</p>";
    }
    ?>
  </aside>
  <footer>
    <p>Autor: 0002137000</p>
  </footer>
</body>

</html>
<?php
mysqli_close($conn);
?>