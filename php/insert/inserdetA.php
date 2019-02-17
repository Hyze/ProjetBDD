<?php



if (! $_POST['remarque']) {

    $rem = 'null';

}else{
    $rem=$_POST['remarque'];
}

if(!$_POST['taille_cliche']){
    $taille='null';
}else{
    $taille=$_POST['taille_cliche'];
}


if(!$_POST['nb_cliche']){
    $cliche='null';
}else{
    $cliche=$_POST['nb_cliche'];
}


if(!$_POST['negatif_reversible']){
    $neg='null';
}else{
    $neg=$_POST['negatif_reversible'];
}


if(!$_POST['couleur_noirblanc']){
    $couleur='null';
}else{
    $couleur=$_POST['couleur_noirblanc'];
}


$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){
    echo 'connect done';
}


$requetid="SELECT MAX(id_photo) from detail_artistique;";
$res = pg_query($connect,$requetid);
$idPhoto = pg_fetch_row($res);

$id_photo = $idPhoto[0] +1 ;

$requete="INSERT INTO detail_artistique VALUES('$id_photo','$cliche', '$neg', '$couleur','$rem','$taille')";

echo $requete;
/*

if (pg_query($connect,$requete))
    echo "saved";
else
    echo "error insering data";
*/
if (!pg_close($connect)) {
    echo "Failed to close connection to " . pg_host($connect) . ": " .
        pg_last_error($connect) . "<br/>\n";
}


//header('Location: ../main.php');
?>
