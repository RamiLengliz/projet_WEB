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
                    default:
                        echo '<div class="alert alert-primary" role="alert">Fill in the form to add an examen!</div>';
                        break;
                }
                ?>

            </div>

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
                            
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($examen['id']); ?></td>
                                <td><?= htmlspecialchars($examen['titre']); ?></td>
                                <td><?= htmlspecialchars($examen['date']); ?></td>
                                <td><?= htmlspecialchars($subject_name['name'] ? $subject_name['name'] : 'Unknown Class'); ?></td> <!-- Assuming you have similar logic for subjects -->
                                <td><?= htmlspecialchars($class_name ? $class_name : 'Unknown Class'); ?></td>
                                <td>
                                    <form action="index.php?page=choix_class" method="POST">
                                        <input type="hidden" name="id_examen" value="<?= htmlspecialchars($examen['id']); ?>">
                                        <button class="btn btn-primary" type="submit">Donner les notes des etudiants</button>
                                    </form>
                                </td>
                            </tr>
                        <?php }; ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</main>