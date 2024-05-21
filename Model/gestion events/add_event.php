<?php
include '../../Controller/event_con.php';
include 'event.php';

// Création d'une instance du contrôleur des événements
$eventC = new eventCon("events");

// Création d'une instance de la classe Event
$event = null;

if (
    isset($_POST["titre"]) &&
    isset($_POST["date"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["dispo"])
) {
    if (
        !empty($_POST['titre']) &&
        !empty($_POST["date"]) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["dispo"])
    ) {
        
        $event = new Event(
            '',
            $_POST['titre'],
            $_POST['date'],
            $_POST['prix'],
            $_POST['dispo']
        );

        $eventC->addEvent($event);
        header('Location:../../View/admin/index.php?page=EC&result=1'.$_POST["dispo"]);
    } else {
        #$error = "Missing information";
    }
}
?>
