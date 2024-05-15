<?php
include "../../../Model/gestion user/verify_login.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dreams LMS</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <!-- Feather CSS -->
    <link rel="stylesheet" href="assets/css/feather.css">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background-color: #f4f7fa;
            color: #333;
        }
        .calendar-container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
        }
        .calendar-day {
            min-height: 150px;
            background-color: #fff;
            border: 1px solid #ccc;
            position: relative;
            border-radius: 8px;
            transition: transform 0.3s;
            overflow: hidden;
        }
        .calendar-day:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .calendar-day-header {
            background-color: var(--day-header-color, #007bff);
            color: white;
            padding: 12px;
            font-weight: bold;
        }
        .exam-event {
            position: absolute;
            bottom: 10px;
            left: 10px;
            padding: 10px;
            background-color: var(--event-bg-color, #f8f8f8);
            border-radius: 6px;
            width: calc(100% - 20px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s;
        }
        .exam-event:hover {
            background-color: var(--event-hover-color, #e9e9e9);
        }
        .month-header {
            text-align: center;
            font-size: 1.5em;
            color: #333;
            margin: 20px 0;
            font-weight: bold;
        }
        .week-indicator {
            font-size: 0.85em;
            color: #666;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <?php include 'header1.php'; ?>
        <div class="container">
            <?php
            require_once '../../../controller/resultat_con.php';
            require_once '../../../controller/examen_con.php';
            require_once '../../../controller/subject_con.php';
            $resultatC = new ResultatCon('resultat');
            $resultats = $resultatC->listResultats();
            $examenC = new examenCon('examen');
            $examens = $examenC->listExamens();
            $subjectC = new subjectCon('subject');
            $months = range(1, 12);
            $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            $examByMonth = [];
            foreach ($examens as $examen) {
                $examDate = new DateTime($examen['date']);
                $month = $examDate->format('n');
                $examByMonth[$month][] = $examen;
            }
            function getWeekOfMonth($date) {
                $firstDayOfMonth = new DateTime($date->format("Y-m-01"));
                $firstDayOfWeek = (int) $firstDayOfMonth->format('N');
                $dayOfMonth = (int) $date->format('j');
                $weekOfMonth = intdiv($dayOfMonth + $firstDayOfWeek - 2, 7) + 1;
                return $weekOfMonth;
            }
            foreach ($months as $month) {
                if (!empty($examByMonth[$month])) {
                    $dateObj = DateTime::createFromFormat('!m', $month);
                    $monthName = $dateObj->format('F');
                    echo "<div class='calendar-container'>";
                    echo "<h2 class='month-header'>Exam Calendar - $monthName</h2>";
                    echo "<div class='row'>";
                    foreach ($daysOfWeek as $day) {
                        echo '<div class="col-md-2">';
                        echo '<div class="calendar-day" style="--day-header-color: ' . sprintf('#%06X', mt_rand(0, 0xFFFFFF)) . ';">';
                        echo "<div class=\"calendar-day-header\">$day</div>";
                        foreach ($examByMonth[$month] as $examen) {
                            $examDate = new DateTime($examen['date']);
                            $examDay = $examDate->format('l');
                            if ($examDay == $day) {
                                $weekOfMonth = getWeekOfMonth($examDate);
                                echo '<div class="exam-event" style="--event-bg-color: ' . sprintf('#%06X', mt_rand(0, 0xFFFFFF)) . '; --event-hover-color: ' . sprintf('#%06X', mt_rand(0, 0xFFFFFF)) . ';">';
                                echo htmlspecialchars($examen['titre']) . ' - ' . $examDate->format('g:i A');
                                echo "<div class='week-of-month'>Week $weekOfMonth</div>";
                                echo '</div>';
                            }
                        }
                        echo '</div></div>';
                    }
                    echo "</div></div>";
                }
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
