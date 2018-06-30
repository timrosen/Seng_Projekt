<!DOCTYPE html> 
<?php

/*  
    Weiterführen der zuvor gestarteten Session bzw. starten einer Session, damit die Session-Variablen 
    weiter aktiv bleiben und im folgenden genutz werden können.
*/
session_start();

include_once 'includes/connection.php'; // Verbindung zur Datenbank herstellen




    
?>

    
    

<html lang="en"> 
   
	<head> 
		<meta charset="UTF-8" /> 
		<title><?php echo $_SESSION["titel"]; ?></title>
        <link rel="stylesheet" type="text/css"
              href="style_sub.css"
              title="hcrspecific" />
       
	</head> 
	<body> 
            <div style="float: left; width: 50px;">
                <img src="book.png" width="50px" height="55px" style="margin-top: -10px;">
            </div>
        <header><h1 id="heading">Software Engineering Projekt 2018</h1>
         <?php
            /*
                Logout Button wird nur angezeigt wenn ein User angemeldet ist
            */
            if(isset($_SESSION['user_id'])){
        ?>
            <form action="includes/logout.inc.php" method="post">
                <button type="submit" name="submit" class="logout_btn">Logout</button>
            </form>
        <?php
            }
        ?>
        </header>
  
        
        <nav id="mainnav">
            <ul>
            
               <?php
                 /*
                    Login bzw. Registrations Option wird nur agezeigt falls
                    kein Nutzer angemeldet ist
                */
                if(!isset($_SESSION['user_id'])){
            ?>
                    <div class="dropdown">
                            <li><a href="Login.php" class="dropbtn">Login</a></li>
                                <div class="dropdown_content">
                                    <a href="Register.php">Registrieren</a>
                                </div>
                            </div>
                    <li><a href="Suche_sub.php">Suche</a></li>
            <?php  
                /*
                    Die Optionen: Verlauf, Booklist, Buch hinzufügen 
                    werden nur angezeigt falls ein Nutzer angemeldet ist. 
                    
                    Außerdem wird der Nutzername , mit dem der User sich 
                    angemeldet hat angezeigt.
                */
                    
                }elseif(isset($_SESSION['user_id'])){
                    
            ?>      
                        <li><a href="Verlauf_sub.html">Verlauf</a></li>
                        <li><a href="booklist.php">Booklist</a></li>
                        <li><a href="book_new.php">Buch hinzufügen</a></li>
                        <li><a href="Suche_sub.php">Suche</a></li>
                        <p class="user_login">Eingeloggt als: <?php echo $_SESSION['username']; ?></p>
                        
            <?php 
                    
                }
                
            ?>
            </ul>
        </nav>
        <div class="loginbox">
        
        <img src="book.png" class="avatar" style="margin-top: -100px;">
                <h1 class="log_head" style="margin-top: -100px;"><?php echo $_SESSION["bookTitel"]; ?></h1>
            
            
                
                    <div class="variable_mov">
                
                       
                    <p class="log_p">Erscheinungsjahr: </p><p class="muster_layout"><?php echo $_SESSION["BookJahr"]; ?></p>
                       
                    <p class="log_p">Autor: </p><p class="muster_layout"><?php echo $_SESSION["BookAutor"]; ?></p>
                                           
                    <p class="log_p">Handlung: </p><p class="muster_layout"><?php echo $_SESSION["BookInhalt"]; ?></p>
               
                    
                  
                        
                    </div>  
                    
                
                
            </div>
        
        
        <footer><a href="Index_sub.php">Startseite</a></footer>
        
		
	</body> 
</html>
