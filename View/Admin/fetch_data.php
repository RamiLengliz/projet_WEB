<?php
include '../../Controller/connect.php'; // Include your connection file

try {
    $pdo = config::getConnexion(); // Get PDO connection using your method
    $query = "SELECT subject.name, COUNT(cours.idSubject) AS courseCount FROM subject
    LEFT JOIN cours ON subject.Id = cours.idSubject
    GROUP BY subject.Id";

    // Adjust your SQL query as needed
    // Assuming you only want names

    $stmt = $pdo->prepare($query);
    $stmt->execute();
   // $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 

    // Extract IDs into a simple array
    $stmt = $pdo->query($query);

    $chartData = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $chartData['name'][] = $row['name']; // Assuming you have a 'month_name' column
        $chartData['courseCount'][] = $row['courseCount'];           // Assuming you have a 'value' column
    }


    // Send JSON response (just the names)
    header('Content-Type: application/json');
    echo json_encode($chartData);

} catch (Exception $e) {
    // Handle errors gracefully
    header('Content-Type: application/json');
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => $e->getMessage()]);
}
?>
