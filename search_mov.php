<?php
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
            
            ?><p style="color: black"><?php echo $queryResult ?> Suchergebnis(se)</p>
            
            <?php
                
            if($queryResult > 0){
                
                while($row = mysqli_fetch_assoc($result)){
                ?>  
                        <div class="variable_mov">

                            <h1 class="log_head"><?php echo $row['titel']; ?></h1>
                            <p class="log_p">Handlung: </p><p class="muster_layout"><?php echo $row['inhalt']; ?></p>
                            
                            <a <?php echo "<a href='Suchmuster.php?titel=".$row['titel']."&inhalt=".$row['inhalt']."'" ?>>
                                <p style="color: white;">Weiterlesen</p></a>

                        </div>  
                  
                <?php
                }
                
            }else{
                
                echo "Keine Suchergebnisse mit dem Betreff $search";
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
        
        
            <footer><a href="Index.php">Startseite</a></footer>

</body>
</html>



<!--<meta http-equiv="refresh" content="0.5; URL='Muster.php'"/>-->