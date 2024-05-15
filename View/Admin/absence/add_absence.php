<?php
include_once '../../../Controller/absence_con.php';
include_once '../../../Controller/user_con.php';
include_once '../../../Model/gestion absence/absence.php';

// Création d'une instance du contrôleur des événements
$absenceC = new absenceCon("absence");
$userC = new UserCon("user");
$absence = null;
$students = $userC->listStudents();
$teachers = $userC->listTeachers();
if (
    isset($_POST["name"]) &&
    isset($_POST["id_student"]) &&
    isset($_POST["date_hour"]) &&// verif champs 
    isset($_POST["id_teacher"])
) {
    if (
        !empty($_POST['name']) &&
        !empty($_POST["id_student"]) &&//verif vide
        !empty($_POST["date_hour"]) &&
        !empty($_POST["id_teacher"])
    ) {
        
        $absence = new Absence(
            '',
            $_POST['name'],
            $_POST['id_student'],
            $_POST['date_hour'],
            $_POST['id_teacher']
        );

        $absenceC->addAbsence($absence);
        $email = $absenceC->get_email_by_user_id($_POST["id_student"]);
        $absenceC->send_absence_email($email, $_POST['name'], $_POST['date_hour']);
        header('Location: ../index.php?page=AB');
    } else {
        #$error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Add Absence</title>
</head>
<body>

<div class="container my-5">
    <h1 class="text-center">Adding Absence</h1>
    <p class="lead text-center">Please fill in this form to add an absence.</p>
    <hr>

    <form action="add_absence.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label"><b>Name</b></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required pattern="[A-Za-z\s]+" title="Please enter a valid name (letters and spaces only)">
        </div>
        <div class="mb-3">
            <label for="id_student" class="form-label"><b>ID Student</b></label>
            
            <select name="id_student" id="id_student" class="form-control" required>
                <option value="">Default</option>
                <?php foreach ($students as $student): ?>
                    <option value="<?= $student['Id'] ?>"><?= $student['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="date_hour" class="form-label"><b>Date Hour</b></label>
            <input type="datetime-local" class="form-control" id="date_hour" name="date_hour" required>
        </div>
        <div class="mb-3">
            <label for="id_teacher" class="form-label"><b>ID Teacher</b></label>
            <select name="id_teacher" id="id_teacher" class="form-control" required>
                <option value="">Default</option>
                <?php foreach ($teachers as $teacher): ?>
                    <option value="<?= $teacher['Id'] ?>"><?= $teacher['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <hr>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>

</div>

<script src="../../scripts/verif_inp.js"></script>
<script>
    document.querySelector('.input-group button').addEventListener('click', function() {
        let searchText = document.getElementById('searchInput').value.toLowerCase();
        let rows = document.querySelectorAll('#absenceTableBody tr');

        rows.forEach(function(row) {
            let text = row.textContent.toLowerCase();
            if(text.indexOf(searchText) !== -1) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
