<?php
<<<<<<< HEAD
$conn_string = "host=localhost port=5432 dbname=projet user=utilisateur password=user";
=======
$conn_string = "host=localhost port=5432 dbname=projet user=postgres password=root";
>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6
$connect = pg_connect($conn_string);

 $donneeIncomplete = "SELECT count(*) from acompleter";
 $donneeTotale ="SELECT count(article) from detail_photo";

  $ret = pg_query($connect, $donneeIncomplete);
  $res = pg_query($connect, $donneeTotale);



  $row = pg_fetch_row($res);

  $line = pg_fetch_row($ret);


  $array = array("donnée totale " =>$row[0] ,"donnée incomlete "=> $line[0]);



  echo json_encode($array,JSON_FORCE_OBJECT);



  if (!pg_close($connect)) {
      echo "Failed to close connection to " . pg_host($connect) . ": " .
  pg_last_error($connect);
  }
