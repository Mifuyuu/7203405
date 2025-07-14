<?php

class Car{

    public $brand;
    public $model;
    public $img;

    public function __construct($b,$m,$i){
        $this->brand=$b;
        $this->model=$m;
        $this->img=$i;
    }
    public function display(){
        echo "<img src='".$this->img."' width='10%'><br>";
        echo "Brand: ".$this->brand." Model: ".$this->model,"<br>";
    }
}

$car1 = new Car("Ford","Mustang","car1.avif");
$car2 = new Car("BMW","M5","car2.png");

$car1->display();
$car2->display();

?>