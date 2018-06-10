<?php 

session_start();
include_once 'includes/connection.php';

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
                        <li><a href="Watchlist.html">Watchlist</a></li>
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
        <h3 id="heading">Zuletzt hinzugefügte Titel</h3>

        
        
        <?php
        
            $sql = "SELECT * FROM film;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
        
        if($resultCheck > 0){
            
           for($i=0; $i < 5; $i++){
               
               $row = mysqli_fetch_assoc($result);
        ?>
        
        <div class="variable_mov">
                
            <h1 class="log_head"><?php echo $row['titel']; ?></h1>
            <p class="log_p">Handlung: </p><p class="muster_layout"><?php echo $row['inhalt']; ?></p>
               
        </div>  
        <?php
            }
            
        }
        
        
        ?>
        
    </div>
            
    
    <aside id="sidebar">
                <div style="float: left; width: 50px;">
                <img src="popcorn.png" width="40px" height="55px" style="margin-top: 30px;">
                </div>
        <h3 id="heading">Aktuelle Film News</h3> 
        <iframe width="300" height="400" src="http://www.rss-anzeigen.com/feed.php?showtype=1&url=http://rss.filmstarts.de/fs/news/filmnachrichten&textfont=2&fontsize=10&fontc=000000&linkc=0000FF&tabwidth=300&tabborder=888888&tabbg=F8F8F8&newscount=5&newsshow=1&maxchars=0&target=1&ifbg=FFFFFF" frameborder=0></iframe>
     </aside>
            
        
        
    <footer><a href="Impressum.html">Impressum</a><a href="Kontakt.html"> Kontakt</a></footer>
        
  
        
	</body> 
</html> 