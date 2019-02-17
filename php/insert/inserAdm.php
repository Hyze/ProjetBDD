<?php



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

if(!$_POST['discriminant']){
    $dis='null';
}else {
    $dis=$_POST['discriminant'];

}

$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){
    echo 'connect done';
}

$requete="INSERT INTO administratif VALUES('$serie', '$article', '$ref','$dis')";

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



 ?>
