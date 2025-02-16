<?php
$user_Id = $_POST['userId'];

$query = 'python face_compare.py '.$user_Id;
$result = shell_exec($query);


// Prepare the JSON response
$response = [
    'success' => true,
    'message' => 'Process completed successfully.',
    'result' => $result,
    'additionalVar' => 'Some extra value'
];

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
