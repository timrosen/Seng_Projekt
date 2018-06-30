<?php
        
include_once 'includes/connection.php'; // Verbindung zur Datenbank herstellen

/*
    Eingabedaten werden in Variablen gespeichert
*/

$bookTitel = $_POST['bookTitel'];
$bookJahr = $_POST['bookJahr'];
$bookAutor = $_POST['bookAutor'];
$bookInhalt = $_POST['bookInhalt'];

$sql_check = "SELECT * FROM book WHERE bookTitel='$bookTitel'";
$result_check = mysqli_query($conn, $sql_check); // Übermittlung des Statements an die Datenbank

/*
    Die Anzahl der gefundenen Ergebnisse wird gespeichert.
*/
$resultCheck = mysqli_num_rows($result_check);

/* 
   Falls bereits ein Eintrag existiert, wird der User zur Suchseite gschickt
*/
if($resultCheck > 0){
                    
    header("Location: Suche_sub.php?MovieAlreadyExists");
    exit();
                
                    
    }else{




/*
    Buch wird in die zentrale Buchdatenbank eingefügt
*/
 $sql = "INSERT INTO book (bookTitel, bookJahr, bookAutor, bookInhalt) 
VALUES ('$bookTitel', '$bookJahr', '$bookAutor', '$bookInhalt');";
$result = mysqli_query($conn, $sql); // Übermittlung an die Datenbank

/*
    Session wird gestartet und Session-Variablen werden mit den
    Daten des Buch, der zuvor eingefügt wurde, gefüllt.
    
    Im Anschluss wird wird die Muster Seite für Buch aufgerufen, 
    in der die Daten des zuvor in die Datenbank eingefügten Bücher
    angezeigt werden.
*/

SESSION_START();
$_SESSION["bookTitel"] = $bookTitel;
$_SESSION["bookJahr"] = $bookJahr;
$_SESSION["bookAutor"] = $bookAutor;
$_SESSION["bookInhalt"] = $bookInhalt;

}

?>

<link rel="stylesheet" type="text/css"
              href="style_sub.css"
              title="hcrspecific" />
<meta http-equiv="refresh" content="0.5; URL='Muster_sub.php'"/>

