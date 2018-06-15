
<?php
session_start();
include_once 'connection.php';

$titel = mysqli_real_escape_string($conn, $_GET['titel']); //keine SQL Statements sollen ausgeführt werden
$regie = mysqli_real_escape_string($conn, $_GET['regie']); 


$sql = "SELECT * FROM watchlist WHERE titel='$titel' AND regie='$regie'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$jahr = $row['jahr'];
$dauer =  $row['dauer'];
$inhalt = $row['inhalt'];
        

$sql_history = "INSERT INTO verlauf (titel, jahr, regie, dauer, inhalt) VALUES ('$titel', '$jahr', '$regie', '$dauer', '$inhalt')";
$result_history = mysqli_query($conn, $sql_history);


$sql_del = "DELETE FROM watchlist WHERE titel='$titel' AND regie='$regie'";
$result_del = mysqli_query($conn, $sql_del);





header("Location: ../Index.php");
exit();