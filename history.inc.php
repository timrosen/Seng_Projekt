
<?php
session_start();
include_once 'connection.php';

$titel = mysqli_real_escape_string($conn, $_GET['titel']); //keine SQL Statements sollen ausgeführt werden
$regie = mysqli_real_escape_string($conn, $_GET['regie']); 

$username = $_SESSION['username'];

$sql = "SELECT * FROM watchlist WHERE username='$username' AND titel='$titel'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


$inhalt = $row['inhalt'];
$filmID = $row['filmID'];
        

$sql_history = "INSERT INTO verlauf (username, filmID, titel, regie, inhalt) VALUES ('$username', '$filmID', '$titel', '$regie', '$inhalt');";

$result_history = mysqli_query($conn, $sql_history);


$sql_del = "DELETE FROM watchlist WHERE username='$username' AND titel='$titel'";
$result_del = mysqli_query($conn, $sql_del);





header("Location: ../Index.php");
exit();