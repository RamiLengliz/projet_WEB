<?php

class Event{

    private string $id, $titre, $date, $prix, $dispo;

    public function __construct($id, $titre, $date, $prix, $dispo)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->date = $date;
        $this->prix = $prix;
        $this->dispo = $dispo;
    }

    public function set_id($val){
        $this->id = $val;
    }

    public function get_id(){
        return $this->id;
    }

    public function set_titre($val){
        $this->titre = $val;
    }

    public function get_titre(){
        return $this->titre;
    }

    public function set_date($val){
        $this->date = $val;
    }

    public function get_date(){
        return $this->date;
    }

    public function set_prix($val){
        $this->prix = $val;
    }

    public function get_prix(){
        return $this->prix;
    }

    public function set_dispo($val){
        $this->dispo = $val;
    }

    public function get_dispo(){
        return $this->dispo;
    }

}

?>