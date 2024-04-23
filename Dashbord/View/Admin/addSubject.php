    <?php
    require_once '../../Controller/subjectC.php';
    require_once '../../Model/subject.php';

    $error = "";
    $subject = null;
    $subjectC = new subjectC();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if all form fields are filled
        if (
            isset($_POST["name"]) &&
            isset($_POST["subject_description"]) &&
            isset($_FILES["image"])
        ) {
            $name = $_POST["name"];
            $subjectDescription = $_POST["subject_description"];

            // Image upload handling
            $imagePath = ""; // Initialize image path variable
            $targetDir = "uploads/"; // Specify target directory for uploads
            $targetFile = $targetDir . basename($_FILES["image"]["name"]); // Get the file name with directory

            // Check if file was uploaded successfully
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $imagePath = $targetFile; // Set image path if upload is successful
            } else {
                $error = "Error uploading image.";
            }

            if (!empty($name) && !empty($subjectDescription)) {
                $subject = new Subject($name, $subjectDescription, $imagePath);
                $subjectC->addSubject($subject);
                header('Location: listSubjects.php');
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
    </head>

    <body>


        <?php
        if (1 == 1) {
            include 'components/Navbar_horizental/navbar_horizental.php';
            include 'components/Navbar_vertical/Navbar1_vertical.php';
        }
        ?>
   <div class="card-header">
    <h5> Create Subject</h5>
    <div class="card-body text-dark">
        <form class="row g-3" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="name" required>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please enter the subject name.</div>
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <textarea name="subject_description" class="form-control" id="description" rows="3" required></textarea>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please enter the subject description.</div>
            </div>
            <div class="col-md-6">
                <label for="file_depot" class="form-label">File Depot</label>
                <input name="image" type="file" class="form-control" id="file_depot" required>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please choose a file.</div>
            </div>
            <div class="col-12">
                <input class="btn btn-primary" type="submit" value="Add New Subject">
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