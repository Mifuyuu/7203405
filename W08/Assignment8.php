<?php
// 6. Product
interface IProduct { // 6.1
    public function getName();
    public function getPrice();
}

class Product implements IProduct { // 6.2
    public $name;
    public $price;
    public function __construct($n, $p){
        $this->name = $n;
        $this->price = $p;
    }
    public function getName(){
        return $this->name;
    }
    public function getPrice(){
        return $this->price;
    }
}

$prod = [ // 6.3
    new Product("Computer Desktop IBM",25000),
    new Product("Computer Notebook",27000),
    new Product("Ipad Pro",32000),
    new Product("IPhone 12 Pro",17000),
    new Product("Gaming Headset x27",1200)
];

foreach($prod as $p){ // 6.4
    echo "ชื่อสินค้า: ".$p->getName()." ราคา: ".$p->getPrice()."<br>";
}

echo "<hr>";


// -----------------------------
// 1. Product & Shopping Cart
// -----------------------------

// 1.1 interface ShoppingCart
interface IShoppingCart {
    public function addProduct($product);   // เพิ่มสินค้า
    public function removeProduct($product); // ลบสินค้า
    public function getTotal(); // รวมราคา
}

// 1.2 class Cart implements ShoppingCart
class Cart implements IShoppingCart {
    private $items = []; // เก็บ array ของสินค้า

    public function addProduct($product){
        $this->items[] = $product;
        echo "เพิ่มสินค้า: ".$product->getName()."<br>";
    }

    public function removeProduct($product){
        foreach($this->items as $key => $item){
            if($item->getName() === $product->getName()){
                unset($this->items[$key]);
                echo "ลบสินค้า: ".$product->getName()."<br>";
                break;
            }
        }
    }

    public function getTotal(){
        $total = 0;
        foreach($this->items as $item){
            $total += $item->getPrice();
        }
        return $total;
    }
}

// 1.3 ใช้งาน Cart
$cart = new Cart();
$cart->addProduct($prod[0]);
$cart->addProduct($prod[2]);
$cart->addProduct($prod[4]);
echo "รวม: ".$cart->getTotal()."<br><br>";

// ลบสินค้าออก (เช่น ลบ iPad)
$cart->removeProduct($prod[2]);

echo "รวม: ".$cart->getTotal()."<br>";
echo "<hr>";

?>
<!--
2. คนไข้
2.1 สร้างอินเทอร์เฟส ที่มี 2 เมธอด เพื่อ คำนวณ BMI และ คำนวณระดับความเจ็บปวด
2.2 สร้างคลาส คนไข้ ที่อิมพลีเมนต์อินเทอร์เฟสในข้อ 2.1 โดยมีเมธอด เพื่อ
      - คำนวณ BMI จากน้ำหนักและความสูง 
      - คำนวณระดับความเจ็บปวดจากการให้คะแนนของคนไข้ โดย น้อยกว่า 3 คะแนน = ปวดเล็กน้อย 4-7 คะแนน = ปวดปานกลาง 8-10 คะแนน = ปวดมาก
2.3 สร้างคนไข้ไม่น้อยกว่า 3 คน โดยใช้อาร์เรย์
2.4 แสดงผล BMI และ ระดับความเจ็บปวดของคนไข้ทั้ง 3 คน -->

<?php

interface IPatient { // 2.1
    public function calculateBMI();
    public function painLevel();
}

class Patient implements IPatient { // 2.2
    public $name;
    public $weight; // kg
    public $height; // m
    public $painScore; // 1-10

    public function __construct($n, $w, $h, $p){
        $this->name = $n;
        $this->weight = $w;
        $this->height = $h;
        $this->painScore = $p;
    }

    public function calculateBMI(){
        return round($this->weight / ($this->height * $this->height), 2);
    }

    public function painLevel(){
        if($this->painScore <= 4){
            return "ปวดเล็กน้อย";
        } elseif($this->painScore <= 8){
            return "ปวดปานกลาง";
        } else {
            return "ปวดมาก";
        }
    }
}
$patients = [ // 2.3
    new Patient("สมชาย", 70, 1.75, 2),
    new Patient("สมหญิง", 60, 1.65, 5),
    new Patient("สมปอง", 80, 1.80, 9)
];

foreach($patients as $patient){
    echo "ชื่อ: ".$patient->name."<br>";
    echo "BMI: ".$patient->calculateBMI()."<br>";
    echo "ระดับความเจ็บปวด: ".$patient->painLevel()."<br><br>";
}

?>