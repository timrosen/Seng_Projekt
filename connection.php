<?php

/*Script zum Verbindungsaufbau mit der MySQL-Datenbank*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";

$conn = mysqli_connect($servername, $username, $password, $dbname);