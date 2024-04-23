<?php

class billet{

    private string $id, $name, $id_student, $date_hour, $class, $id_abs;

    public function __construct($id, $name, $id_student, $date_hour, $class, $id_abs)
    {
        $this->id = $id;
        $this->name = $name;
        $this->id_student = $id_student;
        $this->date_hour = $date_hour;
        $this->class = $class;
        $this->id_abs = $id_abs;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIdStudent()
    {
        return $this->id_student;
    }

    public function getDateHour()
    {
        return $this->date_hour;
    }

    public function getclass()
    {
        return $this->class;
    }

    public function getIdAbs()
    {
        return $this->id_abs;
    }


    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setIdStudent($id_student)
    {
        $this->id_student = $id_student;
    }

    public function setDateHour($date_hour)
    {
        $this->date_hour = $date_hour;
    }

    public function setclass($class)
    {
        $this->class = $class;
    }

    public function setIdAbs($val)
    {
        $this->id_abs = $val;
    }


    

}

?>