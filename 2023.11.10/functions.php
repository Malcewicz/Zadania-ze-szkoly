<?php
$dbhost = 'localhost';
$dbname = 'robinsnest';
$dbuser = 'root';
$dbpass = '';

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($connection->connect_error) die("Błąd krytyczny");

function createTable($name, $query)
{
  queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
  echo "Tabela '$name' została utworzona lub już istnieje.<br>";
}

function queryMysql($query)
{
  global $connection;
  $result = $connection->query($query);
  if (!$result) die("Błąd krytyczny");
  return $result;
}

function destroySession()
{
  $_SESSION = array();
  if (session_id() != "" || isset($_COOKIE[session_name()])) setcookie(session_name(), '', time() - 2592000, '/');
  session_destroy();
}

function sanitizeString($var)
{
  global $connection;
  $var = strip_tags($var);
  $var = htmlentities($var);
  if (false) {
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }
}

function showProfile($user)
{
  if (file_exists("$user.jpg"))
    echo "<img src='$user.jpg' style='float:left;'>";
  $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
  if ($result->num_rows) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
  } else echo "<p>Nie ma tu jeszcze niczego do oglądania.</p><br>";
}
