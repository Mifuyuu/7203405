<?php
// 6. Product
interface IProduct { // 6.1 สร้างอินเทอร์เฟสสำหรับสินค้า ที่มี 2 เมธอด เพื่อแสดงชื่อ และแสดงราคา
    public function getName();
    public function getPrice();
}

class Product implements IProduct {
    public $name;
    public $price;
    public function __construct($n,$p){
        $this->name = $n;
        $this->price = $p;
    }
    public function getName(){
        return $this->name; // 6.2 สร้างคลาสสินค้า ที่อิมพลีเมนต์อินเทอร์เฟสสินค้า โดยมี property ชื่อ และราคา มีเมธอด  __construct, แสดงชื่อ, แสดงราคา
    }
    public function getPrice(){
        return $this->price;
    }
}

$prod = [ // 6.3 สร้างวัตถุสินค้าเป็นอาร์เรย์ 5 รายการ
    new Product("Computer Desktop IBM",25000),
    new Product("Computer Notebook",27000),
    new Product("Ipad Pro",32000),
    new Product("IPhone 12 Pro",17000),
    new Product("Gaming Headset x27",1200)
];

foreach($prod as $p){ // 6.4 ใช้ foreach เพื่อแสดงผลสินค้าทั้ง 5 รายการ
    echo "ชื่อสินค้า: ".$p->getName()." ราคา: ".$p->getPrice()."<br>";
}

echo "<hr>";

// 7. จากข้อ 6 

abstract class AProduct implements IProduct { // 7.1 เปลี่ยน  6.2 ให้เป็น abstract class สินค้า ที่อิมพลีเมนต์อินเทอร์เฟสสินค้า โดยมี property ชื่อ และราคา มีเมธอด  __construct, แสดงชื่อ, แสดงราคา
    protected $name;
    protected $price;
    protected $stock;
    public function __construct($n,$p,$st){
        $this->name = $n;
        $this->price = $p;
        $this->stock = $st;
    }
    public function getName(){
        return $this->name;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getStock(){
        return $this->stock;
    }
}

class Colthes_Prod extends AProduct { // 7.2 สร้างคลาสสินค้าประเภทเสื้อผ้า ซึ่งสืบทอดจาก abstract class สินค้า และเก็บข้อมูล ขนาด เช่น S M L XL
    private $Size;
    public function __construct($n, $p, $st, $s){
        parent::__construct($n,$p,$st);
        $this->Size = $s;
    }
    public function getSize(){
        return $this->Size;
    }
}

class General_Prod extends AProduct { // 7.3 สร้างคลาสสินค้าประเภทสินค้าทั่วไป ซึ่งสืบทอดจาก abstract class สินค้า 

}

$general_prod = [
    new General_Prod("Computer Desktop IBM",25000,99),
    new General_Prod("Computer Notebook",27000,20),
    new General_Prod("Ipad Pro",32000,33),
    new General_Prod("IPhone 12 Pro",17000,55),
    new General_Prod("Gaming Headset x27",1200,20)
];

foreach($general_prod as $gp){
     echo "ชื่อสินค้า: ".$gp->getName()." ราคา: ".$gp->getPrice()." จำนวนสินค้า: ".$gp->getStock()."<br>";
}

echo "<hr>";


$cloth_prod = [ // 7.4 สร้างสินค้าทั้ง 2 ประเภท พร้อมแสดงผล
    new Colthes_Prod("White Shirt",1590,69,"XL"),
    new Colthes_Prod("Green Shirt",590,60,"L"),
    new Colthes_Prod("T-Shirt",190,15,"S"),
    new Colthes_Prod("Hoodie",990,20,"M"),
    new Colthes_Prod("Skirt",350,22,"XL"),
];

foreach($cloth_prod as $cp){
    echo "ชื่อสินค้า: ".$cp->getName()." ราคา: ".$cp->getPrice()." ขนาด: ".$cp->getSize()." จำนวนสินค้า: ".$cp->getStock()."<br>";
}
?>