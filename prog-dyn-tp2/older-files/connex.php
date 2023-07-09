<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "forum";
$port = 3306;

$connex = mysqli_connect($host, $username, $password, $dbname, $port);

if(!$connex){
    die("Erreur de connexion: " . mysqli_connect_error());
}

mysqli_set_charset($connex, "utf8");

?>