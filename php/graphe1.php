<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26/01/19
 * Time: 19:39
 */

<<<<<<< HEAD
 $conn_string = "host=localhost port=5432 dbname=projet user=utilisateur password=user";
=======
 $conn_string = "host=localhost port=5432 dbname=projet user=postgres password=root";
>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6
 $connect = pg_connect($conn_string);


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



if (!pg_close($connect)) {
    echo "Failed to close connection to " . pg_host($connect) . ": " .
pg_last_error($connect) . "<br/>\n";
}
