<?php

class Student_Construct{

    public $id;
    public $name;
    public $gpa;
    public $img;

    public function __construct($a,$b,$c,$d){
        $this->id=$a;
        $this->name=$b;
        $this->gpa=$c;
        $this->img=$d;
    }

    public function isPassed(){
        return $this->gpa>=2.0;
    }
    public function display(){
        echo "<img src='".$this->img."' width='20%'><br>";
        echo "ID: ".$this->id." Name: ".$this->name," GPA: ".$this->gpa." is ".($this->isPassed() ? "Passed" : "Failed")."<br>";
    }
}

$std1 = new Student_Construct("664230001","Firefly",2.0,"Firefly.webp");
$std2 = new Student_Construct("664230002","Cerydra",1.9,"Cerydra.webp");

$std1->display();
$std2->display();

?>