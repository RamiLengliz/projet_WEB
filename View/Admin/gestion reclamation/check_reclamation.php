<?php
include '../../Controller/reclamation_con.php';
include '../../Controller/subject_con.php';
include_once '../../Controller/user_con.php';
$userC = new UserCon('user');
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
            <div class="settings-widget" bis_skin_checked="1">
                <div class="settings-inner-blk p-0" bis_skin_checked="1">
                    <div class="sell-course-head comman-space" bis_skin_checked="1">
                        <h3>Reclamation</h3>
                        <p>Search,update or delete Accounts.</p>
                    </div>
                    <div class="comman-space pb-0" bis_skin_checked="1">


                        <div class="col-md-12" style="padding-top:20px;">
                            <div class="settings-tickets-blk course-instruct-blk table-responsive" bis_skin_checked="1"></div>
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
                                            <option value="<?= htmlspecialchars($subject['name']); ?>">
                                                <?= htmlspecialchars($subject['name']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="col">ID</th>
                                        <th class="col">Type</th>
                                        <th class="col">Subject</th>
                                        <th class="col-5">Description</th>
                                        <th class="col"> User</th>
                                        <th class="col">Action</th>
                                        <th class="col">Validate with Mail</th>
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
                                            <?php
                                            $user = $userC->getUser($reclamation['id_user']);
                                            ?>
                                            <td><?= htmlspecialchars($user['name']); ?></td>
                                            <td>
                                                <form action="index.php" method="GET">
                                                    <input type="hidden" name="page" value="chat">
                                                    <input type="hidden" name="id_reclamation" value="<?= htmlspecialchars($reclamation['id']); ?>">
                                                    <input type="hidden" name="id_user" value="<?= htmlspecialchars($reclamation['id_user']); ?>">
                                                    <button type="submit" class="btn btn-primary" aria-label="Start chat about reclamation">
                                                        Chat
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="../../model/gestion reclamation/send_validate.php" method="POST">
                                                    <input type="hidden" name="id_user" value="<?= htmlspecialchars($reclamation['id_user']); ?>">
                                                    <input type="hidden" name="subject" value="<?= htmlspecialchars($subject_name['name']); ?>">
                                                    <button type="submit" class="btn btn-success col-7">Validate</button>
                                                </form>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('note-search');
                const subjectFilter = document.getElementById('subject-filter');
                const tableRows = document.querySelectorAll('table tbody tr');

                function filterRows() {
                    const searchTerm = searchInput.value.toLowerCase();
                    const selectedSubject = subjectFilter.value;

                    tableRows.forEach(row => {
                        const type = row.querySelector('td:nth-child(2)')
                            .textContent.toLowerCase();
                        const subject = row.querySelector('td:nth-child(3)')
                            .textContent.toLowerCase();
                        const description = row.querySelector('td:nth-child(4)')
                            .textContent.toLowerCase();
                        const matchesSearch = type.includes(searchTerm) || subject
                            .includes(searchTerm) || description.includes(
                                searchTerm);
                        const matchesSubject = selectedSubject === 'all' ||
                            subject === selectedSubject.toLowerCase();

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