<?php
class subject {
    private $id;
    private $name;
    private $subjectDescription;
    private $depotFichierSubject;

    function __construct($name, $subjectDescription, $depotFichierSubject) {
        $this->name = $name;
        $this->subjectDescription = $subjectDescription;
        $this->depotFichierSubject = $depotFichierSubject;
    }

    function getId() {
        return $this->id;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function getName() {
        return $this->name;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function getSubjectDescription() {
        return $this->subjectDescription;
    }

    function setSubjectDescription($subjectDescription): void {
        $this->subjectDescription = $subjectDescription;
    }

    function getDepotFichierSubject() {
        return $this->depotFichierSubject;
    }

    function setDepotFichierSubject($depotFichierSubject): void {
        $this->depotFichierSubject = $depotFichierSubject;
    }
}
?>
