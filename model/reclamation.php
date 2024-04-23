<?php

class Reclamation {
    private string $id;
    private string $type; 
    private string $subject; 
    private string $description;

    public function __construct(string $id, string $type, string $subject, string $description) {
        $this->id = $id;
        $this->type = $type;
        $this->subject = $subject;
        $this->description = $description;
    }

    // Getter and setter for $id
    public function getId(): string {
        return $this->id;
    }

    public function setId(string $id): void {
        $this->id = $id;
    }

    // Getter and setter for $type
    public function getType(): string {
        return $this->type;
    }

    public function setType(string $type): void {
        $this->type = $type;
    }

    // Getter and setter for $subject
    public function getSubject(): string {
        return $this->subject;
    }

    public function setSubject(string $subject): void {
        $this->subject = $subject;
    }

    // Getter and setter for $description
    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }
}

?>
