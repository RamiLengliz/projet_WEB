<?php
include_once '../../../Controller/absence_con.php';
include_once '../../../Model/gestion absence/absence.php';

// Création d'une instance du contrôleur des événements
$absenceC = new absenceCon("absence");



if (isset($_GET['id'])) {
    $current_id = $_GET['id'];
    
    $absenceC->deleteAbsence($current_id);
    
    header('Location: ../index.php');
}
?>
