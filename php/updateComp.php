<?php

<<<<<<< HEAD
if (! $_POST['date']) {

   $date = 'null';

}else{
    $date=$_POST['date'];
}

if(!$_POST['article']){
    $article='null';
}else{
    $article=$_POST['article'];
}

if(!$_POST['reference_cindoc'])
{
    $ref='null';
}else{
    $ref=$_POST['reference_cindoc'];
}

if(!$_POST['serie']){
    $serie='null';
}else{
    $serie=$_POST['serie'];
}

if(!$_POST['nom_ville']){
    $ville='null';
}else{
    $ville=$_POST['nom_ville'];
}

if(!$_POST['sujet']){
    $sujet='null';
}else{
    $sujet=$_POST['sujet'];
}

if(!$_POST['description']){
    $desc='null';
}else{
    $desc=$_POST['description'];
}

if($_POST['index_personne']){
    $index='null';
}else{
    $index=$_POST['index_personne'];
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
if(!$_POST['discriminants']){
    $dis='null';
}else {
    $dis=$_POST['discriminants'];

}

$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){
    echo 'connect done';
}

//$requete="INSERT INTO acompleter VALUES('".$date."', '".$article."', '".$ref."', '".$serie."', '".$ville."', ".$sujet."','".$desc."','".$index."','".$cliche."','".$neg."', '".$couleur."','".$dis."')'";
$requete="INSERT INTO acompleter VALUES('$date','$article', '$ref', '$serie','$ville', '$sujet','$desc','$index','$cliche','$neg', '$couleur','$dis')";

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








=======

if (isset($_POST['date']) && isset($_POST['reference_cindoc'])) {
  echo "update var ok !";
  echo $_POST['date'];

}

 ?>
>>>>>>> c744ebc8f575b2a67ae77ff10be2667a5e02cfb6
