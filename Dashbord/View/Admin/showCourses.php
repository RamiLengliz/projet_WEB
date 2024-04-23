<?php
include("../../Controller/coursC.php");

$coursC = new coursC();
$listeCours = [];

if (isset($_GET['idSubject'])) {
    $idSubject = $_GET['idSubject'];
    $listeCours = $coursC->afficherCoursByIdSubject($idSubject);
}

?>


<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sidebar With Bootstrap</title>
        <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="stylesheet" href="css/form.css">
    </head>

    <body>


        <?php
        if (1 == 1) {
            include 'components/Navbar_horizental/navbar_horizental.php';
            include 'components/Navbar_vertical/Navbar1_vertical.php';
        }
        ?>
    <div class="col-md-12" style="padding-top:20px;">
    <a href="ListSubjects.php" class="btn btn-primary">Back</a>

    <a href="addCours.php?idSubject=<?php echo $_GET['idSubject']; ?>" class="btn btn-primary">Add New Cours</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">FILE </th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>
            </tr>
        </thead>
        <tbody>
        <?php
foreach ($listeCours as $cours) {
    echo '<tr>';
    echo '<th scope="row">' . $cours['idCours'] . '</th>';
    echo '<td>' . $cours['nomCours'] . '</td>';
    echo '<td><img src="' . $cours['ressourceCours'] . '" alt="Course Image" style="max-width: 100px;"></td>';
    echo '<td><a href="editCours.php?id=' . $cours['idCours'] . '&idSubject=' . $_GET['idSubject'] . '" class="btn btn-primary">Edit</a></td>';
    echo '<td>
            <form action="deleteCours.php" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this course?\');">
                <input type="hidden" name="id" value="' . $cours['idCours'] . '">
                <input type="hidden" name="idSubject" value="' . $_GET['idSubject'] . '">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>';
    echo '</tr>';

}
?>


        </tbody>
    </table>
</div>


        <!-- MAIN -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
        <script type="text/javascript" src="js/add_account_form.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </body>

    </html>