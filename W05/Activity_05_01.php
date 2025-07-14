<?php
class Student {

    public $id;
    public $name;
    public $gpa;
    public $img;

    public function set_id($d){
        $this->id = $d;
    }
    public function set_name($n){
        $this->name = $n;
    }

    public function set_gpa($g){
        $this->gpa = $g;
    }

    public function set_img($i){
        $this->img=$i;
    }

    public function isPassed(){
        return $this->gpa>=2;
    }

    public function displayInfo(){
        echo "ID: ".$this->id." Name: " . $this->name . " GPA: " . $this->gpa." is ".($this->isPassed() ? "Passed" : "Failed");
        echo "<br><img src='".$this->img."' width='20%'><br>";
    }

}

$Std1 = new Student();
$Std1->set_id("664230000");
$Std1->set_name("Firefly");
$Std1->set_gpa(3.1);
$Std1->set_img("Firefly.webp");
$Std1->displayInfo();

$Std2 = new Student();
$Std2->set_id("664230001");
$Std2->set_name("Cerydra");
$Std2->set_gpa(1.9);
$Std2->set_img("Cerydra.webp");
$Std2->displayInfo();
?>