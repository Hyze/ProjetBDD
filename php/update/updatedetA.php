<?php

if(isset($_POST['valmodif'])){
    $select1 = $_POST['valmodif'];
    $amodifier=0;
    switch ($select1) {
        case 'remarque':
            $amodifier='remarque';
            break;
        case 'taille_cliche':
            $amodifier='taille_cliche';
            break;
        case 'nb_cliche':
            $amodifier='nb_cliche';
            break;
        case 'negatif_reversible':
            $amodifier = 'negatif_reversible';
            break;
        case 'couleur_noirblanc':
            $amodifier='couleur_noirblanc';
            break;
    }

}

if(isset($_POST['newval'])){
    $select2 = $_POST['newval'];
    $new=0;
    switch ($select2) {
        case 'remarque':
            $new='remarque';
            break;
        case 'taille_cliche':
            $new='taille_cliche';
            break;
        case 'nb_cliche':
            $new='nb_cliche';
            break;
        case 'negatif_reversible':
            $new = 'negatif_reversible';
            break;
        case 'couleur_noirblanc':
            $new='couleur_noirblanc';
            break;

    }

}

$valuechercher=$_POST['valuemodif'];
$newvalue=$_POST['newvalue'];

$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){

}
$requete="UPDATE detail_artistique SET $new ='$newvalue' WHERE $amodifier='$valuechercher';";



if (pg_query($connect,$requete))
    echo "saved";
else
    echo "error insering data";

if (!pg_close($connect)) {
    echo "Failed to close connection to " . pg_host($connect) . ": " .
        pg_last_error($connect) . "<br/>\n";
}

?>