<!DOCTYPE html> 
<?php


$titel = $_POST['titel'];
$jahr = $_POST['jahr'];
$regie = $_POST['regie'];
$länge = $_POST['länge'];
$inhalt = $_POST['inhalt'];


?>

    
    

<html lang="en"> 
	<head> 
		<meta charset="UTF-8" /> 
		<title><?php echo $titel; ?></title>
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
                <div class="dropdown">
                <li><a href="Login.html" class="dropbtn">Login</a></li>
                    <div class="dropdown_content">
                        <a href="Register.html">Registrieren</a>
                    </div>
                </div>
                <li><a href="Verlauf.html">Verlauf</a></li>
                <li><a href="Watchlist.html">Watchlist</a></li>
                
                <li><a href="Suche.html">Suche</a></li>
            </ul>
        </nav>
        <div class="loginbox">
        
        <img src="popcorn.png" class="avatar" style="margin-top: -100px;">
                <h1 class="log_head" style="margin-top: -100px;"><?php echo $titel; ?></h1>
            
            
                <form action="" method="post">
                    <div class="variable_mov">
                
                       
                    <p class="log_p">Erscheinungsjahr: </p><p class="muster_layout"><?php echo $jahr; ?></p>
                       
                    <p class="log_p">Regie: </p><p class="muster_layout"><?php echo $regie; ?></p>
                       
                    <p class="log_p">Länge: </p><p class="muster_layout"><?php echo $länge; ?></p>
                        
                    
                    <p class="log_p">Handlung: </p><p class="muster_layout"><?php echo $inhalt; ?></p>
               
                    
                        <input type="submit" name="watchlist" value="Zur Watchlist hinzufügen">
                    </div>  
                    
                </form>
                
            </div>
        
        
        <footer><a href="Index.html">Startseite</a></footer>
        
		
	</body> 
</html>