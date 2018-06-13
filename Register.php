<?php
    session_start();
?>


<!DOCTYPE html> 

<html lang="en"> 
	<head> 
		<meta charset="UTF-8" /> 
		<title>Registrieren</title>
        <link rel="stylesheet" type="text/css"
              href="style.css"
              title="hcrspecific" />
	</head> 
	<body> 
            <div style="float: left; width: 50px;">
                <img src="popcorn.png" width="40px" height="55px" style="margin-top: -10px;">
            </div>
        <header><h1 id="heading">Software Engineering Projekt 2018</h1></header>
  
        
        <nav id="mainnav"> 
            <ul>
                
                <?php
                if(isset($_SESSION['user_id'])){
                    
                    
                ?>
                <li><a href="Verlauf.html">Verlauf</a></li>
                <li><a href="Watchlist.php">Watchlist</a></li>
                <li><a href="Titel_neu.php">Titel hinzufügen</a></li>
                <?php
                    
                }
                ?>
                
                <li><a href="Login.php">Login</a></li>
                <li><a href="Suche.php">Suche</a></li>
            </ul>
        </nav>
            <div class="loginbox">
        
        <img src="popcorn.png" class="avatar">
                <h1 class="log_head">Registrieren</h1>
                
                <form action="includes/signup.inc.php" method="post">
                
                    <p class="log_p">Benutzername</p>
                        <input type="text" name="user" placeholder="Benutzername" required>
                    <p class="log_p">E-Mail Adresse</p>
                        <input type="text" name="email" placeholder="E-Mail" required>
                    <p class="log_p">Passwort</p>
                        <input type="password" name="pwd" placeholder="Passwort" required>
                        <input type="submit" name="submit" value="Registrieren">
                            <a href="#">Passwort vergessen?</a><br>
                            
                
                </form>
            </div>
        <footer><a href="Index.php">Startseite</a></footer>
        
		
	</body> 
</html> 