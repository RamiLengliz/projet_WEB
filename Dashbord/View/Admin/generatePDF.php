<?php
require_once('./tcpdf/tcpdf.php'); // Adjust the path as necessary

// Retrieve course data
$courseId = $_GET['id'] ?? '';  // Make sure to validate and sanitize input
$courseName = $_GET['name'] ?? '';
$courseImage = $_GET['image'] ?? '';

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Course Information');
$pdf->SetSubject('Course Details');

// Add a page
$pdf->AddPage();

// Set content
$html = '<h3> this is the course name : ' . htmlspecialchars($courseName) . '</h1>';
$html .= '<h4> this is the image of the course'.'</h1>';
$html .= '<img src="' . htmlspecialchars($courseImage) . '" style="width:100px;">';

$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('course_' . $courseId . '.pdf', 'I');
?>
