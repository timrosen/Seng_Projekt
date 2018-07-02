<?php 

/*  
    Weiterführen der zuvor gestarteten Session bzw. starten einer Session, damit die Session-Variablen 
    weiter aktiv bleiben und im folgenden genutz werden können.
*/
session_start();

include_once 'includes/connection.php'; // Verbindung zur Datenbank herstellen

?>




<!DOCTYPE html> 

<html lang="en"> 
	<head> 
		<meta charset="UTF-8" /> 
		<title>Startseite</title> 
        <link rel="stylesheet" type="text/css"
              href="style.css"
              title="hcrspecific" />
	</head> 
	<body>
            <div style="float: left; width: 50px;">
                <img src="popcorn.png" width="40px" height="55px" style="margin-top: -10px;">
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
                    <li><a href="Suche.php">Suche</a></li>
                    <li><a  href="index_sub.php">Bücher</a></li>
                <?php  
                /*
                    Die Optionen: Verlauf, Watchlist, Titel hinzufügen 
                    werden nur angezeigt falls ein Nutzer angemeldet ist. 
                    
                    Außerdem wird der Nutzername , mit dem der User sich 
                    angemeldet hat angezeigt.
                */
                }elseif(isset($_SESSION['user_id'])){
                ?>      
                            
                            
                               
                        <li><a href="Verlauf.php">Verlauf</a></li>
                        <li><a href="Watchlist.php">Watchlist</a></li>
                        <li><a href="Titel_neu.php">Titel hinzufügen</a></li>
                        <li><a href="Suche.php">Suche</a></li>
                        <li><a  href="index_sub.php">Bücher</a></li>
                        <p class="user_login">Eingeloggt als: <?php echo $_SESSION['username']; ?></p>
                        
                <?php 
                    
                }
                
                ?>


                
                
                
            </ul>
        </nav>
        
    <div id="content">
                <div style="float: left; width: 50px;">
                <img src="popcorn.png" width="40px" height="55px" style="margin-top: 30px;">
                </div>
        <h3 id="heading">Zuletzt hinzugefügte Titel</h3>

        
        
        <?php
        /*
            Die zuletzt zur zentralen Film-Tabelle hinzugefügten 
            Titel werden im folgenden Angezeigt.
        
        */
        
        $sql = "SELECT * FROM film ORDER BY filmID DESC;";
        $result = mysqli_query($conn, $sql); // Übermittlung an die Datenbank
        
        /*
            Die Anzahl der gefundenen Ergebnisse wird gespeichert.
        */
        $resultCheck = mysqli_num_rows($result);
        
        if($resultCheck > 0){
            
           for($i=0; $i < 5; $i++){
               
               $row = mysqli_fetch_assoc($result);
        ?>
        
        <div class="variable_mov">
                
            <h1 class="log_head"><?php echo $row['titel']; ?></h1>
            <p class="log_p">Handlung: </p><p class="muster_layout"><?php echo $row['inhalt']; ?></p>
             <?php   
                /*
                    Folgende Optionen sind nur verfügbar falls der User angemeldet ist.

                    Zusätzliche Informationen zu einem gesuchten 
                    Film können über "Weiterlesen" erreicht werden.

                    Der Titel kann mit "+Watchlist" direkt zur Watchlist hinzugefügt werden.
                */
                    if(isset($_SESSION['user_id'])){
                 ?>               
                            <a <?php echo "<a href='Suchmuster.php?titel=".$row['titel']."&regie=".$row['regie']."'" ?>>
                            <p class="watchlist_link">Weiterlesen</p></a>
                            
                            <a <?php echo "<a href='includes/watchlist.inc.php?titel=".$row['titel']."&regie=".$row['regie']."'" ?>>
                            <p class="watchlist_link">+ Watchlist</p></a>
                            <br>
                            <br>
                <?php 
                    }
                ?>         
        </div>  
        <?php
            }
            
        }
        
        
        ?>
        
    </div>
            
    
   <!--- <aside id="sidebar">
                <div style="float: left; width: 50px;">
                <img src="popcorn.png" width="40px" height="55px" style="margin-top: 30px;">
                </div>
        <h3 id="heading">Aktuelle Film News</h3> 

     </aside>-->
            
        
        
    <footer></footer>
        
  
        
	</body> 
</html> 