<?php

class Chat {
    private int $id;
    private string $message;
    private DateTime $date;
    private int $id_user;
    private int $id_reclamation;
    private int $id_user_dest;

    public function __construct(int $id, string $message, DateTime $date, int $id_user, int $id_reclamation, int $id_user_dest) {
        $this->id = $id;
        $this->message = $message;
        $this->date = $date;
        $this->id_user = $id_user;
        $this->id_reclamation = $id_reclamation;
        $this->id_user_dest = $id_user_dest;
    }

    // Getter and setter for $id
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    // Getter and setter for $message
    public function getMessage(): string {
        return $this->message;
    }

    public function setMessage(string $message): void {
        $this->message = $message;
    }

    // Getter for $date - Note that setter for $date is typically not needed as it's set when the message is created
    public function getDate(): DateTime {
        return $this->date;
    }

    // Getter and setter for $id_user
    public function getIdUser(): int {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): void {
        $this->id_user = $id_user;
    }

    // Getter and setter for $id_reclamation
    public function getIdReclamation(): int {
        return $this->id_reclamation;
    }

    public function setIdReclamation(int $id_reclamation): void {
        $this->id_reclamation = $id_reclamation;
    }

    // Getter and setter for $id_user_dest
    public function getIdUserDest(): int {
        return $this->id_user_dest;
    }

    public function setIdUserDest(int $id_user_dest): void {
        $this->id_user_dest = $id_user_dest;
    }
}

?>
