<?php
include '../../Controller/examen_con.php';
require_once '../../Controller/subject_con.php';
require_once '../../Controller/class_con.php';
include '../../Model/gestion examen/examen.php';
$examenC = new examenCon("examen");
$examens = $examenC->listExamens();
$result = isset($_GET['result']) ? $_GET['result'] : null;
$id = isset($_GET['id']);
$examen = null;
$id = isset($_GET['id']) ? $_GET['id'] : null; // Correctly fetching ID
if ($id) {
    $examen = $examenC->getExamen($id);

    if ($examen && $examen['date']) {
        $examen['date'] = date('Y-m-d', strtotime($examen['date']));
    }
}
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
                        echo '<div class="alert alert-primary" role="alert">Fill in the form to update an examen!</div>';
                        break;
                }
                ?>

                <form action="../../Model/gestion examen/update_examen.php" method="post" style="max-width: 100rem; padding: 20px; margin-bottom: 20px; border: 1px solid #ccc; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <h5>Update New Examen</h5>
                    <div class="form-group">
                        <label for="titre"><b>Title</b></label>
                        <input type="text" value="<?= htmlspecialchars($examen['titre']); ?>" class="form-control" placeholder="Enter Title" name="titre" id="titre" required>
                    </div>
                    <div class="form-group">
                        <label for="date"><b>Date</b></label>
                        <input type="date" value="<?= htmlspecialchars($examen['date']); ?>" class="form-control" placeholder="Enter Date" name="date" id="date" required>
                    </div>
                    <div class="form-group">
                        <label for="subject"><b>Subject</b></label>
                        <select class="form-select" <?= htmlspecialchars($examen['id_subject']); ?> name="id_subject" id="">
                            <option value="">choose...</option>
                            <?php foreach ($subjects as $subject) : ?>
                                <option value="<?= htmlspecialchars($subject['Id']); ?>"><?= htmlspecialchars($subject['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class"><b>Class</b></label>
                        <select class="form-select" <?= htmlspecialchars($examen['id_class']); ?> name="id_class" id="">
                            <option value="">Choose...</option>
                            <?php foreach ($classes as $class) : ?>
                                <option value="<?= htmlspecialchars($class['Id']); ?>"><?= htmlspecialchars($class['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

            <div class="col-md-12" style="padding-top:20px;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>subject</th>
                            <th>class</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($examens as $examen1) {
                            $class_name = $classS->getClass($examen['id_class']);
                            $subject_name = $subjectC->getSubject($examen['id_subject']);
                            echo $examen['id_class'];
                        ?>?>
                        <tr>
                            <td><?= htmlspecialchars($examen1['id']); ?></td>
                            <td><?= htmlspecialchars($examen1['titre']); ?></td>
                            <td><?= htmlspecialchars($examen1['date']); ?></td>
                            <td><?= htmlspecialchars($subject_name['name']); ?></td>
                            <td><?= htmlspecialchars($class_name['name']); ?></td>
                            <td>
                                <a href="index.php?id=<?= $examen1['id']; ?>&page=UE&result=4" class="btn btn-primary">Update</a>
                                <a href="../../Model/gestion examen/delete_examen.php?id=<?= $examen1['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
                            </td>
                        </tr>
                    <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<script src="../scripts/add_modal_verif.js"></script>