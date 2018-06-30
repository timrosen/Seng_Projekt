
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
$bookTitel = mysqli_real_escape_string($conn, $_GET['bookTitel']); 
$bookAutor = mysqli_real_escape_string($conn, $_GET['bookAutor']); 

$username = $_SESSION['username'];

/* 
    booklist-Tabelle wird ausgewertet (nach Nutzername) und die Ergebnisse
    werden gespeichert.

*/

$sql = "SELECT * FROM booklist WHERE username='$username' AND bookTitel='$bookTitel'";
$result = mysqli_query($conn, $sql); // Übermittlung des Statements an die Datenbank


/*
    Ergebnisse des Statemenst werden geholt, in ein 
    assoziatives Array geschrieben und in Variablen gespeichert.
*/
$row = mysqli_fetch_assoc($result); 

$bookInhalt = $row['bookInhalt'];
$bookID = $row['bookID'];

/*
    Einfügen des gelesenen Buchs in die bookhistory-Tabelle der Datenbank.
*/        

$sql_history = "INSERT INTO bookhistory (username, bookID, bookTitel, bookAutor, bookInhalt) VALUES ('$username', '$bookID', '$bookTitel', '$bookAutor', '$bookInhalt');";
$result_history = mysqli_query($conn, $sql_history); // Übermittlung des Statements an die Datenbank

/*
    Zugehöriger Eintrag, des zuvor in die History eingefügten Buchs, 
    wird in der booklist-Tabelle gelöscht.
*/

$sql_del = "DELETE FROM booklist WHERE username='$username' AND bookTitel='$bookTitel'";
$result_del = mysqli_query($conn, $sql_del); // Übermittlung des Statements an die Datenbank





header("Location: ../Index_sub.php"); // Weiterleitung zurück zur Startseite
exit(); // Ende des Scripts