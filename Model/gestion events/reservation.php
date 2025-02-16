<?php

class Reservation{

    private string $id, $id_etudiant, $id_evenement, $nb_place;

    public function __construct($id, $id_etudiant, $id_evenement, $nb_place)
    {
        $this->id = $id;
        $this->id_etudiant = $id_etudiant;
        $this->id_evenement = $id_evenement;
        $this->nb_place = $nb_place;
    }

    public function set_id($val){
        $this->id = $val;
    }

    public function get_id(){
        return $this->id;
    }

    public function set_id_etudiant($val){
        $this->id_etudiant = $val;
    }

    public function get_id_etudiant(){
        return $this->id_etudiant;
    }

    public function set_id_evenement($val){
        $this->id_evenement = $val;
    }

    public function get_id_evenement(){
        return $this->id_evenement;
    }

    public function set_nb_place($val){
        $this->nb_place = $val;
    }

    public function get_nb_place(){
        return $this->nb_place;
    }

}

?>