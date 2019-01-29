<?php

function graphe()
{
  require 'db_connect.php';
    $connect = dbconnect();

$nbPhotoVille="SELECT distinct(localisation.nom_ville),nb_cliche FROM detail_artistique,detail_photo,localisation where detail_artistique.id_photo=detail_photo.id_photo and detail_photo.id_ville=localisation.id_ville";


$res=pg_query($connect,$nbPhotoVille);

$row=pg_fetch_all($res);

echo json_encode($row,JSON_FORCE_OBJECT);
  //echo $row;
}

graphe()

 ?>
