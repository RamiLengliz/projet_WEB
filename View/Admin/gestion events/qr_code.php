<?php 

include_once __DIR__ . '/../../Controller/event_con.php';
$eventC = new eventCon("events");


echo $eventC->getQrCode(0);


?>