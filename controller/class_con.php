<?php

require_once 'connect.php';

class ClassCon
{

    private $tab_name;

    public function __construct($tab_name = 'class')
    {
        $this->tab_name = $tab_name;
    }

    public function getClass($id)
    {
        $sql = "SELECT name FROM class WHERE Id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['name'];
        } catch (Exception $e) {
            error_log('Error retrieving class with ID ' . $id . ': ' . $e->getMessage());
            return null;
        }
    }




    function showclass($id)
    {
        $sql = "SELECT * FROM class WHERE Id = :id;";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $id = $query->fetch();
            return $id;
        } catch (Exception $e) {
            // Log or handle the exception
            return;
        }
    }

    public function listClasses()
    {
        $sql = "SELECT * FROM $this->tab_name";
        $db = config::getConnexion();

        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addClass($name)
    {
        $sql = "INSERT INTO $this->tab_name (name) VALUES (:name)";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute(['name' => $name]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateClass($name, $id)
    {
        $sql = "UPDATE $this->tab_name SET name = :name WHERE Id = :id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id, 'name' => $name]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deleteClass($id)
    {
        $sql = "DELETE FROM $this->tab_name WHERE Id = :id";
        $db = config::getConnexion();

        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}
