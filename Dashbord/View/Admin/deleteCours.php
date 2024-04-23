<?php
include "../../Controller/coursC.php";

$coursC = new coursC();

if (isset($_POST["id"])) {
    $idSubject = $_POST["idSubject"]; // Get idSubject from the form
    $coursC->supprimerCours($_POST["id"]);
    header('Location: showCourses.php?idSubject=' . $idSubject); // Pass idSubject in the URL
    exit(); // Ensure no further code execution after redirection
}
?>
