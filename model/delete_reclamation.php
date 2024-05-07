<?php
include 'reclamation.php';  
include '../Controller/reclamation_con.php';  

$reclamationC = new reclamationCon("reclamation");

if (isset($_GET['id'])) {
    $current_id = $_GET['id'];
    
    $reclamationC->deleteReclamation($current_id);
    
    header('Location: ../view/etudiant/add-reclamation.php?page=CR&result=1');
    exit;  
}
?>
