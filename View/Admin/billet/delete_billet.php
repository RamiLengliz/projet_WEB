<?php
include_once '../../../Controller/billet_con.php';
include_once '../../../Model/gestion absence/billet.php';

// Création d'une instance du contrôleur des événements
$billetC = new billetCon("billet");



if (isset($_GET['id'])) {
    $current_id = $_GET['id'];
    
    $billetC->deleteBillet($current_id);
    
    header('Location: ../index.php?page=AA');
}
?>