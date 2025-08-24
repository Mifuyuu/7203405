<!--
2. จากข้อ 1 ให้สร้างฟังก์ชัน constructor เพื่อกำหนดชื่อหนังสือและราคาโดยอัตโนมัติในขณะที่สร้าง object
และแสดงผลลัพธ์ทางหน้าจอ -->

<?php

class Book_II {

    public $title;
    public $price;

    public function __construct($t, $p)
    {
        $this->title = $t;
        $this->price = $p;
    }

    public function show_info()
    {
        echo "Title: $this->title <br>";
        echo "Price: $this->price <br>";
    }
}
$python = new Book_II("Introduction to Python", 250);
$python->show_info();
$chatgpt = new Book_II("How to ChatGPT?", 325);
$chatgpt->show_info();
?>