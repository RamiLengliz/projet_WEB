<?php
require '../../Controller/connect.php'; // Adjust the path as necessary
$pdo = config::getConnexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['results'], $_POST['id_examen'])) {
    $id_examen = $_POST['id_examen'];

    foreach ($_POST['results'] as $id_user => $data) {
        $note = $data['note'];
        // Check if result exists
        $check = $pdo->prepare("SELECT id FROM resultat WHERE id_user = :id_user AND id_examen = :id_examen");
        $check->execute(['id_user' => $id_user, 'id_examen' => $id_examen]);
        $exists = $check->fetch();

        if ($exists) {
            // Update existing result
            $stmt = $pdo->prepare("UPDATE resultat SET note = :note WHERE id_user = :id_user AND id_examen = :id_examen");
        } else {
            // Insert new result
            $stmt = $pdo->prepare("INSERT INTO resultat (note, id_user, id_examen) VALUES (:note, :id_user, :id_examen)");
        }

        $stmt->execute([
            'note' => $note,
            'id_user' => $id_user,
            'id_examen' => $id_examen
        ]);
    }
    header("Location: ../../view/admin/index.php?page=resultat_update&result=1"); // Redirect after submit with a success message
} else {
    header("Location: ../../view/admin/index.php?page=resultat_update&result=2"); // Redirect with an error message
}
