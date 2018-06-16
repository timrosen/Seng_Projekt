<?php


session_start();
include_once 'connection.php';
$username = $_SESSION['username'];
$titel = mysqli_real_escape_string($conn, $_GET['titel']); //keine SQL Statements sollen ausgeführt werden
$regie = mysqli_real_escape_string($conn, $_GET['regie']); 


$sql = "DELETE FROM watchlist WHERE username='$username' AND titel='$titel'";
$result = mysqli_query($conn, $sql);


header("Location: ../Watchlist.php");
exit();