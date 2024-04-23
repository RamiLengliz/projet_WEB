<?PHP
	include ("../../Controller/subjectC.php");

	$subjectC=new subjectC();
	$listeSubject=$subjectC->displaySubjects();
    
if(isset($_POST['subbmit']))
{
	$listeSubject=$subjectC->displaySubjects();
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
        <a href="addSubject.php" class="btn btn-primary">Add New Subject</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">FILE DEPOT</th>
                    <th scope="col">Courses</th>
                    <th scope="col">Add </th>
                    <th scope="col">EDIT</th>
                    <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeSubject as $subject) : ?>
                    <tr>
                        <th scope="row"><?= $subject['Id'] ?></th>
                        <td><?= $subject['name'] ?></td>
                        <td><?= $subject['subject_description'] ?></td>
                        <td><img src="<?= $subject['depot_fichier_subject'] ?>" alt="Subject Image" style="max-width: 100px;"></td>
                        <td><a href="showCourses.php?idSubject=<?= $subject['Id'] ?>" class="btn btn-primary">Courses</a></td>
                        <td><a href="addCours.php?idSubject=<?= $subject['Id'] ?>" class="btn btn-primary">Add Courses</a></td>
                        <td><a href="editSubject.php?id=<?= $subject['Id'] ?>" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="deleteSubject.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this subject?');">
                                <input type="hidden" name="id" value="<?= $subject['Id'] ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
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