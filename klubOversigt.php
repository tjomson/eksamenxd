<html>
    <head>
        <title>HCØL klubber</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
<body>
    <div class="contentMain">

<!--Dette er den øverste menubar som er låst fast. -->
<div class="topBar">
    <h3>HCØL klubber</h3>
  <a href="lavKlubSide.php">Opret ny klub</a>
  <a href="index.php">Log på en anden konto</a>

</div>

<?php
    session_start();
    include "database.php";
    mysqli_select_db($connection,'clubDB');
    $navn  = isset($_POST['navn']) ? $_POST['navn'] : $_SESSION['navn']; //Brugerens navn sættes.
    $password = isset($_POST['password']) ? $_POST['password'] : $_SESSION['password']; //Brugerens kodeord sættes.

    $connection = forbindelse();
    $brugerEksisterer = false;
  
    if($brugerEksisterer){ //Hvis brugeren allerde findes, tages vedkomnes værdier og sættes ind.
        $_SESSION['navn'] = $navn;
        $_SESSION['password'] = $password; 
        $_SESSION['connection'] = $connection;
        $_SESSION['user_id'] = rigtigKode($connection,$navn,$password);
        }

    if(rigtigKode($connection,$navn,$password)){ //Hvis brugeren findes og koden er rigtig.
        echo "Værhilset ".$navn;
        $brugerEksisterer   = true;
    }else if (eksisterendeBruger($connection,$navn)){ //Hvis koden er skrevet forkert.
        echo "Forkert kodeord, ikke logget ind";
        $brugerEksisterer   = false;
    }else{ //Hvis det er en ny bruger.
        echo "Bruger oprettet";
        $brugerEksisterer   = opretBruger($connection,$navn,$password);
    }


    mysqli_select_db($connection,'clubDB'); //Databasen vælges.

$query = "SELECT * FROM club"; //Tabellen vælges.
$result = mysqli_query($connection,$query);

//Tabellen startes i HTML. <th> sætter overskrifter ind.
echo "<table> 
<th>Klubbens navn</th>
<th>Beskrivelse</th>
<th>Tilmeld / frameld</th>";
//While loop som kører det antal gange der er rækker.
while($row = mysqli_fetch_array($result)){
echo "<tr>
<td>" . $row['navn'] . "</td><td>" . $row['beskrivelse'] . "</td>


<td><a href='frameld.php?
club_id=".$row['id']."'>
<button>Frameld klub</button></a></td>
<td><a href='tilmeld.php?
club_id=".$row['id']."'>
<button>Tilmeld klub</button></a></td>
</tr>"; //Frameld og tilmeld knapper sættes ind. De dirigerer henholdsvis til frameld.php og tilmeld.php
}
echo "</table>";

            ?>
        </div>
    </body>
</html>