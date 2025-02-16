<?php
include_once '../../Controller/billet_con.php';

// Création d'une instance du contrôleur des événements
$billetC = new billetCon("billet");

// Récupération de la liste des événements
$billets = $billetC->listBillets();

$id_abs_options = $billetC->generateAbsOptions();
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
    <title>Billets</title>
    <style>
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center">Ajout</h1>
        <p class="text-center">Veuillez remplir ce formulaire pour ajouter un billet.</p>
        <hr>

        <!-- Formulaire d'ajout de billet -->
        <form action="billet/add_billet.php" method="post">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Entrez le nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_student" class="form-label"><b>ID Student</b></label>

                        <select name="id_student" id="id_student" class="form-control" required>
                            <option value="">Default</option>
                            <?php foreach ($users as $student) : ?>
                                <option value="<?= $student['Id'] ?>"><?= $student['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date_hour" class="form-label">Date et heure</label>
                        <input type="datetime-local" class="form-control" id="date_hour" name="date_hour" required>
                    </div>
                    <div class="mb-3">
                        <label for="class" class="form-label">Classe</label>
                        <input type="text" class="form-control" id="class" name="class" placeholder="Entrez la classe" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_abs" class="form-label">ID d'absence</label>
                        <select class="form-select" id="id_abs" name="id_abs" required>
                            <option value="" selected disabled>Choisissez l'ID d'absence</option>
                            <?php echo $id_abs_options; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </form>
        <hr>

        <!-- Cartes pour afficher les billets -->
        <div class="row">
            <?php foreach ($billets as $billet) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $billet['name']; ?></h5>
                            <p class="card-text">ID étudiant: <?= $billet['id_student']; ?></p>
                            <p class="card-text">Date et heure: <?= $billet['date_hour']; ?></p>
                            <p class="card-text">Classe: <?= $billet['class']; ?></p>
                            <p class="card-text">ID d'absence: <?= $billet['id_abs']; ?></p>
                            <?php echo $billetC->getQrCode($billet); ?>
                            <a href="billet/update_billet.php?id=<?= $billet['id']; ?>" class="btn btn-primary">Modifier</a>
                            <a href="billet/delete_billet.php?id=<?= $billet['id']; ?>" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="../scripts/verif_inp_billet.js"></script>

</body>

</html>