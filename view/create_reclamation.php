<?php
include '../../../../Controller/reclamation_con.php';
include '../../../../Controller/subject_con.php';
$reclamationC = new reclamationCon("reclamation");
$reclamations = $reclamationC->listReclamations();

$subjectC = new subjectCon("subject");
$subjects = $subjectC->listsubjects();
$result = isset($_GET['result']) ? $_GET['result'] : null;
?>

<main style="padding-top:20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                switch ($result) {
                    case '1':
                        echo '<div class="alert alert-success" role="alert">Operation successfully!</div>';
                        break;
                    case '2':
                        echo '<div class="alert alert-danger" role="alert">An error occurred!</div>';
                        break;
                    case '3':
                        echo '<div class="alert alert-danger" role="alert">Please submit the form!</div>';
                        break;
                    case '4':
                        echo '<div class="alert alert-warning" role="alert">Reclamation already exists!</div>';
                        break;
                    default:
                        echo '<div class="alert alert-primary" role="alert">Fill in the form to add a reclamation!</div>';
                        break;
                }
                ?>

                <form action="../../../../Model/create_reclamation.php" method="post" style="max-width: 100rem; padding: 20px; margin-bottom: 20px; border: 1px solid #ccc; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                    <h5>Add New Reclamation</h5>
                    <div class="form-group">
                        <label for="type"><b>Type</b></label>
                        <input type="text" class="form-control" placeholder="Enter Type" name="type" id="type" required>
                    </div>
                    <div class="form-group">
                        <label for="subject"><b>Subject</b></label>
                        <select class="form-select" id="classSelect" name="subject" required>
                            <option selected disabled value="">Choose...</option>
                            <?php foreach ($subjects as $subject) : ?>
                                <option value="<?= htmlspecialchars($subject['Id']); ?>"><?= htmlspecialchars($subject['name']); ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="description"><b>Description</b></label>
                        <textarea class="form-control" placeholder="Enter Description" name="description" id="description" required></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>

            <div class="col-md-12" style="padding-top:20px;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reclamations as $reclamation) { 
                            $subject_name=$subjectC->getSubject($reclamation['Subject']);
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($reclamation['id']); ?></td>
                                <td><?= htmlspecialchars($reclamation['Type']); ?></td>
                                <td><?= htmlspecialchars($subject_name['name']); ?></td>
                                <td><?= htmlspecialchars($reclamation['description']); ?></td>
                                <td>
                                    <a href="update-reclamation.php?id=<?= $reclamation['id']; ?>" class="btn btn-primary">Update</a>
                                    <a href="../../../../Model/delete_reclamation.php?id=<?= $reclamation['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this reclamation?');">Delete</a>
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