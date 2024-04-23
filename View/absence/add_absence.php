<?php
include_once __DIR__ . '/../../Controller/absence_con.php';
include_once __DIR__ . '/../../Model/absence.php';

// Création d'une instance du contrôleur des événements
$absenceC = new absenceCon("absence");


// Création d'une instance de la classe Event
$absence = null;

if (
    isset($_POST["name"]) &&
    isset($_POST["id_student"]) &&
    isset($_POST["date_hour"]) &&// verif champs 
    isset($_POST["id_teacher"])
) {
    if (
        !empty($_POST['name']) &&
        !empty($_POST["id_student"]) &&//verif vide
        !empty($_POST["date_hour"]) &&
        !empty($_POST["id_teacher"])
    ) {
        
        $absence = new Absence(
            '',
            $_POST['name'],
            $_POST['id_student'],
            $_POST['date_hour'],
            $_POST['id_teacher']
        );

        $absenceC->addAbsence($absence);
        header('Location: index.php');
    } else {
        #$error = "Missing information";
    }
}
?>
