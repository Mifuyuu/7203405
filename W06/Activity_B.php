<!-- ข้อ B
1. สร้าง class Account ประกอบด้วย
•property คือ จำนวนเงินคงเหลือในบัญชี เป็น private
•สร้าง constructor เพื่อกำหนดค่าจำนวนเงินคงเหลือในบัญชี
•สร้าง Method เพื่อแสดงผลเงินคงเหลือในบัญชี
•สร้าง Method เพื่อฝากเงินในบัญชี โดยนำไปเพิ่มค่ายอดเงินคงเหลือในบัญชี
2. สร้าง class Saving สืบทอดมาจาก class Account
•Property  อัตราเงินฝากออมทรัพย์ เป็น private
•สร้าง constructor เพื่อกำหนด ค่าจำนวนเงินคงเหลือในบัญชี และ อัตราเงินฝากออมทรัพย์
•สร้าง Method คำนวณดอกเบี้ยจากจำนวนเงินคงเหลือในบัญชี และ นำฝากเข้าบัญชี
3. สร้าง object ของ Saving และแสดงผล จำนวนเงินคงเหลือในบัญชี
4.  คำนวณดอกเบี้ย แสะแสดงผล จำนวนเงินคงเหลือในบัญชี -->
<?php

class Account {
    protected $balance;
    public function __construct($b){
        $this->balance = $b;
    }
    public function show_bal(){
        echo "Your balance: $this->balance<br>";
    }
    public function deposit($d){
        echo "Deposit +$d<br>";
        $this->balance+=$d;
        $this->show_bal();
    }
    
}

class Saving extends Account{
    private $rate;
    public function __construct($b,$r){
        parent::__construct($b);
        $this->rate = $r;
    }
    public function tax_cal(){
        echo "<hr>";
        $this->show_bal();
        echo "Interest: $this->rate%<br>";
        $this->balance+=($this->balance*($this->rate/100));
        echo "Remaining Balance: $this->balance<br>";
    }
}

class Check extends Account{
    public function check_withdraw($w){
        echo "Check Withdraw: $w<br>";
        $this->balance-=$w;
        $this->show_bal();
    }
} 

$Acc1 = new Account(500);
$Acc1->show_bal();
$Acc1->deposit(150);

$Acc2 = new Saving(500,2);
$Acc2->tax_cal();
echo "<hr>";
$Acc3 = new Check(50000);
$Acc3->show_bal();
$Acc3->check_withdraw(1500);