<?php


session_start();
include_once 'connection.php';

$titel = mysqli_real_escape_string($conn, $_GET['titel']); //keine SQL Statements sollen ausgeführt werden
$regie = mysqli_real_escape_string($conn, $_GET['regie']); 


$sql = "DELETE FROM watchlist WHERE titel='$titel' AND regie='$regie'";
$result = mysqli_query($conn, $sql);


header("Location: ../Watchlist.php");
exit();