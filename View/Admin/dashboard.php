<?php
include_once '../../Controller/user_con.php';

$userC = new UserCon("user");
$Nbteacher = $userC->getNb_teacher();
$Nbstudent = $userC->getNb_student();


?>
<?php
include_once '../../Controller/reclamation_con.php';
include_once '../../Controller/subject_con.php';
$reclamationC = new reclamationCon("reclamation");
$reclamations = $reclamationC->listReclamations();

$subjectC = new subjectCon("subject");
$subjects = $subjectC->listsubjects();
$result = isset($_GET['result']) ? $_GET['result'] : null;
?>


<div class="col-11" style="float:right! important;">
    <div class="page-content instructor-page-content">
        <div class="container-fluid">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-xl-2 col-lg-12 col-md-12 theiaStickySidebar">
                    <div class="settings-widget dash-profile">
                        <div class="settings-menu p-0">
                            <div class="profile-bg">
                                <img src="assets/img/instructor-profile-bg.jpg" alt="">
                                <div class="profile-img">
                                    <a href="instructor-profile.html"><img src="../components/images/tahar.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="profile-group">
                                <div class="profile-name text-center">
                                    <h4><a href="instructor-profile.html">Taher Ben Al Akhdher</a></h4>
                                    <p>General Director</p>
                                </div>
                                <div class="go-dashboard text-center">
                                    <a href="?page=CS" class="btn btn-primary">Check Students</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="settings-widget account-settings">
                        <div class="settings-menu">
                            <h3>DASHBOARD</h3>
                            <ul>
                                <li class="nav-item active">
                                    <a href="" class="nav-link">
                                        <i class="feather-home"></i> My Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="instructor-course.html" class="nav-link">
                                        <i class="feather-book"></i> My Courses
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=CR" class="nav-link">
                                        <i class="feather-star"></i> Reclamation
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=resultat" class="nav-link">
                                        <i class="feather-pie-chart"></i> Give Resultat
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=CS" class="nav-link">
                                        <i class="feather-users"></i> Students
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=CT" class="nav-link">
                                        <i class="feather-dollar-sign"></i> Teachers
                                    </a>
                                </li>
                            </ul>
                            <div class="instructor-title">
                                <h3>ACCOUNT SETTINGS</h3>
                            </div>
                            <ul>
                                <li class="nav-item">
                                    <a href="?page=change_password" class="nav-link ">
                                        <i class="feather-settings"></i> Edit Password
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Sidebar -->

                <!-- Instructor Dashboard -->
                <div class="col-xl-10 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-md-4 d-flex">
                            <div class="card instructor-card w-100">
                                <div class="card-body">
                                    <div class="instructor-inner">
                                        <h6>Number of Teachers</h6>
                                        <h4 class="instructor-text-success"><?= $Nbteacher; ?></h4>
                                        <p>Earning this month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="card instructor-card w-100">
                                <div class="card-body">
                                    <div class="instructor-inner">
                                        <h6>NUMBER OF STUDENTS</h6>
                                        <h4 class="instructor-text-info"><?= $Nbstudent; ?></h4>
                                        <p>New this month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="card instructor-card w-100">
                                <div class="card-body">
                                    <div class="instructor-inner">
                                        <h6>COURSES RATING</h6>
                                        <h4 class="instructor-text-warning">4.80</h4>
                                        <p>Rating this month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card instructor-card">
                                <div class="card-header">
                                    <h4>Courses Statics</h4>
                                </div>
                                <div class="card-body">
                                    <div id="instructor_chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card instructor-card">
                                <div class="card-header">
                                    <h4>Order</h4>
                                </div>
                                <div class="card-body">
                                    <div id="order_chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="settings-widget">
                                <div class="settings-inner-blk p-0">
                                    <div class="sell-course-head comman-space">
                                        <h3>Recent Reclamation</h3>
                                    </div>
                                    <div class="comman-space pb-0">
                                        <div class="settings-tickets-blk course-instruct-blk table-responsive">

                                            <!-- Referred Users-->
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
                                            <!-- /Referred Users-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Instructor Dashboard -->

            </div>
        </div>
    </div>
</div>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data arrays
            var subjectNames = [];
            var courseCounts = [];

            <?php foreach ($listeSubject as $subject) : ?>
                subjectNames.push("<?= addslashes($subject['name']) ?>");
                courseCounts.push(<?= $subject['courseCount'] ?>);
            <?php endforeach; ?>

            // Setup chart options
            var options = {
                series: [{
                    name: 'Number of Courses',
                    data: courseCounts
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false
                    }
                },
                dataLabels: {
                    enabled: true
                },
                xaxis: {
                    categories: subjectNames
                },
                title: {
                    text: 'Courses per Subject',
                    align: 'center'
                }
            };

            // Create chart
            var chart = new ApexCharts(document.querySelector("#instructor_chart"), options);
            chart.render();
        });
    </script>
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery-3.7.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- Feature JS -->
<script src="assets/plugins/feather/feather.min.js"></script>

<!-- Sticky Sidebar JS -->
<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

<!-- Chart JS -->
<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>