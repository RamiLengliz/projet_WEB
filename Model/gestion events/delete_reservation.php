<?php
include '../../Controller/reservation_con.php';
include 'reservation.php';

// Création d'une instance du contrôleur des événements
$reservationC = new reservationCon("reservation");

// Création d'une instance de la classe Event
$reservation = null;



if (isset($_GET['id'])) {
    $current_id = $_GET['id'];
    
    $reservationC->deleteReservation($current_id);
    
    header('Location:../../View/admin/index.php?page=ER&result=1');
    #$user= $userC->getUser($current_id);
}
?>