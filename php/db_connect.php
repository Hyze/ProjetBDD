<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26/01/19
 * Time: 18:49
 */


function dbconnect($val)
{
    if ($val == true) {
        $conn_string = "host=localhost port=5432 dbname=projet user=postgres password=root";
        $dbconn = pg_connect($conn_string);
        return $dbconn;
    } else {
        if (!pg_close($dbconn)) {
            return "Failed to close connection to " . pg_host($dbconn) . ": " .
       pg_last_error($dbconn) . "<br/>\n";
        } else {
            return "Successfully disconnected from database";
        }
    }
}
