<?php

if (!isset($_SESSION)) {
    session_start();
}
date_default_timezone_set('Europe/Zagreb');

$dbh = "localhost";
$dbu = "root";
$dbp = "";
$dbd = "recordview";

$DBCON = mysqli_connect($dbh, $dbu, $dbp, $dbd);

?>