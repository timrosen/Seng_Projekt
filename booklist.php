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
		<title>Watchlist</title> 
        <link rel="stylesheet" type="text/css"
              href="style_sub.css"
              title="hcrspecific" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	</head> 
	<body>
            <div style="float: left; width: 50px;">
                <img src="book.png" width="50px" height="50px" style="margin-top: -10px;">
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
                        <li><a href="Booklist.php">Booklist</a></li>
                        <li><a href="book_new.php">Buch hinzufügen</a></li>
                        <li><a href="Suche_sub.php">Suche</a></li>
                        <p class="user_login">Eingeloggt als: <?php echo $_SESSION['username']; ?></p>
                        
            <?php 
                    
                }
                
            ?>
            </ul>
        </nav>
        
    <div id="content">
                <div style="float: left; width: 50px;">
                <img src="book.png" width="50px" height="55px" style="margin-top: 30px;">
                </div>
        <h3 id="heading">Booklist</h3>
        
        <?php
        /*
                Die Tabelle "Booklist" wird nach Übereinstimmungen 
                durchsucht und die Ergebisse werden dann
                alle angezeigt.
                
                Falls keine Übereinstimmungen gefunden wurden
                wird eine Meldung ausgegeben.
            */
            
        $username = $_SESSION['username'];
        
            $sql = "SELECT * FROM booklist WHERE username='$username';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
        

            
        
        if($resultCheck > 0){
            
            
            while($row = mysqli_fetch_assoc($result)){
               
               
               
    
               
        ?>
        
        <div class="variable_mov">
                
            <h1 class="log_head"><?php echo $row['bookTitel']; ?></h1>
            <p class="log_p">Handlung: </p><p class="muster_layout"><?php echo $row['bookInhalt'];?></p>
            
            
            
            <a <?php echo "<a href='includes/history_sub.inc.php?bookTitel=".$row['bookTitel']."&bookAutor=".$row['bookAutor']."'" ?>>
            <p class="watchlist_link">Gelesen</p></a>
            
            
            <a <?php echo "<a href='Suchmuster_sub.php?bookTitel=".$row['bookTitel']."&bookAutor=".$row['bookAutor']."'" ?>>
            <p class="watchlist_link">Weiterlesen</p></a>
            
            <a <?php echo "<a href='includes/delete_sub.inc.php?bookTitel=".$row['bookTitel']."&bookAutor=".$row['bookAutor']."'" ?>>
            <p class="watchlist_link">Löschen</p></a>
            <br>
            <br>
            <br>
            <br>
        </div>  
        <?php
            }
            
        }else{
            
        ?>
        
        <p class="log_p">Keine Titel in der Booklist vorhanden!</p>
        
        <?php
        }
        
        
        ?>
        
        
        
           
    </div>
            
    

            
        
        
      <footer><a href="Index_sub.php">Startseite</a></footer>
        
  
        
	</body> 
</html> 