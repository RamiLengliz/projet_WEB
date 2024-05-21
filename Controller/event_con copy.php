<?php

//composer require endroid/qr-code

require_once 'connect.php';
include_once __DIR__ . '/../controller/reservation_con.php';

//qr code
require "vendor/autoload.php";

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class eventCon
{

    private $tab_name;

    public function __construct($tab_name)
    {
        $this->tab_name = $tab_name;
    }

    public function getEvent($id)
    {
        $sql = "SELECT * FROM $this->tab_name WHERE id = $id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute();
            $event = $query->fetch();
            return $event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function listEvents()
    {
        $sql = "SELECT * FROM $this->tab_name";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addEvent($event)
    {
        $sql = "INSERT INTO $this->tab_name(titre, date, prix, dispo) VALUES (:titre, :date, :prix, :dispo)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(
                [
                    'titre' => $event->get_titre(),
                    'date' => $event->get_date(),
                    'prix' => $event->get_prix(),
                    'dispo' => $event->get_dispo()
                ]
            );
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateEvent($event, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("UPDATE $this->tab_name SET titre = :titre, date = :date, prix = :prix, dispo = :dispo WHERE id = :id");
            $query->execute(['id' => $id, 'titre' => $event->get_titre(), 'date' => $event->get_date(), 'prix' => $event->get_prix(), 'dispo' => $event->get_dispo()]);
            header('Location: ../View/index.php?page=CE&result=1');
        } catch (PDOException $e) {
            $e->getMessage();
            echo ($e);
        }
    }

    function deleteEvent($id)
    {
        $sql = "DELETE FROM $this->tab_name WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    /*function generateEvents1($events_var) {

        $reservationC = new reservationCon("reservation");

        // Fetch data from PDOStatement object and convert it into an array
        $events = $events_var->fetchAll(PDO::FETCH_ASSOC);

        echo '<div class="row g-4 justify-content-center">';
        foreach ($events as $event) {
            $reservation_nb = $reservationC->countReservations($event['id']);
            echo '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">';
            echo '<div class="courses-item d-flex flex-column bg-light overflow-hidden h-100">';
            echo '<div class="text-center p-4 pt-0">';
            echo '<div class="d-inline-block bg-primary text-white fs-5 py-1 px-4 mb-4">' . $event['prix'] . ' TND</div>';
            echo '<h5 class="mb-3">' . $event['titre'] . '</h5>';
            echo '<p>' . $event['date'] . '</p>';
            echo '<ol class="breadcrumb justify-content-center mb-0">';
            echo '<li class="breadcrumb-item small"><i class="fa fa-signal text-primary me-2"></i>' . $reservation_nb . '</li>';
            echo '</ol>';
            echo '</div>';
            echo '<div class="position-relative mt-auto">';
            //echo '<img class="img-fluid" src="../assets_front/img/courses-1.jpg" alt="' . $event['titre'] . '">';
            echo '<img class="img-fluid" src="" alt="">';
            echo '<div class="courses-overlay">';
            echo '<a class="btn btn-outline-primary border-2" href="#">Read More</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }*/


    function generateEvents($events_var)
    {

        $reservationC = new reservationCon("reservation");

        echo '<div class="row">';

        foreach ($events_var as $event) {

            if ($event['dispo'] == "oui") {

                $reservation_nb = $reservationC->countReservations($event['id']);

                echo '<div class="col-lg-4 col-md-6">';
                echo '<div class="category-box">';
                echo '<div class="category-title">';
                echo '<div class="category-img">';
                //echo '<img src="' . $event['image'] . '" alt="">';
                echo $this->getQrCode($event['id']);
                echo '<img src="" alt="">';
                echo '</div>';
                echo '<h5>' . $event['titre'] . '</h5>';
                echo '<h7 style="color: #ac3973;">&nbsp;&nbsp;' . $event['prix'] . ' TND</h7>';
                echo '<h7>&nbsp;&nbsp;' . $event['date'] . '</h7>';
                echo '</div>';
                echo '<div class="cat-count">';
                echo '<span>' . $reservation_nb . '</span>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }

        echo '</div>';
    }
    function generateEventss($events_var)
    {

        $reservationC = new reservationCon("reservation");

        

        foreach ($events_var as $event) {

            if ($event['dispo'] == "oui") {

                $reservation_nb = $reservationC->countReservations($event['id']);

                echo '<div class="feature-box text-center ">';
                echo '<div class="feature-bg">';
                echo '<div class="feature-header">';
                echo '<div class="feature-icon">';
                echo $this->getQrCode($event['id']);
                echo '<img src="" alt="">';
                echo '</div>';
                echo '<div class="feature-cont">';
                echo '<div class="feature-text">' . $event['titre'] . '</div>';
                echo '</div>';
                echo '<h7 style="color: #ac3973;">&nbsp;&nbsp;' . $event['prix'] . ' TND</h7>';
                echo '</div>';
                echo '<p>' . $event['date'] . '</p>';
                echo '<div class="cat-count">';
                echo '<span>' . $reservation_nb . '</span>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }

       
    }


    function getQrCode($id_event)
    {

        $event = $this->getEvent($id_event);
        if ($event == null) {
            return '<img src="" />';
        }
        $text =  ' id:' . $event['id'] . ' titre: "' . $event['titre'] . '" date: "' . $event['date'] . '" prix: "' . $event['prix'] . '" dispo: "' . $event['dispo'] . '"';


        $qr_code = QrCode::create($text)
            ->setSize(100)
            ->setMargin(5);


        $writer = new PngWriter;

        $result = $writer->write($qr_code);

        // Encode the image string to a data URI
        $dataUri = 'data:' . $result->getMimeType() . ';base64,' . base64_encode($result->getString());

        // Now you can use this data URI in an <img> tag like this:
        return '<img src="' . $dataUri . '" alt="QR Code" />';
    }
}
