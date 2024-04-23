
<?php
include_once __DIR__ . '/../../Controller/absence_con.php';

// Création d'une instance du contrôleur des événements
$absenceC = new absenceCon("absence");

// Récupération de la liste des événements
$absences = $absenceC->listAbsences();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Absence</title>
</head>
<body>


    
        <form action="add_absence.php" align="center" method="post">
        
            <div>
            
                <h1>Adding</h1>
                   <p>Please fill in this form to add an absence.</p>
                   <hr>

                   <label for="name"><b>Name</b></label>
                   <input type="text" placeholder="Enter name" name="name" id="name" >
                   <div id="nameError" style="color: red;"></div>

                   <label for="id_student"><b>id student</b></label>
                   <input type="text" placeholder="Enter id student" name="id_student" id="id_student" >
                   <div id="id_studentError" style="color: red;"></div>

                   <label for="date_hour"><b>Date Hour</b></label>
                   <input type="datetime-local" placeholder="Enter date hour" name="date_hour" id="date_hour" >
                   <div id="date_hourError" style="color: red;"></div>

                   <label for="id_teacher"><b>Id Teacher</b></label>
                   <input type="text" placeholder="Enter id teacher" name="id_teacher" id="id_teacher" >
                   <div id="id_teacherError" style="color: red;"></div>

                   <hr>

                <div>
                    <input type="submit" name="addbtn" id="addbtn" value="Add" onclick="return verif_add_form()">
                </div>

            </div>

        </form>
        
    
    <div>
        <table border="1" align="center" width="70%">
          
        <tr>
                <th>id</th>
                <th>name</th>
                <th>id student</th>
                <th>date hour</th>
                <th>id teacher</th>
                <th>actions</th>
            </tr>
        
            <?php
            foreach ($absences as $absence) {
            ?>
                <tr>
                    <td><?= $absence['id']; ?></td>
                    <td><?= $absence['name']; ?></td>
                    <td><?= $absence['id_student']; ?></td>
                    <td><?= $absence['date_hour']; ?></td>
                    <td><?= $absence['id_teacher']; ?></td>
                    <td>
                        <a href="update_absence.php?id=<?= $absence['id']; ?>">Update</a>
                        <a href="delete_absence.php?id=<?= $absence['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    
        </div>

    <script src="..\scripst\verif_inp.js"></script>

</body>
</html>