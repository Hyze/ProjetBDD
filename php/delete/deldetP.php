<?php
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


$newvalue=$_POST['newvalue'];

$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){

}
$requete="DELETE FROM detail_photo  WHERE $new='$newvalue';";


if (pg_query($connect,$requete))
    echo "saved";
else
    echo "error insering data";
if (!pg_close($connect)) {
    echo "Failed to close connection to " . pg_host($connect) . ": " .
        pg_last_error($connect) . "<br/>\n";
}
//header('Location: ../../main.php');