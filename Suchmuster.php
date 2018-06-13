<?php

    session_start();
    include 'includes/connection.php';
?>


    <html lang="en"> 
   
	<head> 
		<meta charset="UTF-8" /> 
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
                <li><a href="Login.php" class="dropbtn">Login</a></li>
                    <div class="dropdown_content">
                        <a href="Register.php">Registrieren</a>
                    </div>
                </div>
                <?php
                if(isset($_SESSION['user_id'])){
                    
                    
                ?>
                <li><a href="Verlauf.html">Verlauf</a></li>
                <li><a href="Watchlist.php">Watchlist</a></li>
                <li><a href="Titel_neu.php">Titel hinzufügen</a></li>
                <?php
                    
                }
                ?>
                <li><a href="Suche.php">Suche</a></li>
            </ul>
        </nav>
        <div class="loginbox">
        
        
            
        <?php
                $titel = mysqli_real_escape_string($conn, $_GET['titel']); //keine SQL Statements sollen ausgeführt werden
                $inhalt = mysqli_real_escape_string($conn, $_GET['inhalt']); 


                $sql = "SELECT * FROM film WHERE titel='$titel' AND inhalt='$inhalt'"; // Tabelle wird durchsucht
                $result = mysqli_query($conn, $sql); // SQL Statement wird an die Datenbank übermittelt
                $queryResult = mysqli_num_rows($result); // Übereinstimmungen werden "geholt"


                if($queryResult > 0){
                        
                    while ($row = mysqli_fetch_assoc($result)){
                        
                        
        ?> 
                <title><?php echo $row['titel']; ?></title>
            
                <img src="popcorn.png" class="avatar" style="margin-top: -100px;">
                <h1 class="log_head" style="margin-top: -100px;"><?php echo $row['titel']; ?></h1>
            
                    <div class="variable_mov">
                
                       
                    <p class="log_p">Erscheinungsjahr: </p><p class="muster_layout"><?php echo $row['jahr']; ?></p>
                       
                    <p class="log_p">Regie: </p><p class="muster_layout"><?php echo $row['regie']; ?></p>
                       
                    <p class="log_p">Länge: </p><p class="muster_layout"><?php echo $row['dauer']; ?></p>
                        
                    
                    <p class="log_p">Handlung: </p><p class="muster_layout"><?php echo $row['inhalt']; ?></p>
               
                    
                        <input type="submit" name="watchlist" value="Zur Watchlist hinzufügen">
                    </div> 
            
        <?php    
                        
                    }

                }

        ?>
                
                    
                    
           
                
            </div>
        
        
        <footer><a href="Index.php">Startseite</a></footer>
        
		
	</body> 
</html>