<!DOCTYPE html> 
<?php


session_start();

include_once 'includes/connection.php';




    
?>

    
    

<html lang="en"> 
   
	<head> 
		<meta charset="UTF-8" /> 
		<title><?php echo $_SESSION["titel"]; ?></title>
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
                <li><a href="Watchlist.html">Watchlist</a></li>
                <li><a href="Titel_neu.php">Titel hinzufügen</a></li>
                <?php
                    
                }
                ?>
            </ul>
        </nav>
        <div class="loginbox">
        
        <img src="popcorn.png" class="avatar" style="margin-top: -100px;">
                <h1 class="log_head" style="margin-top: -100px;"><?php echo $_SESSION["titel"]; ?></h1>
            
            
                <form action="" method="post">
                    <div class="variable_mov">
                
                       
                    <p class="log_p">Erscheinungsjahr: </p><p class="muster_layout"><?php echo $_SESSION["jahr"]; ?></p>
                       
                    <p class="log_p">Regie: </p><p class="muster_layout"><?php echo $_SESSION["regie"]; ?></p>
                       
                    <p class="log_p">Länge: </p><p class="muster_layout"><?php echo $_SESSION["dauer"]; ?></p>
                        
                    
                    <p class="log_p">Handlung: </p><p class="muster_layout"><?php echo $_SESSION["inhalt"]; ?></p>
               
                    
                        <input type="submit" name="watchlist" value="Zur Watchlist hinzufügen">
                    </div>  
                    
                </form>
                
            </div>
        
        
        <footer><a href="Index.php">Startseite</a></footer>
        
		
	</body> 
</html>
