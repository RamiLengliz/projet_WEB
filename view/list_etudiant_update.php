<?php
require '../Controller/connect.php'; // Adjust the path as necessary
require '../Controller/resultat_con.php';

$resultatC = new resultatcon('resultat');
$url = config::getCurrentUrl();
$result = isset($_GET['result']) ? $_GET['result'] : null;
$id_class = isset($_POST['id_class']) ? $_POST['id_class'] : null;
$id_examen = isset($_POST['id_examen']) ? $_POST['id_examen'] : null;
$pdo = config::getConnexion();
?>
<main style="padding-top:20px;">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <?php
                switch ($result) {
                    case '1':
                        echo '<div class="alert alert-success" role="alert">User created successfully !</div>
                            <div class="card bg-success mb-3 " style="max-width: 100rem;">';
                        break;

                    case '2':
                        echo '<div class="alert alert-danger" role="alert">An error occurred !</div>
                            <div class="card border-danger mb-3 " style="max-width: 100rem;">';
                        break;
                    case '3':
                        echo '<div class="alert alert-danger" role="alert">Please submit the form.!</div>
                            <div class="card border-danger mb-3 " style="max-width: 100rem;">';
                        break;
                    case '4':
                        echo '<div class="alert alert-warning" role="alert">Email already exists.!</div>
                                    <div class="card border-warning mb-3 " style="max-width: 100rem;">';
                        break;
                    default:
                        echo '<div class="alert alert-primary" role="alert">Input the FORM !</div>
                            <div class="card border-dark mb-3 " style="max-width: 100rem;">';
                        break;
                }
                ?>

                <div class="col-md-12" style="padding-top:20px;">
                    <form action="../model/update_resultat.php" method="POST" onsubmit="return confirm('Are you sure you want to submit these results?');">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    $pdo = config::getConnexion();
                                    $query = "
                                    SELECT 
                                        u.id, u.name, u.lastname, u.email, u.age, u.status, c.name AS class_name, r.note
                                    FROM 
                                        user u
                                    LEFT JOIN 
                                        etudiants s ON u.id = s.id_user
                                    LEFT JOIN 
                                        class c ON s.id_class = c.id
                                    LEFT JOIN
                                        resultat r ON r.id_user = u.id AND r.id_examen = :id_examen
                                    WHERE 
                                        u.role = 3 and c.id = :id_class
                                    ";
                                    $stmt = $pdo->prepare($query);
                                    $stmt->bindValue(':id_class', $id_class, PDO::PARAM_INT);
                                    $stmt->bindValue(':id_examen', $id_examen, PDO::PARAM_INT);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $note = htmlspecialchars($row['note'] ?? "u didn't give the results"); // Handling null note elegantly
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['class_name']) . "</td>";
                                        echo "<td><input type='text' name='results[" . $row['id'] . "][note]' value='$note' placeholder='Enter result'></td>";
                                        echo "<input type='hidden' name='results[" . $row['id'] . "][id_user]' value='" . $row['id'] . "'>";
                                        echo "</tr>";
                                    }
                                } catch (PDOException $e) {
                                    die("Could not connect to the database :" . $e->getMessage());
                                }
                                ?>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <input type="hidden" name="id_examen" value="<?= htmlspecialchars($id_examen) ?>">
                            <button type="submit" class="btn btn-primary btn-lg font-weight-medium w-100 auth-form-btn">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
</main>