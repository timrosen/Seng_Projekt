<?php


session_start();

if(isset ($_POST['login'])){
    
    
    include 'connection.php';
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    
    //Überprüfen ob etwas eingetragen wurde
    
    if (empty($user) || empty($pwd)){
        
        //error
        
    }else{
        
        $sql = "SELECT * FROM users WHERE user='$user'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1){
            
            //error
            
        }else{
            
            if($row = mysqli_fetch_assoc($result)){
                
                //Passwort überprüfung
                $pwdCheck = password_verify($pwd, $row['pwd']);
                
                if ($pwdCheck == false){
                    
                    //error
                    
                }elseif($pwdCheck == true){ 
                    
                    //Login
                    
                    $_SESSION['u_id'] = $row['userID'];
                    $_SESSION['u_user'] = $row['user'];
                    $_SESSION['u_email'] = $row['email']; 
                    $_SESSION['u_pwd'] = $row['pwd'];
                    
                    echo "casdasd";
                    
                    //zurück zur Startseite
                    //header("Location:../index.html?login=success");
                    //exit();
                }
                
            }
        }
    }
    
}else{
    
    //error
}