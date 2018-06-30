<?php
/*Script, welches für die booklist-Funktion der Website zuständig ist*/


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
    Buch wird aus der zentralen Buch-Tabelle geholt 
*/

$sql = "SELECT * FROM book WHERE bookTitel='$bookTitel' AND bookAutor='$bookAutor'";
$result = mysqli_query($conn, $sql); // Übermittlung des Statements an die Datenbank

/*
    Ergebnis wird in einem Assoziativen Array gespeichert
*/
$row = mysqli_fetch_assoc($result);
        
        
$bookJahr = $row['bookJahr'];
$bookInhalt = $row['bookInhalt'];
$bookID = $row['bookID'];
        
    
/*
    Das Buch wird in die booklist-Tabelle eingefügt
*/
$sql_watch ="INSERT INTO booklist (username, bookID, bookTitel, bookAutor, bookInhalt) VALUES ('$username', '$bookID', '$bookTitel', '$bookAutor', '$bookInhalt');";
$result_watch = mysqli_query($conn, $sql_watch); // Übermittlung des Statements an die Datenbank



header("Location: ../booklist.php"); // Weiterleitung zur booklist Seite
exit();