<?php
include 'connect.php';

try {
    $pdo = config::getConnexion();
    $query = "SELECT * FROM subject";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($data);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
