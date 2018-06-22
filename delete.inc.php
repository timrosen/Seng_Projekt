<?php


/*Script, welches für die "Lösch-Funktion" in der Watchlist verantwortlich ist*/

/*  
    Weiterführen der zuvor gestarteten Session bzw. starten einer Session, damit die Session-Variablen 
    weiter aktiv bleiben und im folgenden genutz werden können.
*/
session_start(); 

include_once 'connection.php'; // Verbindung zur Datenbank herstellen

$username = $_SESSION['username']; 

/*  
    mysqli_real_escape_string geht sicher, das keine SQL-Statements 
    an die Datenbank übermittelt und so die Datenbank manipuliert werden kann.
*/
$titel = mysqli_real_escape_string($conn, $_GET['titel']); 
$regie = mysqli_real_escape_string($conn, $_GET['regie']); 

/*
    Im Folgenden wird die eigentliche Funktionalität des Scripts ausgeführt.
    
    Der Eintrag, bei dem der Nutzername, sowie der Filmtitel übereinstimmen wird aus der
    Watchlist-Tabelle innerhalb der Datenbank gelöscht.
*/


$sql = "DELETE FROM watchlist WHERE username='$username' AND titel='$titel'"; 
$result = mysqli_query($conn, $sql); // Übermittlung an die Datenbank


header("Location: ../Watchlist.php"); // Weiteleitung zur Watchlist

exit(); // Beenden des Scriptes