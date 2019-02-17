<?php
<<<<<<< HEAD
$conn_string = "host=localhost port=5432 dbname=projet user=utilisateur password=user";
=======
$conn_string = "host=localhost port=5432 dbname=projet user=postgres password=root";
>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6
$connect = pg_connect($conn_string);

    $photo = "SELECT count(couleur_noirblanc) from detail_artistique where couleur_noirblanc='couleur'";

    $res1 = pg_query($connect, $photo);

   $row = pg_fetch_row($res1);
  $nbpic = array('Photo noir et blanc' => $row[0]);


    echo json_encode($nbpic,JSON_FORCE_OBJECT);




if (!pg_close($connect)) {
    echo "Failed to close connection to " . pg_host($connect) . ": " .
pg_last_error($connect) . "<br/>\n";
}
 ?>
