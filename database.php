<?php
$GLOBALS['debug'] = false;
    function forbindelse(){ //Funktion til at oprette forbindelse til SQL-databasen.
        $connection = new mysqli("localhost", "root","neger");//Indsæt eget kodeord her.

        return $connection;
    }
    $connection = forbindelse(); //Opret forbindelse.

        $sql = "CREATE DATABASE IF NOT EXISTS clubDB"; //Opret databsen hvis den ikke findes.
        $connection->query($sql);

//Hvis tabellerne ikke findes, oprettes de med automatisk ID som primary key.
$sql = "CREATE TABLE IF NOT EXISTS clubDB.CLUB (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, --ID tilegnes automatisk. Det er primary key.
navn VARCHAR(30) NOT NULL, --Navnet må være på op til 30 tegn.
beskrivelse VARCHAR(100) NOT NULL)"; //Beskrivelsen må være på op til 100 tegn.

$connection->query($sql);
//Tabel til brugere oprettes på samme måde.
$sql = "CREATE TABLE IF NOT EXISTS clubDB.USERS (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        navn VARCHAR(30) NOT NULL, 
        password VARCHAR(30) NOT NULL)";

$connection->query($sql);
//Tabel til at kombinere brugere og klubber oprettes.
$sql = "CREATE TABLE IF NOT EXISTS clubDB.USERCLUB (
user_id INT(6) UNSIGNED, 
club_id INT(6) UNSIGNED, 
--De er begge foreign keys, da de hentes fra andre tabeller.
FOREIGN KEY (user_id) REFERENCES clubDB.USERS(id), 
FOREIGN KEY (club_id) REFERENCES clubDB.CLUB(id))";
$connection->query($sql);

    function opretBruger($connection, $navn, $password){ //Funktion til at oprette brugere.
        $sql =  "INSERT INTO clubDB.USERS (navn, password) VALUES ('".$navn."','".$password."')"; //Navn og password indsættes i tabellen over brugere.
        $userCreated = $connection->query($sql);
        return $userCreated;
    }
    

    function eksisterendeBruger($connection, $navn){ //Funktion til hvis brugeren
        $sql = "SELECT * FROM clubDB.USERS WHERE navn='".$navn."' LIMIT 1";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        return $row!=null;
    }

    function rigtigKode($connection, $navn, $password){ //Funktion som kan tjekke om en bruger findes i forvejen eller om der er tale om en ny bruger.
        $sql = "SELECT USERS.id FROM clubDB.USERS WHERE password='".$password."' AND navn='".$navn."' LIMIT 1";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();
        return $row != null ? $row['id']: null;
    }

    //Når denne funktion kaldes, fjernes en entry fra userclub hvor der er en specifik kombination af user_id og club_id
    function frameld($connection, $userid, $clubid){
        $sql = "DELETE FROM clubDB.userclub WHERE user_id=".$_SESSION['user_id']." AND club_id=".$clubid."";

$tbCreated = $connection->query($sql);

    }

    //Når denne kaldes indsættes der i userclub.
    function tilmeld($connection, $userid, $clubid){ 
        $sql ="INSERT INTO clubDB.userclub (`user_id`, `club_id`) VALUES (".$_SESSION['user_id'].", ".$clubid.");";
        
        $tbCreated = $connection->query($sql);
 
        }
?>