<?php
include_once 'config.php';

$mysqli = new mysqli($dbhost, $dbuname, $dbpass, $dbname);
if ($mysqli->connect_error) {
    header("Location: ../error.php?err=Unable to connect to MySQL");
    exit();
}