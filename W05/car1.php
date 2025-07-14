<?php

class Cars{
    public $brand;
    public $model;
    public $color;
    public $img;

    public function set_brand($b){
        $this->brand=$b;
    }

    public function set_model($m){
        $this->model=$m;
    }

    public function set_color($c){
        $this->color=$c;
    }

    public function set_img($i){
        $this->img=$i;
    }

    public function get_brand(){
        echo "Brand: ",$this->brand," Model: ",$this->model," Color: ",$this->color,"<br><img src='",$this->img,"' width=''><br>";
    }

}

$car1=new Cars();
$car1->set_brand("Ford");
$car1->set_model("Mustang");
$car1->set_color("Red");
$car1->set_img("car1.avif");
$car1->get_brand();

$car2=new Cars();
$car2->set_brand("BMW");
$car2->set_model("M5");
$car2->set_color("Gray");
$car2->set_img("car2.png");
$car2->get_brand();
?>