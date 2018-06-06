<?php

include_once 'includes/connection.php';

   $suche = $_POST['suche'];



    $titel_s = "SELECT titel FROM film WHERE titel = '$suche'";
    $jahr_s = "SELECT jahr FROM film WHERE titel = '$suche'";
    $regie_s = "SELECT regie FROM film WHERE titel = '$suche'";
    $dauer_s = "SELECT titel FROM film WHERE titel = '$suche'";
    $inhalt_s = "SELECT titel FROM film WHERE titel = '$suche'";


    $result_search = mysqli_query($conn, $titel_s);

             
SESSION_START();
$_SESSION["titel"] = $titel_s;
$_SESSION["jahr"] = $jahr_s;
$_SESSION["regie"] = $regie_s;
$_SESSION["dauer"] = $dauer_s;
$_SESSION["inhalt"] = $inhalt_s;



?>

<link rel="stylesheet" type="text/css"
              href="style.css"
              title="hcrspecific" />
<meta http-equiv="refresh" content="0.5; URL='Muster.php'"/>