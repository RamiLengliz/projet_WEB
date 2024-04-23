<?php
include '../Controller/reservation_con.php';
$reservationC = new reservationCon("reservation");
$reservations = $reservationC->listReservations();
$id_events_options = $reservationC->generateEventsOptions();
$result = isset($_GET['result']) ? $_GET['result'] : null;
?>


    <main style="padding-top:20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    switch ($result) {
                        case '1':
                            echo '<div class="alert alert-success" role="alert">Event created successfully !</div>';
                            break;
                        case '2':
                            echo '<div class="alert alert-danger" role="alert">An error occurred !</div>';
                            break;
                        case '3':
                            echo '<div class="alert alert-danger" role="alert">Please submit the form.!</div>';
                            break;
                        case '4':
                            echo '<div class="alert alert-warning" role="alert">Event already exists.!</div>';
                            break;
                        default:
                            echo '<div class="alert alert-primary" role="alert">Fill in the form to add an event!</div>';
                            break;
                    }
                    ?>

                    <form action="../Model/add_reservation.php" method="post" style="max-width: 100rem; padding: 20px; margin-bottom: 20px; border: 1px solid #ccc; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                    
                    <h5>Add New Reservation</h5>
                        <div class="form-group">
                            <label for="id_etudiant"><b>ID Etudiant</b></label>
                            <input type="text" class="form-control" placeholder="Enter id etudiant" name="id_etudiant" id="id_etudiant" required>
                        </div>
                        <div class="form-group">
                            <label for="id_evenement"><b>ID Evenement</b></label>
                            <select class="form-control" id="id_evenement" name="id_evenement" required>
                                <option value="" selected disabled>choisir le ID Evenement</option>
                                <?php echo $id_events_options; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nb_place"><b>Nb Place</b></label>
                            <input type="text" class="form-control" placeholder="Enter nb place" name="nb_place" id="nb_place" required>
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
                                <th>ID Etudiant</th>
                                <th>ID Evenement</th>
                                <th>Nb Place</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reservations as $reservation) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($reservation['id']); ?></td>
                                    <td><?= htmlspecialchars($reservation['id_etudiant']); ?></td>
                                    <td><?= htmlspecialchars($reservation['id_evenement']); ?></td>
                                    <td><?= htmlspecialchars($reservation['nb_place']); ?></td>
                                    <td>
                                        <a href="index.php?id=<?= $reservation['id']; ?>&page=UR&result=4" class="btn btn-primary">Update</a>
                                        <a href="../Model/delete_reservation.php?id=<?= $reservation['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script src="../scripts/add_modal_verif.js"></script>