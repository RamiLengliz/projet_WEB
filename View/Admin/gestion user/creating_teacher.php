<?php
$result = isset($_GET['result']) ? $_GET['result'] : null;
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
                            <div class="card mb-3 " style="max-width: 100rem;">';
                        break;
                }
                ?>
                <div class="card-header">
                    <h5>Create Teacher account</h5>
                    <div class="card-body text-dark">
                        <form class="row g-3" method="POST" action="../../model/gestion user/create_teacher.php">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="firstName" name="name" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter your name.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastname" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter your lsatname.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="age" class="form-label">Phone Number: (216) 8 chiffres</label>
                                <input type="number" class="form-control" id="age" name="age" required>
                                <div class="invalid-feedback">
                                    Please provide a valid age.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="subjectSelect" class="form-label">subject</label>
                                <select class="form-select" id="subjectSelect" name="subject" required>
                                    <option selected disabled value="">Choose...</option>
                                    <?php
                                    require '../../Controller/connect.php'; // Adjust the path as necessary

                                    try {
                                        $pdo = config::getConnexion();
                                        $query = "SELECT id, name FROM subject";
                                        $stmt = $pdo->query($query);

                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</option>';
                                        }
                                    } catch (PDOException $e) {
                                        die("Could not connect to the database :" . $e->getMessage());
                                    }
                                    ?>

                                </select>
                                <div class="invalid-feedback">
                                    Please select a class.
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input name="banner" class="form-check-input" type="radio" value="" id="termsConditions">
                                    <label class="form-check-label" for="termsConditions">
                                        banner
                                    </label>
                                    <div id="termsConditionsFeedback" class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <input class="btn btn-primary" type="submit" value="Submit form">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="gap"></div>

        </div>
        <div class="col-md-12" style="padding-top:20px;">
            <div class="settings-widget" bis_skin_checked="1">
                <div class="settings-inner-blk p-0" bis_skin_checked="1">
                    <div class="comman-space pb-0" bis_skin_checked="1">
                        <div class="settings-tickets-blk course-instruct-blk table-responsive" bis_skin_checked="1">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">status</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Subject</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    try {
                                        $pdo = config::getConnexion();
                                        $query = "
                                        SELECT 
                                            u.id, u.name, u.lastname, u.email, u.tel, u.status, c.name AS subject_name
                                        FROM 
                                            user u
                                        LEFT JOIN 
                                            enseignant s ON u.id = s.id_user
                                        LEFT JOIN 
                                            subject c ON s.id_subject = c.id
                                        WHERE 
                                            u.role = 2
                                        ";
                                        $stmt = $pdo->query($query);

                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo "<th scope='row'>" . htmlspecialchars($row['id']) . "</th>";
                                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['tel']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['subject_name']) . "</td>";
                                            echo "</tr>";
                                        }
                                    } catch (PDOException $e) {
                                        die("Could not connect to the database :" . $e->getMessage());
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</main>

<script type="text/javascript" src="../js/add_account_form.js"></script>