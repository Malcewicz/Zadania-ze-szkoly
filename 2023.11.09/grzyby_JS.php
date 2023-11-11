<?php
$conn = mysqli_connect('localhost', 'root', '', 'dane2');
$query = "SELECT nazwa, nazwa_pliku, opis FROM grzyby";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>Grzybobranie</title>
	<link rel="stylesheet" href="styl5_copy.css" />
</head>

<body>
	<header>
		<h1>Idziemy na grzyby</h1>
	</header>
	<main>
		<?php
		while ($tab = mysqli_fetch_row($result)) {
			echo "<img src=\"$tab[1]\" alt=\"$tab[0]\" />";
			echo "<h2>$tab[0]</h2>
			<p>$tab[2]</p>";
		}
		?>
	</main>
	<footer>
		<p>Autor: 0002137000</p>
	</footer>
</body>
<script src="skrypt5.js"></script>

</html>
<?php
mysqli_close($conn);
?>