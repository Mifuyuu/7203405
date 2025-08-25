<!-- 2. สร้าง Abstract class บัญชีธนาคาร 
2.1 มี property เป็นแบบที่สามารถเรียกใช้ได้ในคลาสที่สืบทอด คือ เลขที่บัญชีและยอดเงินคงเหลือ
2.2 สร้าง constructor โดยรับค่าเลขที่บัญชีและยอดเงินคงเหลือในปัญชี
2.3 สร้าง abstract method ชื่อ deposit โดยรับค่าเงินฝาก
2.4 สร้าง abstract method ชื่อ wirhdraw โดยรับค่าเงินที่ต้องการถอน
2.5 สร้าง method show เพื่อแสดงเลขที่บัญชี และยอดเงินคงเหลือ -->
<?php
abstract class Bank{
    public $account;
    public $balance;
    public function __construct($a,$b){
        $this->account = $a;
        $this->balance = $b;
    }
    abstract public function deposit($d);
    abstract public function withdraw($w);

    public function __toString()
    {
        return "Account: $this->account | Balance: $this->balance<br>";
    }
}

// 3. สร้างคลาสบัญชีออมทรัพย์ที่สืบทอดมาจากคลาสบัญชีธนาคาร ในข้อ 2
// 3.1 สร้างเมธอดเพื่อ overide เมธอด deposit เพื่อเพิ่มเงินฝากเข้าบัญชี พร้อมแสดงผลว่า ฝากเงินจำนวนเท่าใดเข้าบัญชีใด
// 3.2 สร้างเมธอดเพื่อ overide เมธอด withdraw เพื่อถอนเงิน พร้อมแสดงผลว่า ถอนเงินจำนวนเท่าใดจากบัญชีใด
// 3.3 สร้าง object และทดลองฝากเงิน ถอนเงิน

class SavingAcc extends Bank{
    public function deposit($d){
        $this->balance+=$d;
        echo "Deposit: +$d<br>";
    }
    public function withdraw($w){
        $this->balance-=$w;
        echo "Withdraw: -$w<br>";

    }
}

$acc1 = new SavingAcc("Tsuzaki",5000);
echo $acc1;
$acc1->deposit(100);
echo $acc1;
$acc1->withdraw(150);
echo $acc1;

echo "<hr>";
// 4. สร้างคลาสบัญชีเงินฝากประจำที่สืบทอดมาจากคลาสบัญชีธนาคาร ในข้อ 2
// 4.1 เพิ่ม property เป็นแบบที่ไม่สามารถเรียกใช้ได้จากภายนอกคลาส คือ ระยะเวลาฝาก
// 4.2 สร้าง constructor ที่สืบทอดมาจากคลาสแม่ โดยเพิ่มการรับค่าระยะเวลาฝาก
// 3.1 สร้างเมธอดเพื่อ overide เมธอด deposit เพื่อเพิ่มเงินฝากเข้าบัญชี พร้อมแสดงผลว่า ฝากเงินจำนวนเท่าใดเข้าบัญชีใด
// 4.4 สร้างเมธอดเพื่อ overide เมธอด withdraw โดยแสดงผลว่า  ไม่สามารถถอนเงินจากบัญชี
// 4.5 สร้าง method show โดยสืบทอดมาจากคลาสแม่ พร้อมแสดงระยะเวลาฝาก
// 4.6 สร้าง object และทดลองฝากเงิน ถอนเงิน

class DepositAcc extends Bank{
    private $times;
    public function __construct($a, $b, $t){
        parent::__construct($a,$b);
        $this->times = $t;
    }
    public function deposit($d){
        $this->balance+=$d;
        echo "Deposit +$d | Account: $this->account | Balance: $this->balance<br>";
    }
    
    public function withdraw($w){
        echo "Failed: can't withdraw $w form account: $this->account now have $this->balance in your account.";
    }

    public function __toString()
    {
        return parent::__toString()."Time to deposit: $this->times<br>";
    }

}

$acc2 = new DepositAcc("Seksun",2000,"1 Years");
echo $acc2;
$acc2->deposit(5500);
$acc2->withdraw(2000);