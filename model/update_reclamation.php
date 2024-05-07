<?php
include '../Controller/reclamation_con.php';
require_once 'reclamation.php'; 

$reclamationC = new reclamationCon("reclamation"); 

$reclamation = null;
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    if (
        isset($_POST["type"]) &&
        isset($_POST["subject"]) &&
        isset($_POST["description"])
    ) {
        if (
            !empty($_POST['type']) &&
            !empty($_POST["subject"]) &&
            !empty($_POST["description"])
        ) {
            
            $reclamation = new Reclamation(
                $id, 
                $_POST['type'],
                $_POST['subject'],
                $_POST['description']
            );

            $result = $reclamationC->updateReclamation($reclamation, $id);
            header('Location: ../view/etudiant/add-reclamation.php?page=CR&result=1');  
            exit;  
        } else {
            header('Location: ../view/etudiant/add-reclamation.php?page=CR&result=3'); 
            exit;
        }
    }
} elseif (isset($_GET['id'])) {
    $current_id = $_GET['id'];
    $reclamation = $reclamationC->getReclamation($current_id);
}
?>
