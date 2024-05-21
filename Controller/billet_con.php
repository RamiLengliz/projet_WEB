<?php

require_once 'connect.php';

//qr code
require "vendor/autoload.php";

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class billetCon
{

    private $tab_name;

    public function __construct($tab_name)
    {
        $this->tab_name = $tab_name;
    }

    public function getBillet($id)
    {
        $sql = "SELECT * FROM $this->tab_name WHERE id = $id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute();
            $voyage = $query->fetch();
            return $voyage;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function listBillets()
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

    function addBillet($billet)
    {
        $sql = "INSERT INTO $this->tab_name(name, id_student, date_hour, class, id_abs) VALUES (:name, :id_student, :date_hour, :class, :id_abs)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(
                [
                    'name' => $billet->getName(),
                    'id_student' => $billet->getIdStudent(),
                    'date_hour' => $billet->getDateHour(),
                    'class' => $billet->getClass(),
                    'id_abs' => $billet->getIdAbs()
                ]
            );
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateBillet($billet, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("UPDATE $this->tab_name SET name = :name, id_student = :id_student, date_hour = :date_hour, class = :class, id_abs = :id_abs WHERE id = :id");
            $query->execute([
                'id' => $id,
                'name' => $billet->getName(),
                'id_student' => $billet->getIdStudent(),
                'date_hour' => $billet->getDateHour(),
                'class' => $billet->getClass(),
                'id_abs' => $billet->getIdAbs()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
            echo ($e);
        }
    }

    function deleteBillet($id)
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

    public function generateAbsOptions()
    {
        // Fetching the blog IDs from the database
        $sql = "SELECT id, name FROM absence";

        $db = config::getConnexion();

        try {
            $stmt = $db->query($sql);

            // Generating the <option> tags
            $options = '';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $options .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }

            return $options;
        } catch (PDOException $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function generateAbsOptionsSelected($id)
    {
        // Fetching the blog IDs from the database
        $sql = "SELECT id, name FROM absence";

        $db = config::getConnexion();

        try {
            $stmt = $db->query($sql);

            // Generating the <option> tags
            $options = '';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($id == $row['id']) {
                    $options .= '<option selected value="' . $row['id'] . '">' . $row['name'] . '</option>';
                } else {
                    $options .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
            }

            return $options;
        } catch (PDOException $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function getQrCode($data)
    {
        if ($data == null) {
            return '<img src="" />';
        }
        $text = 'id' . $data['id'] . '" name : "' . $data['name'] . ' date_hour:' . $data['date_hour'] . ' class: "' . $data['class'];

        $qr_code = QrCode::create($text)
            ->setSize(300)
            ->setMargin(5);

        $writer = new PngWriter;

        $result = $writer->write($qr_code);

        // Encode the image string to a data URI
        $dataUri = 'data:' . $result->getMimeType() . ';base64,' . base64_encode($result->getString());

        // Now you can use this data URI in an <img> tag like this:
        return '<img src="' . $dataUri . '" alt="QR Code" onclick="openPopup(this.src)" />';
    }
}
