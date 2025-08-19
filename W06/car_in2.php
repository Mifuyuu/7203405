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

class Truck2 extends Car{
    public $load;
    public function __construct($b,$m,$l){
        parent::__construct($b,$m);
        $this->load = $l;
    }
    public function show(){
        parent::show();
        echo "Load: $this->load Ton<br>";
    }
}

class Hatchback2 extends Car{
    public $person;
    public function __construct($b,$m,$p){
        parent::__construct($b, $m);
        $this->person = $p;
    }
    public function show()
    {
        parent::show();
        echo "Person: $this->person Person <br>";
    }
}

$truck = new Truck2("Izusu","Dmax","20");
$truck->show();

$van = new Hatchback2("Honda","Mo","14");
$van->show();