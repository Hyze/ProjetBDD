<?php



if (!$_POST['description']) {

    $des = 'null';

}else{
    $des=$_POST['description'];
}

if(!$_POST['sujet']){
    $sujet='null';
}else{
    $sujet=$_POST['sujet'];
}


if(!$_POST['article']){
    $article='null';
}else{
    $article=$_POST['article'];
}


if(!$_POST['notebasdepage']){
    $note='null';
}else{
    $note=$_POST['notebasdepage'];
}


if(!$_POST['index_personne']){
    $index='null';
}else{
    $index=$_POST['index_personne'];
}



if(!$_POST['fichier_iconographique']){
    $file='null';
}else{
    $file=$_POST['fichier_iconographique'];
}


if(!$_POST['fichier_numerique']){
    $fich='null';
}else{
    $fich=$_POST['fichier_numerique'];
}

$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){
    //echo 'connect done';
}


$requetid="SELECT MAX(id_photo) from detail_artistique;";
$res = pg_query($connect,$requetid);
$idPhoto = pg_fetch_row($res);

$id_photo = $idPhoto[0] +1 ;


$requetidville="SELECT MAX(id_ville) from detail_photo;";
$res = pg_query($connect,$requetidville);
$idVille= pg_fetch_row($res);

$id_ville = $idVille[0] +1 ;


$requetidDate="SELECT MAX(id_date) from detail_photo;";
$res = pg_query($connect,$requetidDate);
$idDate= pg_fetch_row($res);

$id_date = $idDate[0] +1 ;


$requete="INSERT INTO detail_photo VALUES('$id_photo','$id_ville','$id_date','$des', '$sujet', '$note','$file','$fich')";


echo $requete;


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
