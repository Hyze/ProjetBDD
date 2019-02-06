<?php

function graphe()
{
    require 'db_connect.php';
    $connect = dbconnect();

    $nbdataIncomplete="SELECT count(*)from acompleter;"
    $dataTotale="SELECT count(article) from info; "

    $res1=pg_query($connect,$nbdataIncomplete);
    $res2=pg_query($connect,$dataTotale);
    $row = pg_fetch_row($res1);
    $row2 = pg_fetch_row($res2);
    $array = array(
        "Données Incomplete" => $row[0],
        "Données Totale" => "$row2[0]",
    );


echo "test";
    //echo json_encode($array, JSON_FORCE_OBJECT);
}

graphe();
