<?php
/*Script, welches für die Watchlist-Funktion der Website zuständig ist*/


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
    Film wird aus der zentralen Film-Tabelle geholt 
*/

$sql = "SELECT * FROM film WHERE titel='$titel' AND regie='$regie'";
$result = mysqli_query($conn, $sql); // Übermittlung des Statements an die Datenbank

/*
    Ergebnis wird in einem Assoziativen Array gespeichert
*/
$row = mysqli_fetch_assoc($result);
        
        
$jahr = $row['jahr'];
$dauer =  $row['dauer'];
$inhalt = $row['inhalt'];
$filmID = $row['filmID'];
        
    
/*
    Der Film wird in die Watchlist-Tabelle eingefügt
*/
$sql_watch ="INSERT INTO watchlist (username, filmID, titel, regie, inhalt) VALUES ('$username', '$filmID', '$titel', '$regie', '$inhalt');";
$result_watch = mysqli_query($conn, $sql_watch); // Übermittlung des Statements an die Datenbank



header("Location: ../Watchlist.php"); // Weiterleitung zur Watchlist Seite
exit();