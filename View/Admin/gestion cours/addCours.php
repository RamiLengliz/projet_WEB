<?php
require_once '../../../Controller/coursC.php';
require_once '../../../Model/gestion cours/cours.php';

$error = "";
$coursC = new coursC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all form fields are filled
    if (
        isset($_POST["nomCours"]) &&
        isset($_FILES["ressourceCours"])
    ) {
        $nomCours = $_POST["nomCours"];
        $idSubject = $_GET["idSubject"]; // Getting idSubject from the URL

        // File upload handling
        $ressourceCoursPath = ""; // Initialize resource path variable
        $targetDir = "uploads/"; // Specify target directory for uploads
        $targetFile = $targetDir . basename($_FILES["ressourceCours"]["name"]); // Get the file name with directory

        // Check if file was uploaded successfully
        if (move_uploaded_file($_FILES["ressourceCours"]["tmp_name"], $targetFile)) {
            $ressourceCoursPath = $targetFile; // Set resource path if upload is successful
        } else {
            $error = "Error uploading file.";
        }

        if (!empty($nomCours) && !empty($idSubject)) {
            $cours = new Cours($nomCours, $ressourceCoursPath, $idSubject);
            $error = $coursC->ajouterCours($cours);
            header('Location: showCourses.php?idSubject=' . $_GET["idSubject"] . $error);
            exit(); // Ensure no further code execution after redirection
        } else {
            $error = "Missing information";
        }
    } else {
        $error = "Form fields are incomplete.";
    }
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
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php
    if (1 == 1) {
        include 'components/Navbar_horizental/navbar_horizental.php';
        include 'components/Navbar_vertical/Navbar1_vertical.php';
    }
    ?>
    <div class="card-header">
        <h5>Add New Course</h5>
        <div class="card-body text-dark">
            <form class="row g-3" method="POST" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="nomCours" class="form-label">Course Name</label>
                    <input name="nomCours" type="text" class="form-control" id="nomCours" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please enter the course name.</div>
                </div>
                <div class="col-md-6">
                    <input name="idSubject" type="hidden" class="form-control" id="idSubject" value="<?php echo $_GET['idSubject']; ?>" readonly>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please enter the subject ID.</div>
                </div>
                <div class="col-md-6">
                    <label for="ressourceCours" class="form-label">Resource File</label>
                    <input name="ressourceCours" type="file" class="form-control" id="ressourceCours" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please choose a file.</div>
                </div>
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" value="Add New Course">
                </div>
            </form>
        </div>
    </div>

    <!-- MAIN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="js/add_account_form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>
