        <?php
        
        include_once 'includes/connection.php';
        
        $titel = $_POST['titel'];
        $jahr = $_POST['jahr'];
        $regie = $_POST['regie'];
        $dauer = $_POST['dauer'];
        $inhalt = $_POST['inhalt'];
        
        
         $sql = "INSERT INTO film (titel, jahr, regie, dauer, inhalt) 
        VALUES ('$titel', '$jahr', '$regie', '$dauer', '$inhalt');";

        $result = mysqli_query($conn, $sql);

        
        SESSION_START();
        $_SESSION["titel"] = $titel;
        $_SESSION["jahr"] = $jahr;
        $_SESSION["regie"] = $regie;
        $_SESSION["dauer"] = $dauer;
        $_SESSION["inhalt"] = $inhalt;
        
  
        
        ?>

<link rel="stylesheet" type="text/css"
              href="style.css"
              title="hcrspecific" />
<meta http-equiv="refresh" content="0.5; URL='Muster.php'"/>

