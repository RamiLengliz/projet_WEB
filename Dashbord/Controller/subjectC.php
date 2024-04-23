<?php
include ("C:/xampp/htdocs/GestionSubjectCours/Dashbord/config.php");
include("C:/xampp/htdocs/GestionSubjectCours/Dashbord/Model/subject.php");

class SubjectC {
    function addSubject($subject){
        $sql = "INSERT INTO subject (id, name, subject_description, depot_fichier_subject) 
                VALUES (:id, :name, :subjectDescription, :depotFichierSubject)";
        $db = new Config();
        $conn = $db->getConnexion();
        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'id' => $subject->getId(),
                'name' => $subject->getName(),
                'subjectDescription' => $subject->getSubjectDescription(),
                'depotFichierSubject' => $subject->getDepotFichierSubject()
            ]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function displaySubjects(){
        $sql = "SELECT * FROM subject";
        $conn = new Config();
        $db = $conn->getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
	function deleteSubject($idSubject){
		$conn = new Config();
		$db = $conn->getConnexion();
	
		// Start a transaction to ensure atomicity of operations
		$db->beginTransaction();
	
		try {
			// Delete related courses first
			$sqlDeleteCourses = "DELETE FROM cours WHERE idSubject = :idSubject";
			$reqDeleteCourses = $db->prepare($sqlDeleteCourses);
			$reqDeleteCourses->bindValue(':idSubject', $idSubject);
			$reqDeleteCourses->execute();
	
			// Now delete the subject
			$sqlDeleteSubject = "DELETE FROM subject WHERE id = :id";
			$reqDeleteSubject = $db->prepare($sqlDeleteSubject);
			$reqDeleteSubject->bindValue(':id', $idSubject);
			$reqDeleteSubject->execute();
	
			// Commit the transaction if all operations are successful
			$db->commit();
	
			echo "Subject and related courses deleted successfully.";
		} catch (PDOException $e) {
			// Rollback the transaction if an error occurs
			$db->rollBack();
	
			die('Error: ' . $e->getMessage());
		}
	}
	

    function getSubject($idSubject){
        $sql = "SELECT * FROM subject WHERE id = :id";
        $conn = new Config();
        $db = $conn->getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $idSubject]);

            $subject = $query->fetch();
            return $subject;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateSubject($subject, $idSubject){
        try {
            $conn = new Config();
            $db = $conn->getConnexion();
            $query = $db->prepare(
                "UPDATE subject SET 
                    name = :name,
                    subject_description = :subjectDescription,
                    depot_fichier_subject = :depotFichierSubject
                 WHERE id = :id"
            );
            $query->execute([
                'name' => $subject->getName(),
                'subjectDescription' => $subject->getSubjectDescription(),
                'depotFichierSubject' => $subject->getDepotFichierSubject(),
                'id' => $idSubject
            ]);
            echo $query->rowCount() . " records updated successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>
