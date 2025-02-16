<?php
include '../../controller/connect.php';
require_once '../../Controller/examen_con.php';
include '../../controller/subject_con.php';
include 'sms.php';
$pdo = config::getConnexion();
echo $_POST['id_examen'];
$subjectC = new SubjectCon("subject");
$subjects = $subjectC->listSubjects();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['results'])) {
    foreach ($_POST['results'] as $id_user => $data) {
        try {
            $stmt = $pdo->prepare("INSERT INTO resultat (id_user, note, id_examen) VALUES (:id_user, :note, :id_examen)");
            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $stmt->bindParam(':note', $data['note'], PDO::PARAM_STR);
            $stmt->bindParam(':id_examen', $_POST['id_examen'], PDO::PARAM_INT);
            $stmt->execute();

            // Fetch user information
            $userStmt = $pdo->prepare("SELECT tel FROM user WHERE Id = :id_user");
            $userStmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $userStmt->execute();
            $user = $userStmt->fetch();

            // Send SMS if phone number is available
            if ($user && !empty($user['tel'])) {
                $id_exam = $_POST['id_examen'];
                $examenC = new examenCon("examen");
                $examen = $examenC->getExamen($id_exam);
                $subject_name = $subjectC->getSubject($examen['id_subject']);
                $message = "Hello, your exam in " . $subject_name['name'] . " results are now available. Your score is: " . $data['note'];
                //echo sendSms($user['tel'], $message);
            }
        } catch (PDOException $e) {
            die("Error inserting result: " . $e->getMessage());
        }
    }
    header("Location: ../../view/admin/index.php?page=resultat&result=1"); // Redirect after submit with a success message
} else {
    header("Location: ../../view/admin/index.php?page=resultat&result=2"); // Redirect with an error message
}
