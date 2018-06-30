<?php


/*Script, welches für die "Lösch-Funktion" in der booklist verantwortlich ist*/

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
$bookTitel = mysqli_real_escape_string($conn, $_GET['bookTitel']); 
$bookAutor = mysqli_real_escape_string($conn, $_GET['bookAutor']); 

/*
    Im Folgenden wird die eigentliche Funktionalität des Scripts ausgeführt.
    
    Der Eintrag, bei dem der Nutzername, sowie der Buchtitel übereinstimmen wird aus der
    Booklist-Tabelle innerhalb der Datenbank gelöscht.
*/


$sql = "DELETE FROM booklist WHERE username='$username' AND bookTitel='$bookTitel'"; 
$result = mysqli_query($conn, $sql); // Übermittlung an die Datenbank


header("Location: ../booklist.php"); // Weiteleitung zur booklist

exit(); // Beenden des Scriptes