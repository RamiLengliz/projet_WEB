<?php
require_once '../../Controller/examen_con.php';
require_once '../../Controller/subject_con.php';
require_once '../../Controller/class_con.php';
$examenC = new examenCon("examen");
$examens = $examenC->listExamens();
$result = isset($_GET['result']) ? $_GET['result'] : null;
$id_examen = isset($_POST['id_examen']) ? $_POST['id_examen'] : null;


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
                    default:
                        echo '<div class="alert alert-primary" role="alert">Fill in the form to add an examen!</div>';
                        break;
                }
                ?>

                <form action="index.php?page=list_etudiants" method="post" style="max-width: 100rem; padding: 20px; margin-bottom: 20px; border: 1px solid #ccc; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                    <h5>Add New Examen</h5>

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
                        <input type="hidden" name="id_examen"  value="<?= htmlspecialchars($id_examen); ?>">
                        <button type="submit" class="btn btn-primary btn-lg font-weight-medium w-100 auth-form-btn">Next</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</main>