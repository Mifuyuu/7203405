<?php

class Account{
    private $accountNumber;
    private $accountName;
    private $balance;

    public function __construct($a,$b,$c){
        $this->accountNumber=$a;
        $this->accountName=$b;
        $this->balance=$c;
    }

    public function deposit($amount){
        if ($amount>0) {
            echo "<br>Deposit : +".$amount." Baht<br>";
            $this->balance+=$amount;
            $this->getbalance();
        } else {
            echo "<br><span style='color:red;'><b>Error:</b> Deposit must greater than 0!</span><br>";
            echo $this->getbalance();
        }
    }

    public function withdraw($amount){
        if ($this->balance<$amount) {
            echo "<br><span style='color:red;'><b>Error:</b> your balance is not enough for withdraw!</span><br>";
            echo $this->getbalance();
        } else {
            echo "<br>Withdraw : -".$amount." Baht<br>";
            $this->balance-=$amount;
            echo $this->getbalance();
        }
    }

    public function getbalance(){
        echo "ID: ".$this->accountNumber." USER: ".$this->accountName." <br>BALANCE: ".$this->balance." Baht<br>";
        echo "********************************";
    }
}

$acc1 = new Account("11223344","Tsuzaki",8000);
$acc1->getbalance();
$acc1->withdraw(8000);
$acc1->deposit(5000);
$acc1->withdraw(5500);
$acc1->deposit(10000);
$acc1->deposit(0);
$acc1->withdraw(15000)
?>