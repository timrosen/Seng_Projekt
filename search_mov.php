<?php

        session_start();
        include 'includes/connection.php';
    
?>

<!DOCTYPE html> 

<html lang="en"> 
	<head> 
		<meta charset="UTF-8" /> 
		<title>Suchergebnis</title>
        <link rel="stylesheet" type="text/css"
              href="style.css"
              title="hcrspecific" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	</head> 
	<body class="body_search"> 
        
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
                
                        <li><a href="Verlauf.php">Verlauf</a></li>
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
        <h3 id="heading">Suchergebnis</h3>
        
        
        <?php
        if(isset($_POST['submit_search'])){
            
            $search = mysqli_real_escape_string($conn, $_POST['search']); //keine SQL Statements sollen ausgeführt werden
            
            $sql = "SELECT * FROM film WHERE titel LIKE '%$search%'"; // Tabelle wird durchsucht
            $result = mysqli_query($conn, $sql); // SQL Statement wird an die Datenbank übermittelt
            $queryResult = mysqli_num_rows($result); // Übereinstimmungen werden "geholt"
            ?>
            <p class="log_p"><?php echo $queryResult ?> Suchergebnis(se)</p>
            <br>
            <br>
            
            <?php
                
            if($queryResult > 0){
                
                while($row = mysqli_fetch_assoc($result)){
                ?>  
                        <div class="variable_mov">

                            <h1 class="log_head"><?php echo $row['titel']; ?></h1>
                            <p class="log_p">Handlung: </p><p class="muster_layout"><?php echo $row['inhalt']; ?></p>
                            
                            
                <?php   
                    if(isset($_SESSION['user_id'])){
                 ?>               
                            <a <?php echo "<a href='Suchmuster.php?titel=".$row['titel']."&regie=".$row['regie']."'" ?>>
                            <p class="watchlist_link">Weiterlesen</p></a>
                            
                            <a <?php echo "<a href='includes/watchlist.inc.php?titel=".$row['titel']."&regie=".$row['regie']."'" ?>>
                            <p class="watchlist_link">+ Watchlist</p></a>
                            <br>
                            <br>
                <?php 
                    }
                ?>       
                        </div>  
                  
                <?php
                }
                
            }else{
                    echo "Keine Suchergebnisse mit dem betreff $search";
                
            }
            
        }
        
        
        ?>
        </div>

        
        
            <footer><a href="Index.php">Startseite</a></footer>

</body>
</html>



<!--<meta http-equiv="refresh" content="0.5; URL='Muster.php'"/>-->