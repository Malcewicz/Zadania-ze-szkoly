<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'egzamin');
?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Salon urody VENUS</title>
  <link rel="stylesheet" href="styl.css">
</head>

<body>
  <header>
    <h1>Salon urody VENUS</h1>
  </header>
  <section id="top">
    <img src="1.jpg" alt="">
    <img src="2.jpg" alt="">
    <img src="3.jpg" alt="">
    <img src="4.jpg" alt="">
    <img src="5.jpg" alt="">
    <img src="6.jpg" alt="">
  </section>
  <article id="left">
    <h3>Cennik</h3>
    <!-- skrypt 1 -->
    <table>
      <thead>
        <th>Nazwa</th>
        <th>Opis</th>
        <th>Cena</th>
      </thead>
      <tbody>
        <?php
        $query = "SELECT id, Nazwa, Opis, Cena FROM zabiegi";
        $result = mysqli_query($conn, $query);
        $row1 = '';
        while ($row = mysqli_fetch_array($result)) {
          $row1 .= "<tr>
          <td>$row[1]</td>
          <td>$row[2]</td>
          <td>$row[3]</td>
          </tr>";
        }
        echo $row1;
        ?>
      </tbody>
    </table>
  </article>
  <article id="right">
    <form method="POST">
      <span><label for='zabiegi'>Zabieg: </label>
        <!-- skrypt 2 -->
        <?php
        $query = "SELECT id, Nazwa FROM zabiegi";
        $result = mysqli_query($conn, $query);
        $options = '';
        while ($row = mysqli_fetch_array($result)) {
          $options .= "<option value='$row[0]'>$row[1]</option>";
        }
        echo "<select name='zabiegi' id='zabiegi'>$options</select>";
        ?>
      </span>
      <span><label for='calendar'>Wybierz datę: </label> <input type="date" name="calendar" id='calendar'></span>
      <span><input type="radio" name="hour" value="08:00" id='eight'> <label for="eight">8:00</label></span>
      <span><input type="radio" name="hour" value="09:00" id="nine"> <label for="nine">9:00</label></span>
      <span><input type="radio" name="hour" value="10:00" id="ten"> <label for="ten">10:00</label></span>
      <span><input type="radio" name="hour" value="11:00" id="eleven"> <label for="eleven">11:00</label></span>
      <span><input type="radio" name="hour" value="12:00" id="twelve"> <label for="twelve">12:00</label></span>
      <span><input type="radio" name="hour" value="13:00" id="thirteen"> <label for="thirteen">13:00</label></span>
      <span><input type="radio" name="hour" value="14:00" id="fourteen"> <label for="fourteen">14:00</label></span>
      <span><input type="radio" name="hour" value="15:00" id="fifteen"> <label for="fifteen">15:00</label></span>
      <input type="submit" value="Zarezerwuj">
    </form>
    <!-- skrypt 3 -->
    <?php
    if (isset($_POST['zabiegi']) && isset($_POST['calendar']) && isset($_POST['hour'])) {
      $zabieg = $_POST['zabiegi'];
      $data = $_POST['calendar'];
      $godzina = $_POST['hour'];
      $query = "INSERT INTO `grafik`(`data`, `godzina`, `status`) VALUES ('$data', '$godzina', 'Z')";
      $result = mysqli_query($conn, $query);
    }
    ?>
  </article>
  <footer>
    <p>PESEL: Maciej Bernatowicz</p>
  </footer>
</body>

</html>

<?php
session_abort();
mysqli_close($conn);
?>