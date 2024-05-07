<?php
include '../Controller/reclamation_con.php';  
require_once 'reclamation.php';  

$reclamationC = new reclamationCon("reclamation");

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
            '', 
            $_POST['type'],
            $_POST['subject'],
            $_POST['description']
            
        );

        $reclamationC->addReclamation($reclamation,$_POST['id_user']);
        header('Location: ../view/etudiant/add-reclamation.php?page=CR&result=1');  
    } else {
        header('Location: ../View/index.php?page=CR&result=4');  
        exit;
    }
} else {
    header('Location: ../View/index.php?page=CR&result=3');  
    exit;
}
?>
