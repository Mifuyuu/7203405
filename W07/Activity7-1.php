<!-- 1. สร้างคลาสนามธรรมของสมาชิกคลับแห่งหนึ่ง 
1.1 ซึ่งเก็บข้อมูล รหัส ชื่อ นามสกุลของสมาชิก 
1.2 สร้าง constructor
1.3 สร้างเมธอดนามธรรม เพื่อคำนวณผลประโยชน์ของสมาชิก

1.4 สร้างคลาสสมาชิกทั่วไป ซึ่งสืบทอดมาจากคลาสสมาชิก
1.5 ในการคำนวณผลประโยชน์ของสมาชิกทั่วไป จะได้รับส่วนลดร้อยละ 5 จากค่าใช้บริการ
1.6 สร้าง object ของคลาสนี้ อย่างน้อย 2 objects และแสดงผล
1.7 รับค่าใช้บริการ แล้วนำไปคำนวณผลประโยชน์ที่ได้รับ 

1.8 สร้างคลาสสมาชิก VIP ซึ่งสืบทอดมาจากคลาสสมาชิก

1.9 ในการคำนวณผลประโยชน์ของสมาชิกVIP จะได้รับส่วนลดร้อยละ 10 จากค่าใช้บริการ และสะสมแต้ม ร้อยบาท ได้ 1 แต้ม 
1.10 สร้าง object ของคลาสนี้ อย่างน้อย 2 objects และแสดงผล
1.11 รับค่าใช้บริการ แล้วนำไปคำนวณผลประโยชน์ที่ได้รับ  -->

<?php
abstract class Member{
    protected $id;
    protected $fname;
    protected $lname;
    public function __construct($id,$fn,$ln){
        $this->id = $id;
        $this->fname = $fn;
        $this->lname = $ln;
    }

    abstract public function benefit($a);

}

class Regular extends Member{
    public function benefit($a){
        $discount = $a * 5 / 100;
        $amount = $a - $discount;
        echo "ลูกค้าใช้บริการ $a บาท และได้รับส่วนลด $discount บาท ชำระเงิน $amount บาท<br>";
    }
}

class Vip extends Member{
    public function benefit($a){
        $discount = $a * 10 / 100;
        $amount = $a - $discount;
        echo "ลูกค้า Vip ใช้บริการ $a บาท และได้รับส่วนลด $discount บาท ชำระเงิน $amount บาท";
        if($a>=100){
            $point = floor($a / 100);
            echo " และคุณได้รับ $point แต้ม<br>";
        } else {
            echo "<br>";
        }
    }
}

$member1 = new Regular("001","Seksun","Hlamwanna");
$member2 = new Regular("002","Bantita","Saeko");
$member1->benefit(200);
$member2->benefit(500);

$vip1 = new Vip("003","Castorice","Wife");
$vip1->benefit(890);
$vip2 = new Vip("004","Firefly","Sam");
$vip2->benefit(5850);