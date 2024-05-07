<?php
include '../Controller/examen_con.php';
include '../Controller/user_con.php';
require_once 'examen.php';
require '../vendor/autoload.php'; // Assuming you have PHPMailer installed via Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ExamPDF
{
    private $examenCon;
    private $daysOfWeek;

    public function __construct()
    {
        $this->examenCon = new examenCon();
        $this->daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    }

    public function createExamTimetablePDF($filename = 'output/exam_timetable.pdf')
    {
        $examens = $this->examenCon->listExamens();
        $examByMonth = [];

        foreach ($examens as $examen) {
            $examDate = new DateTime($examen['date']);
            $month = $examDate->format('n');
            $examByMonth[$month][] = $examen;
        }

        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('dejavusans', '', 12);

        $html = '<h1 style="text-align: center; color: #007bff;">Exam Timetable</h1>';

        foreach ($examByMonth as $month => $exams) {
            $dateObj = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F');

            $html .= "<h2 style='color: #333; text-align: center;'>$monthName</h2>";
            $html .= "<table border='1' cellpadding='5' cellspacing='0' style='width: 100%; border-collapse: collapse;'>";
            $html .= "<thead><tr style='background-color: #f4f7fa;'>";

            foreach ($this->daysOfWeek as $day) {
                $html .= "<th style='text-align: center; color: #333;'>$day</th>";
            }

            $html .= "</tr></thead><tbody><tr>";

            foreach ($this->daysOfWeek as $day) {
                $html .= "<td style='vertical-align: top;'>";
                foreach ($exams as $examen) {
                    $examDate = new DateTime($examen['date']);
                    if ($examDate->format('l') == $day) {
                        $html .= "<div style='padding: 5px; border-bottom: 1px solid #ccc;'>";
                        $html .= "<span style='font-weight: bold; color: #007bff;'>" . htmlspecialchars($examen['titre']) . "</span>";
                        $html .= " - " . $examDate->format('g:i A') . "<br>";
                        $html .= "</div>";
                    }
                }
                $html .= "</td>";
            }

            $html .= "</tr></tbody></table><br>";
        }

        $pdf->writeHTML($html, true, false, true, false, '');

        // Ensure the output directory exists
        $dirName = dirname($filename);
        if (!is_dir($dirName)) {
            if (!mkdir($dirName, 0755, true)) {
                die("Failed to create output directory: $dirName");
            }
        }

        // Save the PDF to a file
        $pdf->Output(__DIR__ . '/'.$filename, 'F');

        // Verify that the file was created
        if (!file_exists($filename)) {
            die("Failed to create PDF file: $filename");
        }

        return $filename;
    }
}

function sendTimetableToStudents($pdfFilename)
{
    $studentC = new UserCon();
    $students = $studentC->listStudents();

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mokdadmohamed10@gmail.com';
    $mail->Password = 'nluieqydzdsdzlqm';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('mokdadmohamed10@gmail.com', 'Dreams LMS');

    $subject = 'Exam Timetable';
    $body = 'Dear student, <br><br> Please find attached the exam timetable. <br><br> Best regards, <br> Dreams LMS';

    foreach ($students as $student) {
        $mail->clearAddresses(); // Clear addresses before adding new
        $mail->addAddress($student['email'], $student['name']);
        $mail->addAttachment($pdfFilename);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        try {
            $mail->send();
            echo "Message sent successfully to {$student['email']}<br>";
        } catch (Exception $e) {
            echo "Failed to send email to {$student['email']}: " . $mail->ErrorInfo . "<br>";
        }
    }
}

// Example usage
$examPDF = new ExamPDF();
$filename = $examPDF->createExamTimetablePDF();
sendTimetableToStudents(__DIR__ .'/'.$filename);
header('Location:../View/index.php?page=CE&result=5');

?>
