<?php



if (! $_POST['nom_ville']) {

    $nom = 'null';

}else{
    $nom=$_POST['nom_ville'];
}

if(!$_POST['lat']){
    $lat ='null';
}else{
    $lat=$_POST['lat'];
}


if(!$_POST['long']){
    $long='null';
}else{
    $long=$_POST['long'];
}

$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){
    //echo 'connect done';
}




$requetidville="SELECT MAX(id_ville) from localisation;";
$res = pg_query($connect,$requetidville);
$idVille= pg_fetch_row($res);

$id_ville = $idVille[0] +1 ;





$requete="INSERT INTO localisation VALUES('$id_ville','$nom','$id_date','$lat', '$long')";




if (pg_query($connect,$requete))
    echo "saved";
else
    echo "error insering data";

if (!pg_close($connect)) {
    echo "Failed to close connection to " . pg_host($connect) . ": " .
        pg_last_error($connect) . "<br/>\n";
}


//header('Location: ../main.php');
?>
