<?php

interface Shapes
{
    public function cal_area();
    public function cal_per();
}
class Circle implements Shapes
{
    private $radius;
    public function __construct($r)
    {
        $this->radius = $r;
    }
    public function cal_area()
    {
        return pi() * $this->radius ^ 2;
    }
    public function cal_per()
    {
        return 2 * pi() * $this->radius;
    }
}

class Rectangle implements Shapes
{
    private $width;
    private $height;
    public function __construct($w, $h)
    {
        $this->width = $w;
        $this->height = $h;
    }
    public function cal_area()
    {
        return $this->width * $this->height;
    }
    public function cal_per() {
        return 2* ($this->width+$this->height);
    }
}

$circle = [new Circle(9),new Circle(7),new Circle(13)];

foreach($circle as $c){
    echo "พื้นที่วงกลม: ".$c->cal_area()," เส้นรอบวง: ".$c->cal_per()."<br>";
}

$rec = [new Rectangle(10,10),new Rectangle(7,13),new Rectangle(3,9)];

foreach($rec as $r){
    echo "พื้นที่สี่เหลี่ยม: ".$r->cal_area()," เส้นรอบรูป: ".$r->cal_per()."<br>";
}