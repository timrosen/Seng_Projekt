<?php



session_start();
include_once 'connection.php';

$titel = mysqli_real_escape_string($conn, $_GET['titel']); //keine SQL Statements sollen ausgeführt werden
$regie = mysqli_real_escape_string($conn, $_GET['regie']); 

$username = $_SESSION['username'];

$sql = "SELECT * FROM film WHERE titel='$titel' AND regie='$regie'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
        
        
    $jahr = $row['jahr'];
    $dauer =  $row['dauer'];
    $inhalt = $row['inhalt'];
    $filmID = $row['filmID'];
        
    




$sql_watch ="INSERT INTO watchlist (username, filmID, titel, regie, inhalt) VALUES ('$username', '$filmID', '$titel', '$regie', '$inhalt');";

$result_watch = mysqli_query($conn, $sql_watch);



header("Location: ../Watchlist.php");
exit();