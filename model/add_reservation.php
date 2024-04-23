<?php
include '../Controller/reservation_con.php';
include '../Model/reservation.php';

// Création d'une instance du contrôleur des événements
$reservationC = new reservationCon("reservation");

// Création d'une instance de la classe Event
$reservation = null;

if (
    isset($_POST["id_etudiant"]) &&
    isset($_POST["id_evenement"]) &&
    isset($_POST["nb_place"])
) {
    if (
        !empty($_POST['id_etudiant']) &&
        !empty($_POST["id_evenement"]) &&
        !empty($_POST["nb_place"])
    ) {
        
        $reservation = new Reservation(
            '',
            $_POST['id_etudiant'],
            $_POST['id_evenement'],
            $_POST['nb_place']
        );

        $reservationC->addReservation($reservation);
        header('Location:../View/index.php?page=CR&result=1');
    } else {
        #$error = "Missing information";
    }
}
?>
