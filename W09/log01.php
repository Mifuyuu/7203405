<?php

trait loggle {
    public function log($msg){
        echo date('Y-m-d H:i:s').$msg."<br>";
    }
}

class W09User {
    use loggle;
    private $name;
    public function __construct($n){
        $this->name = $n;
        $this->log(" สร้าง user: $n เรียบร้อยแล้ว");
    }
}


class W09Product {
    use loggle;
    private $name;
    public function __construct($n){
        $this->name = $n;
        $this->log(" สร้าง Product: $n เรียบร้อยแล้ว");
    }
}



$u1 = new W09User("Seksun");
$p1 = new W09Product("Coconut");

?>