<?php

<<<<<<< HEAD
$conn_string = "host=localhost port=5432 dbname=projet user=utilisateur password=user";
=======
$conn_string = "host=localhost port=5432 dbname=projet user=postgres password=root";
>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6
$connect = pg_connect($conn_string);


    $nbPhotoVille="SELECT distinct(localisation.nom_ville),MAX(nb_cliche) FROM detail_artistique,detail_photo,localisation
where detail_artistique.id_photo=detail_photo.id_photo and detail_photo.id_ville=localisation.id_ville and nb_cliche >= '4'
group by localisation.nom_ville";


    $res=pg_query($connect, $nbPhotoVille);

    $row=pg_fetch_all($res);

    echo json_encode($row, JSON_FORCE_OBJECT);
    


    if (!pg_close($connect)) {
        echo "Failed to close connection to " . pg_host($connect) . ": " .
    pg_last_error($connect);
    }
