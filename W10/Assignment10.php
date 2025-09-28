<!-- 1. ระบบจัดการร้านกาแฟ (Coffee Shop Management System) ☕️
โจทย์:
ออกแบบระบบสำหรับร้านกาแฟที่ช่วยจัดการเมนู สั่งซื้อ และคำนวณราคา โดยรองรับการเพิ่มเมนูใหม่ๆ ในอนาคตได้ง่าย

Class ที่จำเป็น
Beverage: เป็น Abstract Class หรือ Interface ที่กำหนดพฤติกรรมพื้นฐานของเครื่องดื่ม เช่น cost() และ getDescription()
Coffee: Class ที่สืบทอดจาก Beverage
Tea: Class ที่สืบทอดจาก Beverage
Condiment: เป็น Abstract Class หรือ Interface สำหรับส่วนประกอบเพิ่มเติม (เช่น นม, น้ำตาล, ครีม) ซึ่งสามารถเพิ่มลงในเครื่องดื่มได้
Milk: Class ที่สืบทอดจาก Condiment
Sugar: Class ที่สืบทอดจาก Condiment
Order: Class ที่จัดการคำสั่งซื้อ
แนวคิด OOD:
ใช้หลักการ Decorator Pattern (เป็นรูปแบบหนึ่งของ OOD) เพื่อให้สามารถเพิ่มส่วนประกอบ (Condiment) ลงในเครื่องดื่ม (Beverage) ได้อย่างยืดหยุ่น โดยไม่ต้องแก้ไขโค้ดของ Class เครื่องดื่มเดิมเลย
ใช้หลักการ OCP (Open/Closed Principle) โดยให้ Class หลักๆ ของระบบ (เช่น Order) สามารถทำงานร่วมกับ Beverage และ Condiment ได้อย่างอิสระ ทำให้เพิ่มเครื่องดื่มหรือส่วนประกอบใหม่ๆ ได้ง่าย
ใช้หลักการ SRP (Single Responsibility Principle) โดยให้แต่ละ Class มีหน้าที่เฉพาะ เช่น Beverage มีหน้าที่คำนวณราคาและอธิบายตัวเอง ส่วน Order มีหน้าที่จัดการการสั่งซื้อเท่านั้น
แบบฝึกปฏิบัติ:เขียนโค้ดสำหรับ Abstract Class Beverage และ Abstract Class Condimentสร้าง Class Coffee และ Class Tea ที่สืบทอดจาก Beverage สร้าง Class Milk และ Class Sugar ที่สืบทอดจาก Condiment และใช้ Composition เพื่อรับ Beverage Object เข้ามาใน Constructor สร้าง Class Order ที่สามารถเพิ่ม Beverage Object เข้าไปได้เขียนโค้ดเพื่อสั่งกาแฟแก้วหนึ่งที่มีทั้งนมและน้ำตาล และแสดงราคาสุดท้ายออกมา -->
<?php

abstract class Beverage {
    protected $description;

    public function getDescription() {
        return $this->description;
    }

    public abstract function cost();
}
class Coffee extends Beverage {
    public function __construct() {
        $this->description = "Coffee";
    }

    public function cost() {
        return 20.00; // Base price for coffee
    }
}
class Tea extends Beverage {
    public function __construct() {
        $this->description = "Tea";
    }

    public function cost() {
        return 15.00; // Base price for tea
    }
}
abstract class Condiment extends Beverage {
    protected $beverage;

    public function __construct(Beverage $beverage) {
        $this->beverage = $beverage;
    }

    public function getDescription() {
        return $this->beverage->getDescription() . ", " . $this->description;
    }
}
class Milk extends Condiment {
    protected $description = "Milk";

    public function cost() {
        return $this->beverage->cost() + 10.00;
    }
}
class Sugar extends Condiment {
    protected $description = "Sugar";

    public function cost() {
        return $this->beverage->cost() + 5.00;
    }
}
class Order {
    private $beverages = [];

    public function addBeverage(Beverage $beverage) {
        $this->beverages[] = $beverage;
    }

    public function getTotalCost() {
        $total = 0;
        foreach ($this->beverages as $beverage) {
            $total += $beverage->cost();
        }
        return $total;
    }
}
$order = new Order();
$coffee = new Coffee();
$coffeeWithMilk = new Milk($coffee);
$coffeeWithMilkAndSugar = new Sugar($coffeeWithMilk);
$order->addBeverage($coffeeWithMilkAndSugar);
echo "Total cost: " . $order->getTotalCost();
?>