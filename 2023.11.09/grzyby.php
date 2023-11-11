<?php
session_start();
header("refresh:20");

if (!isset($_SESSION['grzyb_ID'])) {
	$_SESSION['grzyb_ID'] = 1;
} else {
	$_SESSION['grzyb_ID']++;
	if ($_SESSION['grzyb_ID'] > 8) {
		$_SESSION['grzyb_ID'] = 1;
	}
}

$conn = mysqli_connect('localhost', 'root', '', 'dane2');
$query = "SELECT nazwa, nazwa_pliku, opis FROM grzyby WHERE id = $_SESSION[grzyb_ID]";
$result = mysqli_query($conn, $query);
$tab = mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>Grzybobranie</title>
	<link rel="stylesheet" href="styl5.css" />
</head>

<body>
	<header>
		<h1>Idziemy na grzyby</h1>
	</header>
	<!-- lewy -->
	<section id="lewy">
		<?php
		echo "<img src='$tab[1]' title='$tab[0]' />";
		?>
	</section>
	<!-- prawy -->
	<aside id="prawy">
		<?php
		echo "<h2>$tab[0]</h2><br>";
		echo "<p>$tab[2]</p>";
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