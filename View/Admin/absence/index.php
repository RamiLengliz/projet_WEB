<?php
include_once '../../Controller/absence_con.php';



// Création d'une instance du contrôleur des absences
$absenceC = new absenceCon("absence");
$absences = $absenceC->listAbsences();
include_once '../../Controller/user_con.php';
$userC = new UserCon("user");
$users = $userC->listStudents();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Liste des absences</title>
</head>
<body>

<div class="container my-5">
    <h1 class="text-center">Liste des absences</h1>

    <div class="input-group mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher...">
        <button class="btn btn-outline-secondary" type="button">
            <i class="bi bi-search"></i>
        </button>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>ID Étudiant</th>
                <th>Date et heure</th>
                <th>ID Professeur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="absenceTableBody">
            <?php foreach ($absences as $absence): ?>
                <tr>
                    <td><?= $absence['id']; ?></td>
                    <td><?= $absence['name']; ?></td>
                    <?php
                    $user = $userC->getUser($absence['id_student']);
                    if($user == NULL){
                    echo '<td>Not Found</td>';  
                    }else{
                        echo "<td>". $user['name'] ."</td>";
                    }
                    ?>
                    <td><?= $absence['date_hour']; ?></td>
                    <?php
                    $user = $userC->getUser($absence['id_teacher']);
                    if($user == NULL){
                    echo '<td>Not Found</td>';  
                    }else{
                        echo "<td>". $user['name'] ."</td>";
                    }
                    ?>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary btn-sm me-2" href="absence/update_absence.php?id=<?= $absence['id']; ?>">
                                <i class="bi bi-pencil-square"></i> Modifier
                            </a>
                            <a class="btn btn-danger btn-sm" href="absence/delete_absence.php?id=<?= $absence['id']; ?>">
                                <i class="bi bi-trash"></i> Supprimer
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-center">
        <a class="btn btn-primary" href="absence/add_absence.php" role="button">
            <i class="bi bi-plus-square"></i> Ajouter une absence
        </a>
    </div>
</div>

<script src="../scripts/verif_inp.js"></script>
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
