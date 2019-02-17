<?php



if (! $_POST['jour']) {

   $jour = 'null';

}else{
    $jour=$_POST['jour'];
}

if(!$_POST['mois']){
    $mois='null';
}else{
    $mois=$_POST['mois'];
}

if(!$_POST['annee'])
{
    $annee='null';
}else{
    $annee=$_POST['annee'];
}


$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){
    echo 'connect done';
}

//$requete="INSERT INTO acompleter VALUES('".$date."', '".$article."', '".$ref."', '".$serie."', '".$ville."', ".$sujet."','".$desc."','".$index."','".$cliche."','".$neg."', '".$couleur."','".$dis."')'";

$requetid="SELECT MAX(id_date) from date;";
$res = pg_query($connect,$requetid);
$idDate = pg_fetch_row($res);

$id_date = $idDate[0] +1 ;

$requete="INSERT INTO date  VALUES('$id_date','$jour', '$mois', '$annee')";


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
