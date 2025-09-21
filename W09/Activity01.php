<!-- ***** Trait
สร้าง Trait ชื่อว่า Payment สำหรับการจัดการเกี่ยวกับการชำระเงิน รวมถึงการคำนวณค่าเงินทอน ดังนี้
1. มีเมธอด makePayment โดยรับค่าจำนวนเงินที่ลูกค้าซ์้อสินค้า แล้วนำมาแสดงค่า 
2. มีเมธอด calculate เพื่อคำนวณเงินทอน โดยรับค่าจำนวนเงินที่รับมา และจำนวนเงินค่าสินค้าที่ต้องชำระ และนำมาหาจำนวนเงินที่ต้องทอน
3. สร้างคลาสลูกค้า Customer ที่ใช้ Trait นี้ โดยมี property คือ ชื่อลูกค้า  และมีเมธอด
- construct
- purchase ซึ่งรับค่าชื่อสินค้า และราคาสินค้า โดย แสดงชื่อลูกค้า ว่าซื้อสินค้าอะไร ราคาเท่าใด โดยเรียกใช้ makePayment
- complete ซึ่งรับค่า เงินที่รับมา และ ราคาที่ลูกค้าต้องชำระ และแสดงผลว่า ลูกค้ ซื้อสินค้าเท่าใด และเงินทอนเท่าใด โดยเรียกใช้ calculate
4. สร้าง object ลูกค้า 1 ราย
5. เรียกใช้ purchase เพื่อซื้อสินค้า โดยส่งค่า ชื่อสินค้า และราคาสินค้า
6. เรียกใช้ complete เพื่อคำนวนเงิน โดยส่งค่า เงินที่รับมา และ ราคาที่ลูกค้าต้องชำระ-->

<?php

trait Payment {
    public function makePayment($a){
        echo "จำนวนเงินที่ลูกค้าซื้อสินค้า $a บาท<br>";
    }
    public function calculate($r,$p){
        $change = $r - $p;
        echo "รับเงินจากลูกค้า $r บาท<br>";
        echo "ค่าสินค้า $p บาท<br>";
        echo "เงินทอน $change บาท<br>";
    }
}

class Customer {
    use Payment;
    public $customer_name;
    public function __construct($cn){
        $this->customer_name = $cn;
    }
    public function purchase($pn,$pp){
        echo "ลูกค้า: $this->customer_name<br>
        ซื้อสินค้า $pn ราคา $pp บาท <br>";
        $this->makePayment($pp);
    }
    public function complete($mg,$mu){
        echo $this->calculate($mg,$mu);
    }
}

$c1 = new Customer("Seksun");
$c1->purchase("Laptop",9000);
$c1->calculate(10000,9000);

// *** Multiple Traits
// 7. จาก script ข้างต้น สร้าง Trait Product เพิ่มขึ้น เพื่อเพิ่มสินค้าเข้าคลัง และนำสินค้าออกจากคลัง โดยมี method add และ remove โดยแสดงผลว่า นำเข้า/ออก สินค้าใด เข้าหรืออกจากคลังสินค้า
// 8. สร้างคลาสร้านค้า Store ซึ่งเรียกใช้ Trait Payment และ Product โดยมี property คือ ชื่อร้าน โดยมี method
// - construct
// - sell รับค่า ชื่อสินค้าที่ขาย และราคา แสดงผล ชื่อร้านค้า ได้ขายสินค้า ราคา เท่าใด โดยเรียก makePayment
// - update โดยรับค่าชื่อสินค้า และ add หรือ remove โดยหาก add เรียกใช้ method add หาก remove เรียกใช้ method remove
// 9. สร้าง object ร้านค้า
// 10. เรียกใช้ sell โดยส่งค่า อสินค้าที่ขาย และราคา 
// 11. เรียกใช้ update โดยส่งชื่อสินค้า และ add 
// 12. เรียกใช้ update โดยส่งชื่อสินค้า และ remove -->

echo "<hr>";

trait tProduct {
    public function add($p){
        echo "นำสินค้า $p เข้าคลังแล้ว<br>";
    }
    public function remove($p){
        echo "ส่งสินค้า $p ออกจากคลังแล้ว<br>";
    }
}

class Store {
    use tProduct;
    use Payment;
    public $store_name;
    public function __construct($sn){
        $this->store_name = $sn;
    }
    public function sell($pn,$pp){
        echo "ร้านค้า: $this->store_name <br>ได้ขายสินค้า $pn ราคา $pp<br>";
        $this->makePayment($pp);
    }
    public function update($n,$act){
        if($act == "add") $this->add($n);
        elseif($act == "remove") $this->remove($n);
        else "คำสั่งไม่ถูกต้อง<br>";
    }
}

$store1 = new Store("ร้านค้าของ Seksun");
$store1->sell("Laptop HP",9500);
$store1->update("Laptop HP","add");
$store1->update("Laptop HP","remove");
?>