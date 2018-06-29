<!DOCTYPE html> 
<?php

/*  
    Weiterführen der zuvor gestarteten Session bzw. starten einer Session, damit die Session-Variablen 
    weiter aktiv bleiben und im folgenden genutz werden können.
*/
session_start();

include_once 'includes/connection.php'; // Verbindung zur Datenbank herstellen

$titel = $_SESSION["titel"];

$regie = $_SESSION["regie"];




    
?>

    
    

<html lang="en"> 
   
	<head> 
		<meta charset="UTF-8" /> 
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
            <?php  
                /*
                    Die Optionen: Verlauf, Watchlist, Titel hinzufügen 
                    werden nur angezeigt falls ein Nutzer angemeldet ist. 
                    
                    Außerdem wird der Nutzername , mit dem der User sich 
                    angemeldet hat angezeigt.
                */
                    
                }elseif(isset($_SESSION['user_id'])){
                    
            ?>      
                        <li><a href="Verlauf.html">Verlauf</a></li>
                        <li><a href="Watchlist.php">Watchlist</a></li>
                        <li><a href="Titel_neu.php">Titel hinzufügen</a></li>
                        <li><a href="Suche.php">Suche</a></li>
                        <p class="user_login">Eingeloggt als: <?php echo $_SESSION['username']; ?></p>
                        
            <?php 
                    
                }
                
            ?>
            </ul>
        </nav>
        <div class="loginbox">
        <?php

            /*
                Aus der zentralen Filmtabelle wird der Film geholt, 
                zudem der titel und Regisseur passt. 
                Danach werden die restlichen Daten zum jeweiligen Film
                ebenfalls aus der Tabelle "geholt" und dann in einem
                Muster angezeigt.
            */



            $sql = "SELECT * FROM film WHERE titel='$titel' AND regie='$regie'"; 
            $result = mysqli_query($conn, $sql); // SQL Statement wird an die Datenbank übermittelt

            $queryResult = mysqli_num_rows($result); 

            /*
                Alle 
            */
            if($queryResult > 0){

                while ($row = mysqli_fetch_assoc($result)){


    ?>             
        <title><?php echo $row['titel']; ?></title>
        <img src="popcorn.png" class="avatar" style="margin-top: -100px;">
                <h1 class="log_head" style="margin-top: -100px;"><?php echo $row['titel']; ?></h1>
            
            
                
                    <div class="variable_mov">
                
                       
                    <p class="log_p">Erscheinungsjahr: </p><p class="muster_layout"><?php echo $row['jahr']; ?></p>
                       
                    <p class="log_p">Regie: </p><p class="muster_layout"><?php echo $row['regie']; ?></p>
                       
                    <p class="log_p">Länge: </p><p class="muster_layout"><?php echo $row['dauer']; ?></p>
                        
                    
                    <p class="log_p">Handlung: </p><p class="muster_layout"><?php echo $row['inhalt']; ?></p>
               
                    
                    <a <?php echo "<a href='includes/watchlist.inc.php?titel=".$row['titel']."&regie=".$row['regie']."'" ?>>
                    <br>
                    <p class="watchlist_add">Zur Watchlist hinzufügen</p></a>
                        
                    </div>  
                    
                
                
            </div>
         <?php    
                        
                    }

                }

        ?>
        
        <footer><a href="Index.php">Startseite</a></footer>
        
		
	</body> 
</html>
