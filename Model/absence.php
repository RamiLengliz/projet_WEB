<?php

class Absence{

    private string $id, $name, $id_student, $date_hour, $id_teacher;

    public function __construct($id, $name, $id_student, $date_hour, $id_teacher)
    {
        $this->id = $id;
        $this->name = $name;
        $this->id_student = $id_student;
        $this->date_hour = $date_hour;
        $this->id_teacher = $id_teacher;
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

    public function getIdTeacher()
    {
        return $this->id_teacher;
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

    public function setIdTeacher($id_teacher)
    {
        $this->id_teacher = $id_teacher;
    }
    

}

?>