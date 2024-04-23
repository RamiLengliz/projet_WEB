<?php
include ("C:/xampp/htdocs/GestionSubjectCours/Dashbord/config.php");
include("C:/xampp/htdocs/GestionSubjectCours/Dashbord/Model/cours.php");

class coursC {
    function ajouterCours($cours){
        $sql = "INSERT INTO cours (idCours, nomCours, ressourceCours, idSubject) 
                VALUES (:idCours, :nomCours, :ressourceCours, :idSubject)";
        $db = new config();
        $conn = $db->getConnexion();
        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'idCours' => $cours->getIdCours(),
                'nomCours' => $cours->getNomCours(),
                'ressourceCours' => $cours->getRessourceCours(),
                'idSubject' => $cours->getIdSubject()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function afficherCoursByIdSubject($idSubject){
        $sql = "SELECT * FROM cours WHERE idSubject = :idSubject";
        $conn = new config();
        $db = $conn->getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idSubject' => $idSubject]);

            $coursList = $query->fetchAll();
            return $coursList;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerCours($idCours){
        $sql = "DELETE FROM cours WHERE idCours = :idCours";
        $conn = new config();
        $db = $conn->getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idCours', $idCours);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererCours($idCours){
        $sql = "SELECT * FROM cours WHERE idCours = :idCours";
        $conn = new config();
        $db = $conn->getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idCours' => $idCours]);

            $cours = $query->fetch();
            return $cours;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function updateCours($cours, $idCours){
        try {
            $conn = new Config();
            $db = $conn->getConnexion();
            $query = $db->prepare(
                "UPDATE cours SET 
                    nomCours = :nomCours,
                    ressourceCours = :ressourceCours,
                    idSubject = :idSubject
                 WHERE idCours = :idCours"
            );
            $query->execute([
                'nomCours' => $cours->getNomCours(),
                'ressourceCours' => $cours->getRessourceCours(),
                'idSubject' => $cours->getIdSubject(),
                'idCours' => $idCours
            ]);
            echo $query->rowCount() . " records updated successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
}
?>
