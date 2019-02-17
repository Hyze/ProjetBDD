<?php


$conn_string = "host=localhost port=5432 dbname=projet user=utilisateur  password=user";


$connect = pg_connect($conn_string);


$result = pg_query($connect, "SELECT * FROM acompleter");
if (!$result) {
  echo "Une erreur est survenue.\n";
  exit;
}
$arr = pg_fetch_all($result);

    echo json_encode($arr,JSON_FORCE_OBJECT);


if (!pg_close($connect)) {
    echo "Failed to close connection to " . pg_host($connect) . ": " .
pg_last_error($connect) . "<br/>\n";
}
 ?>
