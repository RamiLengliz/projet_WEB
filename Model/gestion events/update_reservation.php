<?php
include '../../Controller/reservation_con.php';
include 'reservation.php';

$reservationC = new reservationCon("reservation");

$reservation = null;

if (isset($_POST['id'])) {
    $current_id = $_POST['id'];
}

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

        $reservationC->updateReservation($reservation, $current_id);
        
            
        header('Location: ../../View/admin/index.php?page=ER&result=1');
        
    } else {
        $error = "Missing information";
    }
} elseif (isset($_GET['id'])) {
    $current_id = $_GET['id'];
    $reservation = $reservationC->getReservation($current_id);
}
?>