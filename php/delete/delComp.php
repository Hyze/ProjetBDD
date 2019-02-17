<?php

if(isset($_POST['newval'])){
    $select2 = $_POST['newval'];
    $new=0;
    switch ($select2) {
        case 'date':
            echo 'date <br/>';
            $new='date';
            break;
        case 'article':
            echo 'article<br/>';
            $new='article';
            break;
        case 'reference_cindoc':
            $new='reference_cindoc';
            break;
        case 'serie':
            $new='serie';
            break;
        case 'nom_ville':
            $new='nom_ville';
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
        case 'nb_cliche':
            $new='nb_cliche';
            break;
        case 'negatif_reversible':
            $new = 'negatif_reversibl';
            break;
        case 'couleur_noirblanc':
            $new='couleur_noirblanc';
            break;
        case'discriminant':
            $new='discriminant';
            break;
    }

}


$newvalue=$_POST['newvalue'];

$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){
    echo 'connect done';
}
$requete="DELETE FROM acompleter WHERE $new='$newvalue';";

echo $requete;

if (pg_query($connect,$requete))
    echo "delete";
else
    echo "error insering data";


if (!pg_close($connect)) {
    echo "Failed to close connection to " . pg_host($connect) . ": " .
        pg_last_error($connect) . "<br/>\n";
}
//header('Location: ../../main.php');

?>