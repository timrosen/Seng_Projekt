<?php
/*Script, welches die Logout Funktion der Website regelt*/

/*
    Bei betätigen des Logout-Buttons wird zunächst die Session wiederaufgenommen, 
    sodass alle Session-Variablen verfügbar sind. 
    Dann werden alle Session-Variablen mit session_unset(); gelöscht und die gesamte
    Session wird mit session_destroy(); beendet.
    Im Anschluss wird der User zurück zur Startseite gschickt und das Script wird beendet.
*/
if(isset($_POST['submit'])){
    
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../Index.php");
    exit();
    
}