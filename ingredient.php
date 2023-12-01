<?php

class ingredients {
    private $id;
    private $name;
    private $unitemesure;

    public function __construct($id, $name, $unitemesure) {
        $this->id = $id;
        $this->name = $name;
        $this->unitemesure = $unitemesure;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name; 
    }

    public function getUnitemesure() {
        return $this->unitemesure;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        return $this->name = $name;
    }

    public function setUnitemesure($unitemesure) {
        return $this->unitemesure = $unitemesure;
    }
}