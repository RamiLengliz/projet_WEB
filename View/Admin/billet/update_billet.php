<?php
include_once '../../../Controller/billet_con.php';
include_once '../../../Model/gestion absence/billet.php';

// Création d'une instance du contrôleur des événements
$billetC = new billetCon("billet");

// Création d'une instance de la classe Event
$billet = null;
include_once '../../Controller/user_con.php';
$userC = new UserCon("user");
$users = $userC->listStudents();
if (isset($_GET['id'])) {
    $current_id = $_GET['id'];
}

if (
    isset($_POST["name"]) &&
    isset($_POST["id_student"]) &&
    isset($_POST["date_hour"]) &&
    isset($_POST["class"])
) {
    if (
        !empty($_POST['name']) &&
        !empty($_POST["id_student"]) &&
        !empty($_POST["date_hour"]) &&
        !empty($_POST["class"])
    ) {

        $billet = new billet(
            $current_id,
            $_POST['name'],
            $_POST['id_student'],
            $_POST['date_hour'],
            $_POST['class'],
            $_POST['id_abs']
        );

        $billetC->updatebillet($billet, $current_id);
        header('Location: ../index.php?page=AA');
    } else {
        $error = "Missing information";
    }
} elseif (isset($_GET['id'])) {
    $current_id = $_GET['id'];
    $billet = $billetC->getbillet($current_id);


    $id_abs_options = $billetC->generateAbsOptionsSelected($billet['id_abs']);
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
            <p>Please fill in this form to edite an billet.</p>
            <hr>

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter name" value="<?= $billet['name']; ?>" name="name" id="name" required>
            <div id="nameError" style="color: red;"></div>

            <div class="mb-3">
                <label for="id_student" class="form-label"><b>ID Student</b></label>

                <select name="id_student" id="id_student" class="form-control" required>
                    <option value="">Default</option>
                    <?php foreach ($users as $student) : ?>
                        <option value="<?= $student['Id'] ?>"><?= $student['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <label for="date_hour"><b>Date Hour</b></label>
            <input type="datetime-local" placeholder="Enter date hour" value="<?= $billet['date_hour']; ?>" name="date_hour" id="date_hour" required>
            <div id="date_hourError" style="color: red;"></div>

            <label for="class"><b>class</b></label>
            <input type="text" placeholder="Enter class" value="<?= $billet['class']; ?>" name="class" id="class" required>
            <div id="classError" style="color: red;"></div>

            <label for="id_abs"><b>ID Absence</b></label>
            <select class="form-control" id="id_abs" name="id_abs" required>
                <option value="" selected disabled>choisir le ID Absence</option>
                <?php echo $id_abs_options; ?>
            </select>
            <div id="id_blogError" style="color: red;"></div>


            <hr>

            <div>
                <input type="submit" name="addbtn" id="addbtn" value="Update" onclick="return verif_add_form()">
            </div>

        </div>

    </form>


    <script src="..\scripst\verif_inp.js"></script>


</body>

</html>