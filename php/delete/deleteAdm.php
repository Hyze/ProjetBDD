<?php

$changeStatus=$_POST['selectFieldValue'];
$newvalue=$_POST['newvalue'];

$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){
    echo 'connect done';
}
$requete="DELETE FROM Administratif WHERE $changeStatus='$newvalue';";

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
