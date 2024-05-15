<?php
include "../../Model/gestion user/verify_login.php";
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/dashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/plugins/slick/slick.css">
    <link rel="stylesheet" href="assets/plugins/slick/slick-theme.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <!-- Aos CSS -->
    <link rel="stylesheet" href="assets/plugins/aos/aos.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body style="background-color:#fafafa;">


    <?php
    if (1 == 1) {
        include '../components/Navbar_horizental/navbar_horizental.php';
    ?><div class="row">
            <?php
            include '../components/Navbar_vertical/Navbar1_vertical.php';

            ?><div class="col"><?php
                                    switch ($page) {
                                            //gestion User
                                        case 'AS':

                                            include 'gestion user/creating_student.php';
                                            break;

                                        case 'AC':
                                            include 'gestion user/creating_class.php';
                                            break;

                                        case 'ASU':
                                            include 'gestion user/creating_subject.php';
                                            break;
                                        case 'AT':
                                            include 'gestion user/creating_teacher.php';
                                            break;
                                        case 'CS':
                                            include 'gestion user/check_student.php';
                                            break;
                                        case 'CT';
                                            include 'gestion user/check_teacher.php';
                                            break;
                                        case 'change_password';
                                            include '../components/commun/change_password.php';
                                            break;

                                        case 'UT';
                                            include 'gestion user/update_teacher.php';
                                            break;
                                        case 'US';
                                            include 'gestion user/update_student.php';
                                            break;
                                            //gestion Examen
                                        case 'CE';
                                            include 'gestion examen/create_examen.php';
                                            break;
                                        case 'UE';
                                            include 'gestion examen/update_examen.php';
                                            break;
                                        case 'resultat';
                                            include 'gestion examen/resultat.php';
                                            break;
                                        case 'choix_class';
                                            include 'gestion examen/choix_class.php';
                                            break;
                                        case 'list_etudiants';
                                            include 'gestion examen/list_etudiants.php';
                                            break;
                                        case 'resultat_update';
                                            include 'gestion examen/resultat_update.php';
                                            break;
                                        case 'list_etudiant_update';
                                            include 'gestion examen/list_etudiant_update.php';
                                            break;
                                            // gestion Reclamation
                                        case 'CR';
                                            include 'gestion reclamation/check_reclamation.php';
                                            break;
                                        case 'chat';
                                            include 'gestion reclamation/chat.php';
                                            break;
                                            //gestion Events
                                        case 'EC';
                                            include 'gestion events/create_events.php';
                                            break;
                                        case 'EU';
                                            include 'gestion events/update_event.php';
                                            break;
                                        case 'ER';
                                            include 'gestion events/create_reservation.php';
                                            break;
                                        case 'UR';
                                            include 'gestion events/update_reservation.php';
                                            break;
                                            // gestion Absence
                                        case 'AB';
                                            include 'absence/index.php';
                                            break;
                                        case 'AA';
                                            include 'billet/indexB.php';
                                            break;

                                        default:
                                            include 'dashboard.php';
                                            break;
                                    }
                                }
                                    ?></div><?php
                                        ?></div><?php


                                            ?>
        </div>

        <!-- MAIN -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="../js/script.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="assets/js/jquery-3.7.1.min.js"></script>

        <!-- Bootstrap Core JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <!-- counterup JS -->
        <script src="assets/js/jquery.waypoints.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>

        <!-- Select2 JS -->
        <script src="assets/plugins/select2/js/select2.min.js"></script>

        <!-- Owl Carousel -->
        <script src="assets/js/owl.carousel.min.js"></script>

        <!-- Slick Slider -->
        <script src="assets/plugins/slick/slick.js"></script>

        <!-- Aos -->
        <script src="assets/plugins/aos/aos.js"></script>

        <!-- Custom JS -->
        <script src="assets/js/script.js"></script>
</body>

</html>