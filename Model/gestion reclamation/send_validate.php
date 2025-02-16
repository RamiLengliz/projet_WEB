<?php

include '../../controller/user_con.php';
include 'sendEmail.php';
$id_user = $_POST['id_user'];
$subject = $_POST['subject'];

$userC = new UserCon("user");
$user = $userC->getUser($id_user);
$name = $user['name'];
$emailSubject = "Your reclamation has been well received";
$emailBodyHtml = "<p>Hello Student {$name},<br>We have received your reclamation about {$subject}.and we will gladly considerate<br>best regards <br> Proschool Administration.</p>";
$emailBodyPlain = "";

$email = $user['email'];

sendEmail($email, $name, $emailSubject, $emailBodyHtml, $emailBodyPlain);


header("Location: ../../view/admin?page=CR&result=1");