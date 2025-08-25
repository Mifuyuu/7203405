<?php
abstract class Shape{ //abstract class
    abstract public function cal_area(); //abstract method
}

class Circle extends Shape{
    public $radius;
    public function __construct($radius){
        $this->radius = $radius;
    }
    public function cal_area(){ //implement abstract method cal_area()
        $area = (22/7) * ($this->radius * $this->radius);
        echo "วงกลมที่มีรัศมี $this->radius มีพื้นที่ $area<br>";
    }
}

class Rectangle extends Shape{
    public $width;
    public $length;
    public function __construct($w,$l){
        $this->width = $w;
        $this->length = $l;
    }
    public function cal_area(){ //implement abstract method cal_area()
        $area = $this->width * $this->length;
        echo "สีเหลี่ยมที่มีความกว้าง $this->width ยาว $this->length มีพื้นที่ $area<br>";
    }
}

class Triangle extends Shape{
    public $base;
    public $height;
    public function __construct($b,$h){
        $this->base = $b;
        $this->height = $h;
    }
    public function cal_area(){ //implement abstract method cal_area()
        $area = (1/2)*$this->base*$this->height;
        echo "สามเหลี่ยมที่มีฐาน $this->base สูง $this->height มีพื้นที่ $area<br>";
    }
}

$circle1 = new Circle(20);
$circle1 -> cal_area();

$circle1 = new Circle(10);
$circle1 -> cal_area();

$rectangle1 = new Rectangle(10, 20);
$rectangle1 -> cal_area();

$rectangle2 = new Rectangle(5, 2);
$rectangle2 -> cal_area();

$tri1 = new Triangle(10, 20);
$tri1->cal_area();

$tri2 = new Triangle(5, 15);
$tri2->cal_area();

