<?php
include '../../Controller/examen_con.php';
require_once 'examen.php';

$examenC = new examenCon("examen");
$examen = null;

if (
    isset($_POST["titre"]) &&
    isset($_POST["datetime"]) &&
    isset($_POST["id_subject"]) &&
    isset($_POST["id_class"])
) {
    if (
        !empty($_POST['titre']) &&
        !empty($_POST["datetime"]) &&
        !empty($_POST["id_subject"]) &&
        !empty($_POST["id_class"])
    ) {
        // Combine date and time
        $datetime = $_POST['datetime'];

        $examen = new Examen(
            '',
            $_POST['titre'],
            $datetime,  // Use the combined datetime
            $_POST['id_class'],
            $_POST['id_subject']
        );

        $examenC->addExamen($examen);
        header('Location:../../View/Admin/index.php?page=CE&result=1');
    } else {
        header('Location:../../View/Admin/index.php?page=CE&result=4');  // Indicate missing field(s)
    }
} else {
    header('Location:../../View/Admin/index.php?page=CE&result=3');  // Indicate missing POST variable(s)
}
?>
