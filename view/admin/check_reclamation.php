<?php
include '../../Controller/reclamation_con.php';
include '../../Controller/subject_con.php';
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
                        echo '<div class="alert alert-success" role="alert">The message have been sended Successfully!</div>';
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
                        echo '<div class="alert alert-primary" role="alert">This Reclamation management page !</div>';
                        break;
                }
                ?>


            </div>

            <div class="col-md-12" style="padding-top:20px;">
                <div class="row gx-2 align-items-center mb-4">
                    <div class="col-md-6 col-item">
                        <div class="search-group">
                            <i class="feather-search"></i>
                            <input type="text" id="note-search" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="col-md-6 col-item">
                        <select id="subject-filter" class="form-select">
                            <option value="all">All</option>
                            <?php foreach ($subjectC->listSubjects() as $subject) { ?>
                                <option value="<?= htmlspecialchars($subject['name']); ?>"><?= htmlspecialchars($subject['name']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Action</th>
                            <th>Validate with Mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reclamations as $reclamation) {
                            $subject_name = $subjectC->getSubject($reclamation['Subject']);
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($reclamation['id']); ?></td>
                                <td><?= htmlspecialchars($reclamation['Type']); ?></td>
                                <td><?= htmlspecialchars($subject_name['name']); ?></td>
                                <td><?= htmlspecialchars($reclamation['description']); ?></td>
                                <td>
                                    <a href="index.php?page=chat&id_reclamation=<?= htmlspecialchars($reclamation['id']); ?>" class="btn btn-primary">Chat</a>
                                </td>
                                <td>
                                    <form action="../../model/send_validate.php" method="POST" >
                                        <input type="hidden" name="id_user" value="<?= htmlspecialchars($reclamation['id_user']); ?>" >
                                        <input type="hidden" name="subject" value="<?= htmlspecialchars($subject_name['name']); ?>" >
                                        <button type="submit" class="btn btn-success col-7">Validate</button>
                                    </form>
                                    
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const searchInput = document.getElementById('note-search');
                        const subjectFilter = document.getElementById('subject-filter');
                        const tableRows = document.querySelectorAll('table tbody tr');

                        function filterRows() {
                            const searchTerm = searchInput.value.toLowerCase();
                            const selectedSubject = subjectFilter.value;

                            tableRows.forEach(row => {
                                const type = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                                const subject = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                                const description = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                                const matchesSearch = type.includes(searchTerm) || subject.includes(searchTerm) || description.includes(searchTerm);
                                const matchesSubject = selectedSubject === 'all' || subject === selectedSubject.toLowerCase();

                                if (matchesSearch && matchesSubject) {
                                    row.style.display = '';
                                } else {
                                    row.style.display = 'none';
                                }
                            });
                        }

                        searchInput.addEventListener('input', filterRows);
                        subjectFilter.addEventListener('change', filterRows);
                    });
                </script>
            </div>


        </div>
    </div>
    </div>
</main>
<script src="../scripts/add_modal_verif.js"></script>