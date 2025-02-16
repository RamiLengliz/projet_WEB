<?php
// update_face_id.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "lmok";
$dbname = "proschool_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the face value from the AJAX request
$face = $_POST['face'];

// Assuming you have a session to identify the user
session_start();
$user_id = $_SESSION['id'];

// Update the face column in the user table
$sql = "UPDATE user SET face = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $face, $user_id);

if ($stmt->execute()) {
    echo "Face ID status updated successfully.";
} else {
    echo "Error updating Face ID status: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
