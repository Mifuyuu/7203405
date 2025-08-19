<?php

class Car{
    public $brand;
    public $model;

    public function __construct($b, $m)
    {
        $this->brand = $b;
        $this->model = $m;

    }

    public function show() {
        echo "Brand: $this->brand <br>Model: $this->model <br>";
    }
}

class Truck extends Car{
    public $load;
    public function set_load($l){
        $this->load = $l;
    }
    public function show_load(){
        echo "Load: $this->load Ton<br>";
    }
}

class Hatchback extends Car {
    public $person;

    public function set_person($p) {
        $this->person = $p;
    }
    public function show_person(){
        echo "Person: $this->person Person<br>";
    }
}

$car = new Car("Honda","Civic");
$car->show();

$truck = new Truck("Isuzu","Dmax");
$truck->show();
$truck->set_load(2);
$truck->show_load();

$van = new Hatchback("Honda","SS");
$van->show();
$van->set_person(14);
$van->show_person();
?>