<?php
    session_start();
?>


<!DOCTYPE html> 

<html lang="en"> 
	<head> 
		<meta charset="UTF-8" /> 
		<title>Titel hinzufügen</title>
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
                
               <!-- <div class="dropdown">
                <li><a href="Login.php" class="dropbtn">Login</a></li>
                    <div class="dropdown_content">
                        <a href="Register.php">Registrieren</a>
                    </div>
                </div>-->
                <li><a href="Verlauf.html">Verlauf</a></li>
                <li><a href="Watchlist.php">Watchlist</a></li>
                <li><a href="Suche.php">Suche</a></li>
                <p class="user_login">Eingeloggt als: <?php echo $_SESSION['username']; ?></p>
            </ul>
        </nav>
        <div class="loginbox">
        
        <img src="popcorn.png" class="avatar">
                <h1 class="log_head">Titel Hinzufügen</h1>
            
                <form action="add_mov.php" method="post">
                
                    <p class="log_p">Titel</p>
                        <input type="text" name="titel" placeholder="Titel" required>

                    <p class="log_p">Jahr</p>
                        <input type="text" name="jahr" placeholder="Erscheinugsjahr" required>
             
                    <p class="log_p">Regisseur</p>
                        <input type="text" name="regie" placeholder="Regisseur" required>
              
                    <p class="log_p">Länge</p>
                        <input type="text" name="dauer" placeholder="Länge" required>
                
                    
                    <p class="log_p">Handlung</p>
                    
                    <textarea class="text_area" id="inhalt" name="inhalt" cols="70" rows="3" maxlength="400" required></textarea>
            
                    

                    
                        <input type="submit" name="add" value="Titel Hinzufügen">
                        
                    
                </form>
            </div>

        
        
        <footer><a href="Index.php">Startseite</a></footer>
        
		
	</body> 
</html>