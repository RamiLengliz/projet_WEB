<?php
include_once '../../../Controller/absence_con.php';
include_once '../../../Model/gestion absence/absence.php';

// Création d'une instance du contrôleur des événements
$absenceC = new absenceCon("absence");

// Création d'une instance de la classe Event
$absence = null;

if (isset($_GET['id'])){
    $current_id = $_GET['id'];
}

if (
    isset($_POST["name"]) &&
    isset($_POST["id_student"]) &&
    isset($_POST["date_hour"]) &&
    isset($_POST["id_teacher"])
) {
    if (
        !empty($_POST['name']) &&
        !empty($_POST["id_student"]) &&
        !empty($_POST["date_hour"]) &&
        !empty($_POST["id_teacher"])
    ) {
       
        $absence = new Absence(
            $current_id,
            $_POST['name'],
            $_POST['id_student'],
            $_POST['date_hour'],
            $_POST['id_teacher']
        );

        $absenceC->updateAbsence($absence, $current_id);
        header('Location: ../index.php');
    } else {
        $error = "Missing information";
    }
} elseif (isset($_GET['id'])) {
    $current_id = $_GET['id'];
    $absence = $absenceC->getAbsence($current_id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Document</title>
</head>
<body>
    <form action="" align="center" method="post">
       
       <div>
       
                   <h1>Adding</h1>
                   <p>Please fill in this form to edite an absence.</p>
                   <hr>

                   <label for="name"><b>Name</b></label>
                   <input type="text" placeholder="Enter name" value="<?= $absence['name']; ?>" name="name" id="name" required>
                   <div id="nameError" style="color: red;"></div>

                   <label for="id_student"><b>id student</b></label>
                   <input type="text" placeholder="Enter id student" value="<?= $absence['id_student']; ?>" name="id_student" id="id_student" required>
                   <div id="id_studentError" style="color: red;"></div>

                   <label for="date_hour"><b>Date Hour</b></label>
                   <input type="datetime-local" placeholder="Enter date hour" value="<?= $absence['date_hour']; ?>" name="date_hour" id="date_hour" required>
                   <div id="date_hourError" style="color: red;"></div>

                   <label for="id_teacher"><b>Id Teacher</b></label>
                   <input type="text" placeholder="Enter id teacher" value="<?= $absence['id_teacher']; ?>" name="id_teacher" id="id_teacher" required>
                   <div id="id_teacherError" style="color: red;"></div>


                   <hr>

           <div>
               <input type="submit"name="addbtn" id="addbtn" value="Update" onclick="return verif_add_form()">
           </div>

       </div>

   </form>


   <script src="..\scripst\verif_inp.js"></script>


</body>
</html>