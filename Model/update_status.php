<?php
// Assuming you have already established a database connection
require '../Controller/email-function.php'; // Ensure this path is correct to include the email function
include '../Controller/user_con.php'; // Assuming UserController is implemented in this file
include '../Model/user.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = config::getConnexion();
    $userId = $_POST['userId'];
    $isChecked = $_POST['isChecked'];

    // Update database with new checkbox state
    $query = "UPDATE user SET status = :status WHERE Id = :userId";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(':status' => $isChecked, ':userId' => $userId));

    // You can echo a response if needed
    echo 'Status updated successfully.';
}
?>
