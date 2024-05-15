<?php

require_once 'connect.php';

class reservationCon{

    private $tab_name;

    public function __construct($tab_name){
        $this->tab_name = $tab_name;
    }

    public function getReservation($id)
    {
        $sql = "SELECT * FROM $this->tab_name WHERE id = $id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute();
            $event = $query->fetch();
            return $event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function listReservations()
    {
        $sql = "SELECT * FROM $this->tab_name";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addReservation($reservation)
    {
        $sql = "INSERT INTO $this->tab_name(id_etudiant, id_evenement, nb_place) VALUES (:id_etudiant, :id_evenement, :nb_place)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(
               [
                'id_etudiant' => $reservation->get_id_etudiant(), 
                'id_evenement' => $reservation->get_id_evenement(), 
                'nb_place' => $reservation->get_nb_place(),
                ]
            );
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateReservation($reservation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("UPDATE $this->tab_name SET id_etudiant = :id_etudiant, id_evenement = :id_evenement, nb_place = :nb_place WHERE id = :id");
            $query->execute([
                'id' => $id, 
                'id_etudiant' => $reservation->get_id_etudiant(), 
                'id_evenement' => $reservation->get_id_evenement(), 
                'nb_place' => $reservation->get_nb_place(),
            ]);
            header('Location: ../View/index.php?page=CE&result=1');
        } catch (PDOException $e) {
            $e->getMessage();
            echo($e);
        }
    }

    function deleteReservation($id)
    {
        $sql = "DELETE FROM $this->tab_name WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function generateEventsOptions()
    {
        // Fetching the blog IDs from the database
        $sql = "SELECT id, titre FROM events";

        $db = config::getConnexion();

        try {
            $stmt = $db->query($sql);

            // Generating the <option> tags
            $options = '';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $options .= '<option value="' . $row['id'] . '">' . $row['titre'] . '</option>';
            }

            return $options;
        } catch (PDOException $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function generateEventsOptionsSelectedId($id)
    {
        // Fetching the blog IDs from the database
        $sql = "SELECT id, titre FROM events";

        $db = config::getConnexion();

        try {
            $stmt = $db->query($sql);

            // Generating the <option> tags
            $options = '';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['id'] == $id){
                    $options .= '<option selected value="' . $row['id'] . '">' . $row['titre'] . '</option>';
                }
                else{
                    $options .= '<option value="' . $row['id'] . '">' . $row['titre'] . '</option>';
                }
            }

            return $options;
        } catch (PDOException $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function countReservations($eventId)
    {
        $sql = "SELECT COUNT(*) as count FROM $this->tab_name WHERE id_evenement = :id";

        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $eventId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

}




?>