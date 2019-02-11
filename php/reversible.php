<?php
$conn_string = "host=localhost port=5432 dbname=projet user=postgres password=root";
$connect = pg_connect($conn_string);

    $photo = "SELECT count(negatif_reversible) from detail_artistique where negatif_reversible='négatif'";

    $res1 = pg_query($connect, $photo);

   $row = pg_fetch_row($res1);
  $nbpic = array('Photo negatif / reversible ' => $row[0]);


    echo json_encode($nbpic,JSON_FORCE_OBJECT);




if (!pg_close($connect)) {
    echo "Failed to close connection to " . pg_host($connect) . ": " .
pg_last_error($connect) . "<br/>\n";
}
 ?>
