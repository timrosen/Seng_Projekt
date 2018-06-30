<?php
/*  
    Weiterführen der zuvor gestarteten Session bzw. starten einer Session, damit die Session-Variablen 
    weiter aktiv bleiben und im folgenden genutz werden können.
*/
session_start();
?>


<!DOCTYPE html> 

<html lang="en"> 
	<head> 
		<meta charset="UTF-8" /> 
		<title>Buch hinzufügen</title>
        <link rel="stylesheet" type="text/css"
              href="style_sub.css"
              title="hcrspecific" />
   
       
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
                
               
                <li><a href="Verlauf_sub.php">Verlauf</a></li>
                <li><a href="booklist.php">Booklist</a></li>
                <li><a href="Suche_sub.php">Suche</a></li>
                <p class="user_login">Eingeloggt als: <?php echo $_SESSION['username']; ?></p>
            </ul>
        </nav>
        <div class="loginbox">
        
        <img src="book.png" class="avatar">
                <h1 class="log_head">Buch Hinzufügen</h1>
            
                <form action="add_book.php" method="post">
                
                    <p class="log_p">Titel</p>
                        <input type="text" name="bookTitel" placeholder="Titel" required>

                    <p class="log_p">Jahr</p>
                        <input type="text" name="bookJahr" placeholder="Erscheinugsjahr" required>
             
                    <p class="log_p">Autor</p>
                        <input type="text" name="bookAutor" placeholder="Autor" required>
                                
                    <p class="log_p">Handlung</p>
                    
                    <textarea class="text_area" id="bookInhalt" name="bookInhalt" cols="70" rows="3" maxlength="400" required></textarea>
            
                    

                    
                        <input type="submit" name="add" value="Buch Hinzufügen">
                        
                    
                </form>
            </div>

        
        
        <footer><a href="Index_sub.php">Startseite</a></footer>
        
		
	</body> 
</html>