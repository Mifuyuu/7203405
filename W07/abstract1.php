<?php
abstract class Mobile{
    public $name;
    public function __construct($n){
        $this->name = $n;
    }
    abstract public function intro();
}

class Vivo extends Mobile {
    public function intro(){
        echo "$this->name: V17<br>";
    }
}
class Oppo extends Mobile {
    public function intro(){
        echo "$this->name: 14 Pro<br>";
    }
}

$phone1 = new Vivo("VIVO");
$phone1->intro();
$phone2 = new Oppo("OPPO");
$phone2->intro();