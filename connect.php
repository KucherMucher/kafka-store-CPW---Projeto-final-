<?php
$mysqli = new mysqli("localhost","root", "" ,"kafka_local_database");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Perform queries and print out affected rows
$result = $mysqli -> query("SELECT * FROM tags");
print_r ($result -> fetch_assoc());

$mysqli -> close();

?>