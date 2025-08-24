<!--
7.การสืบทอด (Inheritance)
7. 1. สร้างคลาสของสินค้า ซึ่งเก็บข้อมูล รหัส ชื่อ ราคา จำนวนคงเหลือ  โดยให้ราคา และ จำนวนคงเหลือเป็นแบบ protected
7.1 สร้างฟังก์ชั่นเพื่อกำหนดค่าและแสดงผล
7.2 สร้าง constructor
7.3 สร้าง object ของคลาส อย่างน้อย 3 objects และแสดงผล
7.4 สร้างคลาสเสื้อผ้า ซึ่งสืบทอดมาจากคลาสสินค้าในข้อ 1
7.5 ในการเก็บข้อมูลเสือผ้านั้น ต้องเก็บขนาดเสื้อผ้าด้วย เช่น S M L XL จะออกแบบการเก็บข้อมูลอย่างไร

7.6 สร้าง object ของคลาสนี้ อย่างน้อย 3 objects และแสดงผล
-->
<?php

class Product {
    public $id;
    public $name;
    protected $price;
    protected $stock;

    public function __construct($id, $name, $price, $stock)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function show_info()
    {
        echo "<br>ID: $this->id <br>";
        echo "Name: $this->name <br>";
        echo "Price: $this->price <br>";
        echo "Stock: $this->stock <br>";
    }
}

class Cloth extends Product {
    public $size;

    public function __construct($id, $name, $price, $stock, $size)
    {
        parent::__construct($id, $name, $price, $stock);
        $this->size = $size;
    }

    public function show_info()
    {
        parent::show_info();
        echo "Size: $this->size <br><br>";
    }
}

$prod1 = new Product(1, "Product 1", 100, 50);
$prod1->show_info();

$prod2 = new Product(2, "Product 2", 200, 30);
$prod2->show_info();

$prod3 = new Product(3, "Product 3", 300, 20);
$prod3->show_info();

$cloth1 = new Cloth(101, "T-Shirt", 150, 100, "M");
$cloth1->show_info();

$cloth2 = new Cloth(102, "Jeans", 250, 80, "L");
$cloth2->show_info();

$cloth3 = new Cloth(103, "Jacket", 350, 60, "XL");
$cloth3->show_info();

?>