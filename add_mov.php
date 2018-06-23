<?php
        
include_once 'includes/connection.php'; // Verbindung zur Datenbank herstellen

/*
    Eingabedaten werden in Variablen gespeichert
*/

$titel = $_POST['titel'];
$jahr = $_POST['jahr'];
$regie = $_POST['regie'];
$dauer = $_POST['dauer'];
$inhalt = $_POST['inhalt'];

$sql_check = "SELECT * FROM film WHERE titel='$titel'";
$result_check = mysqli_query($conn, $sql_check); // Übermittlung des Statements an die Datenbank

/*
    Die Anzahl der gefundenen Ergebnisse wird gespeichert.
*/
$resultCheck = mysqli_num_rows($result_check);

/* 
   Falls bereits ein Eintrag existiert, wird der User zur Suchseite gschickt
*/
if($resultCheck > 0){
                    
    header("Location: Suche.php?MovieAlreadyExists");
    exit();
                
                    
    }else{




/*
    Film wird in die zentrale Filmdatenbank eingefügt
*/
 $sql = "INSERT INTO film (titel, jahr, regie, dauer, inhalt) 
VALUES ('$titel', '$jahr', '$regie', '$dauer', '$inhalt');";
$result = mysqli_query($conn, $sql); // Übermittlung an die Datenbank

/*
    Session wird gestartet und Session-Variablen werden mit den
    Daten des Films, der zuvor eingefügt wurde, gefüllt.
    
    Im Anschluss wird wird die Muster Seite für Filme aufgerufen, 
    in der die Daten des zuvor in die Datenbank eingefügten Films 
    angezeigt werden.
*/

SESSION_START();
$_SESSION["titel"] = $titel;
$_SESSION["jahr"] = $jahr;
$_SESSION["regie"] = $regie;
$_SESSION["dauer"] = $dauer;
$_SESSION["inhalt"] = $inhalt;

}

?>

<link rel="stylesheet" type="text/css"
              href="style.css"
              title="hcrspecific" />
<meta http-equiv="refresh" content="0.5; URL='Muster.php'"/>

