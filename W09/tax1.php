<?php

trait caltax {
    public function calctax($a){
        $rate = 0.07;
        $tax = $a*$rate;
        return $tax;
    }
}

trait discount{
    public function disc($a){
        $rate = 0.05;
        $discount = $a * $rate;
        $discprice = $a - $discount;
        return $discprice;
    }
}

class W09_Product {
    use caltax, discount;
    private $name;
    private $price;
    public function __construct($n,$p){
        $this->name = $n;
        $this->price = $p;
    }
    public function calcpricetax()
    {
        $netprice = $this->disc($this->price);
        $totalprice = $netprice + $this->calctax($netprice);
        echo "สินค้า : $this->name, ราคา: $this->price ราคาหักส่วนลด: $netprice ราคารวม vat: $totalprice <br>";
    }
}

class Cloth extends W09_Product {
    private $size;
    public function __construct($n, $p, $s){
        parent::__construct($n,$p);
        $this->size = $s;
    }
}

$p1 = new W09_Product("Laptop Backpack", 900);
$p1->calcpricetax();

$p2 = new W09_Product("RTX 5090", 129000);
$p2->calcpricetax();

$p2 = new Cloth("เสื้อยืด", 199, "S");
$p2->calcpricetax();
?>