<?php

/* Script, welches die Login Funktion der Website regelt*/

/*  
    Weiterführen der zuvor gestarteten Session bzw. starten einer Session, damit die Session-Variablen 
    weiter aktiv bleiben und im folgenden genutz werden können.
*/
session_start();

/*
    Ausführen des Scriptes nur im Falle, das "Login" gedrückt wurde, 
    im Fehlerfall wird man zurück zur Login Seite geleitet und ein Error wird ausgegeben.
*/
if(isset($_POST['submit'])){
    
    include 'connection.php'; // Verbindung zur Datenbank herstellen
    
/*  
    mysqli_real_escape_string geht sicher, das keine SQL-Statements 
    an die Datenbank übermittelt und so die Datenbank manipuliert werden kann. 
*/
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    

/*
    Im Folgenden werden die Eingabefelderdes Login Formulars überprüft und
    ggf. Fehlermeldungen ausgegeben.
*/
    
    /* 
        Felder werden auf Inhalt überpüft,
        im Fehlerfall wird ein Error ausgegeben, das Script 
        wird beendet und die Login Seite wird neu aufgerufen.
    */
    if(empty($username) || empty($pwd)){
        
        header("Location: ../Login.php?login=empty");
        exit();
        
        
    }else{
        /*
            Die Datenbank wird nach dem User durchsucht, der sich anmelden will.  
        */
        
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql); // Übermittlung des Statements an die Datenbank
        
        /*
            Die Anzahl der gefundenen Ergebnisse wird gespeichert.
        */
        $resultCheck = mysqli_num_rows($result);
        
         /* 
            Falls die Variable $resultCheck mehr als ein Ergebnis liefert 
            (es also mehr als einen Eintrag für den User gibt) wird der die 
            Login Seite neu geladen, ein Error ausgegeben und das Script beendet.
        */
        if($resultCheck < 1){
            
            header("Location: ../Login.php?login=error");
            exit();
            
        }else{
            
            /*
                Im Folgenden werden alle relevanten Einträge für den User geholt.
            */
            if($row = mysqli_fetch_assoc($result)){
                
                // Das Passwort des Users wird De-hashed, damit dieses auf Richtigkeit überprüft werden kann
                $hashedPwdCheck = password_verify($pwd, $row['pwd']); 
                
                /*
                    Im Falle eines falschen Passworts wird der User zurück zur 
                    Login Seite geschickt und das Script wird beendet.
                */
                if($hashedPwdCheck == false){
                    
                    header("Location: ../Login.php?login=error");
                    exit();
                    
                    /*
                        Bei richtiger Passworteingabe werden die relevanten Einträge aus 
                        der Datenbank in Session-Variablen gespeichert, sodass Sie solange der 
                        Nutzer eingeloggt ist verfügbar sind, und der Nutzer wird zurück zur Startseite geschickt. 
                    */
                }elseif($hashedPwdCheck == true){
                    
                    // User einloggen
                    
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['pwd'] = $row['pwd'];
                    
                    header("Location: ../Index.php?login=success");
                    exit();
                    
                }
                
                
            }
            
        }
    }
    
}else{
    
    header("Location: ../Login.php?login=error");
    exit();
}