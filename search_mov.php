<?php
/*  
    Weiterführen der zuvor gestarteten Session bzw. starten einer Session, damit die Session-Variablen 
    weiter aktiv bleiben und im folgenden genutz werden können.
*/
session_start();

include 'includes/connection.php'; // Verbindung zur Datenbank herstellen

?>

<!DOCTYPE html> 

<html lang="en"> 
	<head> 
		<meta charset="UTF-8" /> 
		<title>Suchergebnis</title>
        <link rel="stylesheet" type="text/css"
              href="style.css"
              title="hcrspecific" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	</head> 
	<body class="body_search"> 
        
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
                
                        <li><a href="Verlauf.php">Verlauf</a></li>
                        <li><a href="Watchlist.php">Watchlist</a></li>
                        <li><a href="Titel_neu.php">Titel hinzufügen</a></li>
                        <li><a href="Suche.php">Suche</a></li>
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
        <h3 id="heading">Suchergebnis</h3>
        
        
        <?php
        /*
            Suchfunktion wird im folgenden asugeführt.
        */
        if(isset($_POST['submit_search'])){
            /*
                Die Datenbank (Filmtabelle) wird nach Übereinstimmungen durchsucht
            */
            $search = mysqli_real_escape_string($conn, $_POST['search']); 
            $sql = "SELECT * FROM film WHERE titel LIKE '%$search%'"; // Tabelle wird durchsucht
            $result = mysqli_query($conn, $sql); // SQL Statement wird an die Datenbank übermittelt
            
            $queryResult = mysqli_num_rows($result); // Anzahl der Suchergebnisse wird gespeichert
            
            
            ?>
            <p class="log_p"><?php echo $queryResult // Anzahl der Suchergebisse wird ausgegeben?> Suchergebnis(se)</p>
            <br>
            <br>
            
            <?php
            /*
                Alle gefunden Übererinstimmungen mit dem 
                Suchwort werden im folgenden Angezeigt.
                
                Bei keinen Ergebnissen wird eine Meldung ausgegeben.
            */
            if($queryResult > 0){
                
                while($row = mysqli_fetch_assoc($result)){
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
                
            }else{
                    echo "Keine Suchergebnisse mit dem betreff $search";
                
            }
            
        }
        
        
        ?>
        </div>

        
        
            <footer><a href="Index.php">Startseite</a></footer>

</body>
</html>

