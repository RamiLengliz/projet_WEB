<?php
ob_start();  // Start buffering output
include '../../Controller/event_con.php';
include '../../Model/gestion events/event.php';
$result = isset($_GET['result']) ? $_GET['result'] : null;
$eventC = new eventCon("events");
// Création d'une instance du contrôleur des événements
if (isset($_GET['id'])) {
    $current_id = $_GET['id'];
    $event = $eventC->getEvent($current_id);
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

                <form action="../../model/gestion events/update_event.php" method="post" style="max-width: 100rem; padding: 20px; margin-bottom: 20px; border: 1px solid #ccc; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                    <input type="hidden" name="id" value="<?= $current_id; ?>"> <!-- Hidden field for event ID -->
                    <h5>Edit Event</h5>
                    <div class="form-group">
                        <label for="titre"><b>Title</b></label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="titre" id="titre" value="<?= htmlspecialchars($event['titre']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="date"><b>Date</b></label>
                        <input type="date" class="form-control" name="date" id="date" value="<?= htmlspecialchars($event['date']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="prix"><b>Price</b></label>
                        <input type="text" class="form-control" placeholder="Enter Price" name="prix" id="prix" value="<?= htmlspecialchars($event['prix']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dispo"><b>Disponibilite</b></label>
                        <select class="form-control" id="dispo" name="dispo" required>
                            <option value="" <?= ($event['dispo'] == '') ? 'selected' : ''; ?> disabled>choisir le disponibilite</option>
                            <option value="oui" <?= ($event['dispo'] == 'oui') ? 'selected' : ''; ?> >oui</option>
                            <option value="non" <?= ($event['dispo'] == 'non') ? 'selected' : ''; ?> >non</option>
                        </select>    
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