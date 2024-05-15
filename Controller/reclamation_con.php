<?php

require_once 'connect.php'; // Assume this contains the necessary database connection setup

class reclamationCon {
    private $tab_name;

    public function __construct($tab_name = 'reclamation') {
        $this->tab_name = $tab_name;
    }

    public function getReclamation($id) {
        $sql = "SELECT * FROM $this->tab_name WHERE id = :id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);
            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function listReclamations() {
        $sql = "SELECT * FROM $this->tab_name";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addReclamation($reclamation,$id_user) {
        $sql = "INSERT INTO $this->tab_name (type, subject, description,id_user) VALUES (:type, :subject, :description,:id_user)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'type' => $reclamation->getType(),
                'subject' => $reclamation->getSubject(),
                'description' => $reclamation->getDescription(),
                'id_user' => $id_user
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateReclamation($reclamation, $id) {
        $sql = "UPDATE $this->tab_name SET type = :type, subject = :subject, description = :description WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'type' => $reclamation->getType(),
                'subject' => $reclamation->getSubject(),
                'description' => $reclamation->getDescription()
            ]);
            $affectedRows = $query->rowCount();
            return $affectedRows > 0 ? "Reclamation updated successfully" : "No changes were made to the reclamation.";
        } catch (PDOException $e) {
            return "Error updating reclamation: " . $e->getMessage();
        }
    }

    function deleteReclamation($id) {
        $sql = "DELETE FROM $this->tab_name WHERE id = :id";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
            echo $req->rowCount() . " record(s) DELETED successfully";
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}

?>
