<?php

if(isset($_POST['newval'])){
    $select2 = $_POST['newval'];
    $new=0;
    switch ($select2) {
        case 'article':
            $new='article';
            break;
        case 'reference_cindoc':
            $new='reference_cindoc';
            break;
        case 'serie':
            $new='serie';
            break;
        case'discriminant':
            $new='discriminant';
            break;
    }

}


$newvalue=$_POST['newvalue'];

$conn_string = "host=localhost port=5432 dbname=projet user=administrateur  password=admin";

if($connect = pg_connect($conn_string)){

}

$requete="DELETE FROM administratif WHERE $new='$newvalue';";

echo $requete;

if (pg_query($connect,$requete))
    echo "saved";
else
    echo "error insering data";

if (!pg_close($connect)) {
    echo "Failed to close connection to " . pg_host($connect) . ": " .
        pg_last_error($connect) . "<br/>\n";
}
header('Location: ../../main.php');
