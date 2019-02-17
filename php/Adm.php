<?php

<<<<<<< HEAD
$conn_string = "host=localhost port=5432 dbname=projet user=utilisateur  password=user";
=======
$conn_string = "host=localhost port=5432 dbname=projet user=postgres password=root";
>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6
$connect = pg_connect($conn_string);


$result = pg_query($connect, "SELECT * FROM administratif where reference_cindoc is not null ");
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
