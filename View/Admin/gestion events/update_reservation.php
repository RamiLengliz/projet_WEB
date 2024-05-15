<?php
ob_start();  // Start buffering output
include '../../Controller/reservation_con.php';
include '../../Model/gestion events/reservation.php';
$result = isset($_GET['result']) ? $_GET['result'] : null;
$reservationC = new reservationCon("reservation");
// Création d'une instance du contrôleur des événements
if (isset($_GET['id'])) {
    $current_id = $_GET['id'];
    $reservation = $reservationC->getReservation($current_id);
    $id_events_options = $reservationC->generateEventsOptionsSelectedId($reservation['id_evenement']);
}
?>

<main style="padding-top:20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                switch ($result) {
                    case '1':
                        echo '<div class="alert alert-success" role="alert">Event updated successfully!</div>';
                        break;
                    case '2':
                        echo '<div class="alert alert-danger" role="alert">An error occurred!</div>';
                        break;
                    case '3':
                        echo '<div class="alert alert-danger" role="alert">Please submit the form.</div>';
                        break;
                    default:
                        echo '<div class="alert alert-primary" role="alert">Fill in the form to update the event.</div>';
                        break;
                }
                ?>

                <form action="../../model/gestion events/update_reservation.php" method="post" style="max-width: 100rem; padding: 20px; margin-bottom: 20px; border: 1px solid #ccc; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                    <input type="hidden" name="id" value="<?= $current_id; ?>"> <!-- Hidden field for event ID -->
                    <h5>Edit Reservation</h5>
                    <div class="form-group">
                            <label for="id_etudiant"><b>ID Etudiant</b></label>
                            <input type="text" class="form-control" value="<?= htmlspecialchars($reservation['id_etudiant']); ?>" placeholder="Enter id etudiant" name="id_etudiant" id="id_etudiant" required>
                        </div>
                        <div class="form-group">
                            <label for="id_evenement"><b>ID Evenement</b></label>
                            <select class="form-control" id="id_evenement" name="id_evenement" required>
                                <option value="" selected disabled>choisir le ID Evenement</option>
                                <?php echo $id_events_options; ?>
                            </select>
                        <div class="form-group">
                            <label for="nb_place"><b>Nb Place</b></label>
                            <input type="text" class="form-control" value="<?= htmlspecialchars($reservation['nb_place']); ?>" placeholder="Enter nb place" name="nb_place" id="nb_place" required>
                        </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


<script src="../scripst/add_modal_verif.js"></script>