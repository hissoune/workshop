<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "gestion_des_taches";

$connection = new mysqli($hostname, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


?>