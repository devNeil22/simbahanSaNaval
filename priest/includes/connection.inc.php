<?php

$server = "localhost";
$password = "";
$username = "root";
$dbname = "naval_church";

$connection = mysqli_connect($server, $username, $password, $dbname);

if(!$connection){
    die("connection error: ". mysqli_connect_error());
}
?>