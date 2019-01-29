<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26/01/19
 * Time: 19:39
 */


function graphe()
{
    require('db_connect.php');
    $connect = dbconnect();

    $nbVilleTOtale = "SELECT count(nom_ville) FROM localisation where latlambert93 is null";
    $nbVilleLoiret = "SELECT count(nom_ville) FROM localisation where latlambert93 !='0'";

    $res1 = pg_query($connect, $nbVilleTOtale);
    $res2 = pg_query($connect, $nbVilleLoiret);

    $row = pg_fetch_row($res1);
    $row2 = pg_fetch_row($res2);
    $totale = $row[0] + $row2[0];
    $array = array(
        "NombreVilleLoiret" => $row2[0],
        "NombreVillePasLoiret" => "$row[0]",
        "nbVilleTotale" => "$totale",
    );


    echo json_encode($array, JSON_FORCE_OBJECT);

}
graphe();