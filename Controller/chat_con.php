<?php

require_once 'connect.php';

class ChatCon {
    private $tab_name;

    public function __construct($tab_name = 'chat') {
        $this->tab_name = $tab_name;
    }

    public function getMessage($id) {
        $sql = "SELECT * FROM $this->tab_name WHERE id = :id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $message = $query->fetch();
            return $message;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function listMessages() {
        $sql = "SELECT * FROM $this->tab_name";
        $db = config::getConnexion();

        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listMessagesId_user($id) {
        $sql = "SELECT * FROM $this->tab_name WHERE $id = id_user or $id = id_user_dest";
        $db = config::getConnexion();

        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listMessagesForUser($user_id) {
        $sql = "SELECT * FROM $this->tab_name WHERE $user_id = id_user_dest";
        $db = config::getConnexion();

        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addMessage(Chat $chat) {
        $sql = "INSERT INTO $this->tab_name (message, date, id_user, id_reclamation, id_user_dest) 
                VALUES (:message, :date, :id_user, :id_reclamation, :id_user_dest)";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'message' => $chat->getMessage(),
                'date' => $chat->getDate()->format('Y-m-d H:i:s'), // Formatting the DateTime object to SQL datetime format
                'id_user' => $chat->getIdUser(),
                'id_reclamation' => $chat->getIdReclamation(),
                'id_user_dest' => $chat->getIdUserDest()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
}