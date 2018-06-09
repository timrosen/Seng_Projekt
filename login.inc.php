<?php

session_start();

if(isset($_POST['submit'])){
    
    include 'connection.php';
    
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    // Error Handling
    // Eingabefeler prüfen
    
    if(empty($username) || empty($pwd)){
        
        header("Location: ../Login.php?login=empty");
        exit();
        
        
    }else{
        
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck =mysqli_num_rows($result);
        
        if($resultCheck < 1){
            
            header("Location: ../Login.php?login=error");
            exit();
            
        }else{
            
            if($row = mysqli_fetch_assoc($result)){
                
                // De-hashing Passwort
                
                $hashedPwdCheck = password_verify($pwd, $row['pwd']);
                
                if($hashedPwdCheck == false){
                    
                    header("Location: ../Login.php?login=error");
                    exit();
                    
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