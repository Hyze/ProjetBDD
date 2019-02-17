<?php

if(isset($_POST['valmodif'])){
    $select1 = $_POST['valmodif'];
    $amodifier=0;
    switch ($select1) {
        case 'jour':
            $amodifier='jour';
            break;
        case 'mois':

            $amodifier='mois';
            break;
        case 'annee':
            $amodifier='annee';
            break;

    }

}

if(isset($_POST['newval'])){
    $select2 = $_POST['newval'];
    $new=0;
    switch ($select2) {
        case 'jour':
            $new='jour';
            break;
        case 'mois':
            $new='mois';
            break;
        case 'annee':
            $new='annee';
            break;
    }

}

$valuechercher=$_POST['valuemodif'];
$newvalue=$_POST['newvalue'];

$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){

}
$requete="UPDATE date SET $new='$newvalue' WHERE $amodifier='$valuechercher';";



if (pg_query($connect,$requete))
    echo "saved";
else
    echo "error insering data";

if (!pg_close($connect)) {
    echo "Failed to close connection to " . pg_host($connect) . ": " .
        pg_last_error($connect) . "<br/>\n";
}

?>