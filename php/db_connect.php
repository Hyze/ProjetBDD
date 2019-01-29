<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26/01/19
 * Time: 18:49
 */


function dbconnect()
{
	$conn_string = "host=localhost port=5432 dbname=projet user=postgres password=root";
	$dbconn = pg_connect($conn_string);

	if (!$dbconn) {

	} else {

	}
	return $dbconn;
}
?>
