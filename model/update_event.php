<?php
include '../Controller/event_con.php';
include '../Model/event.php';

$eventC = new eventCon("events");

$event = null;

if (isset($_POST['id'])) {
    $current_id = $_POST['id'];
}

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

        $eventC->updateEvent($event, $current_id);
        
            
        header('Location: ../View/index.php?page=CE&result=1');
        
    } else {
        $error = "Missing information";
    }
} elseif (isset($_GET['id'])) {
    $current_id = $_GET['id'];
    $event = $eventC->getEvent($current_id);
}
?>