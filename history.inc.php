
<?php

/* Script, welches die gesamte Verlaufs-Funktion der Website regelt*/

/*  
    Weiterführen der zuvor gestarteten Session bzw. starten einer Session, damit die Session-Variablen 
    weiter aktiv bleiben und im folgenden genutz werden können.
*/
session_start();

include_once 'connection.php'; // Verbindung zur Datenbank herstellen

/*  
    mysqli_real_escape_string geht sicher, das keine SQL-Statements 
    an die Datenbank übermittelt und so die Datenbank manipuliert werden kann. 
*/
$titel = mysqli_real_escape_string($conn, $_GET['titel']); 
$regie = mysqli_real_escape_string($conn, $_GET['regie']); 

$username = $_SESSION['username'];

/* 
    Watchlist-Tabelle wird ausgewertet (nach Nutzername) und die Ergebnisse
    werden gespeichert.

*/

$sql = "SELECT * FROM watchlist WHERE username='$username' AND titel='$titel'";
$result = mysqli_query($conn, $sql); // Übermittlung des Statements an die Datenbank


/*
    Ergebnisse des Statemenst werden geholt, in ein 
    assoziatives Array geschrieben und in Variablen gespeichert.
*/
$row = mysqli_fetch_assoc($result); 

$inhalt = $row['inhalt'];
$filmID = $row['filmID'];

/*
    Einfügen des geschauten Films in die verlaufs-Tabelle der Datenbank.
*/        

$sql_history = "INSERT INTO verlauf (username, filmID, titel, regie, inhalt) VALUES ('$username', '$filmID', '$titel', '$regie', '$inhalt');";
$result_history = mysqli_query($conn, $sql_history); // Übermittlung des Statements an die Datenbank

/*
    Zugehöriger Eintrag, des zuvor in den Verlauf eingefügten Films, 
    wird in der watchlist-Tabelle gelöscht.
*/

$sql_del = "DELETE FROM watchlist WHERE username='$username' AND titel='$titel'";
$result_del = mysqli_query($conn, $sql_del); // Übermittlung des Statements an die Datenbank





header("Location: ../Index.php"); // Weiterleitung zurück zur Startseite
exit(); // Ende des Scripts