<?php

require_once __DIR__ . '/../config.php';

class absenceCon{

    private $tab_name;

    public function __construct($tab_name){
        $this->tab_name = $tab_name;
    }

    public function getAbsence($id)
    {
        $sql = "SELECT * FROM $this->tab_name WHERE id = $id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute();
            $voyage = $query->fetch();
            return $voyage;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function listAbsences()
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

    function addAbsence($absence)
    {
        $sql = "INSERT INTO $this->tab_name(name, id_student, date_hour, id_teacher) VALUES (:name, :id_student, :date_hour, :id_teacher)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(
               [
                'name' => $absence->getName(),
                'id_student' => $absence->getIdStudent(),
                'date_hour' => $absence->getDateHour(),
                'id_teacher' => $absence->getIdTeacher(),     
               ]
            );
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateAbsence($absence, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("UPDATE $this->tab_name SET name = :name, id_student = :id_student, date_hour = :date_hour, id_teacher = :id_teacher WHERE id = :id");
            $query->execute([
                'id' => $id, 
                'name' => $absence->getName(),
                'id_student' => $absence->getIdStudent(),
                'date_hour' => $absence->getDateHour(),
                'id_teacher' => $absence->getIdTeacher()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
            echo($e);
        }
    }

    function deleteAbsence($id)
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

    public function getBilletExist($id)
    {
        $sql = "SELECT * FROM billet WHERE id_abs = :id_abs";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id_abs', $id);
            $query->execute();
            $voyage = $query->fetch();
            
            // Check if $voyage has any data
            if ($voyage) {
                return true; // Return true if record exists
            } else {
                return false; // Return false if record does not exist
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    function generateAbs($abs_var) {

        #$reservationC = new reservationCon("reservation");

        echo '<div class="row">';
        
        foreach ($abs_var as $abs) {

            

            $billet_ex = $this->getBilletExist($abs['id']);

                echo '<div class="col-lg-4 col-md-6">';
                echo '<div class="category-box">';
                echo '<div class="category-title">';
                echo '<div class="category-img">';
                //echo '<img src="' . $event['image'] . '" alt="">';
                echo '<img src="" alt="">';
                echo '</div>';
                echo '<h5>' . $abs['name'] . '</h5>';
                //echo '<h7 style="color: #ac3973;">&nbsp; ' . $abs['id_student'] . '</h7>';
                echo '<h7>&nbsp;&nbsp;' . $abs['date_hour'] . '</h7>';
                echo '</div>';
                echo '<div class="cat-count">';
                if ($billet_ex){
                    echo '<span></span>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
            
            
        }
        
        echo '</div>';
    }

}


?>