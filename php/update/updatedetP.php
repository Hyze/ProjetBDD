<?php

if(isset($_POST['valmodif'])){
    $select1 = $_POST['valmodif'];
    $amodifier=0;
    switch ($select1) {
        case 'article':
            $amodifier='article';
            break;
        case 'notebasdepage':
            $amodifier='notebasdepage';
            break;
        case 'fichier_iconographique':
            $amodifier='fichier_iconographique';
            break;
        case 'sujet':
            $amodifier='sujet';
            break;
        case 'description':
            $amodifier='description';
            break;
        case 'index_personne':
            $amodifier = 'index_personnne';
            break;
        case 'fichier_numerique':
            $amodifier='fichier_numerique';
            break;
    }

}

if(isset($_POST['newval'])){
    $select2 = $_POST['newval'];
    $new=0;
    switch ($select2) {
        case 'article':
            $new='article';
            break;
        case 'notebasdepage':
            $new='notebasdepage';
            break;
        case 'fichier_iconographique':
            $new='fichier_iconographique';
            break;
        case 'sujet':
            $new='sujet';
            break;
        case 'description':
            $new='description';
            break;
        case 'index_personne':
            $new = 'index_personnne';
            break;
        case 'fichier_numerique':
            $new='fichier_numerique';
            break;
    }

}

$valuechercher=$_POST['valuemodif'];
$newvalue=$_POST['newvalue'];

$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){
    echo 'connect done';
}
$requete="UPDATE detail_photo  SET $new='$newvalue' WHERE $amodifier='$valuechercher';";

echo $requete;
if (pg_query($connect,$requete))
    echo "saved";
else
    echo "error insering data";
if (!pg_close($connect)) {
    echo "Failed to close connection to " . pg_host($connect) . ": " .
        pg_last_error($connect) . "<br/>\n";
}


?>