<?php

// Warum auch immer funktioniert das Regsitrieren nur wenn die folgenden Zeilen NICHT in einer anderen Datei (connection.php) liegen und inkludiert werden. Bei den anderen Dateien, bei denen eine Verbindung zur Datenbank aufgebaut wird funktioniert es ohne Probleme wenn die Datei connection.php inkludiert wird

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if(isset($_POST['submit'])){
    
   
    
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    // Error Handling
    // Felder überprüfen
    
    if(empty($username) || empty($email) || empty($pwd)){
        
        header("Location: ../Register.php?signup=empty");
        exit();
        
    }else{
        
        // Eingaben auf Richtigkeit prüfen
        // E-Mail überprüfen
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               
                header("Location: ../Register.php?signup=email");
                exit();
                
            }else{
                
                // Überprüfen ob Username vergeben ist
                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck > 0){
                    
                    header("Location: ../Register.php?signup=usertaken");
                    exit();
                
                    
                }else{
                    
                    // Passwort wird gehashed
                    
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    
                    // Eingaben in Datenbank einfügen
                    
                    $sql = "INSERT INTO users (username, email, pwd) VALUES ('$username', '$email', '$hashedPwd');";
                    $result = mysqli_query($conn, $sql);
                    
                    //Tabellen für Watchlist und Verlauf erstellen
                    
                   /* $sql_watchlist = "CREATE TABLE '$username'_watchlist (titel varchar(40), jahr int(11), regie varchar(40), dauer varchar(20), inhalt varchar(400));";
                    
                    $sql_history = "CREATE TABLE '$username'_history (titel varchar(40), jahr int(11), regie varchar(40), dauer varchar(20), inhalt varchar(400));";
                    
                    $result_watchlist = mysqli_query($conn, $sql_watchlist);
                    $result_history = mysqli_query($conn, $sql_history);
                    
                    declare @Tabellenname as nvarchar(max);
                    declare @Statement as nvarchar(max);
                    set @Tabellenname = "'$username'_watchlist";
                    set @Statement = "CREATE TABLE @Tabellenname (titel varchar(40), jahr int(11), regie varchar(40), dauer varchar(20), inhalt varchar(400));";
                    execute sp_executesql @Statement;
                    
                    */
                    
                    header("Location: ../Login.php?signup=success");
                    exit();
                
                }
                
            }
        
        
    }
    
}else{
    
    header("Location: ../Register.php");
    exit();
}