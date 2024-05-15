<?php
include("../../../Controller/coursC.php");

$coursC = new coursC();
	$listeCours=$coursC->displayCours();
    
if(isset($_POST['subbmit']))
{
	$listeCours=$coursC->displayCours();
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
    <div class="col-md-12" style="padding-top:20px;">
    <a href="ListSubjects.php" class="btn btn-primary">Back</a>
    <br></br>

    <form method="get" action="listCours.php">
    <input type="text" name="search" placeholder="Search by course name">
    <button type="submit">Search</button>
    <br></br>
    
</form>
    <form method="get" action="listCours.php">
<button type="submit" name="sort" value="asc">Sort A-Z</button>
</form>

    <br></br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">FILE </th>
              
            </tr>
        </thead>
        <tbody>
        <?php
        // Retrieve search term and sort order from GET parameters
$search = $_GET['search'] ?? '';
$sortOrder = $_GET['sort'] ?? '';
$db = new config();
$conn = $db->getConnexion();


// Start with a base SQL query
$sql = "SELECT * FROM cours";

// Append conditions for search
if (!empty($search)) {
    $sql .= " WHERE nomCours LIKE :searchTerm";
    $stmt = $conn->prepare($sql);
}

// Append sorting condition
if (!empty($sortOrder) && $sortOrder === 'asc') {
    $sql .= " ORDER BY nomCours ASC";
    $stmt = $conn->query($sql);
}
$stmt = $conn->prepare($sql);

// Prepare and execute the SQL query

if (!empty($search)) {
    $stmt->execute(['searchTerm' => '%' . $search . '%']);
} else {
    $stmt->execute();
}

// Fetch all courses that match the query
$listeCours = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($listeCours as $cours) {
    echo '<tr>';
    echo '<th scope="row">' . $cours['idCours'] . '</th>';
    echo '<td>' . $cours['nomCours'] . '</td>';
    echo '<td><img src="' . $cours['ressourceCours'] . '" alt="Course Image" style="max-width: 100px;"></td>';
    echo '<td><a href="generatePDF.php?id=' . $cours['idCours'] . '&name=' . urlencode($cours['nomCours']) . '&image=' . urlencode($cours['ressourceCours']) . '" class="btn btn-primary">Generate PDF</a></td>';
    ?>
    <td>
    <form action="sendCourseDetails.php" method="POST">
        <input type="hidden" name="courseName" value="<?= htmlspecialchars($cours["nomCours"]); ?>">
        <input type="hidden" name="courseImage" value="<?= htmlspecialchars($cours["ressourceCours"]); ?>">
        <input type="email" name="email" required placeholder="Enter email">
        <button type="submit" class="btn btn-info">Share This Course</button>
    </form>
</td>

    <?php echo '</tr>';

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