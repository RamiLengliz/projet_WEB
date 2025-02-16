<?php
$result = isset($_GET['result']) ? $_GET['result'] : null;
?>
<style>
    .icon-container {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
    }

    .form-check-label {
        margin-left: 10px;
        font-weight: bold;
        color: #333;
    }

    .card {
        border-radius: 10px;
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 10px 15px;
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-body {
        padding: 20px;
    }

    .form-check-input:checked {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .form-check-input {
        width: 2em;
        height: 1em;
    }

    .form-check-input:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
</style>
<main style="padding-top:20px;">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <?php
                switch ($result) {
                    case '1':
                        echo '<div class="alert alert-success" role="alert">Password changed succesfully!</div>
                            <div class="card bg-success mb-3 " style="max-width: 100rem;">';
                        break;

                    case '2':
                        echo '<div class="alert alert-danger" role="alert">An error occurred !</div>
                            <div class="card border-danger mb-3 " style="max-width: 100rem;">';
                        break;
                    case '3':
                        echo '<div class="alert alert-danger" role="alert">Wrong actual password.!</div>
                            <div class="card border-danger mb-3 " style="max-width: 100rem;">';
                        break;
                    case '4':
                        echo '<div class="alert alert-warning" role="alert">New and confirm doesn"t match!</div>
                                    <div class="card border-warning mb-3 " style="max-width: 100rem;">';
                        break;
                    default:
                        echo '<div class="alert alert-primary" role="alert">Input the FORM !</div>
                            <div class="card border mb-3 " style="max-width: 100rem;">';
                        break;
                }
                ?>

                <div class="col-md-12" style="padding-top:20px;">
                    <div class="settings-widget" bis_skin_checked="1">
                        <div class="settings-inner-blk p-0" bis_skin_checked="1">
                            <div class="comman-space pb-0" bis_skin_checked="1">
                                


                                    <h5>Change Password</h5>
                                    <form class="row g-3" method="POST" action="../../Model/gestion user/change_password.php">
                                        <div class="col-md-6">
                                            <label for="actualPassword" class="form-label">Actual Password</label>
                                            <input type="password" class="form-control" id="actualPassword" name="actualPassword" required>

                                            <label for="newPassword" class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="newPassword" name="newPassword" required>

                                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Change Password</button>
                                        </div>
                                    </form>


                                    <div style="padding-top: 50px;"></div>
                                    <div class="col-md-12">
                                        <div class="alert alert-primary" role="alert">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                            </svg>
                                            <span style="padding-left:10px;"></span>Activate or Disable Face Id
                                        </div>

                                        <div class="card border mb-3" style="max-width: 100rem;">
                                            <div class="card-header">Face ID Settings</div>
                                            <div class="card-body text-dark">
                                                <form class="row g-3" method="POST">
                                                    <div class="form-check form-switch">
                                                        <div class="icon-container" id="iconContainer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                            </svg>
                                                        </div>
                                                        <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes" checked>
                                                        <label class="form-check-label" for="mySwitch">Face Id</label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.getElementById('mySwitch').addEventListener('change', function() {
                    const iconContainer = document.getElementById('iconContainer');
                    iconContainer.innerHTML = '';
                    let faceStatus = this.checked ? 1 : 0;

                    if (this.checked) {
                        iconContainer.innerHTML = `
                    <svg style="color: blue;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                    </svg>`;
                    } else {
                        iconContainer.innerHTML = `
                    <svg style="color: red;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                    </svg>`;
                    }

                    // AJAX request to update the database
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "../components/commun/update_face_id.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.send("face=" + faceStatus);

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            console.log(xhr.responseText); // Handle response if needed
                        }
                    };
                });

                // Initialize icon based on initial checkbox state
                document.getElementById('mySwitch').dispatchEvent(new Event('change'));
            </script>
</main>