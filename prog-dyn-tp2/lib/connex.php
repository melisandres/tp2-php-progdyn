<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "forum";
$port = 3306;

$connex = mysqli_connect($host, $username, $password, $dbname, $port);
mysqli_set_charset($connex, "utf8");

?>