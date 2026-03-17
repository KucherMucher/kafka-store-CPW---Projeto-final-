<?php
$host = "localhost";
$user = "root";
$pass = ""; // aluno if using vm
$db   = "om_db_test";

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

echo "<!-- Connected successfully -->";

?>