<?php
class cours {
    private $idCours;
    private $nomCours;
    private $ressourceCours;
    private $idSubject;

    function __construct($nomCours, $ressourceCours, $idSubject) {
        $this->nomCours = $nomCours;
        $this->ressourceCours = $ressourceCours;
        $this->idSubject = $idSubject;
    }

    function getIdCours() {
        return $this->idCours;
    }

    function setIdCours($idCours): void {
        $this->idCours = $idCours;
    }

    function getNomCours() {
        return $this->nomCours;
    }

    function setNomCours($nomCours): void {
        $this->nomCours = $nomCours;
    }

    function getRessourceCours() {
        return $this->ressourceCours;
    }

    function setRessourceCours($ressourceCours): void {
        $this->ressourceCours = $ressourceCours;
    }

    function getIdSubject() {
        return $this->idSubject;
    }

    function setIdSubject($idSubject): void {
        $this->idSubject = $idSubject;
    }
}
