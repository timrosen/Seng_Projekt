<?php
/*Script, welches die Registrations Funktion der Website regelt*/

/*
    Warum auch immer funktioniert das Regsitrieren nur wenn die folgenden Zeilen NICHT 
    in einer anderen Datei (connection.php) liegen und inkludiert werden. 
    Bei den anderen Dateien, bei denen eine Verbindung zur Datenbank aufgebaut wird 
    funktioniert es ohne Probleme wenn die Datei connection.php inkludiert wird.
*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";

$conn = mysqli_connect($servername, $username, $password, $dbname);


/*
    Im Folgenden werden die Eingabefelder des Registrations Formulars überprüft und
    ggf. Fehlermeldungen ausgegeben.
*/

/*
    Zunächst wird überprüft ob der User Den Button "Registriren" gedrückt hat.
    
    Im Fehlerfall wird der user zurück zur Regsitartions Seite geleitet 
    und das Script wird beendet.
*/

if(isset($_POST['submit'])){
    
    /*  
        mysqli_real_escape_string geht sicher, das keine SQL-Statements 
        an die Datenbank übermittelt und so die Datenbank manipuliert werden kann. 
    */
    
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    /*
        Die Eingabefelder des Formulars werden auf Inhalt überprüft und 
        im Fehlerfall, das ein oder mehrere Felder leer sind, wird ein Error 
        ausgegeben und die Registrationsseite wird erneut aufgerufen.
    */
    
    if(empty($username) || empty($email) || empty($pwd)){
        
        header("Location: ../Register.php?signup=empty");
        exit();
        
    }else{
        
            /*
                Die eingegebene E-Mail wird auf richtigkeit überprüft und im Fehlerfall
                wird der User zurück zur Registrationsseite geschickt und das Script wird beendet.
            */
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               
                header("Location: ../Register.php?signup=email");
                exit();
                
            }else{
                /*
                    Es wird überprüft ob der Username bereits vergeben ist.
                */
                
                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = mysqli_query($conn, $sql); // Übermittlung des Statements an die Datenbank
                
                /*
                    Die Anzahl der gefundenen Ergebnisse wird gespeichert.
                */
                $resultCheck = mysqli_num_rows($result);
                
                /* 
                   Falls bereits ein Eintrag existiert, es also bereits einen User mit dem eingegebenen namen gibt, 
                   wird der User zurück zur Registrationsseite geschickt und das Script wird beendet.
                */
                if($resultCheck > 0){
                    
                    header("Location: ../Register.php?signup=usertaken");
                    exit();
                
                    
                }else{
                    
                    /*
                        Das eingegebene Passwort wird gehashed, sodass es in der Datenbank nicht 
                        in Klarschrift erscheint.
                    */
                    
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    
                    /*
                        Die eingegebenen Daten werden in die Tabelle eingefügt 
                        und der Nutzer wird zur Logn Seite weitergeleitet.
                    */
                    
                    $sql = "INSERT INTO users (username, email, pwd) VALUES ('$username', '$email', '$hashedPwd');";
                    $result = mysqli_query($conn, $sql); // Übermittlung des Statements an die Datenbank
                    
                    
                    
                    header("Location: ../Login.php?signup=success");
                    exit();
                
                }
                
            }
        
        
    }
    
}else{
    
    header("Location: ../Register.php");
    exit();
}