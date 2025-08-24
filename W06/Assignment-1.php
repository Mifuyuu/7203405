<!-- 1. หนังสือ
1.1 ให้นักศึกษาสร้าง Class ของหนังสือซึ่งประกอบด้วย properties คือ ชื่อหนังสือ และราคา
1.2 สร้างฟังก์ชัน เพื่อกำหนดชื่อหนังสือ โดยรับค่าชื่อหนังสือ
1.3 สร้างฟังก์ชัน แสดงชื่อหนังสือ
1.4 สร้างฟังก์ชัน เพื่อกำหนดราคาขาย โดยรับค่าราคาขาย
1.5 สร้างฟังก์ชัน แสดงราคาขาย
1.6 สร้าง object ขื่อ $python และ $chatgpt
1.7 เรื่ยกใช้ฟังก์ชันในข้อ 1.2 เพื่อกำหนดชื่อหนังสือ เป็น "Introduction to Python" และ "How to ChatGPT?" ให้กับ object ที่สร้างขึ้นในข้อ 1.6
1.8 เรื่ยกใช้ฟังก์ชันในข้อ 1.4 เพื่อกำหนดราคาขาย เป็น 250 และ 325 ให้กับ object ที่สร้างขึ้นในข้อ 1.6
1.9 แสดงชื่อหนังสือและราคาขาย โดยใช้ฟังก์ชันในข้อ 1.3 และ 1.5
1.10 เปลี่ยนชื่อหนังสือ $python เป็น "Python Cookbook"
1.11 เปลี่ยนราคาหนังสือ $chatgpt เป็น 299
1.12 แสดงผลหลังเปลี่ยนแปลงข้อมูลในข้อ 1.10 และ 1.11
-->
<?php

class book_I {
    public $title;
    public $price;

    public function set_title($t) {
        $this->title = $t;
    }

    public function show_title() {
        echo "Title: $this->title <br>";
    }

    public function set_price($p) {
        $this->price = $p;
    }

    public function show_price() {
        echo "Price: $this->price <br>";
    }

}

$python = new Book_I();
$chatgpt = new Book_I();

$python->set_title("Introduction to Python");
$chatgpt->set_title("How to ChatGPT?");

$python->set_price(250);
$chatgpt->set_price(325);

$python->show_title();
$python->show_price();

$chatgpt->show_title();
$chatgpt->show_price();

$python->set_title("Python Cookbook");

$chatgpt->set_price(299);

$python->show_title();

$chatgpt->show_price();

?>