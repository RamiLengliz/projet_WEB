<?php
include_once '../../../Controller/billet_con.php';
include_once '../../../Model/gestion absence/billet.php';

// Création d'une instance du contrôleur des événements
$billetC = new billetCon("billet");


// Création d'une instance de la classe Event
$billet = null;

if (
    isset($_POST["name"]) &&
    isset($_POST["id_student"]) &&
    isset($_POST["date_hour"]) &&// verif champs 
    isset($_POST["class"])
) {
    if (
        !empty($_POST['name']) &&
        !empty($_POST["id_student"]) &&//verif vide
        !empty($_POST["date_hour"]) &&
        !empty($_POST["class"])
    ) {
        
        $billet = new billet(
            '',
            $_POST['name'],
            $_POST['id_student'],
            $_POST['date_hour'],
            $_POST['class'],
            $_POST['id_abs']
        );

        $billetC->addbillet($billet);
        header('Location: ../index.php?page=AA');
    } else {
        #$error = "Missing information";
    }
}
?>
