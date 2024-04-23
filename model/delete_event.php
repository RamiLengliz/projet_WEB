<?php
include '../Controller/event_con.php';
include '../Model/event.php';

// Création d'une instance du contrôleur des événements
$eventC = new eventCon("events");

// Création d'une instance de la classe Event
$event = null;



if (isset($_GET['id'])) {
    $current_id = $_GET['id'];
    
    $eventC->deleteEvent($current_id);
    
    header('Location:../View/index.php?page=CE&result=1');
    #$user= $userC->getUser($current_id);
}
?>