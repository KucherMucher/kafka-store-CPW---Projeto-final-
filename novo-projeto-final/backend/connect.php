<?php
$host = "localhost";
$user = "root";
$pass = "aluno"; // aluno if using vm
$db   = "om_db"; // _test if using laragon

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

echo "<connect><!-- Connected successfully --></connect>";

?>