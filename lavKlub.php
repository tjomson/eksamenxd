<?php
    session_start();
    include "database.php";
    $navn = $_POST['navn']; //Navnet er det som blev postet fra lavKlubSide.php
    $beskrivelse  = $_POST['beskrivelse']; //Beskrivelsen fås også derfra.
    $connection = forbindelse();
    //I club-tabellen indsættes værdierne i kolonnerne navn og beskrivelse.
    $sql ="INSERT INTO clubDB.CLUB (`navn`, `beskrivelse`) VALUES ('".$navn."','".$beskrivelse."');";

    $tbCreated = $connection->query($sql);
        //Der dirigeres tilbage til klubOversigt.php.
        if ($tbCreated) {
             header ("Location:klubOversigt.php");

} 
?>