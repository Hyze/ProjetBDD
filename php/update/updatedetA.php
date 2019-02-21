<?php

$changeStatus=$_POST['selectFieldValue'];
$valuechercher=$_POST['valuemodif'];
$aModifier=$_POST['amodifier'];
$newvalue=$_POST['newvalue'];

$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){
    echo 'connect done';
}
$requete="UPDATE detail_artistique SET $aModifier='$newvalue' WHERE $changeStatus='$valuechercher';";

echo json_encode($requete,JSON_FORCE_OBJECT);

if (pg_query($connect,$requete))
    echo "saved";
else
    echo "error insering data";


if (!pg_close($connect)) {
    echo "Failed to close connection to " . pg_host($connect) . ": " .
        pg_last_error($connect) . "<br/>\n";
}
//header('Location: ../../main.php');

?>
