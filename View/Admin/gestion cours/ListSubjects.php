<?PHP
include("../../../Controller/subjectC.php");

$subjectC = new subjectC();
$listeSubject = $subjectC->displaySubjects();

if (isset($_POST['subbmit'])) {
    $listeSubject = $subjectC->displaySubjects();
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

        <div class="col-md-12 card-header" style="padding-top:20px;">
            <div class="settings-widget" bis_skin_checked="1">
                <div class="settings-inner-blk p-0" bis_skin_checked="1">
                    <div class="sell-course-head comman-space" bis_skin_checked="1">
                        <h3>List of Subjects</h3>
                        <p>Search,update or delete Accounts.</p>
                    </div>
                    <div class="comman-space pb-0" bis_skin_checked="1">
                        <div class="settings-tickets-blk course-instruct-blk table-responsive" bis_skin_checked="1">

                            <a href="addSubject.php" class="btn btn-primary">Add New Subject</a>
                            <form method="get" action="listSubjects.php">
                                <input type="text" name="search" placeholder="Search by course name" class="form-control">
                                <br>
                                <button type="submit" class="btn btn-danger">Search</button>
                            </form>
                            <form method="get" action="listSubjects.php">
                                <br>
                                <button type="submit" class="btn btn-danger" name="sort" value="asc">Sort A-Z</button>
                            </form>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">DESCRIPTION</th>
                                        <th scope="col">FILE DEPOT</th>
                                        <th scope="col">Courses</th>
                                        <th scope="col">Stats</th>
                                        <th scope="col">Add </th>
                                        <th scope="col">EDIT</th>
                                        <th scope="col">DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $search = $_GET['search'] ?? '';
                                    $sortOrder = $_GET['sort'] ?? '';
                                    $pdo = new config();
                                    $conn = $pdo->getConnexion();

                                    // Start with a base SQL query that also joins the courses table to count courses
                                    $sql = "SELECT subject.*, COUNT(cours.idSubject) AS courseCount FROM subject
            LEFT JOIN cours ON subject.Id = cours.idSubject
            GROUP BY subject.Id";

                                    // Append conditions for search
                                    if (!empty($search)) {
                                        $sql .= " WHERE subject.name LIKE :searchTerm";
                                        $stmt = $conn->prepare($sql);
                                    }

                                    // Append sorting condition
                                    if (!empty($sortOrder) && $sortOrder === 'asc') {
                                        $sql .= " ORDER BY subject.name ASC";
                                        $stmt = $conn->query($sql);
                                    }
                                    $stmt = $conn->prepare($sql);

                                    // Prepare and execute the SQL query
                                    if (!empty($search)) {
                                        $stmt->execute(['searchTerm' => '%' . $search . '%']);
                                    } else {
                                        $stmt->execute();
                                    }

                                    // Fetch all subjects along with their course count
                                    $listeSubject = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($listeSubject as $subject) : ?>
                                        <tr>
                                            <th scope="row"><?= $subject['Id'] ?></th>
                                            <td><?= $subject['name'] ?></td>
                                            <td><?= $subject['subject_description'] ?></td>
                                            <td><a href="<?= $subject['depot_fichier_subject'] ?>" alt="Subject Image" style="max-width: 100px;" download>Download File </a></td>
                                            <td><a href="showCourses.php?idSubject=<?= $subject['Id'] ?>" class="btn btn-primary">Courses</a></td>
                                            <td><?= $subject['courseCount'] ?> courses</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="courseChart"></div>


    <!-- MAIN -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="js/add_account_form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>