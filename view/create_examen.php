<?php
require_once '../Controller/examen_con.php';
require_once '../Controller/subject_con.php';
require_once '../Controller/class_con.php';
$examenC = new examenCon("examen");
$examens = $examenC->listExamens();
$result = isset($_GET['result']) ? $_GET['result'] : null;


$subjectC = new SubjectCon("subject");
$subjects = $subjectC->listSubjects();

$classC = new ClassCon("class");
$classes = $classC->listClasses();

$classS = new ClassCon("class");

?>


<main style="padding-top:20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                switch ($result) {
                    case '1':
                        echo '<div class="alert alert-success" role="alert">Operation successfully !</div>';
                        break;
                    case '2':
                        echo '<div class="alert alert-danger" role="alert">An error occurred !</div>';
                        break;
                    case '3':
                        echo '<div class="alert alert-danger" role="alert">Please submit the form.!</div>';
                        break;
                    case '4':
                        echo '<div class="alert alert-warning" role="alert">Examen already exists.!</div>';
                        break;
                    case '5':
                        echo '<div class="alert alert-warning" role="alert">The Email sended to all the Users. !</div>';
                        break;
                    default:
                        echo '<div class="alert alert-primary" role="alert">Fill in the form to add an examen!</div>';
                        break;
                }
                ?>

                <form action="../Model/create_examen.php" method="post" style="max-width: 100rem; padding: 20px; margin-bottom: 20px; border: 1px solid #ccc; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                    <h5>Add New Examen</h5>
                    <div class="form-group">
                        <label for="titre"><b>Title</b></label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="titre" id="exampleInputName1" required>
                        <div class="invalid-feedback">Title should not contain numbers.</div>
                    </div>
                    <div class="form-group">
                        <label for="datetime"><b>Date & Time</b></label>
                        <input type="datetime-local" class="form-control" placeholder="Enter Date & Time" name="datetime" id="datetime" required>
                        <div class="invalid-feedback">Please enter a valid date and time.</div>
                    </div>
                    <div class="form-group">
                        <label for="subject"><b>Subject</b></label>
                        <select class="form-select" name="id_subject" id="id_subject" required>
                            <option value="">Select Subject</option>
                            <?php foreach ($subjects as $subject) : ?>
                                <option value="<?= htmlspecialchars($subject['Id']); ?>"><?= htmlspecialchars($subject['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Please select a subject.</div>
                    </div>
                    <div class="form-group">
                        <label for="class"><b>Class</b></label>
                        <select class="form-select" name="id_class" id="id_class" required>
                            <option value="">Select Class</option>
                            <?php foreach ($classes as $class) : ?>
                                <option value="<?= htmlspecialchars($class['Id']); ?>"><?= htmlspecialchars($class['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Please select a class.</div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg font-weight-medium w-100 auth-form-btn">Submit</button>
                    </div>
                </form>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <button type="submit" onclick="sendEmail()" class="btn btn-warning btn-lg w-100 mb-3">
                            Send Timetable to the Student via Email
                        </button>
                        <p id="status" class="text-center"></p>
                    </div>
                </div>

                <script>
                    function sendEmail() {
                        document.getElementById("status").innerHTML = "Sending emails...";
                        const xhr = new XMLHttpRequest();
                        xhr.open("GET", "../model/examen_pdf.php", true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                alert("Emails sent successfully!");
                                location.reload(); // Refresh the page
                            }
                        };
                        xhr.send();
                    }
                </script>

            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const form = document.querySelector('form');
                    const titleInput = document.getElementById('exampleInputName1');
                    const datetimeInput = document.getElementById('datetime');

                    form.addEventListener('submit', function(event) {
                        const titleValue = titleInput.value;
                        const datetimeValue = datetimeInput.value;
                        let valid = true;

                        // Check if title contains numbers
                        if (/\d/.test(titleValue)) {
                            alert("Title should not contain numbers.");
                            titleInput.classList.add('is-invalid');
                            valid = false;
                        }

                        // Check if datetime is in the correct format (YYYY-MM-DDTHH:MM)
                        if (!/\d{4}-\d{2}-\d{2}T\d{2}:\d{2}/.test(datetimeValue)) {
                            alert("Please enter a valid datetime in the format YYYY-MM-DDTHH:MM.");
                            datetimeInput.classList.add('is-invalid');
                            valid = false;
                        }

                        if (!valid) {
                            event.preventDefault(); // Prevent form from submitting
                        }
                    });
                });
            </script>



            <div class="col-md-12" style="padding-top:20px;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Subject</th>
                            <th>Class</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($examens as $examen) {
                            $class_name = $classS->getClass($examen['id_class']);
                            $subject_name = $subjectC->getSubject($examen['id_subject']);
                            echo $examen['id_class'];
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($examen['id']); ?></td>
                                <td><?= htmlspecialchars($examen['titre']); ?></td>
                                <td><?= htmlspecialchars($examen['date']); ?></td>
                                <td><?= htmlspecialchars($subject_name['name'] ? $subject_name['name'] : 'Unknown Class'); ?></td> <!-- Assuming you have similar logic for subjects -->
                                <td><?= htmlspecialchars($class_name ? $class_name : 'Unknown Class'); ?></td>
                                <td>
                                    <a href="index.php?id=<?= $examen['id']; ?>&page=UE" class="btn btn-primary">Update</a>
                                    <a href="../Model/delete_examen.php?id=<?= $examen['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
                                </td>
                            </tr>
                        <?php }; ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</main>
<script src="js/controle_de_saisie.js"></script>