<?php
$pocztek = strtotime("January 1 2021");
$koniec = mktime(0, 0, 0, 2, 1, 2021);
$data_poczatkowa = date('l, d M Y', $pocztek);
$data_koncowa = date('l, d M Y', $koniec);
?>
<?php include 'naglowek.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wyprzedaż</title>
</head>

<body>

  <p><b>Wyprzedaż zaczyna się:</b> <?= $data_poczatkowa ?> </p>
  <p><b>Wyprzedaż kończy się:</b> <?= $data_koncowa ?> </p>

</body>

</html>

<?php include 'stopka.php'; ?>