<?php
require '../Controller/connect.php'; // Adjust the path as necessary
$pdo = config::getConnexion();
echo $_POST['id_examen'];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['results'])) {
    foreach ($_POST['results'] as $id_user => $data) {
        try {
            $stmt = $pdo->prepare("INSERT INTO resultat (id_user, note, id_examen) VALUES (:id_user, :note, :id_examen)");
            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $stmt->bindParam(':note', $data['note'], PDO::PARAM_STR);
            $stmt->bindParam(':id_examen', $_POST['id_examen'], PDO::PARAM_INT); // Assume `id_examen` is provided some way or set it statically here
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error inserting result: " . $e->getMessage());
        }
    }
    header("Location: ../view/index.php?page=resultat&result=1"); // Redirect after submit with a success message
} else {
    header("Location: ../view/index.php?page=resultat&result=2"); // Redirect with an error message
}
?>
