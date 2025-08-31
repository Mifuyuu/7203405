<!-- **
ข้อ 1 Product
-->
<?php
abstract class Product { //1. สร้าง abstract class ของสินค้า 
    protected $product_name;
    protected $product_price; //1.1 มี property เป็นแบบที่สามารถเรียกใช้ได้ในคลาสที่สืบทอด คือ ชื่อสินค้า และราคา
    
    public function __construct($n,$p){ //1.2 สร้าง constructor โดยรับค่าชื่อสินค้า และราคา
        $this->product_name = $n;
        $this->product_price = $p;
    }

    abstract public function product_calc(); //1.3 สร้าง abstract method ชื่อ เพื่อคำนวณราคาสินค้า

    public function __toString() //1.4 สร้าง method toString 
    {
        return "<br><b>Product:</b> $this->product_name<br><b>Price:</b> $this->product_price";
    }
}

class Normal_Product extends Product { //2. สร้างคลาสสินค้าปกติที่สืบทอดมาจากคลาสสินค้า ในข้อ 1

    public function product_calc() //2.1 สร้างเมธอดเพื่อ overide เมธอด คำนวณราคาสินค้า โดยราคาสินค้ามีค่าเท่ากับราคาขาย
    {
        $product_sell = $this->product_price;
        echo "<br><b>Sell:</b> $product_sell";
    }

}

$product_1 = new Normal_Product("Apple",20); //2.2 สร้าง object และแสดงผลการคำนวณราคาสินค้า
echo $product_1;
$product_1->product_calc();

echo "<hr>";

class Sale_Product extends Product { //3. สร้างคลาสสินค้าลดราคาที่สืบทอดมาจากคลาสสินค้า ในข้อ 1

    private $product_discount; //3.1 เพิ่ม property เป็นแบบที่ไม่สามารถเรียกใช้ได้จากภายนอกคลาส คือ ส่วนลด

    public function __construct($n,$p,$s) //3.2 สร้าง constructor ที่สืบทอดมาจากคลาสแม่ โดยเพิ่มการรับค่าส่วนลด
    {
        parent::__construct($n,$p);
        $this->product_discount = $s;
    }

    public function product_calc() //3.3 สร้างเมธอดเพื่อ overide เมธอด คำนวณราคาสินค้า โดยคำนวณจาก ราคาขาย - ส่วนลด
    {
        $product_sell = ($this->product_price)-($this->product_discount);
        echo "<br><b>Sell:</b> $product_sell";
    }
    
    public function __toString()
    {
        return parent::__toString()."<br><b>Discount:</b> $this->product_discount"; //3.4 สร้าง method toString โดยสืบทอดมาจากคลาสแม่ พร้อมแสดงส่วนลด
    }
}

$product_2 = new Sale_Product("Banana",20,5); //3.5 สร้าง object และแสดงผลการคำนวณราคาสินค้า
echo $product_2;
$product_2->product_calc();

?>