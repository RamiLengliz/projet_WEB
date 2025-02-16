<?php
include "../../../Model/gestion user/verify_login.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<?php

include "head.php";
$result = isset($_GET['result']) ? $_GET['result'] : null;
?>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <div class="row">

            <!-- Login Banner -->
            <div class="col-md-6 login-bg">
                <div class="owl-carousel login-slide owl-theme aos" data-aos="fade-up">
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="assets/img/login-img.png" class="img-fluid" alt="Logo">
                        </div>
                        <div class="mentor-course text-center">
                            <h2>Welcome to <br>DreamsLMS Courses.</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="assets/img/login-img.png" class="img-fluid" alt="Logo">
                        </div>
                        <div class="mentor-course text-center">
                            <h2>Welcome to <br>DreamsLMS Courses.</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="assets/img/login-img.png" class="img-fluid" alt="Logo">
                        </div>
                        <div class="mentor-course text-center">
                            <h2>Welcome to <br>DreamsLMS Courses.</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Login Banner -->

            <div class="col-md-6 login-wrap-bg">

                <!-- Change Password -->

                <div class="login-wrapper">
                    <div class="loginbox">
                        <div class="img-logo">
                            <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                            <div class="back-home">
                                <a href="index.php">Back to Home</a>
                            </div>
                        </div>
                        <h1>Change Password</h1>
                        <div class="reset-password">
                            <p>Enter your current password and new password below.</p>
                            <?php
                            switch ($result) {
                                case '1':
                                    echo '<div class="alert alert-success" role="alert">The operation worked successfully !</div>
                            <div class="card bg-success mb-3 " style="max-width: 100rem;">';
                                    break;

                                case '2':
                                    echo '<div class="alert alert-danger" role="alert">An error occurred !</div>
                            <div class="card border-danger mb-3 " style="max-width: 100rem;">';
                                    break;
                                case '3':
                                    echo '<div class="alert alert-danger" role="alert">Actual password is incorrect.!</div>
                            <div class="card border-danger mb-3 " style="max-width: 100rem;">';
                                    break;
                                case '4':
                                    echo '<div class="alert alert-warning" role="alert">New password and confirm password do not match.!</div>
                                    <div class="card border-warning mb-3 " style="max-width: 100rem;">';
                                    break;
                                default:
                                    echo '<div class="alert alert-primary" role="alert">Input the FORM !</div>
                            <div class="card border-dark mb-3 " style="max-width: 100rem;">';
                                    break;
                            }
                            ?>
                        </div>
                        <form action="../../../Model/change_password.php" method="post">
                            <div class="input-block">
                                <label class="form-control-label">Current Password</label>
                                <input type="password" name="actualPassword" class="form-control" placeholder="Enter your current password" required>
                            </div>
                            <div class="input-block">
                                <label class="form-control-label">New Password</label>
                                <input type="password" name="newPassword" class="form-control" placeholder="Enter your new password" required>
                            </div>
                            <div class="input-block">
                                <label class="form-control-label">Confirm New Password</label>
                                <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm your new password" required>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-start" type="submit">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Change Password -->
                <div class="col-md-10">
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

                <script>
                    document.getElementById('mySwitch').addEventListener('change', function() {
                        const iconContainer = document.getElementById('iconContainer');
                        iconContainer.innerHTML = '';
                        let faceStatus = this.checked ? 1 : 0;

                        if (this.checked) {
                            iconContainer.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                    </svg>`;
                        } else {
                            iconContainer.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                    </svg>`;
                        }

                        // AJAX request to update the database
                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", "update_face_id.php", true);
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

            </div>

        </div>

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Owl Carousel -->
    <script src="assets/js/owl.carousel.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/voice.js"></script>
</body>

<!-- Mirrored from dreamslms.dreamstechnologies.com/html/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 21:45:15 GMT -->

</html>