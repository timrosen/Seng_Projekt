<?php

include_once 'includes/connection.php';

?>


<!DOCTYPE html> 

<html lang="en"> 
	<head> 
		<meta charset="UTF-8" /> 
		<title>Suche</title>
        <link rel="stylesheet" type="text/css"
              href="style.css"
              title="hcrspecific" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	</head> 
	<body class="body_search"> 
        
            <div style="float: left; width: 50px;">
                <img src="popcorn.png" width="40px" height="55px" style="margin-top: -10px;">
            </div>
        <header><h1 id="heading">Software Engineering Projekt 2018</h1></header>
  
        
        <nav id="mainnav">
            <ul>
                <div class="dropdown">
                <li><a href="Login.php" class="dropbtn">Login</a></li>
                    <div class="dropdown_content">
                        <a href="Register.php">Registrieren</a>
                    </div>
                </div>
                <li><a href="Verlauf.html">Verlauf</a></li>
                <li><a href="Watchlist.html">Watchlist</a></li>
                <li><a href="Titel_neu.php">Titel hinzufügen</a></li>
               
            </ul>
        </nav>
        <form action="search_mov.php" method="post">
            
            <div class="search_box">
                
            <input class="search_text" type="text" name="suche" placeholder="Suchen">
                
               <input type="submit" class="search_button" value=">>">
                
               <!-- <a class="search_button" type="submit">
               
                <i style="font-size:24px" class="fa">&#xf002;</i>
                    
                </a>-->
            
        
        
            </div>
        </form>
    <footer><a href="Index.php">Startseite</a></footer>
        
		
	</body> 
</html>