<?php

$fh = fopen('testfile.txt', 'w') or die('Nie udało się utworzyć pliku');

$text = <<<_END
Linia 1
Linia 2
Linia 3
_END;

fwrite($fh, $text) or die('Nie udało się zapisać danych w pliku');
fclose($fh);
echo 'Plik testfile.txt został zapisany pomyślnie';

?>

<?php

echo "<pre>"; // pozwala na zachowanie formatowania tekstu
echo file_get_contents('testfile.txt');
echo "</pre>";

?>

<?php //upload2.php
echo <<<_END
<html>
<head>
<title>Formularz wysyłania plików w PHP</title>
<meta charset="utf-8"> 
</head>
<body>
<form method='post' action='upload2.php' enctype='multipart/form-data'>
Wybierz plik w formacie JPG, GIF, PNG lub TIF:
<input type='file' name='filename'>
<input type='submit' value='Wyślij'>
</form>
_END;
if ($_FILES) {
  $name = $_FILES['filename']['name'];
  switch ($_FILES['filename']['type']) {
    case 'image/jpeg':
      $ext = 'jpg';
      break;
    case 'image/gif':
      $ext = 'gif';
      break;
    case 'image/png':
      $ext = 'png';
      break;
    case 'image/tiff':
      $ext = 'tif';
      break;
    default:
      $ext = '';
      break;
  }
  if ($ext) {
    $n = "obraz.$ext";
    move_uploaded_file($_FILES['filename']['tmp_name'], $n);
    echo "Obrazek '$name' zapisano pod nazwą '$n':<br>";
    echo "<img src='$n'>";
  } else echo "'$name' nie jest obsługiwanym typem pliku";
} else echo "Plik nie został przesłany";
echo "</body></html>";
?>