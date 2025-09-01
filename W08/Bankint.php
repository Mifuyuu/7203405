<?php

interface Banks{
    public function withdraw($w);
    public function deposit($d);
    public function getbal();
}

abstract class Account implements Banks{
    protected $balance;
    public function getbal(){
        echo "ยอดเงินคงเหลือในบัญชี: ".$this->balance." บาท<br>";
    }
}
class Saving extends Account {
    public function __construct($c){
        $this->balance = $c;
    }
    public function deposit($d){
        $this->balance += $d;
        echo "ฝากเงิน: $d บาท<br>";
    }
    public function withdraw($w){
        if($this->balance >=$w){
            $this->balance -= $w;
            echo "ถอนเงิน $w บาท<br>";
        } else {
            echo "ยอดเงินคงเหลือไม่เพียงพอ<br>";
        }
    }
}

$saving1 = new Saving(22000);
$saving1->getbal();
$saving1->deposit(2220);
$saving1->getbal();
$saving1->withdraw(999999);
$saving1->getbal();
$saving1->withdraw(9999);
$saving1->getbal();
?>