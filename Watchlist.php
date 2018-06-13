<?php 

session_start();
include_once 'includes/connection.php';

?>




<!DOCTYPE html> 

<html lang="en"> 
	<head> 
		<meta charset="UTF-8" /> 
		<title>Watchlist</title> 
        <link rel="stylesheet" type="text/css"
              href="style.css"
              title="hcrspecific" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
            <?php
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
        
    <div id="content">
                <div style="float: left; width: 50px;">
                <img src="popcorn.png" width="40px" height="55px" style="margin-top: 30px;">
                </div>
        <h3 id="heading">Watchlist</h3>
        
        
            <form action="search_mov.php" method="post">

                <div class="search_box">

                <input class="search_text" type="text" name="search" placeholder="Suchen">
                    <button  class="search_button" type="submit" name="submit_search">  
                    <i style="font-size:24px" class="fa">&#xf002;</i>
                    </button>

                <!--<a class="search_button" type="submit">-->
                <!-- <input type="submit" class="search_button" value=">>"> -->

                </div>
            </form>
    </div>
            
    

            
        
        
      <footer><a href="Index.php">Startseite</a></footer>
        
  
        
	</body> 
</html> 