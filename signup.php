<?php
                                /*$servername = "localhost";
                                $username = "tim";
                                $password = "projekt";
                                $dbname = "projekt";*/
        

$user = $_POST['user'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];




                                /*try{
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql = "INSERT INTO users (user, email, pwd)  VALUES ('$user', '$email', '$pwd')";
                                    $conn->exec($sql);
                                }
                                catch(PDOException $e){
                                    echo $sql . "<br>" . $e->getMessage();
                                }
                                    $conn = null;
                                   */
include_once 'includes/connection.php';

 $sql = "INSERT INTO users (user, email, pwd)  
 VALUES ('$user', '$email', '$pwd');";


$result = mysqli_query($conn, $sql);

?>



<html lang="en"> 
   
	<head> 
		<meta charset="UTF-8" /> 
		<title>Erfolgreich registriert</title>
        <link rel="stylesheet" type="text/css"
              href="style.css"
              title="hcrspecific" />
       
	</head> 
	<body> 
            <div style="float: left; width: 50px;">
                <img src="popcorn.png" width="40px" height="55px" style="margin-top: -10px;">
            </div>
        <header><h1 id="heading">Software Engineering Projekt 2018</h1></header>
  
        
  
        <div class="loginbox">
        
        <img src="popcorn.png" class="avatar" style="margin-top: -100px;">
                <h1 class="log_head" style="margin-top: -100px;">Registration erfolgreich</h1>
                <p class="muster_layout">
                    Sie werden zurück zum Login geleitet</p>
            
            <meta http-equiv="refresh" content="3; URL='Login.html'"/>
 
                
        </div>
        
        
        <footer><a href="Index.php">Startseite</a></footer>
        
		
	</body> 
</html>